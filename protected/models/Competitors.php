<?php

/**
 * This is the model class for table "competitors".
 *
 * The followings are the available columns in table 'competitors':
 * @property integer $COMPETITOR_ID
 * @property integer $WSDC_NO
 * @property string $FIRST_NAME
 * @property string $LAST_NAME
 * @property integer $COMPETITOR_LEVEL
 * @property integer $REMOVED
 * @property string $ADDRESS
 * @property string $CITY
 * @property string $STATE
 * @property integer $POSTCODE
 * @property string $COUNTRY
 * @property string $PHONE
 * @property string $MOBILE
 * @property string $EMAIL
 * @property integer $LEADER
 * @property integer $REGISTERED
 * @property integer $BIB_STATUS
 * @property integer $BIB_NUMBER
 */
class Competitors extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Competitors the static model class
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
		return 'competitors';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FIRST_NAME, LAST_NAME, COMPETITOR_LEVEL, LEADER, REGISTERED, BIB_STATUS', 'required'),
			array('WSDC_NO, COMPETITOR_LEVEL, REMOVED, POSTCODE, LEADER, REGISTERED, BIB_STATUS, BIB_NUMBER', 'numerical', 'integerOnly'=>true),
			array('FIRST_NAME, LAST_NAME', 'length', 'max'=>50),
			array('CITY, STATE, COUNTRY', 'length', 'max'=>20),
			array('PHONE, MOBILE', 'length', 'max'=>12),
			array('EMAIL', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('COMPETITOR_ID, WSDC_NO, FIRST_NAME, LAST_NAME, COMPETITOR_LEVEL, REMOVED, ADDRESS, CITY, STATE, POSTCODE, COUNTRY, PHONE, MOBILE, EMAIL, LEADER, REGISTERED, BIB_STATUS, BIB_NUMBER', 'safe', 'on'=>'search'),
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
			'complevels'=>array(self::HAS_MANY, 'CompetitorCompetitions', 'COMPETITOR_ID'),
			'levels'=>array(self::MANY_MANY, 'Levels',
				'competitor_competitions(COMPETITOR_ID, LEVEL_ID)'),
			'events'=>array(self::MANY_MANY, 'Events',
				'competitor_events(COMPETITOR_ID, EVENT_ID)'),
			'competitions'=>array(self::MANY_MANY, 'Competitions',
				'competitor_competitions(COMPETITOR_ID, COMPETITION_ID)'),
			'partnership_leads'=>array(self::HAS_MANY, 'Partnership', 'leader_id'),
			'partnership_follows'=>array(self::HAS_MANY, 'Partnership', 'follower_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'COMPETITOR_ID' => 'Competitor',
			'WSDC_NO' => 'WSDC Number',
			'FIRST_NAME' => 'First Name',
			'LAST_NAME' => 'Last Name',
			'COMPETITOR_LEVEL' => 'Competitor Level',
			'REMOVED' => 'Removed',
			'ADDRESS' => 'Address',
			'CITY' => 'City',
			'STATE' => 'State',
			'POSTCODE' => 'Postcode',
			'COUNTRY' => 'Country',
			'PHONE' => 'Phone',
			'MOBILE' => 'Mobile',
			'EMAIL' => 'Email',
			'LEADER' => 'Leader',
			'REGISTERED' => 'Registered',
			'BIB_STATUS' => 'Bib Status',
			'BIB_NUMBER' => 'Bib Number',
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
		
		$criteria->compare('COMPETITOR_ID',$this->COMPETITOR_ID);
		$criteria->compare('WSDC_NO',$this->WSDC_NO);
		$criteria->compare('FIRST_NAME',$this->FIRST_NAME,true);
		$criteria->compare('LAST_NAME',$this->LAST_NAME,true);
		$criteria->compare('COMPETITOR_LEVEL',$this->COMPETITOR_LEVEL);
		$criteria->compare('REMOVED',$this->REMOVED);
		$criteria->compare('ADDRESS',$this->ADDRESS,true);
		$criteria->compare('CITY',$this->CITY,true);
		$criteria->compare('STATE',$this->STATE,true);
		$criteria->compare('POSTCODE',$this->POSTCODE);
		$criteria->compare('COUNTRY',$this->COUNTRY,true);
		$criteria->compare('PHONE',$this->PHONE,true);
		$criteria->compare('MOBILE',$this->MOBILE,true);
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('LEADER',$this->LEADER);
		$criteria->compare('REGISTERED',$this->REGISTERED);
		$criteria->compare('BIB_STATUS',$this->BIB_STATUS);
		$criteria->compare('BIB_NUMBER',$this->BIB_NUMBER);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function searchComp()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		
		$criteria=new CDbCriteria;
		
		$criteria->distinct = true;
		$criteria->join = 'LEFT JOIN '.CompetitorCompetitions::tableName().' ON '.CompetitorCompetitions::tableName().'.COMPETITOR_ID = t.COMPETITOR_ID';
		$criteria->compare('COMPETITOR_ID',$this->COMPETITOR_ID);
		$criteria->compare('WSDC_NO',$this->WSDC_NO);
		$criteria->compare('FIRST_NAME',$this->FIRST_NAME,true);
		$criteria->compare('LAST_NAME',$this->LAST_NAME,true);
		$criteria->compare('COMPETITOR_LEVEL',$this->COMPETITOR_LEVEL);
		$criteria->compare('REMOVED',$this->REMOVED);
		$criteria->compare('ADDRESS',$this->ADDRESS,true);
		$criteria->compare('CITY',$this->CITY,true);
		$criteria->compare('STATE',$this->STATE,true);
		$criteria->compare('POSTCODE',$this->POSTCODE);
		$criteria->compare('COUNTRY',$this->COUNTRY,true);
		$criteria->compare('PHONE',$this->PHONE,true);
		$criteria->compare('MOBILE',$this->MOBILE,true);
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('LEADER',$this->LEADER);
		$criteria->compare('REGISTERED',$this->REGISTERED);
		$criteria->compare('BIB_STATUS',$this->BIB_STATUS);
		$criteria->compare('BIB_NUMBER',$this->BIB_NUMBER);
		$criteria->compare(CompetitorCompetitions::tableName().'.COMPETITION_ID',Yii::app()->session['comp']);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
}