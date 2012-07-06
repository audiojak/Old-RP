<?php

/**
 * This is the model class for table "events".
 *
 * The followings are the available columns in table 'events':
 * @property integer $EVENT_ID
 * @property integer $COMPETITION_ID
 * @property string $EVENT_NAME
 * @property integer $REMOVED
 * @property integer $COMP_PER_HEAT
 * @property integer $SONGS_PER_HEAT
 * @property integer $MINS_PER_HEAT
 * @property integer $FINAL_COMPETITORS
 * @property integer $PROCEED_COMPETITORS
 * @property integer $FINAL_SONGS
 * @property integer $FINAL_MINUTES
 * @property integer $NUMBER_REPERCHARGE
 * @property integer $TOTAL_REPERCHARGE
 * @property integer $ALLOW_REPERCHARGE
 * @property integer $EVENT_LEVEL
 * @property integer $NUMBER_ROUNDS
 * @property integer $YESES
 * @property integer $NOES
 * @property integer $TYPE
 * @property integer $ALT
 */
class Events extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Events the static model class
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
		return 'events';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COMPETITION_ID, EVENT_NAME, EVENT_LEVEL, TYPE', 'required'),
			array('COMPETITION_ID, REMOVED, COMP_PER_HEAT, SONGS_PER_HEAT, MINS_PER_HEAT, FINAL_COMPETITORS, PROCEED_COMPETITORS, FINAL_SONGS, FINAL_MINUTES, NUMBER_REPERCHARGE, TOTAL_REPERCHARGE, ALLOW_REPERCHARGE, EVENT_LEVEL, NUMBER_ROUNDS, YESES, NOES, TYPE, ALT', 'numerical', 'integerOnly'=>true),
			array('EVENT_NAME', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('EVENT_ID, COMPETITION_ID, EVENT_NAME, REMOVED, COMP_PER_HEAT, SONGS_PER_HEAT, MINS_PER_HEAT, FINAL_COMPETITORS, PROCEED_COMPETITORS, FINAL_SONGS, FINAL_MINUTES, NUMBER_REPERCHARGE, TOTAL_REPERCHARGE, ALLOW_REPERCHARGE, EVENT_LEVEL, NUMBER_ROUNDS, YESES, NOES, TYPE, ALT', 'safe', 'on'=>'search'),
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
			'competitors'=>array(self::MANY_MANY, 'Events',
				'competitor_events(EVENT_ID, COMPETITOR_ID)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'EVENT_ID' => 'Event',
			'COMPETITION_ID' => 'Competition',
			'EVENT_NAME' => 'Event Name',
			'REMOVED' => 'Removed',
			'COMP_PER_HEAT' => 'Comp Per Heat',
			'SONGS_PER_HEAT' => 'Songs Per Heat',
			'MINS_PER_HEAT' => 'Mins Per Heat',
			'FINAL_COMPETITORS' => 'Final Competitors',
			'PROCEED_COMPETITORS' => 'Proceed Competitors',
			'FINAL_SONGS' => 'Final Songs',
			'FINAL_MINUTES' => 'Final Minutes',
			'NUMBER_REPERCHARGE' => 'Number Repercharge',
			'TOTAL_REPERCHARGE' => 'Total Repercharge',
			'ALLOW_REPERCHARGE' => 'Allow Repercharge',
			'EVENT_LEVEL' => 'Event Level',
			'NUMBER_ROUNDS' => 'Number Rounds',
			'YESES' => 'Yeses',
			'NOES' => 'Noes',
			'TYPE' => 'Type',
			'ALT' => 'Alt',
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

		$criteria->compare('EVENT_ID',$this->EVENT_ID);
		$criteria->compare('COMPETITION_ID',$this->COMPETITION_ID);
		$criteria->compare('EVENT_NAME',$this->EVENT_NAME,true);
		$criteria->compare('REMOVED',$this->REMOVED);
		$criteria->compare('COMP_PER_HEAT',$this->COMP_PER_HEAT);
		$criteria->compare('SONGS_PER_HEAT',$this->SONGS_PER_HEAT);
		$criteria->compare('MINS_PER_HEAT',$this->MINS_PER_HEAT);
		$criteria->compare('FINAL_COMPETITORS',$this->FINAL_COMPETITORS);
		$criteria->compare('PROCEED_COMPETITORS',$this->PROCEED_COMPETITORS);
		$criteria->compare('FINAL_SONGS',$this->FINAL_SONGS);
		$criteria->compare('FINAL_MINUTES',$this->FINAL_MINUTES);
		$criteria->compare('NUMBER_REPERCHARGE',$this->NUMBER_REPERCHARGE);
		$criteria->compare('TOTAL_REPERCHARGE',$this->TOTAL_REPERCHARGE);
		$criteria->compare('ALLOW_REPERCHARGE',$this->ALLOW_REPERCHARGE);
		$criteria->compare('EVENT_LEVEL',$this->EVENT_LEVEL);
		$criteria->compare('NUMBER_ROUNDS',$this->NUMBER_ROUNDS);
		$criteria->compare('YESES',$this->YESES);
		$criteria->compare('NOES',$this->NOES);
		$criteria->compare('TYPE',$this->TYPE);
		$criteria->compare('ALT',$this->ALT);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}