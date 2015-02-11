<?php

/**
 * This is the model class for table "usability".
 *
 * The followings are the available columns in table 'usability':
 * @property integer $usID
 * @property string $lifetime
 * @property string $depreciation
 * @property string $depreciationSum
 * @property string $yearly
 * @property string $usTimeStamp
 * @property integer $durable_goods_dgID
 *
 * The followings are the available model relations:
 * @property DurableGoods $durableGoodsDg
 */
class Usability extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usability';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('durable_goods_dgID', 'required'),
			array('durable_goods_dgID', 'numerical', 'integerOnly'=>true),
			array('lifetime', 'length', 'max'=>2),
			array('depreciation', 'length', 'max'=>15),
			array('depreciationSum', 'length', 'max'=>20),
			array('yearly', 'length', 'max'=>4),
			array('usTimeStamp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usID, lifetime, depreciation, depreciationSum, yearly, usTimeStamp, durable_goods_dgID', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usID' => 'รหัส',
			'lifetime' => 'อายุการใช้งาน',
			'depreciation' => 'ค่าเสื่อมราคา',
			'depreciationSum' => 'ค่าเสื่อมราคาสะสม',
			'yearly' => 'รายปี',
			'usTimeStamp' => 'วันที่กระทำ',
			'durable_goods_dgID' => 'Durable Goods Dg',
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

		$criteria->compare('usID',$this->usID);
		$criteria->compare('lifetime',$this->lifetime,true);
		$criteria->compare('depreciation',$this->depreciation,true);
		$criteria->compare('depreciationSum',$this->depreciationSum,true);
		$criteria->compare('yearly',$this->yearly,true);
		$criteria->compare('usTimeStamp',$this->usTimeStamp,true);
		$criteria->compare('durable_goods_dgID',$this->durable_goods_dgID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usability the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
