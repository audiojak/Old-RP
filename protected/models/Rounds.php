<?php

/**
 * This is the model class for table "rounds".
 *
 * The followings are the available columns in table 'rounds':
 * @property integer $ROUND_ID
 * @property integer $ROUND_NO
 * @property integer $PASSTHROUGH
 * @property integer $EVENT_ID
 * @property integer $IS_FINAL
 */
class Rounds extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rounds the static model class
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
		return 'rounds';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ROUND_NO, EVENT_ID', 'required'),
			array('ROUND_NO, PASSTHROUGH, EVENT_ID, IS_FINAL', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ROUND_ID, ROUND_NO, PASSTHROUGH, EVENT_ID, IS_FINAL', 'safe', 'on'=>'search'),
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
			'ROUND_ID' => 'Round',
			'ROUND_NO' => 'Round No',
			'PASSTHROUGH' => 'Passthrough',
			'EVENT_ID' => 'Event',
			'IS_FINAL' => 'Is Final',
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

		$criteria->compare('ROUND_ID',$this->ROUND_ID);
		$criteria->compare('ROUND_NO',$this->ROUND_NO);
		$criteria->compare('PASSTHROUGH',$this->PASSTHROUGH);
		$criteria->compare('EVENT_ID',$this->EVENT_ID);
		$criteria->compare('IS_FINAL',$this->IS_FINAL);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}