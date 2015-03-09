<?php

class DistributeController extends Controller {
    public function actionManage(){
        $this->render('//Distribute/Manage');
    }
    
    public function actionManageSell(){
        $this->render('//Distribute/ManageSell');
    }

    public function actionGetList(){
        $dataUser = TbUser::model()->findByPk(Yii::app()->user->id);
        //echo $dataUser->tb_institution_institution_id;
        $db = Yii::app()->db;
        $sql = "SELECT * FROM tb_distribute WHERE tb_institution_institution_id=".$dataUser->tb_institution_institution_id;
        $result = $db->createCommand($sql)->queryAll();
        echo json_encode($result);
    }
    
    
    public function actionSaveDistribute(){
        $NFunc = new NFunc();
        $dataUser = TbUser::model()->findByPk(Yii::app()->user->id);
        
        $model = new TbDistribute();
        $model->distribute_date = $NFunc->convertDateToSQL($_POST['data']['distribute_date']);
        $model->distribute_code = $_POST['data']['distribute_code'];
        $model->distribute_name = $_POST['data']['distribute_name'];
        $model->tb_institution_institution_id = $dataUser->tb_institution_institution_id;

        if($model->save()){
            echo 'ok';
        }
    }
    
    public function actionSaveCode(){
        
        $db = Yii::app()->db;
        $sql = "SELECT * FROM tb_stocks WHERE tb_status_status='รอจำหน่าย' AND asset_code='".$_POST['data']['tb_stocks_asset_code']."'";
        $model = $db->createCommand($sql)->queryAll();
        
        $ch = FALSE;
        foreach ($model as $r){
            $ch = TRUE;
        }
        
        $dbs = Yii::app()->db;
        $sqls = "UPDATE tb_stocks SET tb_status_status='จำหน่าย' WHERE tb_status_status='รอจำหน่าย' AND asset_code='".$_POST['data']['tb_stocks_asset_code']."'";
        $models = $dbs->createCommand($sqls)->query();
        
        if($ch){
            $model = new TbStocksDistribute();
            $model->tb_stocks_asset_code = $_POST['data']['tb_stocks_asset_code'];
            $model->tb_distribute_distribute_id = $_POST['data']['tb_distribute_distribute_id'];

            if($model->save()){
                echo 'ok';
            }else{
                echo 'error';
            }
        }else{
            echo 'error';
        }
        
    }

}
