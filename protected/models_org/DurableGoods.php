<?php

/**
 * This is the model class for table "durable_goods".
 *
 * The followings are the available columns in table 'durable_goods':
 * @property integer $dgID
 * @property string $idMachine
 * @property string $durableCode
 * @property string $durableBase
 * @property string $weekDurableCode
 * @property integer $durable_status_dsID
 * @property integer $tb_user_uID
 * @property integer $stock_material_stockID
 * @property integer $office_station_osID
 *
 * The followings are the available model relations:
 * @property Distribute[] $distributes
 * @property DurableStatus $durableStatusDs
 * @property OfficeStation $officeStationOs
 * @property StockMaterial $stockMaterialStock
 * @property TbUser $tbUserU
 * @property Evaluate[] $evaluates
 * @property HistoryRepair[] $historyRepairs
 * @property LogActions[] $logActions
 * @property TranferHistory[] $tranferHistories
 * @property Usability[] $usabilities
 */
class DurableGoods extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'durable_goods';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('durable_status_dsID, tb_user_uID, stock_material_stockID, office_station_osID', 'required'),
			array('durable_status_dsID, tb_user_uID, stock_material_stockID, office_station_osID', 'numerical', 'integerOnly'=>true),
			array('idMachine, durableCode, weekDurableCode', 'length', 'max'=>100),
			array('durableBase', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('dgID, idMachine, durableCode, durableBase, weekDurableCode, durable_status_dsID, tb_user_uID, stock_material_stockID, office_station_osID', 'safe', 'on'=>'search'),
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
			'distributes' => array(self::HAS_MANY, 'Distribute', 'durable_goods_dgID'),
			'durableStatusDs' => array(self::BELONGS_TO, 'DurableStatus', 'durable_status_dsID'),
			'officeStationOs' => array(self::BELONGS_TO, 'OfficeStation', 'office_station_osID'),
			'stockMaterialStock' => array(self::BELONGS_TO, 'StockMaterial', 'stock_material_stockID'),
			'tbUserU' => array(self::BELONGS_TO, 'TbUser', 'tb_user_uID'),
			'evaluates' => array(self::HAS_MANY, 'Evaluate', 'durable_goods_dgID'),
			'historyRepairs' => array(self::HAS_MANY, 'HistoryRepair', 'durable_goods_dgID'),
			'logActions' => array(self::HAS_MANY, 'LogActions', 'durable_goods_dgID'),
			'tranferHistories' => array(self::HAS_MANY, 'TranferHistory', 'durable_goods_dgID'),
			'usabilities' => array(self::HAS_MANY, 'Usability', 'durable_goods_dgID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'dgID' => 'ID',
			'idMachine' => 'หมายเลขเครื่อง',
			'durableCode' => 'รหัสครุภัณฑ์',
			'durableBase' => 'ใช้งานที่',
			'weekDurableCode' => 'หมายเลข ชป.',
			'durable_status_dsID' => 'สถานะ',
			'tb_user_uID' => 'รหัสผู้ใช้',
			'stock_material_stockID' => 'รหัสสิ่งของ',
			'office_station_osID' => 'ส่วนงาน/โครงการ',
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

		$criteria->compare('dgID',$this->dgID);
		$criteria->compare('idMachine',$this->idMachine,true);
		$criteria->compare('durableCode',$this->durableCode,true);
		$criteria->compare('durableBase',$this->durableBase,true);
		$criteria->compare('weekDurableCode',$this->weekDurableCode,true);
		$criteria->compare('durable_status_dsID',$this->durable_status_dsID);
		$criteria->compare('tb_user_uID',$this->tb_user_uID);
		$criteria->compare('stock_material_stockID',$this->stock_material_stockID);
		$criteria->compare('office_station_osID',$this->office_station_osID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DurableGoods the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
