<?php

/**
 * This is the model class for table "results".
 *
 * The followings are the available columns in table 'results':
 * @property integer $RESULT_ID
 * @property integer $COMPETITOR_ID
 * @property integer $EVENT_ID
 * @property integer $ROUND_ID
 * @property integer $HEAT_ID
 * @property integer $RANK
 */
class Results extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Results the static model class
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
		return 'results';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COMPETITOR_ID, EVENT_ID, ROUND_ID, RANK', 'required'),
			array('COMPETITOR_ID, EVENT_ID, ROUND_ID, HEAT_ID, RANK', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('RESULT_ID, COMPETITOR_ID, EVENT_ID, ROUND_ID, HEAT_ID, RANK', 'safe', 'on'=>'search'),
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
			'RESULT_ID' => 'Result',
			'COMPETITOR_ID' => 'Competitor',
			'EVENT_ID' => 'Event',
			'ROUND_ID' => 'Round',
			'HEAT_ID' => 'Heat',
			'RANK' => 'Rank',
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

		$criteria->compare('RESULT_ID',$this->RESULT_ID);
		$criteria->compare('COMPETITOR_ID',$this->COMPETITOR_ID);
		$criteria->compare('EVENT_ID',$this->EVENT_ID);
		$criteria->compare('ROUND_ID',$this->ROUND_ID);
		$criteria->compare('HEAT_ID',$this->HEAT_ID);
		$criteria->compare('RANK',$this->RANK);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}