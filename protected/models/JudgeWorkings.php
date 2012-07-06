<?php

/**
 * This is the model class for table "judge_workings".
 *
 * The followings are the available columns in table 'judge_workings':
 * @property integer $JUDGE_WORKING_ID
 * @property integer $EVENT_ID
 * @property integer $COMPETITOR_ID
 * @property integer $ROUND_ID
 * @property integer $HEAT_ID
 * @property integer $NUMBER
 * @property integer $SUM
 * @property integer $TOTAL_SUM
 */
class JudgeWorkings extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return JudgeWorkings the static model class
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
		return 'judge_workings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EVENT_ID, COMPETITOR_ID, NUMBER', 'required'),
			array('EVENT_ID, COMPETITOR_ID, ROUND_ID, HEAT_ID, NUMBER, SUM, TOTAL_SUM', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('JUDGE_WORKING_ID, EVENT_ID, COMPETITOR_ID, ROUND_ID, HEAT_ID, NUMBER, SUM, TOTAL_SUM', 'safe', 'on'=>'search'),
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
			'JUDGE_WORKING_ID' => 'Judge Working',
			'EVENT_ID' => 'Event',
			'COMPETITOR_ID' => 'Competitor',
			'ROUND_ID' => 'Round',
			'HEAT_ID' => 'Heat',
			'NUMBER' => 'Number',
			'SUM' => 'Sum',
			'TOTAL_SUM' => 'Total Sum',
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

		$criteria->compare('JUDGE_WORKING_ID',$this->JUDGE_WORKING_ID);
		$criteria->compare('EVENT_ID',$this->EVENT_ID);
		$criteria->compare('COMPETITOR_ID',$this->COMPETITOR_ID);
		$criteria->compare('ROUND_ID',$this->ROUND_ID);
		$criteria->compare('HEAT_ID',$this->HEAT_ID);
		$criteria->compare('NUMBER',$this->NUMBER);
		$criteria->compare('SUM',$this->SUM);
		$criteria->compare('TOTAL_SUM',$this->TOTAL_SUM);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}