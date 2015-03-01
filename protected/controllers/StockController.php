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

    public function actionRequestStock(){//RequestStock
        
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
    
    public function actionRequestStockListDivision(){
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
        echo 0;
    }
    
    public function actionNotificationType4(){
        
        $db = Yii::app()->db;
        
        $sql = "SELECT COUNT(asset_id) AS c_num FROM tb_asset WHERE asset = 1 AND tb_status_status = 'ขอขึ้นทะเบียน'";
        
        
        $data = $db->createCommand($sql)->queryAll();
        
        echo $data[0]['c_num'];
    }
    
    public function actionConMessage4(){
        $db = Yii::app()->db;
        
        $sql = "SELECT * FROM tb_asset,tb_institution,tb_division "
                . "WHERE tb_division.division_id = tb_division_division_id "
                . "AND tb_institution_institution_id = tb_institution.institution_id "
                . "AND asset = 1 AND tb_status_status = 'ขอขึ้นทะเบียน' "
                . "ORDER BY asset_id DESC "
                . "LIMIT 0,3";
        
        
        $data = $db->createCommand($sql)->queryAll();
        
        foreach ($data AS $r){
            echo '<li>';
            echo '<a href="#">';
            echo    '<div class="message">';
            echo        '<span class="message-sender">';
            echo            'ขอขึ้นทะเบียน';
            echo        '</span>';
            echo        '<span class="message-subject">';
            echo            $r['institution'].'<br>'.$r['division'];
            echo        '</span>';
            echo    '</div>';
            echo '</a>';
            echo '</li>';
        }
        
        echo '<li>';
        echo    '<a href="#">';
        echo        '<div class="message">';
        echo            '<strong>แจ้งเตือนทั้งหมด</strong>';
        echo        '</div>';
        echo    '</a>';
        echo '</li>';
    }
    
    public function actionNotificationType3(){
        
        $load = new LoadData();
        
        $db = Yii::app()->db;
        
        $sql = "SELECT COUNT(asset_id) AS c_num FROM tb_asset,tb_institution,tb_division "
                . "WHERE asset = 1 AND tb_status_status = 'ขอขึ้นทะเบียน' "
                . "AND tb_institution_institution_id = tb_institution.institution_id "
                . "AND tb_division.division_id = tb_division_division_id "
                . "AND tb_division.division_id =" . $load->loadDivisionID() . " ";
        
        
        $data = $db->createCommand($sql)->queryAll();
        
        echo $data[0]['c_num'];
    }
    
    public function actionConMessage3(){
        $db = Yii::app()->db;
        
        $sql = "SELECT * FROM tb_asset,tb_institution,tb_division "
                . "WHERE tb_division.division_id = tb_division_division_id "
                . "AND tb_institution_institution_id = tb_institution.institution_id "
                . "AND asset = 1 AND tb_status_status = 'ขอขึ้นทะเบียน' "
                . "ORDER BY asset_id DESC "
                . "LIMIT 0,3";
        
        
        $data = $db->createCommand($sql)->queryAll();
        
        foreach ($data AS $r){
            echo '<li>';
            echo '<a href="#">';
            echo    '<div class="message">';
            echo        '<span class="message-sender">';
            echo            'ขอขึ้นทะเบียน';
            echo        '</span>';
            echo        '<span class="message-subject">';
            echo            $r['institution'].'<br>'.$r['division'];
            echo        '</span>';
            echo    '</div>';
            echo '</a>';
            echo '</li>';
        }
        
        echo '<li>';
        echo    '<a href="#">';
        echo        '<div class="message">';
        echo            '<strong>แจ้งเตือนทั้งหมด</strong>';
        echo        '</div>';
        echo    '</a>';
        echo '</li>';
    }

    public function actionTan(){
        
    }
}
