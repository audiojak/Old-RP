<?php

/**
 * This is the model class for table "competitor_events".
 *
 * The followings are the available columns in table 'competitor_events':
 * @property integer $COMPETITOR_EVENT_ID
 * @property integer $EVENT_ID
 * @property integer $COMPETITOR_ID
 */
class CompetitorEvents extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CompetitorEvents the static model class
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
		return 'competitor_events';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EVENT_ID, COMPETITOR_ID', 'required'),
			array('EVENT_ID, COMPETITOR_ID', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('COMPETITOR_EVENT_ID, EVENT_ID, COMPETITOR_ID', 'safe', 'on'=>'search'),
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
			'COMPETITOR_EVENT_ID' => 'Competitor Event',
			'EVENT_ID' => 'Event',
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

		$criteria->compare('COMPETITOR_EVENT_ID',$this->COMPETITOR_EVENT_ID);
		$criteria->compare('EVENT_ID',$this->EVENT_ID);
		$criteria->compare('COMPETITOR_ID',$this->COMPETITOR_ID);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}