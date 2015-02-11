<?php

/**
 * This is the model class for table "committee".
 *
 * The followings are the available columns in table 'committee':
 * @property integer $cmID
 * @property string $fullname
 * @property string $position
 * @property string $yearly
 * @property string $cmTimeStamp
 * @property integer $tb_user_uID
 * @property integer $office_station_osID
 *
 * The followings are the available model relations:
 * @property OfficeStation $officeStationOs
 * @property TbUser $tbUserU
 * @property Evaluate[] $evaluates
 */
class Committee extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'committee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tb_user_uID, office_station_osID', 'required'),
			array('tb_user_uID, office_station_osID', 'numerical', 'integerOnly'=>true),
			array('fullname', 'length', 'max'=>100),
			array('position', 'length', 'max'=>45),
			array('yearly', 'length', 'max'=>4),
			array('cmTimeStamp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cmID, fullname, position, yearly, cmTimeStamp, tb_user_uID, office_station_osID', 'safe', 'on'=>'search'),
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
			'officeStationOs' => array(self::BELONGS_TO, 'OfficeStation', 'office_station_osID'),
			'tbUserU' => array(self::BELONGS_TO, 'TbUser', 'tb_user_uID'),
			'evaluates' => array(self::HAS_MANY, 'Evaluate', 'committee_cmID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cmID' => 'รหัส',
			'fullname' => 'ชื่อ - สกุล',
			'position' => 'ตำแหน่ง',
			'yearly' => 'ประจำปี',
			'cmTimeStamp' => 'วันเวลาเพิ่ม',
			'tb_user_uID' => 'Tb User U',
			'office_station_osID' => 'Office Station Os',
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

		$criteria->compare('cmID',$this->cmID);
		$criteria->compare('fullname',$this->fullname,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('yearly',$this->yearly,true);
		$criteria->compare('cmTimeStamp',$this->cmTimeStamp,true);
		$criteria->compare('tb_user_uID',$this->tb_user_uID);
		$criteria->compare('office_station_osID',$this->office_station_osID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Committee the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
