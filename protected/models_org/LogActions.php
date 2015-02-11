<?php

/**
 * This is the model class for table "log_actions".
 *
 * The followings are the available columns in table 'log_actions':
 * @property integer $logID
 * @property string $logTimeStamp
 * @property integer $durable_goods_dgID
 * @property integer $actions_actionID
 * @property integer $tb_user_uID
 *
 * The followings are the available model relations:
 * @property Actions $actionsAction
 * @property DurableGoods $durableGoodsDg
 * @property TbUser $tbUserU
 */
class LogActions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'log_actions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('durable_goods_dgID, actions_actionID, tb_user_uID', 'required'),
			array('durable_goods_dgID, actions_actionID, tb_user_uID', 'numerical', 'integerOnly'=>true),
			array('logTimeStamp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('logID, logTimeStamp, durable_goods_dgID, actions_actionID, tb_user_uID', 'safe', 'on'=>'search'),
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
			'actionsAction' => array(self::BELONGS_TO, 'Actions', 'actions_actionID'),
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
			'logID' => 'รหัส',
			'logTimeStamp' => 'วันเวลา',
			'durable_goods_dgID' => 'Durable Goods Dg',
			'actions_actionID' => 'Actions Action',
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

		$criteria->compare('logID',$this->logID);
		$criteria->compare('logTimeStamp',$this->logTimeStamp,true);
		$criteria->compare('durable_goods_dgID',$this->durable_goods_dgID);
		$criteria->compare('actions_actionID',$this->actions_actionID);
		$criteria->compare('tb_user_uID',$this->tb_user_uID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LogActions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
