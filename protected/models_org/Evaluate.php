<?php

/**
 * This is the model class for table "evaluate".
 *
 * The followings are the available columns in table 'evaluate':
 * @property integer $evID
 * @property string $evTimeStamp
 * @property integer $action_evaluate_aevID
 * @property integer $committee_cmID
 * @property integer $durable_goods_dgID
 *
 * The followings are the available model relations:
 * @property ActionEvaluate $actionEvaluateAev
 * @property Committee $committeeCm
 * @property DurableGoods $durableGoodsDg
 */
class Evaluate extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evaluate';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('action_evaluate_aevID, committee_cmID, durable_goods_dgID', 'required'),
			array('action_evaluate_aevID, committee_cmID, durable_goods_dgID', 'numerical', 'integerOnly'=>true),
			array('evTimeStamp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('evID, evTimeStamp, action_evaluate_aevID, committee_cmID, durable_goods_dgID', 'safe', 'on'=>'search'),
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
			'actionEvaluateAev' => array(self::BELONGS_TO, 'ActionEvaluate', 'action_evaluate_aevID'),
			'committeeCm' => array(self::BELONGS_TO, 'Committee', 'committee_cmID'),
			'durableGoodsDg' => array(self::BELONGS_TO, 'DurableGoods', 'durable_goods_dgID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'evID' => 'รหัส',
			'evTimeStamp' => 'เวลาประเมิน',
			'action_evaluate_aevID' => 'Action Evaluate Aev',
			'committee_cmID' => 'Committee Cm',
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

		$criteria->compare('evID',$this->evID);
		$criteria->compare('evTimeStamp',$this->evTimeStamp,true);
		$criteria->compare('action_evaluate_aevID',$this->action_evaluate_aevID);
		$criteria->compare('committee_cmID',$this->committee_cmID);
		$criteria->compare('durable_goods_dgID',$this->durable_goods_dgID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Evaluate the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
