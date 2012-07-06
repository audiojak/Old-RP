<?php

/**
 * This is the model class for table "company_levels".
 *
 * The followings are the available columns in table 'company_levels':
 * @property integer $COMPANY_LEVEL_ID
 * @property integer $COMPANY_ID
 * @property integer $LEVEL_ID
 */
class CompanyLevels extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CompanyLevels the static model class
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
		return 'company_levels';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COMPANY_ID, LEVEL_ID', 'required'),
			array('COMPANY_ID, LEVEL_ID', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('COMPANY_LEVEL_ID, COMPANY_ID, LEVEL_ID', 'safe', 'on'=>'search'),
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
			'COMPANY_LEVEL_ID' => 'Company Level',
			'COMPANY_ID' => 'Company',
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

		$criteria->compare('COMPANY_LEVEL_ID',$this->COMPANY_LEVEL_ID);
		$criteria->compare('COMPANY_ID',$this->COMPANY_ID);
		$criteria->compare('LEVEL_ID',$this->LEVEL_ID);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}