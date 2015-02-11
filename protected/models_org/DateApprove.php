<?php

/**
 * This is the model class for table "date_approve".
 *
 * The followings are the available columns in table 'date_approve':
 * @property integer $daID
 * @property string $dateApproveNumber
 * @property string $dateApprove
 * @property integer $stock_material_stockID
 *
 * The followings are the available model relations:
 * @property StockMaterial $stockMaterialStock
 */
class DateApprove extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'date_approve';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('stock_material_stockID', 'required'),
			array('stock_material_stockID', 'numerical', 'integerOnly'=>true),
			array('dateApproveNumber', 'length', 'max'=>45),
			array('dateApprove', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('daID, dateApproveNumber, dateApprove, stock_material_stockID', 'safe', 'on'=>'search'),
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
			'stockMaterialStock' => array(self::BELONGS_TO, 'StockMaterial', 'stock_material_stockID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'daID' => 'ID',
			'dateApproveNumber' => 'เลขที่กองผู้ควบคุม',
			'dateApprove' => 'กองผู้ควบคุมลงวันที่',
			'stock_material_stockID' => 'Stock Material Stock',
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

		$criteria->compare('daID',$this->daID);
		$criteria->compare('dateApproveNumber',$this->dateApproveNumber,true);
		$criteria->compare('dateApprove',$this->dateApprove,true);
		$criteria->compare('stock_material_stockID',$this->stock_material_stockID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DateApprove the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
