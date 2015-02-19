<?php

class StockController extends Controller {

    public function actionAddStock() {
        $getAsset = TbGetAsset::model()->findAll();
        $typeCost = TbTypeCost::model()->findAll();
        $purchase = TbPurchase::model()->findAll();
        $typeAsset = TbTypeAsset::model()->findAll();
        //$natureAsset = TbNatureAsset::model()->findAll();
        //$status_s = TbStatus::model()->findAll();

        $db = Yii::app()->db;
        $sql = "SELECT * FROM tb_status WHERE status_index = '1' ";
        $status = $db->createCommand($sql)->queryAll();

        $this->render('//stock/addStock', array(
            'getAsset' => $getAsset,
            'typeCost' => $typeCost,
            'purchase' => $purchase,
            'typeAsset' => $typeAsset,
            //'natureAsset' => $natureAsset,
            'status' => $status
        ));
        //$this->render('//stock/addStock');
    }
    
    public function actionListNatureAsset() {
        $Nfunc = new NFunc();
        $condition = array('tb_type_asset_type_asset_id' => $_POST['id']);
        $natureAsset = TbNatureAsset::model()->findAllByAttributes($condition);
        echo CJSON::encode($Nfunc->convertModelToArray($natureAsset));
    }

    public function actionindex() {
        
    }

    public function actionRequestStock(){
        
        $load = new LoadData();
        
        $int_id = $load->loadInstitutionID();
        
        $typeAsset = TbTypeAsset::model()->findAll();
        
        $db = Yii::app()->db;
        
        //$sql = "SELECT * FROM tb_asset WHERE tb_institution_institution_id = ".$int_id . " AND tb_status_status = 'ขอขึ้นทะเบียน'";
        
        $sql = "SELECT * FROM tb_asset,tb_nature_asset,tb_type_asset WHERE "
                        . "tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                        . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                        . " AND tb_institution_institution_id = ".$int_id
                        . " AND tb_asset.tb_status_status = 'ขอขึ้นทะเบียน' "
                        . "ORDER BY date_asset DESC";
        
        $data = $db->createCommand($sql)->queryAll();
        
        $this->render('//Stock/RequestStock',array(
            'typeAsset' => $typeAsset,
            'data' => $data
        ));
    }
}
