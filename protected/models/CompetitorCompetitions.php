<?php

/**
 * This is the model class for table "competitor_competitions".
 *
 * The followings are the available columns in table 'competitor_competitions':
 * @property integer $CC_ID
 * @property integer $COMPETITOR_ID
 * @property integer $LEVEL_ID
 * @property integer $COMPETITION_ID
 */
class CompetitorCompetitions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CompetitorCompetitions the static model class
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
		return 'competitor_competitions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COMPETITOR_ID, LEVEL_ID, COMPETITION_ID', 'required'),
			array('COMPETITOR_ID, LEVEL_ID, COMPETITION_ID', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CC_ID, COMPETITOR_ID, LEVEL_ID, COMPETITION_ID', 'safe', 'on'=>'search'),
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
			'level'=>array(self::BELONGS_TO, 'Levels', 'LEVEL_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CC_ID' => 'Cc',
			'COMPETITOR_ID' => 'Competitor',
			'COMPETITION_ID' => 'Competition',
			'LEVEL_ID' => 'Level',
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

		$criteria->compare('CC_ID',$this->CC_ID);
		$criteria->compare('COMPETITOR_ID',$this->COMPETITOR_ID);
		$criteria->compare('LEVEL_ID',$this->LEVEL_ID);
		$criteria->compare('COMPETITION_ID',$this->COMPETITION_ID);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function searchLevelNames()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->join = 'LEFT JOIN '.Levels::tableName().' ON '.Levels::tableName().'.LEVEL_ID = t.LEVEL_ID';
		$criteria->compare('CC_ID',$this->CC_ID);
		$criteria->compare('COMPETITOR_ID',$this->COMPETITOR_ID);
		$criteria->compare('LEVEL_ID',$this->LEVEL_ID);
		$criteria->compare('COMPETITION_ID',$this->COMPETITION_ID);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}