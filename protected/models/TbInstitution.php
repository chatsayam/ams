<?php

/**
 * This is the model class for table "tb_institution".
 *
 * The followings are the available columns in table 'tb_institution':
 * @property integer $institution_id
 * @property string $institution
 * @property string $ins_institution_code
 * @property string $ins_cost_code
 * @property string $ins_issue_code
 * @property string $ins_purchase_code
 * @property integer $tb_division_division_id
 *
 * The followings are the available model relations:
 * @property TbAsset[] $tbAssets
 * @property TbDivision $tbDivisionDivision
 * @property TbUser[] $tbUsers
 */
class TbInstitution extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_institution';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ins_institution_code, ins_cost_code, ins_issue_code, ins_purchase_code, tb_division_division_id', 'required'),
			array('tb_division_division_id', 'numerical', 'integerOnly'=>true),
			array('institution', 'length', 'max'=>200),
			array('ins_institution_code, ins_cost_code, ins_issue_code, ins_purchase_code', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('institution_id, institution, ins_institution_code, ins_cost_code, ins_issue_code, ins_purchase_code, tb_division_division_id', 'safe', 'on'=>'search'),
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
			'tbAssets' => array(self::HAS_MANY, 'TbAsset', 'tb_institution_institution_id'),
			'tbDivisionDivision' => array(self::BELONGS_TO, 'TbDivision', 'tb_division_division_id'),
			'tbUsers' => array(self::HAS_MANY, 'TbUser', 'tb_institution_institution_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'institution_id' => 'Institution',
			'institution' => 'Institution',
			'ins_institution_code' => 'Ins Institution Code',
			'ins_cost_code' => 'Ins Cost Code',
			'ins_issue_code' => 'Ins Issue Code',
			'ins_purchase_code' => 'Ins Purchase Code',
			'tb_division_division_id' => 'Tb Division Division',
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

		$criteria->compare('institution_id',$this->institution_id);
		$criteria->compare('institution',$this->institution,true);
		$criteria->compare('ins_institution_code',$this->ins_institution_code,true);
		$criteria->compare('ins_cost_code',$this->ins_cost_code,true);
		$criteria->compare('ins_issue_code',$this->ins_issue_code,true);
		$criteria->compare('ins_purchase_code',$this->ins_purchase_code,true);
		$criteria->compare('tb_division_division_id',$this->tb_division_division_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TbInstitution the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
