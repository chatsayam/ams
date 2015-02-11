<?php

/**
 * This is the model class for table "tb_distribute".
 *
 * The followings are the available columns in table 'tb_distribute':
 * @property integer $distribute_id
 * @property string $distribute_date
 * @property string $distribute_code
 * @property string $distribute_name
 * @property integer $tb_institution_institution_id
 *
 * The followings are the available model relations:
 * @property TbInstitution $tbInstitutionInstitution
 * @property TbStocksDistribute[] $tbStocksDistributes
 */
class TbDistribute extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_distribute';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('distribute_date, distribute_code, distribute_name, tb_institution_institution_id', 'required'),
			array('tb_institution_institution_id', 'numerical', 'integerOnly'=>true),
			array('distribute_code', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('distribute_id, distribute_date, distribute_code, distribute_name, tb_institution_institution_id', 'safe', 'on'=>'search'),
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
			'tbInstitutionInstitution' => array(self::BELONGS_TO, 'TbInstitution', 'tb_institution_institution_id'),
			'tbStocksDistributes' => array(self::HAS_MANY, 'TbStocksDistribute', 'tb_distribute_distribute_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'distribute_id' => 'Distribute',
			'distribute_date' => 'Distribute Date',
			'distribute_code' => 'Distribute Code',
			'distribute_name' => 'Distribute Name',
			'tb_institution_institution_id' => 'Tb Institution Institution',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('distribute_id',$this->distribute_id);
		$criteria->compare('distribute_date',$this->distribute_date,true);
		$criteria->compare('distribute_code',$this->distribute_code,true);
		$criteria->compare('distribute_name',$this->distribute_name,true);
		$criteria->compare('tb_institution_institution_id',$this->tb_institution_institution_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TbDistribute the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
