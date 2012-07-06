<?php

class RoundsController extends Controller
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
				'actions'=>array('index','view','create','update', 'print','rankbyjudge','scoresheet','announcement'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','judge'),
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
		$model=new Rounds;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Rounds']))
		{
			$model->attributes=$_POST['Rounds'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ROUND_ID));
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

		if(isset($_POST['Rounds']))
		{
			$model->attributes=$_POST['Rounds'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ROUND_ID));
		}

		$this->render('update',array(
			'model'=>$model,
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
		$dataProvider=new CActiveDataProvider('Rounds');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Rounds('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Rounds']))
			$model->attributes=$_GET['Rounds'];

		$this->render('admin',array(
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
		$model=Rounds::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	
	public function actionRankByJudge($id)
	{
		// Get the Round Object to fit through the square hole...
		$model = Rounds::model()->findByPk($id);
		
		// Load the Event
		$event = Events::model()->findByAttributes(array('EVENT_ID' => $model->EVENT_ID));
		
		// Create a new PF object
		$form = new PolymorphicForm;
		
		//Get judges for round
		$judges = $this->getRoundJudges($id);
		
		//Create dropdown list of judge names
		$judges_array = array();
		foreach($judges as $single_judge){
			$judges_array[$single_judge->JUDGE_ID] =  $single_judge->FIRST_NAME;	
		}
		
		//Get competitors in round
		$competitors = $this->getRoundCompetitors($id);
		$no_of_competitors = count($competitors);
		$alt_competitors = $no_of_competitors;
		
		// Get Partners
		$followers = array();
		if ($event->TYPE != 2){
			foreach ($competitors as $competitor){
				$followers[$competitor->COMPETITOR_ID] = Competitors::model()->findByAttributes(array('COMPETITOR_ID' => Partnership::model()->findByAttributes(array('leader_id' => $competitor->COMPETITOR_ID,'event_id' => $event->EVENT_ID))->follower_id));
			}
		}
		
		
		$judge_checksum = 0;
		$failed_checksum = 0;
		// @TODO Make this Generated depending on Yes and Alt rather than Yes and No
		if ($model->IS_FINAL){
			$rank_options[1] = 1;
			$judge_checksum += 1;
			for($i = 2;$i <= $no_of_competitors;$i++){
				$rank_options[] = $i;
				$judge_checksum += $i;
			}
		} else {
			if ($event->NOES){
				$rank_options[0] = 'N';
				$alt_competitors -= $event->NOES;
			}
			if ($event->YESES){
				$rank_options[1] = 'Y';
				$alt_competitors -= $event->YESES;
				$yes_rank = 1;
			} else {
				$yes_rank = 0;
				$rank_options[0] = 'temp';
			}
			for($i = 1;$i <= $alt_competitors;$i++){
				$rank_options[] = $i;
				$judge_checksum += $i + $yes_rank;
			}
			if (!$event->YESES && !$event->NOES){
				unset($rank_options[0]);
			}
		}
		
		//If user has clicked a Button
		if(isset($_POST['round_id'])){
			
			if (isset($_POST['next']) || isset($_POST['update'])){
				
				$failed_checksum = 0;
				$checksum = 0;
				$yeses = 0;
				$noes = 0;
				
				foreach ($_POST['ranks'] as $competitor ){
					//print_r($competitor);
					$rank = array_shift($competitor);
					if ($rank == 0){
						$noes++;
					} elseif($event->YESES && $rank == 1 && !$model->IS_FINAL){
						$yeses++;
						//$checksum += $jr->RANK;
					} else {
						$checksum += $rank;
					}
				}
				//print "is $checksum should be $judge_checksum";
				if (($checksum != $judge_checksum) || (($yeses != $event->YESES) && (!$model->IS_FINAL)) || (($noes != $event->NOES) && (!$model->IS_FINAL))){
					$failed_checksum = 1;
				}
				
				
				// Delete old judging scores for selected judge against competitor in this event in this round
				JudgeRanks::model()->deleteAllByAttributes(array('ROUND_ID' => $model->ROUND_ID, 'JUDGE_ID' => $_POST['judgeSelected']));
				JudgeWorkings::model()->deleteAllByAttributes(array('ROUND_ID' => $model->ROUND_ID));
				Results::model()->deleteAllByAttributes(array('ROUND_ID' => $model->ROUND_ID));
				
				//record rank details against competitors for selected judge
				// write to the record for each square
				foreach ($_POST['ranks']  as $competitor => $judgements){
					foreach ($judgements as $judgeId => $rank ){
						$judge_rank = new JudgeRanks;
						$judge_rank->JUDGE_ID = $_POST['judgeSelected']; //$judge_id
						$judge_rank->EVENT_ID = $model->EVENT_ID;
						$judge_rank->ROUND_ID = $model->ROUND_ID;
						$judge_rank->COMPETITOR_ID = $competitor;
						if ($model->IS_FINAL){
							$judge_rank->RANK = $rank;// + 1;
						} else {
							$judge_rank->RANK = $rank;
						}
						$judge_rank->save();
						//$ranks[$competitor][$judge] = $rank;
					}
				}

			}
			
			//If user has clicked Update and Next and Results ok
			if((isset($_POST['next'])) && (!$failed_checksum)){
				
				//List of judges
				$judges = $this->getRoundJudges($id);
				while ($_POST['judgeSelected'] != array_shift($judges)->JUDGE_ID){
					//skip
				}
				$judge = array_shift($judges);
				if (!isset($judge)){
					$this->redirect(array('/rounds/judge/'.$model->ROUND_ID));
				}
				//get selected judge
				//display next judge
			} else {
				$judge = Judges::model()->findByPk($_POST['judgeSelected']);
			}
		} else {
			$judge = array_shift($judges); // properly set judge WORKING	
		}
		
		
			
		// Gather exsisting values
		foreach ($competitors  as $competitor){
			if ($rank = JudgeRanks::model()->findByAttributes(array('EVENT_ID' => $model->EVENT_ID,'COMPETITOR_ID' => $competitor->COMPETITOR_ID,'JUDGE_ID' => $judge->JUDGE_ID,'ROUND_ID' => $model->ROUND_ID))){
				$ranks[$competitor->COMPETITOR_ID][$judge->JUDGE_ID] = $rank->RANK;
			} else {
				$ranks[$competitor->COMPETITOR_ID][$judge->JUDGE_ID] = 1;
			}
		}
		
		$this->render("rank_by_judge", array(
		  "model"=>$model,
		  "judges" => $judges,
		  "judge" => $judge,
		  'judges_array' => $judges_array,
		  "competitors" => $competitors,
		  "followers" => $followers,
		  "ranks" => $ranks,
		  "rank_options" => $rank_options,
		  "failed_checksum" => $failed_checksum,
		  "form"   => $form, 
		));
	}
	
	public function actionScoreSheet($id, $secid)
	{
		$judgeId = $secid;
		$round = Rounds::model()->findByPK($id);
		$event = Events::model()->findByPK($round->EVENT_ID);
		$judge = Judges::model()->findByPK($judgeId);
		
		$competitors = $this->getRoundCompetitors($id);
		
		$current_partnerships = Partnership::model()->findAllByAttributes(array('event_id' => $round->EVENT_ID));
		
		foreach($current_partnerships as $partnership){
			$followers[$partnership->follower_id] = Competitors::model()->findByPK($partnership->follower_id);
			$partnerships[$partnership->leader_id] = $partnership->follower_id;
		}
		
		if ($round->IS_FINAL){
			$this->renderPartial("score_sheet", array(
					"competitors" => $competitors,
					"partnerships" => $partnerships,
					"followers" => $followers,
					"event" => $event,
					"round" => $round,
					"judge" => $judge,
					));	
		} else {
			$this->renderPartial("prelim_score_sheet", array(
				"competitors" => $competitors,
				"partnerships" => $partnerships,
				"followers" => $followers,
				"event" => $event,
				"round" => $round,
				"judge" => $judge,
				));
		}
		
	}
	
	public function actionAnnouncement($id)
	{
		
		$followers = array();
		
		$round = Rounds::model()->findByPK($id);
		$event = Events::model()->findByPK($round->EVENT_ID);
		$competitors = $this->getRoundCompetitors($id);
		if ($event->TYPE == 3){
			foreach ($competitors as $competitor){
				$followers[$competitor->COMPETITOR_ID] = Competitors::model()->findByAttributes(array('COMPETITOR_ID' => Partnership::model()->findByAttributes(array('leader_id' => $competitor->COMPETITOR_ID,'event_id' => $event->EVENT_ID))->follower_id));
			}
		}
			
		if ($event->TYPE == 3){
			$this->renderPartial("announce_couples", array(
					"competitors" => $competitors,
					'followers' => $followers,
					"event" => $event,
					"round" => $round,
					));	
		} else {
			$this->renderPartial("announce", array(
				"competitors" => $competitors,
				"event" => $event,
				"round" => $round,
				));
		}
		
	}
	
	public function actionPrint($id)
	{
		$results = Results::model()->findAllByAttributes(array('ROUND_ID' => $id), array('order' => 'RANK'));
		
		foreach ($results as $result){
			$ranked_competitor = Competitors::model()->findByAttributes(array('COMPETITOR_ID' => $result->COMPETITOR_ID));
			$competitor_rank_array[$result->RANK] = $ranked_competitor;
			
		}
		$event = Events::model()->findByPk($results[0]->EVENT_ID);
		$round = Rounds::model()->findByPK($id);
		
		// Get Partners
		$followers = array();
		foreach ($competitor_rank_array as $competitor){
				$followers[$competitor->COMPETITOR_ID] = Competitors::model()->findByAttributes(array('COMPETITOR_ID' => Partnership::model()->findByAttributes(array('leader_id' => $competitor->COMPETITOR_ID,'event_id' => $event->EVENT_ID))->follower_id));
		}
		
		$this->renderPartial("print_results", array(
				"competitor_rank_array" => $competitor_rank_array,
				"event" => $event,
				"followers" => $followers,
				"round" => $round,
				));
	}	//send event info to print on results page
	
	
	public function actionJudge($id)
	{
		// Load the Round
		$model=$this->loadModel($id);
		
		// Load the Event
		$event = Events::model()->findByAttributes(array('EVENT_ID' => $model->EVENT_ID));
		
		// Create a new PF object
		$form = new PolymorphicForm;
		
		// Innitiallise arrays
		$competitors = array();
		$followers = array();
		$ranks = array();
		
		// Save the number of competitors to be passed through to the database
		if (isset($_POST['passthrough'])){
			$model->PASSTHROUGH = $_POST['passthrough'];
			$model->save();
		}
		
		// put all judges for this event into an array and count them
		//$judges = JudgeEvents::model()->findAllByAttributes(array('EVENT_ID' => $model->EVENT_ID));
		
		// Get Judge Names
		$judges = $this->getRoundJudges($id);
		$judge_names = $judges;
		
		$no_of_judges = count($judges);
		
		$competitors = $this->getRoundCompetitors($id);
		
		//if($event->TYPE == 3){
		foreach ($competitors as $competitor){
			$followers[$competitor->COMPETITOR_ID] = Competitors::model()->findByAttributes(array('COMPETITOR_ID' => Partnership::model()->findByAttributes(array('leader_id' => $competitor->COMPETITOR_ID,'event_id' => $event->EVENT_ID))->follower_id));
		}
		//}
		
		$no_of_competitors = count($competitors);
		$alt_competitors = $no_of_competitors;
		
		$judge_checksum = 0;
		if ($model->IS_FINAL){
			$rank_options[1] = 1;
			$judge_checksum += 1;
			for($i = 2;$i <= $no_of_competitors;$i++){
				$rank_options[] = $i;
				$judge_checksum += $i;
			}
		} else {
			// Work around code
			$event->NOES = $no_of_competitors - $event->YESES - $event->ALT;
			$event->save();
			
			if ($event->NOES){
				$rank_options[0] = 'N';
				$alt_competitors -= $event->NOES;
			}
			if ($event->YESES){
				$rank_options[1] = 'Y';
				$alt_competitors -= $event->YESES;
				$yes_rank = 1;
			} else {
				$yes_rank = 0;
				$rank_options[0] = 'temp';
			}
			for($i = 1;$i <= $alt_competitors;$i++){
				$rank_options[] = $i;
				$judge_checksum += $i + $yes_rank;
			}
			if (!$event->YESES && !$event->NOES){
				unset($rank_options[0]);
			}
		}
		
		// if there is post information
		if (isset($_POST['ranks']))
		{

			// Delete old judging scores
			JudgeRanks::model()->deleteAllByAttributes(array('ROUND_ID' => $model->ROUND_ID));
			JudgeWorkings::model()->deleteAllByAttributes(array('ROUND_ID' => $model->ROUND_ID));
			Results::model()->deleteAllByAttributes(array('ROUND_ID' => $model->ROUND_ID));
			
			// Arrays
			$working_sums = array();
			$failed_checksums = array();
			
			// write to the record for each square
			foreach ($_POST['ranks']  as $competitor => $judgements){
				foreach ($judgements as $judge => $rank ){
					$judge_rank = new JudgeRanks;
					$judge_rank->JUDGE_ID = $judge;
					$judge_rank->EVENT_ID = $model->EVENT_ID;
					$judge_rank->ROUND_ID = $model->ROUND_ID;
					$judge_rank->COMPETITOR_ID = $competitor;
					if ($model->IS_FINAL){
						$judge_rank->RANK = $rank ;//+ 1;
					} else {
						$judge_rank->RANK = $rank;
					}
					$judge_rank->save();
					$ranks[$competitor][$judge] = $rank;
				}
			}
			
			// Judging checksums
			foreach($judges as $judge){
				$checksum = 0;
				$yeses = 0;
				$noes = 0;
				$judge_ranks = JudgeRanks::model()->findAllByAttributes(array('ROUND_ID' => $model->ROUND_ID,'JUDGE_ID' => $judge->JUDGE_ID));
				foreach($judge_ranks as $jr){
					if ($jr->RANK == 0){
						$noes++;
					} elseif($event->YESES && $jr->RANK == 1 && !$model->IS_FINAL){
						$yeses++;
						//$checksum += $jr->RANK;
					} else {
						$checksum += $jr->RANK;
					}
				}
				//print "is $checksum should be $judge_checksum";
				if (($checksum != $judge_checksum) || (($yeses != $event->YESES) && (!$model->IS_FINAL)) || (($noes != $event->NOES) && (!$model->IS_FINAL))){
					$failed_checksums[$judge->JUDGE_ID] = 1;
				}
				
				
				
			}
			
			if (count($failed_checksums) > 0){
			      $this->render("round_rank", array(
				"model"=>$model,
				"failed_checksums" => $failed_checksums,
				"judges" => $judges,
				"judge_names" => $judge_names,
				"competitors" => $competitors,
				"followers" => $followers,
 				"ranks" => $ranks,
				"rank_options" => $rank_options,
				"event" => $event,
				"form"   => $form, 
			      ));
			} else {
				
				// calculate and write each 'working' square
				foreach($competitors as $competitor){
					
					// reset
					$tally = 0;
					$total = 0;
					
					// sloppy check
					if (!isset($model->IS_FINAL)){
						$model->IS_FINAL = 0; //Really?
					}
					
					// for each rank write them to the database and create working arrays
					for ($i = 1; $i <= count($rank_options); $i++){
						$ranks_tally = JudgeRanks::model()->findAllByAttributes(array('ROUND_ID' => $model->ROUND_ID,'COMPETITOR_ID' => $competitor->COMPETITOR_ID,'RANK' => $i));
						$tally += count($ranks_tally);
						$total = $total + (count($ranks_tally)*$i);
						$record = new JudgeWorkings;
						$record->EVENT_ID = $model->EVENT_ID;
						$record->COMPETITOR_ID = $competitor->COMPETITOR_ID;
						$record->ROUND_ID = $model->ROUND_ID;
						$record->NUMBER = $i;
						$record->SUM = $tally;
						$working_tallys[$competitor->COMPETITOR_ID][$i] = $tally;
						// Conceptually you can't have a sum when you are using noes. It becomes invalid.
						if ($model->IS_FINAL){
							$record->TOTAL_SUM = $total;
							$working_sums[$competitor->COMPETITOR_ID][$i] = $total;	
						}
						$record->save();
					}
				}
				
				// because we removed ranked competitors from the array as we work our the rankings
				$working_tallys_static = $working_tallys;
				
				// RESULTS SECTION (C)
				// calculate and write each 'result' square
				
				$competitor_rank = 1;
				$competitor_count = count($working_tallys);
				if (fmod($no_of_judges,2) == 1) {
					$majority = ($no_of_judges + 1) / 2;
				} else {
					$majority = ($no_of_judges / 2) + 1;
				}
				
				
				if ($model->IS_FINAL){
					
					// For each rank
					for ($current_judge_rank = 1; $current_judge_rank <= $no_of_competitors; $current_judge_rank++){
												unset($current_tally);
						
						if (!count($working_tallys)){
							break;
						}
						
						// create a tally for that rank for each competitor
						foreach ($working_tallys as $competitor => $score_array){
							$current_tally[$competitor] = $working_tallys[$competitor][$current_judge_rank];
						}
						
																		
						// sort $current_tally
						//foreach ($current_tally as $array => $key){
						//	print_r($array);
						//	print '<br>';
						//	print_r($key);
						//	print '<br>';
						//	print '<br>';
						//}
						// take the top value
						
						// if value is greater than majority
						foreach($current_tally as $competitor => $score){
							if ($score >= $majority){
								$winners_array[] = $competitor;
							}
						}
							
						$winners_count = count($winners_array);
						
																		
						if ($winners_count == 1){
							// assign a rank to a user
							$winner = array_shift($winners_array);
							$rank_array[$competitor_rank] = $winner;
							
							// Write the Result to the Database
							$result = new Results;
							$result->COMPETITOR_ID = $winner;
							$result->RANK = $competitor_rank;
							$result->EVENT_ID = $model->EVENT_ID;
							$result->ROUND_NO = $model->ROUND_NO;
							$result->ROUND_ID = $model->ROUND_ID;
							$result->save();
							
							unset($working_tallys[$winner]);
							$competitor_rank++;
							
						} elseif ($winners_count == 0){
							//skip
						} else {
							// RULE 1
							// break the tie
							// While there are still winners in the winners array
							while (count($winners_array) > 0){
								
								$winner = $this->finalTieBreak($winners_array,$working_tallys,$working_sums,$current_judge_rank,$competitor_count,$ranks); //WORKING
								$rank_array[$competitor_rank] = $winner;
								
								// Write the Result to the Database
								$result = new Results;
								$result->COMPETITOR_ID = $winner;
								$result->RANK = $competitor_rank;
								$result->EVENT_ID = $model->EVENT_ID;
								$result->ROUND_NO = $model->ROUND_NO;
								$result->ROUND_ID = $model->ROUND_ID;
								$result->save();
								
								// Remove the competitor from the pool
								unset($working_tallys[$winner]);
								foreach ($winners_array as $key => $winner_unset){
									if ($winner == $winner_unset){
										unset($winners_array[$key]);
									}
								}
								
								// increment the next rank to be set
								$competitor_rank++;

							}
						}
						unset($winners_array);
					}
					
					foreach ($rank_array as $rank => $competitor){
						$ranked_competitor = Competitors::model()->findByAttributes(array('COMPETITOR_ID' => $competitor));
						$competitor_rank_array[$rank] = $ranked_competitor;
					}

					// After results have been calculated
					$results = Results::model()->findAllByAttributes(array('ROUND_ID' => $model->ROUND_ID));
					
					// render finished form
					$this->render("round_results", array(
					  "model"=>$model,
					  "event" => $event,
					  "judges" => $judges,
					  "judge_names" => $judge_names,
					  "competitors" => $competitors,
					  "followers" => $followers,
					  "ranks" => $ranks,
					  "working_tallys" => $working_tallys_static,
					  "working_sums" => $working_sums,
					  "results" => $results,
					  "rank_options" => $rank_options,
					  "rank_array" => $rank_array,
					  "competitor_rank_array" => $competitor_rank_array,
					  "form"   => $form, 
					));
				} else {
					// For Prelims and Semis
					
					// For each alt rank and yeses
					for ($current_judge_rank = 1; $current_judge_rank <= $alt_competitors + 1; $current_judge_rank++){ // Working think I need to swap 1 with Event->yeses
						
						
						$winners_array = array();
						
						if (!count($working_tallys)){
							break;
						}
																		
						unset($current_tally);
						
						// create a tally for that rank for each competitor
						foreach ($working_tallys as $competitor => $score_array){
							$current_tally[$competitor] = $working_tallys[$competitor][$current_judge_rank];
						}
						
						
						// if value is greater than majority
						
						foreach($current_tally as $competitor => $score){
							if ($score >= $majority){ //>= $majority // > 0 //WORKING
								$winners_array[] = $competitor;
							}
						}
	
						$winners_count = count($winners_array);
						
						// check micro-relative placement
																		
						if ($winners_count == 1){
							// assign a rank to a user
							$winner = array_shift($winners_array);
							$rank_array[$competitor_rank] = $winner;
							// Write the Result to the Database
							$result = new Results;
							$result->COMPETITOR_ID = $winner;
							$result->RANK = $competitor_rank;
							$result->EVENT_ID = $model->EVENT_ID;
							$result->ROUND_NO = $model->ROUND_NO;
							$result->ROUND_ID = $model->ROUND_ID;
							$result->save();
							unset($working_tallys[$winner]);
							$competitor_rank++;
							
						} elseif ($winners_count == 0){
							//skip
						} else {
							// RULE 1
							// break the tie
							// While there are still winners in the winners array
							while (count($winners_array) > 0){
								$winner = $this->prelimTieBreak($winners_array,$working_tallys,$current_judge_rank,$alt_competitors + $yes_rank); //WORKING
								$rank_array[$competitor_rank] = $winner;
								
								// Write the Result to the Database
								$result = new Results;
								$result->COMPETITOR_ID = $winner;
								$result->RANK = $competitor_rank;
								$result->EVENT_ID = $model->EVENT_ID;
								$result->ROUND_NO = $model->ROUND_NO;
								$result->ROUND_ID = $model->ROUND_ID;
								$result->save();
								
								// Remove the competitor from the pool
								unset($working_tallys[$winner]);
								foreach ($winners_array as $key => $winner_unset){
									if ($winner == $winner_unset){
										unset($winners_array[$key]);
									}
								}
								
								// increment the next rank to be set
								$competitor_rank++;
							}	
						}
						unset($winners_array);
					}
					
					while (count($working_tallys)){
						foreach ($working_tallys as $competitor => $scores){
							$rank_array[$competitor_rank] = $competitor;
							$result = new Results;
							$result->COMPETITOR_ID = $winner;
							$result->RANK = $competitor_rank;
							$result->EVENT_ID = $model->EVENT_ID;
							$result->ROUND_NO = $model->ROUND_NO;
							$result->ROUND_ID = $model->ROUND_ID;
							$result->save();
							unset($working_tallys[$competitor]);
							$competitor_rank++;
						}
						
					}
					
					// After results have been calculated
					$results = Results::model()->findAllByAttributes(array('ROUND_ID' => $model->ROUND_ID));
					
					// Delete all from rounds where round number is one greater than the current round.
					Rounds::model()->deleteAllByAttributes(array('ROUND_NO' => $model->ROUND_NO + 1,'EVENT_ID' => $model->EVENT_ID));
					
					// Create the next round
					$event_round = new Rounds;
					$event_round->EVENT_ID = $model->EVENT_ID;
					$event_round->ROUND_NO = $model->ROUND_NO + 1;
					// if count competitors is less than $event->FINAL_COMPETITORS then make the round a final
					// Quick Fix //WORKING
					$event_round->IS_FINAL = 1;
					$event_round->save();
					
					foreach ($rank_array as $rank => $competitor){
						$ranked_competitor = Competitors::model()->findByAttributes(array('COMPETITOR_ID' => $competitor));
						$competitor_rank_array[$rank] = $ranked_competitor;
					}
					
					// render finished form
					$this->render("prelim_round_results", array(
					  "model"=>$model,
					  "judges" => $judges,
					  "competitors" => $competitors,
					  "followers" => $followers,
					  "ranks" => $ranks,
					  "working_tallys" => $working_tallys_static,
					  "working_sums" => $working_sums,
					  "results" => $results,
					  "rank_options" => $rank_options,
					  "competitor_rank_array" => $competitor_rank_array,
					  "rank_array" => $rank_array,
					  "form"   => $form, 
					));
				}

			}
						
		} else {

			// Gather exsisting values
			foreach ($competitors  as $competitor){
				foreach ($judges as $judge){
					if ($rank = JudgeRanks::model()->findByAttributes(array('EVENT_ID' => $model->EVENT_ID,'COMPETITOR_ID' => $competitor->COMPETITOR_ID,'JUDGE_ID' => $judge->JUDGE_ID,'ROUND_ID' => $model->ROUND_ID,))){
						$ranks[$competitor->COMPETITOR_ID][$judge->JUDGE_ID] = $rank->RANK;
					} else {
						$ranks[$competitor->COMPETITOR_ID][$judge->JUDGE_ID] = 1;
					}
				}
			}
			
			$this->render("round_rank", array(
			  "model"=>$model,
			  "judges" => $judges,
			  "judge_names" => $judge_names,
			  "competitors" => $competitors,
			  "followers" => $followers,
			  "ranks" => $ranks,
			  "rank_options" => $rank_options,
			  "event" => $event,
			  "form"   => $form, 
			));
		}
	}
	
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='rounds-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	protected function prelimTieBreak($winners_array, $working_tallys, $current_judge_rank, $rank_count){
		
		if ($current_judge_rank <= $rank_count){
			
			// Create current tally of winners and their tallys
			foreach ($winners_array as $competitor){
				$current_tally[$competitor] = $working_tallys[$competitor][$current_judge_rank];
			}
			
			// find max function for array
			$top_value = 0;
			foreach($winners_array as $competitor){
				if ($current_tally[$competitor] > $top_value){
					$top_value = $current_tally[$competitor];
				}
			}
			
			// put the winners with the top value in to another array for processing
			foreach($winners_array as $competitor){
				if ($current_tally[$competitor] == $top_value){
					$tally_winners_array[] = $competitor;
				}
			}
			
			if (count($tally_winners_array) == 1){
				// return winning competitor
				return array_shift($tally_winners_array);
				
			} else {
				
				// assign a rank to a user
				return $this->prelimTieBreak($tally_winners_array,$working_tallys,$current_judge_rank + 1,$rank_count);
				
			}
		} else {
			return array_shift($winners_array); 
		}
	}
	
	protected function finalTieBreak($winners_array, $working_tallys, $sum_working_tallys, $current_judge_rank, $rank_count,$real_scores = array()){
		
		if ($current_judge_rank <= $rank_count){
			
			// Create current tally of winners and their tallys
			foreach ($winners_array as $competitor){
				$current_tally[$competitor] = $working_tallys[$competitor][$current_judge_rank];
			}
			
			// find max function for array
			$top_value = 0;
			foreach($winners_array as $competitor){
				if ($current_tally[$competitor] > $top_value){
					$top_value = $current_tally[$competitor];
				}
			}
			
			// put the winners with the top value in to another array for processing
			foreach($winners_array as $competitor){
				if ($current_tally[$competitor] == $top_value){
					$tally_winners_array[] = $competitor;
				}
			}
			
			if (count($tally_winners_array) == 1){
				// return winning competitor
				return array_shift($tally_winners_array);
				
			} else {
				
				// Create current tally of winners and their sums
				foreach ($winners_array as $competitor){
					$current_sums_tally[$competitor] = $sum_working_tallys[$competitor][$current_judge_rank];
				}
				
				// Find lowest sum
				// find max function for array
				$lowest_value = 100000; // Messy, but effective
				foreach($winners_array as $competitor){
					if ($current_sums_tally[$competitor] < $lowest_value){
						$lowest_value = $current_sums_tally[$competitor];
					}
				}
				
				
				foreach($winners_array as $competitor){
					if ($current_sums_tally[$competitor] == $lowest_value){
						$tally_sums_winners_array[] = $competitor;
					}
				}
				
				if (count($tally_sums_winners_array) == 1){
					// return winning competitor
					return array_shift($tally_sums_winners_array);
					
				} else {
					return $this->finalTieBreak($tally_sums_winners_array,$working_tallys,$sum_working_tallys,$current_judge_rank + 1,$rank_count,$real_scores);
				}
			}
			
		} else {
			
			// New Reletive rule
			
			// for each judge in the real scores award one point to each winner if they have the lowest rank
			
			// create an array of scores of the winners by judge
			foreach ($ranks as $competitor => $scores){
				if (in_array($competitor,$winners_array)){
					foreach ($scores as $judge => $score){
						// create scores by judges
						$winner_judge_scores[$judge][$competitor] = $score;
					}
				}
				$relative_tallies[$competitor] = 0;
			}
			
			// for each judge increment a score for each competitor
			foreach ($winner_judge_scores as $judgements){
				$max_score = max($judgements);
				
				foreach ($judgements as $competitor => $score){
					if ($score == $max){
						$relative_tallies[$competitor]++;
					}
				}
			}
			
			// find max relative tally
			$max_relative_tally = max($relative_tallies);
			
			// Take each iteration of a couple and
			foreach($relative_tallies as $competitor => $tally){
				if ($tally == $max_relative_tally){
					return $competitor;
				}
			}
			
			// all else fails, just return one.
			return array_shift($winners_array); 
		}
	}
	
	private function getRoundJudges($id)
	{
		//pull list of judges using roundId to get eventId to get lsit of judges
		$round = Rounds::model()->findByPk($id);
		$eventJudges = JudgeEvents::model()->findAllByAttributes(array('EVENT_ID' => $round->EVENT_ID), array('order' => 'JUDGE_ID'));
		
		foreach ($eventJudges as $eventJudge){
			$judge = Judges::model()->findByPk($eventJudge->JUDGE_ID);
			$event_judge_array[$eventJudge->JUDGE_ID] = $judge;
		}
		
		return $event_judge_array;
	}
	
	private function getRoundCompetitors($id)
	{
		$round = Rounds::model()->findByPk($id);
		
		// Determine the competitors to be judged in this event
		if ($round->ROUND_NO > 1){
			
			// What round number was last round
			$last_round_no = $round->ROUND_NO - 1;
			
			// retrieve data from last round
			$last_round = Rounds::model()->findByAttributes(array('EVENT_ID' => $round->EVENT_ID,'ROUND_NO' => $last_round_no));
			
			// For each rank which passed through the last round
			for ($i = 1; $i <= $last_round->PASSTHROUGH; $i++){
				// Add a competitor to the array of competitors
				$results[] = Results::model()->findByAttributes(array('RANK' => $i,'EVENT_ID' => $round->EVENT_ID,'ROUND_NO' => $last_round_no));
			}
			foreach($results as $cp){
				$competitors[] = Competitors::model()->findByAttributes(array('COMPETITOR_ID' => $cp->COMPETITOR_ID));
			}

		} else {
			$competitors_events = CompetitorEvents::model()->findAllByAttributes(array('EVENT_ID' => $round->EVENT_ID));
			foreach($competitors_events as $cp){
				$competitors[] = Competitors::model()->findByAttributes(array('COMPETITOR_ID' => $cp->COMPETITOR_ID));
			}
		}
		
		foreach ($competitors as $competitor){
			$sorted[$competitor->BIB_NUMBER] = $competitor;
		}
		ksort(&$sorted);
		
		return $sorted;
	}
}
