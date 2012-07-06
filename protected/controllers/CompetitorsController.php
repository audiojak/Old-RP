<?php

class CompetitorsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','deletelevel'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','globaladmin','globalupdate','migrate'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Competitors;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Competitors']))
		{
			
			
			$model->attributes=$_POST['Competitors'];
			if($model->save()){
				$cc = new CompetitorCompetitions;
				$cc->COMPETITOR_ID = $model->COMPETITOR_ID;
				$cc->LEVEL_ID = $_POST['Competitors']['COMPETITOR_LEVEL'];
				$cc->COMPETITION_ID = Yii::app()->session['comp'];
				$cc->save();
				$this->redirect(array('view','id'=>$model->COMPETITOR_ID));
			}
		}
		
		

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionMigrate()
	{
		//$competitors = Competitors::model()->findAll('WSDC_NO IS NOT NULL');
		//
		//print count($competitors);
		//echo '<br />';
		//
		//foreach ($competitors as $competitor){
		//	$cc = new CompetitorCompetitions;
		//	$cc->COMPETITOR_ID = $competitor->COMPETITOR_ID;
		//	$cc->LEVEL_ID = $competitor->COMPETITOR_LEVEL;
		//	$cc->COMPETITION_ID = Yii::app()->session['comp'];
		//	$cc->save();
		//	print $cc->COMPETITOR_ID.'<br />';
		//}

		//$this->render('migrate',array(
		//	'competitors'=>$competitors,
		//));
	}
	

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = Competitors::model()->with(
			array(
				'complevels'=>array(
					// we don't want to select posts
					// but want to get only users with published posts
					'joinType'=>'INNER JOIN',
					'condition'=>'complevels.competition_id='.Yii::app()->session['comp'],
				),
		))->findByPk((int)$id);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Competitors']))
		{
			$cc = CompetitorCompetitions::model()->find('COMPETITOR_ID = :COMPETITOR_ID AND LEVEL_ID = :LEVEL_ID AND COMPETITION_ID = :COMPETITION_ID',
				array(':COMPETITOR_ID' => $id,
					':LEVEL_ID' => $_POST['Competitors']['COMPETITOR_LEVEL'],
					':COMPETITION_ID' => Yii::app()->session['comp'],
				));
			
			if (!$cc){
				$cc = new CompetitorCompetitions;
				$cc->COMPETITOR_ID = $id;
				$cc->LEVEL_ID = $_POST['Competitors']['COMPETITOR_LEVEL'];
				$cc->COMPETITION_ID = Yii::app()->session['comp'];
				$cc->save();
			}
			
			$model->attributes=$_POST['Competitors'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->COMPETITOR_ID));
		}
		$data = clone $model;
		$this->render('update',array(
			'model'=>$model,
			'data' => clone $data,
		));
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionGlobalUpdate($id)
	{
		
		
		$model=$this->loadModel($id);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Competitors']))
		{
			$cc = CompetitorCompetitions::model()->find('COMPETITOR_ID = :COMPETITOR_ID AND LEVEL_ID = :LEVEL_ID AND COMPETITION_ID = :COMPETITION_ID',
				array(':COMPETITOR_ID' => $id,
					':LEVEL_ID' => $_POST['Competitors']['COMPETITOR_LEVEL'],
					':COMPETITION_ID' => Yii::app()->session['comp'],
				));
			
			if (!$cc){
				$cc = new CompetitorCompetitions;
				$cc->COMPETITOR_ID = $id;
				$cc->LEVEL_ID = $_POST['Competitors']['COMPETITOR_LEVEL'];
				$cc->COMPETITION_ID = Yii::app()->session['comp'];
				$cc->save();
			}
			
			$model->attributes=$_POST['Competitors'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->COMPETITOR_ID));
		}
		$data = clone $model;
		$this->render('update',array(
			'model'=>$model,
			'data' => clone $data,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Competitors');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Competitors('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Competitors']))
			$model->attributes=$_GET['Competitors'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionGlobalAdmin()
	{
		$model=new Competitors('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Competitors']))
			$model->attributes=$_GET['Competitors'];

		$this->render('globaladmin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Competitors::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='competitors-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
