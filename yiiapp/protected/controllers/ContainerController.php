<?php

class ContainerController extends Controller
{

	public $layout = '//layouts/column2';

	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'actions' => array('index', 'view'),
				'users' => array('*'),
			),
			array('allow',
				'actions' => array('create', 'update'),
				'users' => array('@'),
			),
			array('allow',
				'actions' => array('admin', 'delete'),
				'users' => array('admin'),
			),
			array('deny',
				'users' => array('*'),
			),
		);
	}

	public function beforeAction($action)
	{
		parent::beforeAction($action);
		// map identifcationColumn to id
		if (!isset($_GET['id']) && isset($_GET['domain']))
		{
			$model = Container::model()->find('domain = :domain', array(
				':domain' => $_GET['domain']));
			if ($model !== null)
			{
				$_GET['id'] = $model->id;
			} else
			{
				throw new CHttpException(400);
			}
		}
		if ($this->module !== null)
		{
			$this->breadcrumbs[$this->module->Id] = array('/' . $this->module->Id);
		}
		return true;
	}

	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$this->render('view', array(
			'model' => $model,
		));
	}

	public function actionCreate()
	{
		$model = new Container;

		$this->performAjaxValidation($model, 'container-form');

		if (isset($_POST['Container']))
		{
			$model->attributes = $_POST['Container'];

			try {
				if ($model->save())
				{
					$this->redirect(array('view', 'id' => $model->id));
				}
			} catch (Exception $e) {
				$model->addError('domain', $e->getMessage());
			}
		} elseif (isset($_GET['Container']))
		{
			$model->attributes = $_GET['Container'];
		}

		$this->render('create', array('model' => $model));
	}

	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		$this->performAjaxValidation($model, 'container-form');

		if (isset($_POST['Container']))
		{
			$model->attributes = $_POST['Container'];


			try {
				if ($model->save())
				{
					$this->redirect(array('view', 'id' => $model->id));
				}
			} catch (Exception $e) {
				$model->addError('domain', $e->getMessage());
			}
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest)
		{
			try {
				$this->loadModel($id)->delete();
			} catch (Exception $e) {
				throw new CHttpException(500, $e->getMessage());
			}

			if (!isset($_GET['ajax']))
			{
				$this->redirect(array('admin'));
			}
		}
		else
			throw new CHttpException(400,
			    Yii::t('app', 'Invalid request. Please do not repeat this request again.'));
	}

	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('Container');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model = new Container('search');
		$model->unsetAttributes();

		if (isset($_GET['Container']))
			$model->attributes = $_GET['Container'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function loadModel($id)
	{
		$model = Container::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'container-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
