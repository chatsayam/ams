<?php

/**
 * This is the model class for table "history_repair".
 *
 * The followings are the available columns in table 'history_repair':
 * @property integer $hrID
 * @property string $hrWornOut
 * @property string $dateWornOut
 * @property string $hrRepair
 * @property string $dateRepair
 * @property string $priceRepair
 * @property integer $durable_goods_dgID
 * @property integer $tb_user_uID
 *
 * The followings are the available model relations:
 * @property DurableGoods $durableGoodsDg
 * @property TbUser $tbUserU
 */
class HistoryRepair extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'history_repair';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('durable_goods_dgID, tb_user_uID', 'required'),
			array('durable_goods_dgID, tb_user_uID', 'numerical', 'integerOnly'=>true),
			array('priceRepair', 'length', 'max'=>12),
			array('hrWornOut, dateWornOut, hrRepair, dateRepair', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('hrID, hrWornOut, dateWornOut, hrRepair, dateRepair, priceRepair, durable_goods_dgID, tb_user_uID', 'safe', 'on'=>'search'),
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
			'durableGoodsDg' => array(self::BELONGS_TO, 'DurableGoods', 'durable_goods_dgID'),
			'tbUserU' => array(self::BELONGS_TO, 'TbUser', 'tb_user_uID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'hrID' => 'รหัส',
			'hrWornOut' => 'ชำรุด',
			'dateWornOut' => 'วันที่ชำรุด',
			'hrRepair' => 'รายละเอียดการซ่อม',
			'dateRepair' => 'วันที่ซ่อม',
			'priceRepair' => 'รายจ่ายในการซ่อม',
			'durable_goods_dgID' => 'Durable Goods Dg',
			'tb_user_uID' => 'Tb User U',
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

		$criteria->compare('hrID',$this->hrID);
		$criteria->compare('hrWornOut',$this->hrWornOut,true);
		$criteria->compare('dateWornOut',$this->dateWornOut,true);
		$criteria->compare('hrRepair',$this->hrRepair,true);
		$criteria->compare('dateRepair',$this->dateRepair,true);
		$criteria->compare('priceRepair',$this->priceRepair,true);
		$criteria->compare('durable_goods_dgID',$this->durable_goods_dgID);
		$criteria->compare('tb_user_uID',$this->tb_user_uID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HistoryRepair the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
