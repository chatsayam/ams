<?php

class RepairController extends Controller {
    public function actionManage($id){
        
        $db = Yii::app()->db;
        $sql = "SELECT * FROM tb_stocks,tb_asset,tb_type_asset,tb_nature_asset WHERE tb_stocks.tb_asset_asset_id=tb_asset.asset_id AND tb_asset.tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id AND tb_stocks.stock_id=".$id;
        $result = $db->createCommand($sql)->queryAll();
        
        $this->render('//Repair/Manage',array('id'=>$id,'tb_stocks'=>$result));
    }
    
    public function actionGetListRepair(){
        $NFunc = new NFunc;
        //echo $_POST['id'];
        $db = Yii::app()->db;
        $sql = "SELECT * FROM tb_repair WHERE tb_stocks_stock_id=".$_POST['id'];
        $result = $db->createCommand($sql)->queryAll();
        $result2 = $result;
        
        foreach($result as $key=>$value){
            $result2[$key]['date_repair'] = $NFunc->convertSQLToDate($value['date_repair']);
        }
        
        echo json_encode($result2);
    }
    
    public function actionRepairUpload() {
        $file = $_FILES['file_repair']['name'];
        $dot = explode('.', $file);
        if ($dot[1] == 'pdf' || $dot[1] == 'PDF' || $dot[1] == 'Pdf') {
            $name = sha1($dot[0] . date('Ymd,h:i:s')) . '.' . $dot[1];
            if (move_uploaded_file($_FILES["file_repair"]["tmp_name"], './Uploads/' . $name)) {
                echo $name;
            } else {
                echo "noUpload";
            }
        } else {
            echo 'noPDF';
            //echo $dot[1];
        }
        //echo $_FILES['file_repair']['name'];
    }
    
    public function actionSaveRepair(){
        $NFunc = new NFunc();
        //echo count($_POST['data']);
        $model = new TbRepair();
        $model->date_repair = $NFunc->convertDateToSQL($_POST['data']['date_repair']);
        $model->price_repair = $_POST['data']['price_repair'];
        $model->repair = $_POST['data']['repair'];
        $model->repair_orther = $_POST['data']['repair_orther'];
        $model->file_repair_invoice = $_POST['data']['file_repair_invoice'];
        $model->tb_stocks_stock_id = $_POST['data']['idStock'];
        
        if($model->save()){
            echo 'ok';
        }
    }
    
    public function actionOpenFilePDF() {
        if (isset($_GET)) {
            echo '<object data="' . Yii::app()->baseUrl . '/Uploads/' . $_GET['fileData'] . '" type="application/pdf" width="100%" height="100%"></object>';
        }
    }
    
    public function actionList(){
        $this->render('//Repair/List');
    }
    
    public function actionGetList(){
        
        $string = '';
        
        if($_POST['string']!=''){
            $string .= " AND tb_stocks.asset_code LIKE '%".$_POST['string']."%'";
        }
        
        $dataUser = TbUser::model()->findByPk(Yii::app()->user->id);
        $string .= " AND tb_asset.tb_institution_institution_id=".$dataUser->tb_institution_institution_id;
        
        $db = Yii::app()->db;
        $sql = "SELECT * FROM tb_stocks,tb_asset,tb_type_asset,tb_nature_asset WHERE tb_stocks.tb_asset_asset_id=tb_asset.asset_id AND tb_asset.tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id".$string;
        $result = $db->createCommand($sql)->queryAll();
        
        echo json_encode($result);
    }

}
