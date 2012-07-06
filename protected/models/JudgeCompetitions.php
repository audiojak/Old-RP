<?php

/**
 * This is the model class for table "judge_competitions".
 *
 * The followings are the available columns in table 'judge_competitions':
 * @property integer $CJ_ID
 * @property integer $JUDGE_ID
 * @property integer $COMPETITION_ID
 */
class JudgeCompetitions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return JudgeCompetitions the static model class
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
		return 'judge_competitions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('JUDGE_ID, COMPETITION_ID', 'required'),
			array('JUDGE_ID, COMPETITION_ID', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CJ_ID, JUDGE_ID, COMPETITION_ID', 'safe', 'on'=>'search'),
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
			'CJ_ID' => 'Cj',
			'JUDGE_ID' => 'Judge',
			'COMPETITION_ID' => 'Competition',
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

		$criteria->compare('CJ_ID',$this->CJ_ID);
		$criteria->compare('JUDGE_ID',$this->JUDGE_ID);
		$criteria->compare('COMPETITION_ID',$this->COMPETITION_ID);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}