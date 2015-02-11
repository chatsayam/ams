<?php

/**
 * This is the model class for table "tb_vendors".
 *
 * The followings are the available columns in table 'tb_vendors':
 * @property integer $vendors_id
 * @property string $supply_code
 * @property string $supply_gfmis
 * @property string $supply
 * @property string $supply_address
 * @property string $supply_tel
 *
 * The followings are the available model relations:
 * @property TbAsset[] $tbAssets
 */
class TbVendors extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_vendors';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('supply_code, supply_gfmis', 'length', 'max'=>45),
			array('supply', 'length', 'max'=>100),
			array('supply_address', 'length', 'max'=>300),
			array('supply_tel', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('vendors_id, supply_code, supply_gfmis, supply, supply_address, supply_tel', 'safe', 'on'=>'search'),
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
			'tbAssets' => array(self::HAS_MANY, 'TbAsset', 'tb_vendors_vendors_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'vendors_id' => 'Vendors',
			'supply_code' => 'Supply Code',
			'supply_gfmis' => 'Supply Gfmis',
			'supply' => 'Supply',
			'supply_address' => 'Supply Address',
			'supply_tel' => 'Supply Tel',
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

		$criteria->compare('vendors_id',$this->vendors_id);
		$criteria->compare('supply_code',$this->supply_code,true);
		$criteria->compare('supply_gfmis',$this->supply_gfmis,true);
		$criteria->compare('supply',$this->supply,true);
		$criteria->compare('supply_address',$this->supply_address,true);
		$criteria->compare('supply_tel',$this->supply_tel,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TbVendors the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
