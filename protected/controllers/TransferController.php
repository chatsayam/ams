<?php

class TransferController extends Controller {
    public function actionRequest(){
        
        $TbTypeAsset = TbTypeAsset::model()->findAll();
        $TbDivision = TbDivision::model()->findAll();
        
        $this->render('//Transfer/Request',array(
            'TbTypeAsset'=>$TbTypeAsset,
            'TbDivision'=>$TbDivision
        ));
        
    }
    
    public function actionTbNatureAsset(){
        $db = Yii::app()->db;
        $sql = "SELECT * FROM tb_nature_asset WHERE tb_type_asset_type_asset_id=".$_POST['id'];
        $result = $db->createCommand($sql)->queryAll();
        echo json_encode($result);
    }
    
    public function actionTbInstitution(){
        $db = Yii::app()->db;
        $sql = "SELECT * FROM tb_institution WHERE tb_division_division_id=".$_POST['id'];
        $result = $db->createCommand($sql)->queryAll();
        echo json_encode($result);
    }
    
    public function actionSearchAsset(){
        $dataUser = TbUser::model()->findByPk(Yii::app()->user->id);
        
        $db = Yii::app()->db;
        //$sql = "SELECT *,(SELECT transfer_id FROM tb_transfer WHERE tb_stocks_stock_id=tb_stocks.stock_id AND tb_institution_institution_id=".$dataUser->tb_institution_institution_id." AND transfer_code IS NULL) AS chRequest FROM tb_asset,tb_type_asset,tb_nature_asset,tb_division,tb_institution,tb_stocks WHERE tb_asset.tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id AND tb_asset.tb_institution_institution_id = tb_institution.institution_id AND tb_type_asset.type_asset_id = tb_nature_asset.tb_type_asset_type_asset_id AND tb_division.division_id = tb_institution.tb_division_division_id AND tb_asset.asset_id=tb_stocks.tb_asset_asset_id";
        $sql = "SELECT * FROM tb_asset,tb_stocks,tb_division,tb_institution,tb_type_asset,tb_nature_asset "
                . "WHERE tb_asset.asset_id=tb_stocks.tb_asset_asset_id "
                . "AND tb_asset.tb_nature_asset_nature_asset_id=tb_nature_asset.nature_asset_id "
                . "AND tb_nature_asset.tb_type_asset_type_asset_id=tb_type_asset.type_asset_id "
                . "AND tb_institution.institution_id = (SELECT tb_institution_institution_id FROM tb_transfer a WHERE a.tb_stocks_stock_id=tb_stocks.stock_id AND a.transfer_code IS NOT NULL ORDER BY a.transfer_id DESC LIMIT 0,1) "
                . "AND tb_institution.tb_division_division_id=tb_division.division_id";
        
        $checkif = FALSE;
        
        if($_POST['type']=='asset_code'){
            $sql .= " AND tb_stocks.asset_code LIKE '%".$_POST['text']."%'";
            $checkif = TRUE;
        }else{
        
            if($_POST['type_asset_id']!="" && $_POST['nature_asset_id']==""){
                $sql .= " AND tb_type_asset.type_asset_id = ".$_POST['type_asset_id'];
                $checkif = TRUE;
            }
            if($_POST['type_asset_id']=="" && $_POST['nature_asset_id']!=""){
                $sql .= " AND tb_nature_asset.nature_asset_id = ".$_POST['nature_asset_id'];
                $checkif = TRUE;
            }
            if($_POST['type_asset_id']!="" && $_POST['nature_asset_id']!=""){
                $sql .= " AND tb_nature_asset.nature_asset_id = ".$_POST['nature_asset_id'];
                $checkif = TRUE;
            }


            if($_POST['division_id']!="" && $_POST['institution_id']==""){
                $sql .= " AND tb_division.division_id = ".$_POST['division_id'];
                $checkif = TRUE;
            }
            if($_POST['division_id']=="" && $_POST['institution_id']!=""){
                $sql .= " AND tb_institution.institution_id = ".$_POST['institution_id'];
                $checkif = TRUE;
            }
            if($_POST['division_id']!="" && $_POST['institution_id']!=""){
                $sql .= " AND tb_institution.institution_id = ".$_POST['institution_id'];
                $checkif = TRUE;
            }
        }
        
        if($checkif){
            $sql .= " AND tb_stocks.tb_status_status='ใช้การได้' ORDER BY tb_asset.asset_id ASC";
            //echo $sql;
            $result = $db->createCommand($sql)->queryAll();
            //echo '<pre>'.print_r($result,1).'<pre>';
            echo json_encode($result);
        }
        
        
    }
    
    
    public function actionAddRequest(){
        
        $dataUser = TbUser::model()->findByPk(Yii::app()->user->id);
        
        $model = new TbTransfer();
        $model->tb_stocks_stock_id = $_POST['stockId'];
        $model->tb_institution_institution_id = $dataUser->tb_institution_institution_id;
        
        if($model->save()){
            echo 'ok';
        }
        
    }
    
    public function actionDelRequest(){
        $model = TbTransfer::model()->deleteByPk($_POST['transferId']);
        echo 'ok';
    }
    
    
    
    
    
    
    
    public function actionApprove(){
        
        $this->render('//Transfer/Approve');
        
    }
    public function actionSearchApprove(){
        $dataUser = TbUser::model()->findByPk(Yii::app()->user->id);
        
        $db = Yii::app()->db;
        $sql = "SELECT *,(SELECT transfer_id FROM tb_transfer a WHERE a.tb_stocks_stock_id=tb_stocks.stock_id AND a.transfer_code IS NULL ORDER BY a.transfer_id DESC LIMIT 0,1) AS SidTransfer,(SELECT tb_institution_institution_id FROM tb_transfer b WHERE b.tb_stocks_stock_id=tb_stocks.stock_id AND b.transfer_code IS NOT NULL ORDER BY b.transfer_id DESC LIMIT 0,1) AS SidOwner FROM tb_asset,tb_stocks,tb_division,tb_institution,tb_type_asset,tb_nature_asset WHERE tb_asset.asset_id=tb_stocks.tb_asset_asset_id AND tb_asset.tb_nature_asset_nature_asset_id=tb_nature_asset.nature_asset_id AND tb_nature_asset.tb_type_asset_type_asset_id=tb_type_asset.type_asset_id AND tb_institution.institution_id = (SELECT tb_institution_institution_id FROM tb_transfer a WHERE a.tb_stocks_stock_id=tb_stocks.stock_id AND a.transfer_code IS NULL ORDER BY a.transfer_id DESC LIMIT 0,1) AND tb_institution.tb_division_division_id=tb_division.division_id AND tb_stocks.tb_status_status='ใช้การได้'";
        $result = $db->createCommand($sql)->queryAll();
        $results = $result;
        
        foreach($result as $key=>$value){
            if($value['SidOwner']!=$dataUser->tb_institution_institution_id){
                unset($results[$key]);
            }
        }
        
        
        echo json_encode($results);
    }
    
    public function actionSaveApprove(){
        $NFunc = new NFunc();
        
        $model = TbTransfer::model()->findByPk($_POST['transfer_id']);
        $model->transfer_code = $_POST['transfer_code'];
        $model->transfer_date = $NFunc->convertDateToSQL($_POST['transfer_date']);
        
        if($model->save()){
            echo 'ok';
        }
    }
    
    
    public function actionReportPD45($id) {
        $db = Yii::app()->db;
        
        $sql = "SELECT * FROM tb_asset,"
                    . "tb_nature_asset,"
                    . "tb_purchase,"
                    . "tb_vendors,"
                    . "tb_type_cost,"
                    . "tb_get_asset,"
                    . "tb_institution,"
                    . "tb_type_asset,"
                    . "tb_division,"
                    . "tb_stocks,"
                    . "tb_transfer,"
                    . "tb_user "
                    . "WHERE transfer_id = ".$id." "
                    . "AND tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                    . "AND tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                    . "AND tb_purchase_purchase_id = tb_purchase.purchase_id "
                    . "AND tb_vendors_vendors_id = tb_vendors.vendors_id "
                    . "AND tb_type_cost_type_cost_id = tb_type_cost.type_cost_id "
                    . "AND tb_get_asset_get_asset_id = tb_get_asset.get_asset_id "
                    . "AND tb_asset.tb_institution_institution_id = tb_institution.institution_id "
                    . "AND tb_division_division_id = tb_division.division_id "
                    . "AND tb_user.tb_institution_institution_id = tb_asset.tb_institution_institution_id "
                    . "AND tb_stocks.tb_asset_asset_id = tb_asset.asset_id "
                    . "AND tb_transfer.tb_stocks_stock_id = tb_stocks.stock_id";
        
        //echo $sql;
        $result = $db->createCommand($sql)->queryAll();
        $this->renderPartial("//Transfer/ReportPD45", array(
            'model' => $result
        ));
        
    }
    
    public function actionList(){
        $this->render('//Transfer/List');
            
    }
       
    public function actionGetList(){
        
        $string = '';
        
        if($_POST['string']!=''){
            $string .= " AND tb_stocks.asset_code LIKE '%".$_POST['string']."%'";
        }
        
        $dataUser = TbUser::model()->findByPk(Yii::app()->user->id);
        
        $db = Yii::app()->db;
        $sql = "SELECT *,(SELECT transfer_id FROM tb_transfer a WHERE a.tb_stocks_stock_id=tb_stocks.stock_id AND a.transfer_code IS NOT NULL ORDER BY a.transfer_id DESC LIMIT 0,1) AS SidTransfer,(SELECT tb_institution_institution_id FROM tb_transfer b WHERE b.tb_stocks_stock_id=tb_stocks.stock_id AND b.transfer_code IS NOT NULL ORDER BY b.transfer_id DESC LIMIT 0,1) AS SidOwner FROM tb_stocks,tb_asset,tb_type_asset,tb_nature_asset WHERE tb_stocks.tb_asset_asset_id=tb_asset.asset_id AND tb_asset.tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id".$string;
        $result = $db->createCommand($sql)->queryAll();
        
        $results = $result;
        
        foreach($result as $key=>$value){
            if($value['SidOwner']!=$dataUser->tb_institution_institution_id){
                unset($results[$key]);
            }
        }
        
        
        echo json_encode($results);
    }
}
