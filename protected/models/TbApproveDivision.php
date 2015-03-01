<?php

/**
 * This is the model class for table "tb_approve_division".
 *
 * The followings are the available columns in table 'tb_approve_division':
 * @property integer $id
 * @property integer $asset_id
 * @property string $app_status
 * @property integer $int_id
 */
class TbApproveDivision extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_approve_division';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('asset_id, app_status, int_id', 'required'),
			array('asset_id, int_id', 'numerical', 'integerOnly'=>true),
			array('app_status', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, asset_id, app_status, int_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'asset_id' => 'id asset',
			'app_status' => 'status',
			'int_id' => 'รหัสโครงการ',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('asset_id',$this->asset_id);
		$criteria->compare('app_status',$this->app_status,true);
		$criteria->compare('int_id',$this->int_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TbApproveDivision the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
