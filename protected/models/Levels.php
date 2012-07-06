<?php

/**
 * This is the model class for table "levels".
 *
 * The followings are the available columns in table 'levels':
 * @property integer $LEVEL_ID
 * @property string $LEVEL_NAME
 * @property integer $RANK
 */
class Levels extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Levels the static model class
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
		return 'levels';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('LEVEL_NAME, RANK', 'required'),
			array('RANK', 'numerical', 'integerOnly'=>true),
			array('LEVEL_NAME', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('LEVEL_ID, LEVEL_NAME, RANK', 'safe', 'on'=>'search'),
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
			'LEVEL_ID' => 'Level',
			'LEVEL_NAME' => 'Level Name',
			'RANK' => 'Rank',
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

		$criteria->compare('LEVEL_ID',$this->LEVEL_ID);
		$criteria->compare('LEVEL_NAME',$this->LEVEL_NAME,true);
		$criteria->compare('RANK',$this->RANK);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}