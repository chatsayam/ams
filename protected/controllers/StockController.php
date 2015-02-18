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

    public function actionPD01Upload() {
        $file = $_FILES['file_pd01']['name'];
        $dot = explode('.', $file);
        if ($dot[1] == 'pdf' || $dot[1] == 'PDF' || $dot[1] == 'Pdf') {
            $name = sha1($dot[0].date('Ymd,h:i:s')).'.'.$dot[1];
            if (move_uploaded_file($_FILES["file_pd01"]["tmp_name"], './Uploads/'.$name)) {
                echo $name;
            } else {
                echo "noUpload";
            }
        } else {
            echo 'noPDF';
            //echo $dot[1];
        }
        //echo $_FILES['file_pd01']['name'];
    }
    
    public function actionPD38Upload() {
        $file = $_FILES['file_pd38']['name'];
        $dot = explode('.', $file);
        if ($dot[1] == 'pdf' || $dot[1] == 'PDF' || $dot[1] == 'Pdf') {
            $name = sha1($dot[0].date('Ymd,h:i:s')).'.'.$dot[1];
            if (move_uploaded_file($_FILES["file_pd38"]["tmp_name"], './Uploads/'.$name)) {
                echo $name;
            } else {
                echo "noUpload";
            }
        } else {
            echo 'noPDF';
        }
    }
    
    public function actionSpecUpload() {
        $file = $_FILES['file_spec']['name'];
        $dot = explode('.', $file);
        if ($dot[1] == 'pdf' || $dot[1] == 'PDF' || $dot[1] == 'Pdf') {
            $name = sha1($dot[0].date('Ymd,h:i:s')).'.'.$dot[1];
            if (move_uploaded_file($_FILES["file_spec"]["tmp_name"], './Uploads/'.$name)) {
                echo $name;
            } else {
                echo "noUpload";
            }
        } else {
            echo 'noPDF';
        }
    }
    
    public function actionRequestStock(){
        
        $load = new LoadData();
        
        $int_id = $load->loadInstitutionID();
        
        $typeAsset = TbTypeAsset::model()->findAll();
        
        $db = Yii::app()->db;
        $sql = "SELECT * FROM tb_asset WHERE tb_institution_institution_id = ".$int_id . " AND tb_status_status = 'ขอขึ้นทะเบียน'";
        $data = $db->createCommand($sql)->queryAll();
        
        $this->render('//Stock/RequestStock',array(
            'typeAsset' => $typeAsset,
            'data' => $data
        ));
    }
}
