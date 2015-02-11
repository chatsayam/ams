<?php

/**
 * This is the model class for table "tb_stocks_distribute".
 *
 * The followings are the available columns in table 'tb_stocks_distribute':
 * @property integer $sdistribute_id
 * @property string $tb_stocks_asset_code
 * @property integer $tb_distribute_distribute_id
 *
 * The followings are the available model relations:
 * @property TbDistribute $tbDistributeDistribute
 */
class TbStocksDistribute extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_stocks_distribute';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tb_stocks_asset_code, tb_distribute_distribute_id', 'required'),
			array('tb_distribute_distribute_id', 'numerical', 'integerOnly'=>true),
			array('tb_stocks_asset_code', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('sdistribute_id, tb_stocks_asset_code, tb_distribute_distribute_id', 'safe', 'on'=>'search'),
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
			'tbDistributeDistribute' => array(self::BELONGS_TO, 'TbDistribute', 'tb_distribute_distribute_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sdistribute_id' => 'Sdistribute',
			'tb_stocks_asset_code' => 'Tb Stocks Asset Code',
			'tb_distribute_distribute_id' => 'Tb Distribute Distribute',
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

		$criteria->compare('sdistribute_id',$this->sdistribute_id);
		$criteria->compare('tb_stocks_asset_code',$this->tb_stocks_asset_code,true);
		$criteria->compare('tb_distribute_distribute_id',$this->tb_distribute_distribute_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TbStocksDistribute the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
