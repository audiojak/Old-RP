<?php

/**
 * This is the model class for table "companies".
 *
 * The followings are the available columns in table 'companies':
 * @property integer $COMPANY_ID
 * @property string $COMPANY_NAME
 * @property integer $REMOVED
 */
class Companies extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Companies the static model class
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
		return 'companies';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COMPANY_NAME, REMOVED', 'required'),
			array('REMOVED', 'numerical', 'integerOnly'=>true),
			array('COMPANY_NAME', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('COMPANY_ID, COMPANY_NAME, REMOVED', 'safe', 'on'=>'search'),
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
			'COMPANY_ID' => 'Company',
			'COMPANY_NAME' => 'Company Name',
			'REMOVED' => 'Removed',
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

		$criteria->compare('COMPANY_ID',$this->COMPANY_ID);
		$criteria->compare('COMPANY_NAME',$this->COMPANY_NAME,true);
		$criteria->compare('REMOVED',$this->REMOVED);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}