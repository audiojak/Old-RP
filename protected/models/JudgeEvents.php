<?php

/**
 * This is the model class for table "judge_events".
 *
 * The followings are the available columns in table 'judge_events':
 * @property integer $EVENT_JUDGE_ID
 * @property integer $EVENT_ID
 * @property integer $HEAD
 * @property integer $JUDGE_ID
 */
class JudgeEvents extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return JudgeEvents the static model class
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
		return 'judge_events';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EVENT_ID, JUDGE_ID', 'required'),
			array('EVENT_ID, JUDGE_ID, HEAD', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('EVENT_JUDGE_ID, EVENT_ID, JUDGE_ID', 'safe', 'on'=>'search'),
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
			'EVENT_JUDGE_ID' => 'Event Judge',
			'EVENT_ID' => 'Event',
			'JUDGE_ID' => 'Judge',
			'HEAD' => 'Head Judge',
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

		$criteria->compare('EVENT_JUDGE_ID',$this->EVENT_JUDGE_ID);
		$criteria->compare('EVENT_ID',$this->EVENT_ID);
		$criteria->compare('JUDGE_ID',$this->JUDGE_ID);
		$criteria->compare('HEAD',$this->HEAD);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}