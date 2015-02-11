<?php

/**
 * This is the model class for table "tb_repair".
 *
 * The followings are the available columns in table 'tb_repair':
 * @property integer $repair_id
 * @property string $date_repair
 * @property string $repair
 * @property string $price_repair
 * @property string $repair_orther
 * @property string $file_repair_invoice
 * @property integer $tb_stocks_stock_id
 *
 * The followings are the available model relations:
 * @property TbStocks $tbStocksStock
 */
class TbRepair extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_repair';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_repair, repair, price_repair, repair_orther, file_repair_invoice, tb_stocks_stock_id', 'required'),
			array('tb_stocks_stock_id', 'numerical', 'integerOnly'=>true),
			array('price_repair', 'length', 'max'=>11),
			array('file_repair_invoice', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('repair_id, date_repair, repair, price_repair, repair_orther, file_repair_invoice, tb_stocks_stock_id', 'safe', 'on'=>'search'),
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
			'tbStocksStock' => array(self::BELONGS_TO, 'TbStocks', 'tb_stocks_stock_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'repair_id' => 'Repair',
			'date_repair' => 'Date Repair',
			'repair' => 'Repair',
			'price_repair' => 'Price Repair',
			'repair_orther' => 'Repair Orther',
			'file_repair_invoice' => 'File Repair Invoice',
			'tb_stocks_stock_id' => 'Tb Stocks Stock',
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

		$criteria->compare('repair_id',$this->repair_id);
		$criteria->compare('date_repair',$this->date_repair,true);
		$criteria->compare('repair',$this->repair,true);
		$criteria->compare('price_repair',$this->price_repair,true);
		$criteria->compare('repair_orther',$this->repair_orther,true);
		$criteria->compare('file_repair_invoice',$this->file_repair_invoice,true);
		$criteria->compare('tb_stocks_stock_id',$this->tb_stocks_stock_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TbRepair the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
