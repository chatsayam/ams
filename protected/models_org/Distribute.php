<?php

/**
 * This is the model class for table "distribute".
 *
 * The followings are the available columns in table 'distribute':
 * @property integer $dID
 * @property string $dPrice
 * @property string $dTimeStamp
 * @property integer $durable_goods_dgID
 * @property integer $tb_user_uID
 *
 * The followings are the available model relations:
 * @property DurableGoods $durableGoodsDg
 * @property TbUser $tbUserU
 */
class Distribute extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'distribute';
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
			array('dPrice', 'length', 'max'=>13),
			array('dTimeStamp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('dID, dPrice, dTimeStamp, durable_goods_dgID, tb_user_uID', 'safe', 'on'=>'search'),
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
			'dID' => 'D',
			'dPrice' => 'D Price',
			'dTimeStamp' => 'D Time Stamp',
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

		$criteria->compare('dID',$this->dID);
		$criteria->compare('dPrice',$this->dPrice,true);
		$criteria->compare('dTimeStamp',$this->dTimeStamp,true);
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
	 * @return Distribute the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
