<?php

/**
 * This is the model class for table "poperty_goods".
 *
 * The followings are the available columns in table 'poperty_goods':
 * @property integer $popID
 * @property string $popName
 * @property integer $name_goods_ngID
 *
 * The followings are the available model relations:
 * @property NameGoods $nameGoodsNg
 * @property StockMaterial[] $stockMaterials
 */
class PopertyGoods extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'poperty_goods';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_goods_ngID', 'required'),
			array('name_goods_ngID', 'numerical', 'integerOnly'=>true),
			array('popName', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('popID, popName, name_goods_ngID', 'safe', 'on'=>'search'),
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
			'nameGoodsNg' => array(self::BELONGS_TO, 'NameGoods', 'name_goods_ngID'),
			'stockMaterials' => array(self::HAS_MANY, 'StockMaterial', 'poperty_goods_popID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'popID' => 'ID',
			'popName' => 'คุณสมบัติครุภัณฑ์',
			'name_goods_ngID' => 'Name Goods Ng',
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

		$criteria->compare('popID',$this->popID);
		$criteria->compare('popName',$this->popName,true);
		$criteria->compare('name_goods_ngID',$this->name_goods_ngID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PopertyGoods the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
