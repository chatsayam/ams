<?php

/**
 * This is the model class for table "name_goods".
 *
 * The followings are the available columns in table 'name_goods':
 * @property integer $ngID
 * @property string $ngName
 * @property integer $type_goods_tgID
 *
 * The followings are the available model relations:
 * @property TypeGoods $typeGoodsTg
 * @property PopertyGoods[] $popertyGoods
 */
class NameGoods extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'name_goods';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_goods_tgID', 'required'),
			array('type_goods_tgID', 'numerical', 'integerOnly'=>true),
			array('ngName', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ngID, ngName, type_goods_tgID', 'safe', 'on'=>'search'),
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
			'typeGoodsTg' => array(self::BELONGS_TO, 'TypeGoods', 'type_goods_tgID'),
			'popertyGoods' => array(self::HAS_MANY, 'PopertyGoods', 'name_goods_ngID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ngID' => 'ID',
			'ngName' => 'ชื่อครุภัณฑ์',
			'type_goods_tgID' => 'Type Goods Tg',
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

		$criteria->compare('ngID',$this->ngID);
		$criteria->compare('ngName',$this->ngName,true);
		$criteria->compare('type_goods_tgID',$this->type_goods_tgID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NameGoods the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
