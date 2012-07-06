<?php

/**
 * This is the model class for table "heats".
 *
 * The followings are the available columns in table 'heats':
 * @property integer $HEAT_ID
 * @property integer $COMPETITION_ID
 * @property integer $EVENT_ID
 * @property integer $HEAT_NO
 * @property integer $PASSTHROUGH
 * @property integer $ROUND_ID
 * @property integer $FINAL
 */
class Heats extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Heats the static model class
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
		return 'heats';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COMPETITION_ID, EVENT_ID, HEAT_NO, PASSTHROUGH, ROUND_ID, FINAL', 'required'),
			array('COMPETITION_ID, EVENT_ID, HEAT_NO, PASSTHROUGH, ROUND_ID, FINAL', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('HEAT_ID, COMPETITION_ID, EVENT_ID, HEAT_NO, PASSTHROUGH, ROUND_ID, FINAL', 'safe', 'on'=>'search'),
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
			'HEAT_ID' => 'Heat',
			'COMPETITION_ID' => 'Competition',
			'EVENT_ID' => 'Event',
			'HEAT_NO' => 'Heat No',
			'PASSTHROUGH' => 'Passthrough',
			'ROUND_ID' => 'Round',
			'FINAL' => 'Final',
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

		$criteria->compare('HEAT_ID',$this->HEAT_ID);
		$criteria->compare('COMPETITION_ID',$this->COMPETITION_ID);
		$criteria->compare('EVENT_ID',$this->EVENT_ID);
		$criteria->compare('HEAT_NO',$this->HEAT_NO);
		$criteria->compare('PASSTHROUGH',$this->PASSTHROUGH);
		$criteria->compare('ROUND_ID',$this->ROUND_ID);
		$criteria->compare('FINAL',$this->FINAL);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}