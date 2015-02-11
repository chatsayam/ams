<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property integer $stock_material_stockID
 * @property string $orderNo
 * @property string $orderDate
 * @property string $reqAsset
 * @property string $reqAssetDate
 * @property integer $supplier_supID
 *
 * The followings are the available model relations:
 * @property StockMaterial $stockMaterialStock
 * @property Supplier $supplierSup
 */
class Orders extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('stock_material_stockID, supplier_supID', 'required'),
			array('stock_material_stockID, supplier_supID', 'numerical', 'integerOnly'=>true),
			array('orderNo, reqAsset', 'length', 'max'=>45),
			array('orderDate, reqAssetDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('stock_material_stockID, orderNo, orderDate, reqAsset, reqAssetDate, supplier_supID', 'safe', 'on'=>'search'),
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
			'stockMaterialStock' => array(self::BELONGS_TO, 'StockMaterial', 'stock_material_stockID'),
			'supplierSup' => array(self::BELONGS_TO, 'Supplier', 'supplier_supID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'stock_material_stockID' => 'ID',
			'orderNo' => 'เลขที่ใบสั่งซื้อ',
			'orderDate' => 'วันที่สั่งซื้อ',
			'reqAsset' => 'เลขที่รายงานความต้องการพัสดุ',
			'reqAssetDate' => 'ลงวันที่',
			'supplier_supID' => 'Supplier Sup',
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

		$criteria->compare('stock_material_stockID',$this->stock_material_stockID);
		$criteria->compare('orderNo',$this->orderNo,true);
		$criteria->compare('orderDate',$this->orderDate,true);
		$criteria->compare('reqAsset',$this->reqAsset,true);
		$criteria->compare('reqAssetDate',$this->reqAssetDate,true);
		$criteria->compare('supplier_supID',$this->supplier_supID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Orders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
