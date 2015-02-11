<?php

/**
 * This is the model class for table "log_activity".
 *
 * The followings are the available columns in table 'log_activity':
 * @property integer $id
 * @property string $log_activity
 * @property string $date_activity
 * @property string $log_list
 * @property integer $tb_user_uID
 *
 * The followings are the available model relations:
 * @property TbUser $tbUserU
 */
class LogActivity extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'log_activity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tb_user_uID', 'required'),
			array('tb_user_uID', 'numerical', 'integerOnly'=>true),
			array('log_activity', 'length', 'max'=>100),
			array('date_activity, log_list', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, log_activity, date_activity, log_list, tb_user_uID', 'safe', 'on'=>'search'),
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
			'tbUserU' => array(self::BELONGS_TO, 'TbUser', 'tb_user_uID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'id',
			'log_activity' => 'Log Activity',
			'date_activity' => 'Date Activity',
			'log_list' => 'Log List',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('log_activity',$this->log_activity,true);
		$criteria->compare('date_activity',$this->date_activity,true);
		$criteria->compare('log_list',$this->log_list,true);
		$criteria->compare('tb_user_uID',$this->tb_user_uID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LogActivity the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
