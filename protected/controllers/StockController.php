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
    
    public function actionRequestStockList(){
        $Nfunc = new NFunc();
        $load = new LoadData();
        
        $int_id = $load->loadInstitutionID();
        
        $db = Yii::app()->db;
        
        if ($_POST['nt_id']) {
            $sql = "SELECT * FROM tb_asset,tb_nature_asset,tb_type_asset WHERE "
                    . "tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                    . "AND tb_type_asset.type_asset_id = " . $_POST['nt_id']
                    . " AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                    . " AND tb_institution_institution_id = " . $int_id
                    . " AND tb_asset.tb_status_status = 'ขอขึ้นทะเบียน' "
                    . "ORDER BY date_asset DESC";
        }
        if ($_POST['na_id']) {
            $sql = "SELECT * FROM tb_asset,tb_nature_asset,tb_type_asset WHERE "
                    . "tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                    . "AND tb_nature_asset.nature_asset_id = " . $_POST['na_id']
                    . " AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                    . " AND tb_institution_institution_id = " . $int_id
                    . " AND tb_asset.tb_status_status = 'ขอขึ้นทะเบียน' "
                    . "ORDER BY date_asset DESC";
        }

        $data = $db->createCommand($sql)->queryAll();
        
        $i = 1;
        foreach ($data AS $r) {

            echo '<tr>'
            . '<td>' . $i . '</td>'
            . '<td>' . $r['register_code'] . '</td>'
            . '<td>' . $Nfunc->getDateThaiBH($Nfunc->convertSQLToDate($r['date_asset'])) . '</td>'
            . '<td>' . $r['specification_code'] . '</td>'
            . '<td>' . $r['report_pd01_code'] . '</td>'
            . '<td>' . $r['type_asset'] . '</td>'
            . '<td>' . $r['nature_asset'] . '</td>'
            . '<td>' . number_format($r['price_per'], 2) . '</td>'
            . '<td>'
            . '</td>'
            . '<td>'
            . '<button type="button" class="btn btn-success editListPro" data-id="' . $r['asset_id'] . '" title="แก้ไขคำขอ"><i class="glyphicon glyphicon-edit"></i></button>'
            . '<button type="button" class="btn btn-danger deleteListPro" data-id="' . $r['asset_id'] . '" title="ยกเลิกคำขอ"><i class="glyphicon glyphicon-remove"></i></button>'
            . '</td>'
            . '</tr>';

            $i++;
        }
    }
    
    public function actionNotificationType2(){
        echo 2;
    }
    
    public function actionNotificationType4(){
        echo 5;
    }


    public function actionTan(){
        
    }
}
