<?php

/**
 * This is the model class for table "user_companies".
 *
 * The followings are the available columns in table 'user_companies':
 * @property integer $USER_COMPANY_ID
 * @property integer $USER_ID
 * @property integer $COMPANY_ID
 */
class UserCompanies extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserCompanies the static model class
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
		return 'user_companies';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('USER_ID, COMPANY_ID', 'required'),
			array('USER_ID, COMPANY_ID', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('USER_COMPANY_ID, USER_ID, COMPANY_ID', 'safe', 'on'=>'search'),
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
			'USER_COMPANY_ID' => 'User Company',
			'USER_ID' => 'User',
			'COMPANY_ID' => 'Company',
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

		$criteria->compare('USER_COMPANY_ID',$this->USER_COMPANY_ID);
		$criteria->compare('USER_ID',$this->USER_ID);
		$criteria->compare('COMPANY_ID',$this->COMPANY_ID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}