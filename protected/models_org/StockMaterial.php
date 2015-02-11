<?php

/**
 * This is the model class for table "stock_material".
 *
 * The followings are the available columns in table 'stock_material':
 * @property integer $stockID
 * @property string $numberPD44
 * @property string $dateAdd
 * @property string $madeIn
 * @property string $numberSpec
 * @property integer $amount
 * @property string $unit
 * @property string $pricePerUnit
 * @property string $demand
 * @property string $idPrincipal
 * @property string $idFunding
 * @property string $idExpen
 * @property string $idActivity
 * @property string $idActivitySub
 * @property string $dateReciev
 * @property integer $guarantee
 * @property string $brand
 * @property string $version
 * @property string $comment
 * @property string $examiner
 * @property string $positionExaminer
 * @property string $expenYear
 * @property string $stockDateStamp
 * @property integer $acquired_acID
 * @property integer $procurement_prID
 * @property integer $division_divID
 * @property integer $office_station_osID
 * @property integer $expenditure_exID
 * @property integer $tb_user_uID
 * @property integer $poperty_goods_popID
 *
 * The followings are the available model relations:
 * @property Comment[] $comments
 * @property DateApprove[] $dateApproves
 * @property DurableGoods[] $durableGoods
 * @property Orders $orders
 * @property Recognizance[] $recognizances
 * @property Acquired $acquiredAc
 * @property Division $divisionDiv
 * @property Expenditure $expenditureEx
 * @property OfficeStation $officeStationOs
 * @property PopertyGoods $popertyGoodsPop
 * @property Procurement $procurementPr
 * @property TbUser $tbUserU
 */
class StockMaterial extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'stock_material';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('acquired_acID, procurement_prID, division_divID, office_station_osID, expenditure_exID, tb_user_uID, poperty_goods_popID', 'required'),
			array('amount, guarantee, acquired_acID, procurement_prID, division_divID, office_station_osID, expenditure_exID, tb_user_uID, poperty_goods_popID', 'numerical', 'integerOnly'=>true),
			array('numberPD44, numberSpec, unit, idPrincipal, idFunding, idExpen, idActivity, idActivitySub', 'length', 'max'=>45),
			array('madeIn, examiner, positionExaminer', 'length', 'max'=>100),
			array('pricePerUnit', 'length', 'max'=>12),
			array('brand, version', 'length', 'max'=>250),
			array('expenYear', 'length', 'max'=>4),
			array('dateAdd, demand, dateReciev, comment, stockDateStamp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('stockID, numberPD44, dateAdd, madeIn, numberSpec, amount, unit, pricePerUnit, demand, idPrincipal, idFunding, idExpen, idActivity, idActivitySub, dateReciev, guarantee, brand, version, comment, examiner, positionExaminer, expenYear, stockDateStamp, acquired_acID, procurement_prID, division_divID, office_station_osID, expenditure_exID, tb_user_uID, poperty_goods_popID', 'safe', 'on'=>'search'),
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
			'comments' => array(self::HAS_MANY, 'Comment', 'stock_material_stockID'),
			'dateApproves' => array(self::HAS_MANY, 'DateApprove', 'stock_material_stockID'),
			'durableGoods' => array(self::HAS_MANY, 'DurableGoods', 'stock_material_stockID'),
			'orders' => array(self::HAS_ONE, 'Orders', 'stock_material_stockID'),
			'recognizances' => array(self::HAS_MANY, 'Recognizance', 'stock_material_stockID'),
			'acquiredAc' => array(self::BELONGS_TO, 'Acquired', 'acquired_acID'),
			'divisionDiv' => array(self::BELONGS_TO, 'Division', 'division_divID'),
			'expenditureEx' => array(self::BELONGS_TO, 'Expenditure', 'expenditure_exID'),
			'officeStationOs' => array(self::BELONGS_TO, 'OfficeStation', 'office_station_osID'),
			'popertyGoodsPop' => array(self::BELONGS_TO, 'PopertyGoods', 'poperty_goods_popID'),
			'procurementPr' => array(self::BELONGS_TO, 'Procurement', 'procurement_prID'),
			'tbUserU' => array(self::BELONGS_TO, 'TbUser', 'tb_user_uID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'stockID' => 'ID',
			'numberPD44' => 'เลขที่ใบรับ',
			'dateAdd' => 'วันที่รับ',
			'madeIn' => 'ผลิตจากประเทศ',
			'numberSpec' => 'เลขที่ Spec.',
			'amount' => 'จำนวน',
			'unit' => 'หน่วย',
			'pricePerUnit' => 'ราคาต่อหน่วย',
			'demand' => 'รายงานความต้องการพัสดุ',
			'idPrincipal' => 'ศูนย์ต้นทุน',
			'idFunding' => 'รหัสแหล่งเงิน',
			'idExpen' => 'รหัสงบประมาณ',
			'idActivity' => 'รหัสกิจกรรมหลัก',
			'idActivitySub' => 'รหัสกิจกรรมย่อย',
			'dateReciev' => 'วันที่ตรวจรับ',
			'guarantee' => 'จำนวนปีที่รับประกัน',
			'brand' => 'Brand',
			'version' => 'Version',
			'comment' => 'รายละเอียดที่เกี่ยวข้อง',
			'examiner' => 'ผู้ตรวจ',
			'positionExaminer' => 'ตำแหน่งผู้ตรวจ',
			'expenYear' => 'ปีงบประมาณ',
			'stockDateStamp' => 'วันเวลารับเข้าระบบ',
			'acquired_acID' => 'วิธีการได้มา',
			'procurement_prID' => 'จัดซื้อโดย',
			'division_divID' => 'ผู้ถือครอง',
			'office_station_osID' => 'ส่วนงาน/โครงการ',
			'expenditure_exID' => 'ประเภทงบประมาณ',
			'tb_user_uID' => 'รหัสผู้ใช้',
			'poperty_goods_popID' => 'Poperty Goods Pop',
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

		$criteria->compare('stockID',$this->stockID);
		$criteria->compare('numberPD44',$this->numberPD44,true);
		$criteria->compare('dateAdd',$this->dateAdd,true);
		$criteria->compare('madeIn',$this->madeIn,true);
		$criteria->compare('numberSpec',$this->numberSpec,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('unit',$this->unit,true);
		$criteria->compare('pricePerUnit',$this->pricePerUnit,true);
		$criteria->compare('demand',$this->demand,true);
		$criteria->compare('idPrincipal',$this->idPrincipal,true);
		$criteria->compare('idFunding',$this->idFunding,true);
		$criteria->compare('idExpen',$this->idExpen,true);
		$criteria->compare('idActivity',$this->idActivity,true);
		$criteria->compare('idActivitySub',$this->idActivitySub,true);
		$criteria->compare('dateReciev',$this->dateReciev,true);
		$criteria->compare('guarantee',$this->guarantee);
		$criteria->compare('brand',$this->brand,true);
		$criteria->compare('version',$this->version,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('examiner',$this->examiner,true);
		$criteria->compare('positionExaminer',$this->positionExaminer,true);
		$criteria->compare('expenYear',$this->expenYear,true);
		$criteria->compare('stockDateStamp',$this->stockDateStamp,true);
		$criteria->compare('acquired_acID',$this->acquired_acID);
		$criteria->compare('procurement_prID',$this->procurement_prID);
		$criteria->compare('division_divID',$this->division_divID);
		$criteria->compare('office_station_osID',$this->office_station_osID);
		$criteria->compare('expenditure_exID',$this->expenditure_exID);
		$criteria->compare('tb_user_uID',$this->tb_user_uID);
		$criteria->compare('poperty_goods_popID',$this->poperty_goods_popID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StockMaterial the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
