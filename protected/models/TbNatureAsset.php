<?php

/**
 * This is the model class for table "tb_nature_asset".
 *
 * The followings are the available columns in table 'tb_nature_asset':
 * @property integer $nature_asset_id
 * @property string $nature_asset
 * @property integer $tb_type_asset_type_asset_id
 *
 * The followings are the available model relations:
 * @property TbAsset[] $tbAssets
 * @property TbTypeAsset $tbTypeAssetTypeAsset
 */
class TbNatureAsset extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_nature_asset';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tb_type_asset_type_asset_id', 'required'),
			array('tb_type_asset_type_asset_id', 'numerical', 'integerOnly'=>true),
			array('nature_asset', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nature_asset_id, nature_asset, tb_type_asset_type_asset_id', 'safe', 'on'=>'search'),
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
			'tbAssets' => array(self::HAS_MANY, 'TbAsset', 'tb_nature_asset_nature_asset_id'),
			'tbTypeAssetTypeAsset' => array(self::BELONGS_TO, 'TbTypeAsset', 'tb_type_asset_type_asset_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nature_asset_id' => 'Nature Asset',
			'nature_asset' => 'Nature Asset',
			'tb_type_asset_type_asset_id' => 'Tb Type Asset Type Asset',
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

		$criteria->compare('nature_asset_id',$this->nature_asset_id);
		$criteria->compare('nature_asset',$this->nature_asset,true);
		$criteria->compare('tb_type_asset_type_asset_id',$this->tb_type_asset_type_asset_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TbNatureAsset the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
