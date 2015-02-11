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
 * @property integer $office_station_osID
 * @property integer $user_types_id
 *
 * The followings are the available model relations:
 * @property Committee[] $committees
 * @property Distribute[] $distributes
 * @property DurableGoods[] $durableGoods
 * @property HistoryRepair[] $historyRepairs
 * @property LogActions[] $logActions
 * @property StockMaterial[] $stockMaterials
 * @property OfficeStation $officeStationOs
 * @property UserTypes $userTypes
 * @property TranferHistory[] $tranferHistories
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
                                        array('uniqCode, office_station_osID, user_types_id', 'required'),
                                        array('office_station_osID, user_types_id', 'numerical', 'integerOnly' => true),
                                        array('uniqCode', 'length', 'max' => 13),
                                        array('fullname', 'length', 'max' => 100),
                                        array('email, username', 'length', 'max' => 45),
                                        array('passwords', 'length', 'max' => 300),
                                        // The following rule is used by search().
                                        // @todo Please remove those attributes that should not be searched.
                                        array('uID, uniqCode, fullname, email, username, passwords, office_station_osID, user_types_id', 'safe', 'on'=>'search'),
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
			'committees' => array(self::HAS_MANY, 'Committee', 'tb_user_uID'),
			'distributes' => array(self::HAS_MANY, 'Distribute', 'tb_user_uID'),
			'durableGoods' => array(self::HAS_MANY, 'DurableGoods', 'tb_user_uID'),
			'historyRepairs' => array(self::HAS_MANY, 'HistoryRepair', 'tb_user_uID'),
			'logActions' => array(self::HAS_MANY, 'LogActions', 'tb_user_uID'),
			'stockMaterials' => array(self::HAS_MANY, 'StockMaterial', 'tb_user_uID'),
			'officeStationOs' => array(self::BELONGS_TO, 'OfficeStation', 'office_station_osID'),
			'userTypes' => array(self::BELONGS_TO, 'UserTypes', 'user_types_id'),
			'tranferHistories' => array(self::HAS_MANY, 'TranferHistory', 'tb_user_uID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uID' => 'ID',
			'uniqCode' => 'รหัสประจำตัวประชาชน',
			'fullname' => 'ชื่อ - สกุล',
			'email' => 'Email',
			'username' => 'Username',
			'passwords' => 'Passwords',
			'office_station_osID' => 'โครงการ/หน่วยงาน',
			'user_types_id' => 'ประเภทผู้ใช้',
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
		$criteria->compare('office_station_osID',$this->office_station_osID);
		$criteria->compare('user_types_id',$this->user_types_id);

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
            return $this->passwords === $password;
        }
}
