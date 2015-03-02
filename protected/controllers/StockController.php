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
        $load = new LoadData();
        
        $db = Yii::app()->db;
        
        $sql = "SELECT COUNT(raw_id) AS c_num FROM tb_asset_raw,tb_division,tb_institution "
                . "WHERE raw_int_id = tb_institution.institution_id "
                . "AND tb_division.division_id = tb_division_division_id "
                . "AND raw_status = 3 "
                . "AND tb_institution.institution_id =" . $load->loadInstitutionID() . " ";
        
        $data = $db->createCommand($sql)->queryAll();
        
        echo $data[0]['c_num'];
    }
    
    public function actionConMessage2(){
        
        $load = new LoadData();
        
        $db = Yii::app()->db;
        
        $sql = "SELECT *,tb_asset.asset_id AS a_id FROM tb_asset,tb_nature_asset,tb_type_asset,tb_division,tb_institution "
                . "WHERE tb_division.division_id = tb_division_division_id "
                . "AND tb_institution_institution_id = tb_institution.institution_id "
                . "AND tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                . "AND asset = 1 "
                . "AND tb_status_status = 'ขึ้นทะเบียนสำเร็จ' "
                . "AND tb_institution_institution_id =" . $load->loadInstitutionID() . " "
                . "ORDER BY date_asset DESC "
                . "LIMIT 0,3";
        
        
        $data = $db->createCommand($sql)->queryAll();
        
        foreach ($data AS $r){
            echo '<li>';
            echo '<a href="'.Yii::app()->homeUrl.'/Asset/ShowListStock">';
            echo    '<div class="message">';
            echo        '<span class="message-sender">';
            echo            'ขึ้นทะเบียนสำเร็จ';
            echo        '</span>';
            echo        '<span class="message-subject">';
            echo            $r['nature_asset'].'<br>'.$r['type_asset'];
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
    
    public function actionNotificationType4(){
        
        $db = Yii::app()->db;
        
        //$sql = "SELECT COUNT(asset_id) AS c_num FROM tb_asset WHERE asset = 1 AND tb_status_status = 'ขอขึ้นทะเบียน'";
        $sql = "SELECT COUNT(asset_id) AS c_num FROM tb_approve_division WHERE app_status = '1'";
        
        $data = $db->createCommand($sql)->queryAll();
        
        echo $data[0]['c_num'];
    }
    
    public function actionConMessage4(){
        $db = Yii::app()->db;
        
        $sql = "SELECT *,tb_asset.asset_id AS a_id FROM tb_asset,tb_institution,tb_division,tb_approve_division "
                . "WHERE tb_division.division_id = tb_division_division_id "
                . "AND tb_institution_institution_id = tb_institution.institution_id "
                . "AND asset = 1 "
                . "AND tb_status_status = 'ขอขึ้นทะเบียน' "
                . "AND app_status = '1' "
                . "AND tb_approve_division.asset_id = tb_asset.asset_id "
                . "ORDER BY tb_asset.asset_id DESC "
                . "LIMIT 0,3";
        
        
        $data = $db->createCommand($sql)->queryAll();
        
        foreach ($data AS $r){
            echo '<li>';
            echo '<a href="'.Yii::app()->homeUrl.'/Stock/ApprovePD?assetID='.$r['a_id'].'">';
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
        
        /*
        $sql = "SELECT COUNT(tb_asset.asset_id) AS c_num FROM tb_asset,tb_institution,tb_division "
                . "WHERE asset = 1 "
                . "AND tb_status_status = 'ขอขึ้นทะเบียน' "
                . "AND tb_institution_institution_id = tb_institution.institution_id "
                . "AND tb_division.division_id = tb_division_division_id "
                . "AND tb_division.division_id =" . $load->loadDivisionID() . " ";
         * 
         */
        
        $sql = "SELECT COUNT(raw_id) AS c_num FROM tb_asset_raw,tb_division,tb_institution "
                . "WHERE raw_int_id = tb_institution.institution_id "
                . "AND tb_division.division_id = tb_division_division_id "
                . "AND raw_status = 1 "
                . "AND tb_division.division_id =" . $load->loadDivisionID() . " ";
        
        $data = $db->createCommand($sql)->queryAll();
        
        echo $data[0]['c_num'];
    }
    
    public function actionConMessage3(){
        
        $load = new LoadData();
        
        $db = Yii::app()->db;
        
        $sql = "SELECT *,tb_asset.asset_id AS a_id FROM tb_asset,tb_institution,tb_division "
                . "WHERE tb_division.division_id = tb_division_division_id "
                . "AND tb_institution_institution_id = tb_institution.institution_id "
                . "AND asset = 1 "
                . "AND tb_status_status = 'ขอขึ้นทะเบียน' "
                . "AND tb_division.division_id =" . $load->loadDivisionID() . " "
                . "ORDER BY a_id DESC "
                . "LIMIT 0,3";
        
        
        $data = $db->createCommand($sql)->queryAll();
        
        foreach ($data AS $r){
            echo '<li>';
            echo '<a href="'.Yii::app()->homeUrl.'/Stock/ApproveDivision?assetID='.$r['a_id'].'">';
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
    
    public function actionApproveDivision(){
        if($_GET){
            $Nfunc = new NFunc();
            
            $assetID = $_GET['assetID'];
            
            $Nfunc->setCookieData('assetID', (60*60*24), $assetID);
            
            $this->render('//Stock/ApproveDivision');
        }
    }
    
    public function actionApproveDivisionSuccess(){
        if(isset($_COOKIE['assetID'])){
            $Nfunc = new NFunc();
            $load = new LoadData();
            
            $assetID = $Nfunc->getCookieData('assetID');
            
            $model = new TbApproveDivision();
            
            
            $model->asset_id = $assetID;
            $model->int_id = $load->loadInstitutionID();
            $model->app_status = '1';
            
            
            if($model->save()){
                
                $modelRaw = TbAssetRaw::model()->findByPk($assetID);
                $modelRaw->raw_status = '2';
                
                $modelRaw->save();
                
                echo '1';
            }else {
                echo 0;
            }
        }
    }
    
    public function actionApprovePD(){
        if($_GET){
            $Nfunc = new NFunc();
            
            $assetID = $_GET['assetID'];
            
            $Nfunc->setCookieData('assetID', (60*60*24), $assetID);
            
            $this->render('//Stock/ApprovePD');
        }
    }
    
    public function actionApprovePDSuccess(){
        if(isset($_COOKIE['assetID'])){
            $Nfunc = new NFunc();
            $load = new LoadData();
            
            $assetID = $Nfunc->getCookieData('assetID');
            
            $model = TbApproveDivision::model()->findByPk($assetID);
            
            $model->app_status = '2';
            
            
            if($model->save()){
                
                $this->GenIDStock($assetID);
                
                $modelRaw = TbAssetRaw::model()->findByPk($assetID);
                $modelRaw->raw_status = '3';
                
                $modelRaw->save();
                
                echo '1';
            }else {
                echo 0;
            }
        }
    }
    
    public function GenIDStock($aid = NULL){
        $model = TbAsset::model()->findByPk($aid);
        
        $db = Yii::app()->db;
        
        $sql = "SELECT * FROM tb_stocks WHERE tb_asset_asset_id = ".$aid;
        
        $data = $db->createCommand($sql)->queryAll();
        
        $AMS = new AMS();
        
        $nt = TbNatureAsset::model()->findByPk($model->tb_nature_asset_nature_asset_id);
        
        foreach ($data AS $r){
            $id = $AMS->createAssetID($nt->tb_type_asset_type_asset_id, $model->year_cost);
            
            $stock = TbStocks::model()->findByPk($r['stock_id']);
            
            $stock->asset_code = $id;
            $stock->save();
        }
        
        $dateNow = date('Y-m-d h:i:s');

        $model->date_asset = $dateNow;
        $model->tb_status_status = 'ขึ้นทะเบียนสำเร็จ';
        
        $model->save();
    }


    public function actionShowIDStockApprove(){
        if(isset($_COOKIE['assetID'])){
            $Nfunc = new NFunc();
            
            $assetID = $Nfunc->getCookieData('assetID');
            
            $sql = "SELECT * FROM tb_stocks WHERE tb_asset_asset_id = ".$assetID;
            
            $db = Yii::app()->db;
        
            $data = $db->createCommand($sql)->queryAll();

            //echo json_encode($data);
            
            $i = 1;
            
            foreach ($data AS $r){
                echo '<tr>';
                echo    '<td>'.$i.'</td>';
                echo    '<td>'.$r['machine_code'].'</td>';
                echo    '<td>'.$r['asset_code'].'</td>';
                echo    '<td>'.$r['tb_status_status'].'</td>';
                echo '</tr>';
                
                $i++;
            }
        }
    }
}
