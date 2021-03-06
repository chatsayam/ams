<?php

/**
 * This is the model class for table "tb_type_asset".
 *
 * The followings are the available columns in table 'tb_type_asset':
 * @property integer $type_asset_id
 * @property string $type_asset
 * @property string $type_asset_code
 *
 * The followings are the available model relations:
 * @property TbNatureAsset[] $tbNatureAssets
 */
class TbTypeAsset extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tb_type_asset';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('type_asset', 'length', 'max'=>200),
            array('type_asset_code', 'length', 'max'=>4),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('type_asset_id, type_asset, type_asset_code', 'safe', 'on'=>'search'),
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
            'tbNatureAssets' => array(self::HAS_MANY, 'TbNatureAsset', 'tb_type_asset_type_asset_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'type_asset_id' => 'Type Asset',
            'type_asset' => 'Type Asset',
            'type_asset_code' => 'รหัส GFMIS 4 ตัวหลัก',
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

        $criteria->compare('type_asset_id',$this->type_asset_id);
        $criteria->compare('type_asset',$this->type_asset,true);
        $criteria->compare('type_asset_code',$this->type_asset_code,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TbTypeAsset the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
