<?php

/**
 * This is the model class for table "tb_transfer".
 *
 * The followings are the available columns in table 'tb_transfer':
 * @property integer $transfer_id
 * @property string $transfer_code
 * @property string $transfer_date
 * @property integer $tb_stocks_stock_id
 * @property integer $tb_institution_institution_id
 *
 * The followings are the available model relations:
 * @property TbInstitution $tbInstitutionInstitution
 * @property TbStocks $tbStocksStock
 */
class TbTransfer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_transfer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tb_stocks_stock_id, tb_institution_institution_id', 'required'),
			array('tb_stocks_stock_id, tb_institution_institution_id', 'numerical', 'integerOnly'=>true),
			array('transfer_code', 'length', 'max'=>45),
			array('transfer_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('transfer_id, transfer_code, transfer_date, tb_stocks_stock_id, tb_institution_institution_id', 'safe', 'on'=>'search'),
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
			'tbStocksStock' => array(self::BELONGS_TO, 'TbStocks', 'tb_stocks_stock_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'transfer_id' => 'Transfer',
			'transfer_code' => 'Transfer Code',
			'transfer_date' => 'Transfer Date',
			'tb_stocks_stock_id' => 'Tb Stocks Stock',
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

		$criteria->compare('transfer_id',$this->transfer_id);
		$criteria->compare('transfer_code',$this->transfer_code,true);
		$criteria->compare('transfer_date',$this->transfer_date,true);
		$criteria->compare('tb_stocks_stock_id',$this->tb_stocks_stock_id);
		$criteria->compare('tb_institution_institution_id',$this->tb_institution_institution_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TbTransfer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
