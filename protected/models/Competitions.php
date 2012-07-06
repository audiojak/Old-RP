<?php

/**
 * This is the model class for table "competitions".
 *
 * The followings are the available columns in table 'competitions':
 * @property integer $COMPETITION_ID
 * @property integer $COMPANY_ID
 * @property string $COMPETITION_NAME
 * @property string $DATE
 * @property integer $STAGE
 * @property integer $REMOVED
 * @property integer $JUDGE_ROUND
 */
class Competitions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Competitions the static model class
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
		return 'competitions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COMPANY_ID, COMPETITION_NAME, JUDGE_ROUND', 'required'),
			array('COMPANY_ID, STAGE, REMOVED, JUDGE_ROUND', 'numerical', 'integerOnly'=>true),
			array('COMPETITION_NAME', 'length', 'max'=>50),
			array('DATE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('COMPETITION_ID, COMPANY_ID, COMPETITION_NAME, DATE, STAGE, REMOVED, JUDGE_ROUND', 'safe', 'on'=>'search'),
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
			'competitionEvents' => array(self::HAS_MANY, 'Events', 'COMPETITION_ID', 'together'=>true ),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'COMPETITION_ID' => 'Competition',
			'COMPANY_ID' => 'Company',
			'COMPETITION_NAME' => 'Competition Name',
			'DATE' => 'Date',
			'STAGE' => 'Stage',
			'REMOVED' => 'Removed',
			'JUDGE_ROUND' => 'Judge Round',
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

		$criteria->compare('COMPETITION_ID',$this->COMPETITION_ID);
		$criteria->compare('COMPANY_ID',$this->COMPANY_ID);
		$criteria->compare('COMPETITION_NAME',$this->COMPETITION_NAME,true);
		$criteria->compare('DATE',$this->DATE,true);
		$criteria->compare('STAGE',$this->STAGE);
		$criteria->compare('REMOVED',$this->REMOVED);
		$criteria->compare('JUDGE_ROUND',$this->JUDGE_ROUND);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}