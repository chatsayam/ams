<?php

/**
 * This is the model class for table "tb_stocks".
 *
 * The followings are the available columns in table 'tb_stocks':
 * @property integer $stock_id
 * @property string $asset_code
 * @property string $machine_code
 * @property string $institution_code
 * @property string $cost_code
 * @property string $issue_code
 * @property string $purchase_code
 * @property string $work
 * @property string $gfmis_code
 * @property string $base_in
 * @property string $YearChange
 * @property string $add_date
 * @property integer $tb_asset_asset_id
 * @property string $tb_status_status
 *
 * The followings are the available model relations:
 * @property TbAsset $tbAssetAsset
 * @property TbStatus $tbStatusStatus
 * @property TbTransfer[] $tbTransfers
 */
class TbStocks extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_stocks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tb_asset_asset_id, tb_status_status', 'required'),
			array('tb_asset_asset_id', 'numerical', 'integerOnly'=>true),
			array('asset_code, institution_code, cost_code, issue_code, purchase_code, gfmis_code', 'length', 'max'=>45),
			array('machine_code, work', 'length', 'max'=>300),
			array('YearChange', 'length', 'max'=>4),
			array('tb_status_status', 'length', 'max'=>100),
			array('base_in, add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('stock_id, asset_code, machine_code, institution_code, cost_code, issue_code, purchase_code, work, gfmis_code, base_in, YearChange, add_date, tb_asset_asset_id, tb_status_status', 'safe', 'on'=>'search'),
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
			'tbAssetAsset' => array(self::BELONGS_TO, 'TbAsset', 'tb_asset_asset_id'),
			'tbStatusStatus' => array(self::BELONGS_TO, 'TbStatus', 'tb_status_status'),
			'tbTransfers' => array(self::HAS_MANY, 'TbTransfer', 'tb_stocks_stock_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'stock_id' => 'Stock',
			'asset_code' => 'Asset Code',
			'machine_code' => 'Machine Code',
			'institution_code' => 'Institution Code',
			'cost_code' => 'Cost Code',
			'issue_code' => 'Issue Code',
			'purchase_code' => 'Purchase Code',
			'work' => 'Work',
			'gfmis_code' => 'Gfmis Code',
			'base_in' => 'Base In',
			'YearChange' => 'Year Change',
			'add_date' => 'Add Date',
			'tb_asset_asset_id' => 'Tb Asset Asset',
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

		$criteria->compare('stock_id',$this->stock_id);
		$criteria->compare('asset_code',$this->asset_code,true);
		$criteria->compare('machine_code',$this->machine_code,true);
		$criteria->compare('institution_code',$this->institution_code,true);
		$criteria->compare('cost_code',$this->cost_code,true);
		$criteria->compare('issue_code',$this->issue_code,true);
		$criteria->compare('purchase_code',$this->purchase_code,true);
		$criteria->compare('work',$this->work,true);
		$criteria->compare('gfmis_code',$this->gfmis_code,true);
		$criteria->compare('base_in',$this->base_in,true);
		$criteria->compare('YearChange',$this->YearChange,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('tb_asset_asset_id',$this->tb_asset_asset_id);
		$criteria->compare('tb_status_status',$this->tb_status_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TbStocks the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
