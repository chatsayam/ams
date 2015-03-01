<?php

/**
 * This is the model class for table "tb_asset".
 *
 * The followings are the available columns in table 'tb_asset':
 * @property integer $asset_id
 * @property string $register_code
 * @property string $report_pd01_code
 * @property string $date_report_pd01
 * @property string $year_cost
 * @property string $date_examine
 * @property string $feature
 * @property string $lifetime
 * @property string $warrenty
 * @property string $brand
 * @property string $version
 * @property string $made_in
 * @property string $orther_asset
 * @property string $amount
 * @property string $price_per
 * @property string $call_unit
 * @property string $source_cost_code
 * @property string $budget_code
 * @property string $activity_code
 * @property string $sub_activity_code
 * @property string $specification_code
 * @property string $invoice_code
 * @property string $invoice_date
 * @property string $contract_code
 * @property string $contract_date
 * @property string $orther
 * @property string $date_asset
 * @property string $file_spec
 * @property string $file_invoice
 * @property string $file_pd01
 * @property string $file_pd38
 * @property integer $asset
 * @property integer $tb_nature_asset_nature_asset_id
 * @property integer $tb_purchase_purchase_id
 * @property integer $tb_vendors_vendors_id
 * @property integer $tb_type_cost_type_cost_id
 * @property integer $tb_get_asset_get_asset_id
 * @property integer $tb_institution_institution_id
 * @property string $tb_status_status
 *
 * The followings are the available model relations:
 * @property TbGetAsset $tbGetAssetGetAsset
 * @property TbInstitution $tbInstitutionInstitution
 * @property TbNatureAsset $tbNatureAssetNatureAsset
 * @property TbPurchase $tbPurchasePurchase
 * @property TbStatus $tbStatusStatus
 * @property TbTypeCost $tbTypeCostTypeCost
 * @property TbVendors $tbVendorsVendors
 * @property TbStocks[] $tbStocks
 */
class TbAsset extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_asset';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tb_nature_asset_nature_asset_id, tb_purchase_purchase_id, tb_vendors_vendors_id, tb_type_cost_type_cost_id, tb_get_asset_get_asset_id, tb_institution_institution_id, tb_status_status', 'required'),
			array('asset, tb_nature_asset_nature_asset_id, tb_purchase_purchase_id, tb_vendors_vendors_id, tb_type_cost_type_cost_id, tb_get_asset_get_asset_id, tb_institution_institution_id', 'numerical', 'integerOnly'=>true),
			array('register_code, report_pd01_code, made_in, call_unit, source_cost_code, budget_code, activity_code, sub_activity_code, specification_code, invoice_code, contract_code', 'length', 'max'=>45),
			array('year_cost, warrenty, amount', 'length', 'max'=>4),
			array('lifetime', 'length', 'max'=>6),
			array('brand, version, file_spec, file_invoice, file_pd01, file_pd38, tb_status_status', 'length', 'max'=>100),
			array('orther_asset', 'length', 'max'=>300),
			array('price_per', 'length', 'max'=>15),
			array('date_report_pd01, date_examine, feature, invoice_date, contract_date, orther, date_asset', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('asset_id, register_code, report_pd01_code, date_report_pd01, year_cost, date_examine, feature, lifetime, warrenty, brand, version, made_in, orther_asset, amount, price_per, call_unit, source_cost_code, budget_code, activity_code, sub_activity_code, specification_code, invoice_code, invoice_date, contract_code, contract_date, orther, date_asset, file_spec, file_invoice, file_pd01, file_pd38, asset, tb_nature_asset_nature_asset_id, tb_purchase_purchase_id, tb_vendors_vendors_id, tb_type_cost_type_cost_id, tb_get_asset_get_asset_id, tb_institution_institution_id, tb_status_status', 'safe', 'on'=>'search'),
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
			'tbGetAssetGetAsset' => array(self::BELONGS_TO, 'TbGetAsset', 'tb_get_asset_get_asset_id'),
			'tbInstitutionInstitution' => array(self::BELONGS_TO, 'TbInstitution', 'tb_institution_institution_id'),
			'tbNatureAssetNatureAsset' => array(self::BELONGS_TO, 'TbNatureAsset', 'tb_nature_asset_nature_asset_id'),
			'tbPurchasePurchase' => array(self::BELONGS_TO, 'TbPurchase', 'tb_purchase_purchase_id'),
			'tbStatusStatus' => array(self::BELONGS_TO, 'TbStatus', 'tb_status_status'),
			'tbTypeCostTypeCost' => array(self::BELONGS_TO, 'TbTypeCost', 'tb_type_cost_type_cost_id'),
			'tbVendorsVendors' => array(self::BELONGS_TO, 'TbVendors', 'tb_vendors_vendors_id'),
			'tbStocks' => array(self::HAS_MANY, 'TbStocks', 'tb_asset_asset_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'asset_id' => 'Asset',
			'register_code' => 'Register Code',
			'report_pd01_code' => 'Report Pd01 Code',
			'date_report_pd01' => 'Date Report Pd01',
			'year_cost' => 'Year Cost',
			'date_examine' => 'Date Examine',
			'feature' => 'Feature',
			'lifetime' => 'Lifetime',
			'warrenty' => 'Warrenty',
			'brand' => 'Brand',
			'version' => 'Version',
			'made_in' => 'Made In',
			'orther_asset' => 'Orther Asset',
			'amount' => 'Amount',
			'price_per' => 'Price Per',
			'call_unit' => 'Call Unit',
			'source_cost_code' => 'Source Cost Code',
			'budget_code' => 'Budget Code',
			'activity_code' => 'Activity Code',
			'sub_activity_code' => 'Sub Activity Code',
			'specification_code' => 'Specification Code',
			'invoice_code' => 'Invoice Code',
			'invoice_date' => 'Invoice Date',
			'contract_code' => 'Contract Code',
			'contract_date' => 'Contract Date',
			'orther' => 'Orther',
			'date_asset' => 'Date Asset',
			'file_spec' => 'File Spec',
			'file_invoice' => 'File Invoice',
			'file_pd01' => 'File Pd01',
			'file_pd38' => 'File Pd38',
			'asset' => 'Asset',
			'tb_nature_asset_nature_asset_id' => 'Tb Nature Asset Nature Asset',
			'tb_purchase_purchase_id' => 'Tb Purchase Purchase',
			'tb_vendors_vendors_id' => 'Tb Vendors Vendors',
			'tb_type_cost_type_cost_id' => 'Tb Type Cost Type Cost',
			'tb_get_asset_get_asset_id' => 'Tb Get Asset Get Asset',
			'tb_institution_institution_id' => 'Tb Institution Institution',
			'tb_status_status' => 'Tb Status Status',
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

		$criteria->compare('asset_id',$this->asset_id);
		$criteria->compare('register_code',$this->register_code,true);
		$criteria->compare('report_pd01_code',$this->report_pd01_code,true);
		$criteria->compare('date_report_pd01',$this->date_report_pd01,true);
		$criteria->compare('year_cost',$this->year_cost,true);
		$criteria->compare('date_examine',$this->date_examine,true);
		$criteria->compare('feature',$this->feature,true);
		$criteria->compare('lifetime',$this->lifetime,true);
		$criteria->compare('warrenty',$this->warrenty,true);
		$criteria->compare('brand',$this->brand,true);
		$criteria->compare('version',$this->version,true);
		$criteria->compare('made_in',$this->made_in,true);
		$criteria->compare('orther_asset',$this->orther_asset,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('price_per',$this->price_per,true);
		$criteria->compare('call_unit',$this->call_unit,true);
		$criteria->compare('source_cost_code',$this->source_cost_code,true);
		$criteria->compare('budget_code',$this->budget_code,true);
		$criteria->compare('activity_code',$this->activity_code,true);
		$criteria->compare('sub_activity_code',$this->sub_activity_code,true);
		$criteria->compare('specification_code',$this->specification_code,true);
		$criteria->compare('invoice_code',$this->invoice_code,true);
		$criteria->compare('invoice_date',$this->invoice_date,true);
		$criteria->compare('contract_code',$this->contract_code,true);
		$criteria->compare('contract_date',$this->contract_date,true);
		$criteria->compare('orther',$this->orther,true);
		$criteria->compare('date_asset',$this->date_asset,true);
		$criteria->compare('file_spec',$this->file_spec,true);
		$criteria->compare('file_invoice',$this->file_invoice,true);
		$criteria->compare('file_pd01',$this->file_pd01,true);
		$criteria->compare('file_pd38',$this->file_pd38,true);
		$criteria->compare('asset',$this->asset);
		$criteria->compare('tb_nature_asset_nature_asset_id',$this->tb_nature_asset_nature_asset_id);
		$criteria->compare('tb_purchase_purchase_id',$this->tb_purchase_purchase_id);
		$criteria->compare('tb_vendors_vendors_id',$this->tb_vendors_vendors_id);
		$criteria->compare('tb_type_cost_type_cost_id',$this->tb_type_cost_type_cost_id);
		$criteria->compare('tb_get_asset_get_asset_id',$this->tb_get_asset_get_asset_id);
		$criteria->compare('tb_institution_institution_id',$this->tb_institution_institution_id);
		$criteria->compare('tb_status_status',$this->tb_status_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TbAsset the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
