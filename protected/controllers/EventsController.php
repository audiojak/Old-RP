<?php

class EventsController extends Controller
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
				'actions'=>array('index','view','create','update','competitors','judges','judge','couples','review'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','AutocompleteTest'),
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
		$model=new Events;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Events']))
		{
			$model->attributes=$_POST['Events'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->EVENT_ID));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Events']))
		{
			$model->attributes=$_POST['Events'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->EVENT_ID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionCompetitors($id)
	{
		$model=$this->loadModel($id);
		
		$form = new PolymorphicForm;
		
		// Initiallise arrays
		$in_event = array();
		
		// Search by attributes
		
		// If the form 
		if(isset($_POST['PolymorphicForm']))
		{
			CompetitorEvents::model()->deleteAllByAttributes(array('EVENT_ID' => $model->EVENT_ID));
			foreach ($_POST['PolymorphicForm'] as $key=>$value){
				if ($value){
					$event_person = new CompetitorEvents;
					$event_person->EVENT_ID = $model->EVENT_ID;
					$event_person->COMPETITOR_ID = $key;
					$event_person->save();
				}
			
			}
			$this->redirect(array('events/'.$id));
			
		} //CODE REVIEW
		
		
		if ($model->TYPE == 2){ // which may be 1 for leaders or 3 for couples
			$search_by = 0; // followers
		} else {
			$search_by = 1; // leaders
		}
		
		$competitors = Competitors::model()->with(array(
			'complevels'=>array(
					// we don't want to select 
					//'select'=>false,
					// but want to get only users with published posts
					'joinType'=>'INNER JOIN',
					'condition'=>'complevels.competition_id='.Yii::app()->session['comp'].' AND complevels.level_id='.$model->EVENT_LEVEL.' AND t.LEADER='.$search_by,
				),
		    ))->findAll(array('order'=>'BIB_NUMBER'));
		
		// Check who is already in
		foreach ($competitors as $person){
			$exists = CompetitorEvents::model()->findAllByAttributes(array('EVENT_ID' => $model->EVENT_ID,'COMPETITOR_ID' => $person->COMPETITOR_ID));
			if ($exists){
				$in_event[$person->COMPETITOR_ID] = 1;
			}
		}
		
		
		$this->render("competitor_list", array(
			// find all competitors with the same level as the event
		  "model"=>$model,
		  "models" => $competitors,
		  "in_event" => $in_event,
		  "form"   => $form, 
		));
	}
	
	// Add Judges to an event
	public function actionJudges($id)
	{
		$model=$this->loadModel($id);
		$form = new PolymorphicForm;
		
		// Initiallise arrays
		$in_event = array();
		$event_head = array();
		
		// If the form 
		if(isset($_POST['PolymorphicForm']))
		{
			JudgeEvents::model()->deleteAllByAttributes(array('EVENT_ID' => $model->EVENT_ID));
			foreach ($_POST['PolymorphicForm'] as $key=>$value){
				if ($key == 'head'){
					$head_judge = 2;
					//print_r($_POST['PolymorphicForm']); // WORKING
				} elseif($value){
					$event_judge = new JudgeEvents;
					$event_judge->EVENT_ID = $model->EVENT_ID;
					$event_judge->JUDGE_ID = $key;
					$event_judge->save();
				}
			
			}
			
			if ($head_judge){
				$event_judge = JudgeEvents::model()->findByAttributes(array('JUDGE_ID' => $head_judge));
				if ($event_judge){
					$event_judge->HEAD = 1;
					$event_judge->save();
				}
			}
			
			$this->redirect(array('events/'.$id));
			
		} //CODE REVIEW
		
		// For each in models, search by COMPETITOR_ID and EVENT_ID then add an attribute
		
		$event_judges = Judges::model()->findAll();
		
		foreach ($event_judges as $judge){
			$exists = JudgeEvents::model()->findByAttributes(array('EVENT_ID' => $model->EVENT_ID,'JUDGE_ID' => $judge->JUDGE_ID));
			if ($exists){
				$in_event[$judge->JUDGE_ID] = 1;
				if ($exists->HEAD){
				   $event_head[$judge->JUDGE_ID] = 1;
				}
			}
		}
		
		$this->render("judge_list", array(
			// find all competitors with the same level as the event
		  "model"=>$model,
		  "models" => $event_judges,
		  "in_event" => $in_event,
		  "event_head" => $event_head,
		  "form"   => $form, 
		));
	}
	
	// Add Judges to an event
	public function actionCouples($id)
	{
		$model=$this->loadModel($id);
		$form = new PolymorphicForm;
		
		// Initiallise arrays
		$parnerships = array();
		
		// If the form 
		if(isset($_POST['PolymorphicForm']))
		{
			Partnership::model()->deleteAllByAttributes(array('event_id' => $model->EVENT_ID));
			foreach ($_POST['PolymorphicForm'] as $key=>$value){
				if ($value){
					$parnership = new Partnership;
					$parnership->event_id = $model->EVENT_ID;
					$parnership->leader_id = $key;
					$parnership->follower_id = $value;
					$parnership->save();
				}
			}
			$this->redirect(array('events/'.$id));
			
		} //CODE REVIEW
		
		// For each in models, search by COMPETITOR_ID and EVENT_ID then add an attribute
		$followers = array();
		$partnerships = array();
		
		//$competitor_events = CompetitorEvents::model()->findAllByAttributes(array('EVENT_ID' => $model->EVENT_ID)); //array('order'=>'BIB_NUMBER')
		//
		//foreach($competitor_events as $competitor_event){
		//	$competitor = Competitors::model()->findByAttributes(array('COMPETITOR_ID' => $competitor_event->COMPETITOR_ID));
		//	$leaders[$competitor->COMPETITOR_ID] = $competitor->FIRST_NAME." ".$competitor->LAST_NAME;
		//	$partnership = Partnership::model()->findByAttributes(array('event_id' => $model->EVENT_ID,'leader_id' => $competitor->COMPETITOR_ID));
		//	if ($partnership){
		//		$partnerships[$partnership->leader_id] = $partnership->follower_id;
		//	}
		//}
		//
		//$followers_competitors = Competitors::model()->findAllByAttributes(array('COMPETITOR_LEVEL' => $model->EVENT_LEVEL,'LEADER' => 0));
		//
		//foreach($followers_competitors as $competitor){
		//	$followers[$competitor->COMPETITOR_ID] = $competitor->FIRST_NAME." ".$competitor->LAST_NAME;
		//	$default_follow = $competitor->COMPETITOR_ID;
		//}
		
		$leaders = Competitors::model()->with(array(
			'events'=>array(
					'joinType'=>'INNER JOIN',
					'condition'=>'events.event_id='.$model->EVENT_ID.' AND t.LEADER=1',
				),
		    ))->findAll(array('order'=>'BIB_NUMBER'));
		
		$possible_followers = Competitors::model()->with(array(
			'complevels'=>array(
					// we don't want to select 
					//'select'=>false,
					// but want to get only users with published posts
					'joinType'=>'INNER JOIN',
					'condition'=>'complevels.competition_id='.Yii::app()->session['comp'].' AND complevels.level_id='.$model->EVENT_LEVEL.' AND t.LEADER=0',
				),
		    ))->findAll(array('order'=>'FIRST_NAME'));
		
		$current_partnerships = Partnership::model()->findAllByAttributes(array('event_id' => $model->EVENT_ID));
		
		foreach($current_partnerships as $partnership){
			$followers[$partnership->follower_id] = $parnership->follow;
			$partnerships[$partnership->leader_id] = $partnership->follower_id;
		}
		
		$pf = array('0' => '-');
		foreach($possible_followers as $follow){
			$pf[$follow->COMPETITOR_ID] = $follow->FIRST_NAME.' '.$follow->LAST_NAME;
		}
		
		//foreach ($leaders as $leader){
		//	foreach($leader->partnership_leads as $parnership)
		//	if ($parnership->event_id = $model->EVENT_ID)
		//	
		//}
		
		$this->render("partnership_list", array(
			// find all competitors with the same level as the event
		  "model"=>$model,
		  "leaders" => $leaders,
		  "followers" => $followers,
		  "partnerships" => $partnerships,
		  "possible_followers" => $pf,
		  "form"   => $form, 
		));
	}
	
	
	// Judge an event
	public function actionJudge($id)
	{
		$model=$this->loadModel($id);
		
		if(isset($_POST['EventReset'])){
			Rounds::model()->deleteAllByAttributes(array('EVENT_ID' => $model->EVENT_ID));
		}
		
		$event_rounds = Rounds::model()->findAllByAttributes(array('EVENT_ID' => $model->EVENT_ID));
		
		if (count($event_rounds) < 1){
			
			//print 'test';
			$event_round = new Rounds;
			$event_round->EVENT_ID = $model->EVENT_ID;
			$event_round->ROUND_NO = 1;
			$event_round->save();
			$event_rounds = Rounds::model()->findAllByAttributes(array('EVENT_ID' => $model->EVENT_ID));
		}
		
		$this->render("rounds_list", array(
			// find all competitors with the same level as the event
		  "model"=>$model,
		  "rounds" => $event_rounds,
		));
	}
	
	// Review an event
	public function actionReview($id)
	{
		$model=$this->loadModel($id);
		
		$event_rounds = Rounds::model()->findAllByAttributes(array('EVENT_ID' => $model->EVENT_ID));
		
		if (count($event_rounds) < 1){
			
			//print 'test';
			$event_round = new Rounds;
			$event_round->EVENT_ID = $model->EVENT_ID;
			$event_round->ROUND_NO = 1;
			$event_round->save();
			$event_rounds = Rounds::model()->findAllByAttributes(array('EVENT_ID' => $model->EVENT_ID));
		}
		
		$this->render("rounds_list", array(
			// find all competitors with the same level as the event
		  "model"=>$model,
		  "rounds" => $event_rounds,
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
		$competition_id = Yii::app()->session['comp'];
		$dataProvider=new CActiveDataProvider('Events', array(
			'criteria'=>array(
				'condition'=>'COMPETITION_ID='.$competition_id,
				),
			)
		);
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$competition_id = Yii::app()->session['comp'];
		$model=new Events('search');
		$model->unsetAttributes();  // clear any default values
		$model->COMPETITION_ID = $competition_id;
		if(isset($_GET['Events']))
			$model->attributes=$_GET['Events'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	// EXAMPLE
	public function actionAutocompleteTest()
	{
		$res =array();
	
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT username FROM users WHERE username LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
	
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	// EXAMPLE

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Events::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='events-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
}
