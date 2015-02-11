<?php

/**
 * This is the model class for table "office_station".
 *
 * The followings are the available columns in table 'office_station':
 * @property integer $osID
 * @property string $osName
 * @property integer $department_deptID
 *
 * The followings are the available model relations:
 * @property Committee[] $committees
 * @property DurableGoods[] $durableGoods
 * @property Department $departmentDept
 * @property StockMaterial[] $stockMaterials
 * @property TbUser[] $tbUsers
 * @property TranferHistory[] $tranferHistories
 */
class OfficeStation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'office_station';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('department_deptID', 'required'),
			array('department_deptID', 'numerical', 'integerOnly'=>true),
			array('osName', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('osID, osName, department_deptID', 'safe', 'on'=>'search'),
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
			'committees' => array(self::HAS_MANY, 'Committee', 'office_station_osID'),
			'durableGoods' => array(self::HAS_MANY, 'DurableGoods', 'office_station_osID'),
			'departmentDept' => array(self::BELONGS_TO, 'Department', 'department_deptID'),
			'stockMaterials' => array(self::HAS_MANY, 'StockMaterial', 'office_station_osID'),
			'tbUsers' => array(self::HAS_MANY, 'TbUser', 'office_station_osID'),
			'tranferHistories' => array(self::HAS_MANY, 'TranferHistory', 'office_station_osID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'osID' => 'ID',
			'osName' => 'ส่วนงาน/โครงการ',
			'department_deptID' => 'Department Dept',
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

		$criteria->compare('osID',$this->osID);
		$criteria->compare('osName',$this->osName,true);
		$criteria->compare('department_deptID',$this->department_deptID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OfficeStation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
