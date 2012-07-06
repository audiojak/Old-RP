<?php

/**
 * This is the model class for table "judge_ranks".
 *
 * The followings are the available columns in table 'judge_ranks':
 * @property integer $JUDGE_RANK_ID
 * @property integer $JUDGE_ID
 * @property integer $EVENT_ID
 * @property integer $ROUND_ID
 * @property integer $HEAT_ID
 * @property integer $RANK
 * @property integer $COMPETITOR_ID
 */
class JudgeRanks extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return JudgeRanks the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'judge_ranks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('JUDGE_ID, EVENT_ID, RANK, COMPETITOR_ID', 'required'),
			array('JUDGE_ID, EVENT_ID, ROUND_ID, HEAT_ID, RANK, COMPETITOR_ID', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('JUDGE_RANK_ID, JUDGE_ID, EVENT_ID, ROUND_ID, HEAT_ID, RANK, COMPETITOR_ID', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'JUDGE_RANK_ID' => 'Judge Rank',
			'JUDGE_ID' => 'Judge',
			'EVENT_ID' => 'Event',
			'ROUND_ID' => 'Round',
			'HEAT_ID' => 'Heat',
			'RANK' => 'Rank',
			'COMPETITOR_ID' => 'Competitor',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('JUDGE_RANK_ID',$this->JUDGE_RANK_ID);
		$criteria->compare('JUDGE_ID',$this->JUDGE_ID);
		$criteria->compare('EVENT_ID',$this->EVENT_ID);
		$criteria->compare('ROUND_ID',$this->ROUND_ID);
		$criteria->compare('HEAT_ID',$this->HEAT_ID);
		$criteria->compare('RANK',$this->RANK);
		$criteria->compare('COMPETITOR_ID',$this->COMPETITOR_ID);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}