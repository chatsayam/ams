<?php

/**
 * This is the model class for table "tb_user".
 *
 * The followings are the available columns in table 'tb_user':
 * @property integer $uID
 * @property string $uniqCode
 * @property string $fullname
 * @property string $email
 * @property string $username
 * @property string $passwords
 * @property string $date_add
 * @property string $date_edit
 * @property integer $user_types_id
 * @property integer $tb_institution_institution_id
 *
 * The followings are the available model relations:
 * @property LogActivity[] $logActivities
 * @property TbInstitution $tbInstitutionInstitution
 * @property UserTypes $userTypes
 */
class TbUser extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_types_id, tb_institution_institution_id', 'required'),
			array('user_types_id, tb_institution_institution_id', 'numerical', 'integerOnly'=>true),
			array('uniqCode', 'length', 'max'=>13),
			array('fullname, email, username', 'length', 'max'=>100),
			array('passwords', 'length', 'max'=>400),
			array('date_add, date_edit', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('uID, uniqCode, fullname, email, username, passwords, date_add, date_edit, user_types_id, tb_institution_institution_id', 'safe', 'on'=>'search'),
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
			'logActivities' => array(self::HAS_MANY, 'LogActivity', 'tb_user_uID'),
			'tbInstitutionInstitution' => array(self::BELONGS_TO, 'TbInstitution', 'tb_institution_institution_id'),
			'userTypes' => array(self::BELONGS_TO, 'UserTypes', 'user_types_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uID' => 'User id',
			'uniqCode' => 'รหัสประจำตัวประชาชน',
			'fullname' => 'ชื่อ - สกุล',
			'email' => 'email',
			'username' => 'ชื่อผู้ใช้',
			'passwords' => 'รหัสผ่าน',
			'date_add' => 'วันที่เพิ่ม',
			'date_edit' => 'วันที่แก้ไข',
			'user_types_id' => 'ประเภทผู้ใช้',
			'tb_institution_institution_id' => 'หน่วยงาน',
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

		$criteria->compare('uID',$this->uID);
		$criteria->compare('uniqCode',$this->uniqCode,true);
		$criteria->compare('fullname',$this->fullname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('passwords',$this->passwords,true);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('date_edit',$this->date_edit,true);
		$criteria->compare('user_types_id',$this->user_types_id);
		$criteria->compare('tb_institution_institution_id',$this->tb_institution_institution_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TbUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function validatePassword($password){
            return $this->passwords === hash('sha512', $password);
        }
}
