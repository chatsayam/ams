<?php

/**
 * This is the model class for table "tranfer_history".
 *
 * The followings are the available columns in table 'tranfer_history':
 * @property integer $thID
 * @property string $thCode
 * @property string $dateTranfer
 * @property string $thTimestamp
 * @property integer $division_divID
 * @property integer $office_station_osID
 * @property integer $durable_goods_dgID
 * @property integer $tb_user_uID
 *
 * The followings are the available model relations:
 * @property Division $divisionDiv
 * @property DurableGoods $durableGoodsDg
 * @property OfficeStation $officeStationOs
 * @property TbUser $tbUserU
 */
class TranferHistory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tranfer_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('division_divID, office_station_osID, durable_goods_dgID, tb_user_uID', 'required'),
			array('division_divID, office_station_osID, durable_goods_dgID, tb_user_uID', 'numerical', 'integerOnly'=>true),
			array('thCode', 'length', 'max'=>100),
			array('dateTranfer, thTimestamp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('thID, thCode, dateTranfer, thTimestamp, division_divID, office_station_osID, durable_goods_dgID, tb_user_uID', 'safe', 'on'=>'search'),
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
			'divisionDiv' => array(self::BELONGS_TO, 'Division', 'division_divID'),
			'durableGoodsDg' => array(self::BELONGS_TO, 'DurableGoods', 'durable_goods_dgID'),
			'officeStationOs' => array(self::BELONGS_TO, 'OfficeStation', 'office_station_osID'),
			'tbUserU' => array(self::BELONGS_TO, 'TbUser', 'tb_user_uID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'thID' => 'ID',
			'thCode' => 'เลขที่/ใบโอน',
			'dateTranfer' => 'ลงวันที่/ใบโอน',
			'thTimestamp' => 'เวลาวันที่โอน',
			'division_divID' => 'Division Div',
			'office_station_osID' => 'Office Station Os',
			'durable_goods_dgID' => 'Durable Goods Dg',
			'tb_user_uID' => 'Tb User U',
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

		$criteria->compare('thID',$this->thID);
		$criteria->compare('thCode',$this->thCode,true);
		$criteria->compare('dateTranfer',$this->dateTranfer,true);
		$criteria->compare('thTimestamp',$this->thTimestamp,true);
		$criteria->compare('division_divID',$this->division_divID);
		$criteria->compare('office_station_osID',$this->office_station_osID);
		$criteria->compare('durable_goods_dgID',$this->durable_goods_dgID);
		$criteria->compare('tb_user_uID',$this->tb_user_uID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TranferHistory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
