<?php

/**
 * This is the model class for table "partnerships".
 *
 * The followings are the available columns in table 'partnerships':
 * @property integer $pid
 * @property integer $leader_id
 * @property integer $follower_id
 * @property integer $event_id
 */
class Partnership extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Partnership the static model class
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
		return 'partnerships';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('leader_id, follower_id, event_id', 'required'),
			array('leader_id, follower_id, event_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pid, leader_id, follower_id, event_id', 'safe', 'on'=>'search'),
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
			'lead'=>array(self::BELONGS_TO, 'Competitors', 'leader_id'),
			'follow'=>array(self::BELONGS_TO, 'Competitors', 'follower_id'),
			'event'=>array(self::BELONGS_TO, 'Events', 'event_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pid' => 'Pid',
			'leader_id' => 'Leader',
			'follower_id' => 'Follower',
			'event_id' => 'Event',
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

		$criteria->compare('pid',$this->pid);
		$criteria->compare('leader_id',$this->leader_id);
		$criteria->compare('follower_id',$this->follower_id);
		$criteria->compare('event_id',$this->event_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}