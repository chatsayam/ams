<?php

class HomeController extends Controller {

    public function actionRegister() {
        $getAsset = TbGetAsset::model()->findAll();
        $typeCost = TbTypeCost::model()->findAll();
        $purchase = TbPurchase::model()->findAll();
        $typeAsset = TbTypeAsset::model()->findAll();

        $db = Yii::app()->db;
        $sql = "SELECT * FROM tb_status WHERE status_index = '1' ";
        $status = $db->createCommand($sql)->queryAll();

        $this->render('//stock/addStock', array(
            'getAsset' => $getAsset,
            'typeCost' => $typeCost,
            'purchase' => $purchase,
            'typeAsset' => $typeAsset,
            'status' => $status
        ));
    }
    
    public function actionListNatureAsset() {
        if($_POST){
            $Nfunc = new NFunc();
            $condition = array('tb_type_asset_type_asset_id' => $_POST['id']);
            $natureAsset = TbNatureAsset::model()->findAllByAttributes($condition);
            echo CJSON::encode($Nfunc->convertModelToArray($natureAsset));
        }
    }
    
    public function actionPD01Upload() {
        $file = $_FILES['file_pd01']['name'];
        $dot = explode('.', $file);
        if ($dot[1] == 'pdf' || $dot[1] == 'PDF' || $dot[1] == 'Pdf') {
            $name = sha1($dot[0] . date('Ymd,h:i:s')) . '.' . $dot[1];
            if (move_uploaded_file($_FILES["file_pd01"]["tmp_name"], './Uploads/' . $name)) {
                echo $name;
            } else {
                echo "noUpload";
            }
        } else {
            echo 'noPDF';
            
        }
    }

    public function actionPD38Upload() {
        $file = $_FILES['file_pd38']['name'];
        $dot = explode('.', $file);
        if ($dot[1] == 'pdf' || $dot[1] == 'PDF' || $dot[1] == 'Pdf') {
            $name = sha1($dot[0] . date('Ymd,h:i:s')) . '.' . $dot[1];
            if (move_uploaded_file($_FILES["file_pd38"]["tmp_name"], './Uploads/' . $name)) {
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
            $name = sha1($dot[0] . date('Ymd,h:i:s')) . '.' . $dot[1];
            if (move_uploaded_file($_FILES["file_spec"]["tmp_name"], './Uploads/' . $name)) {
                echo $name;
            } else {
                echo "noUpload";
            }
        } else {
            echo 'noPDF';
        }
    }

    public function actionInvoiceUpload() {
        $file = $_FILES['file_invoice']['name'];
        $dot = explode('.', $file);
        if ($dot[1] == 'pdf' || $dot[1] == 'PDF' || $dot[1] == 'Pdf') {
            $name = sha1($dot[0] . date('Ymd,h:i:s')) . '.' . $dot[1];
            if (move_uploaded_file($_FILES["file_invoice"]["tmp_name"], './Uploads/' . $name)) {
                echo $name;
            } else {
                echo "noUpload";
            }
        } else {
            echo 'noPDF';
            //echo $dot[1];
        }
    }
    
    public function actionFilVendor() {
        if($_POST){
            $Nfunc = new NFunc();
            $condition = array('supply_code' => $_POST['data']);
            $model = TbVendors::model()->findAllByAttributes($condition);
            echo CJSON::encode($Nfunc->convertModelToArray($model));
        }
    }
    
    public function actionSelectVendors() {
        if ($_POST) {
            $db = Yii::app()->db;
            $sql = "SELECT * FROM tb_vendors WHERE supply_code like '%" . $_POST['sup'] . "%' ";
            $sql .= "OR supply_gfmis like '%" . $_POST['sup'] . "%' ";
            $sql .= "OR supply like '%" . $_POST['sup'] . "%' ";
            $sql .= "GROUP BY vendors_id ORDER BY supply_code ";
            $result = $db->createCommand($sql)->queryAll();

            foreach ($result as $r) {
                echo '<option value = "' . $r['supply_code'] . '">' . $r['supply'] . '</option>';
            }
        }
        
    }
    
    public function actionSaveAsDataAssetRegister() {
        if (isset($_POST)) {
            $stock = $_POST['data'];
            $flt1 = $_POST['fl'];
            $fmt2 = $_POST['fm'];
            $fnt3 = $_POST['fn'];
            $fot4 = $_POST['fo'];
            $vandor = $_POST['fp'];

            $Nfunc = new NFunc();

            $modelAsset = new TbAsset();

            if (isset($_POST['edit'])) {
                $modelAsset = TbAsset::model()->findByPk($Nfunc->getCookieData('assetID'));
            }

            $modelAsset->attributes = $stock;
            $modelAsset->attributes = $vandor;
            $modelAsset->file_pd01 = $flt1['file_pd01_name'];
            $modelAsset->file_pd38 = $fmt2['file_pd38_name'];
            $modelAsset->file_spec = $fnt3['file_spec_name'];
            $modelAsset->file_invoice = $fot4['file_invoice_name'];
            $modelAsset->date_report_pd01 = $Nfunc->convertDateToSQL($stock['date_report_pd01']);
            $modelAsset->date_examine = $Nfunc->convertDateToSQL($stock['date_examine']);
            $modelAsset->invoice_date = $Nfunc->convertDateToSQL($stock['invoice_date']);
            $modelAsset->contract_date = $Nfunc->convertDateToSQL($stock['contract_date']);
            $modelAsset->tb_status_status = 'ขอขึ้นทะเบียน';

            $dateNow = date('Y-m-d h:i:s');

            $modelAsset->date_asset = $dateNow;

            $dataUser = TbUser::model()->findByPk(Yii::app()->user->id);

            $modelAsset->tb_institution_institution_id = $dataUser->tb_institution_institution_id;

            if ($modelAsset->save()) {
                //$attributes = array('file_spec' => $fnt3['file_spec_name'],'date_asset' => $dateNow);
                //$dataAsset = TbAsset::model()->findByAttributes($attributes);
                $sql = "SELECT * FROM tb_asset WHERE file_spec ='" . $fnt3['file_spec_name'] . "' 
                    AND date_asset = '" . $dateNow . "'";
                //$dataAsset = TbAsset::model()->findBySql($sql);
                $db = Yii::app()->db;
                $dataAsset = $db->createCommand($sql)->queryAll();
                $Nfunc->setCookieData('assetID', (24 * 60 * 60), $dataAsset[0]['asset_id']);
                $Nfunc->setCookieData('regis_code', (24 * 60 * 60), $stock['register_code']);
                $Nfunc->setCookieData('institution_id', (24 * 60 * 60), $dataUser->tb_institution_institution_id);

                echo '1';
            } else {
                echo 'none';
                /* echo $modelAsset->tb_get_asset_get_asset_id.',';
                  echo $modelAsset->tb_institution_institution_id.',';
                  echo $modelAsset->tb_purchase_purchase_id.',';
                  echo $modelAsset->tb_vendors_vendors_id.',';
                  echo $modelAsset->tb_status_status.',';
                  echo $modelAsset->tb_type_cost_type_cost_id.',';
                  echo $modelAsset->tb_nature_asset_nature_asset_id.',';
                 * 
                 */
            }
        }
        //phpinfo();
        //echo 'save';
    }
    
    public function actionSaveAsCommentRegister() {
        if (isset($_POST)) {
            $detail = $_POST['data'];

            $NFunc = new NFunc;
            $model = new Comment;

            $model->comment = $detail;
            $model->page_comment = 1;
            $model->tb_asset_asset_id = $assetID = $NFunc->getCookieData('assetID');

            $model->save();
        }
    }
    
    public function actionShowListDataStock() {
        $Nfunc = new NFunc();
        if (isset($_COOKIE['assetID'])) {

            $db = Yii::app()->db;
            $sql = "SELECT * FROM tb_stocks WHERE tb_asset_asset_id = ". $Nfunc->getCookieData('assetID');
            $dataStock = $db->createCommand($sql)->queryAll();

            if (!empty($dataStock)) {
                echo json_encode($dataStock);
            } else {
                echo 'none';
            }
        }
    }
    
    public function actionSaveAsDataStockRegister() {
        if (isset($_POST)) {
            $data = $_POST['data'];

            $Nfunc = new NFunc;

            $dateNowStock = date('Y-m-d h:i:s');

            $modelStock = new TbStocks;
            $modelStock->attributes = $data;
            $modelStock->add_date = $dateNowStock;
            $modelStock->tb_asset_asset_id = $Nfunc->getCookieData('assetID');

            if ($modelStock->save()) {
                echo 1;

                $modelTran = new TbTransfer();

                $db = Yii::app()->db;
                $sql = "SELECT * FROM tb_stocks WHERE tb_asset_asset_id = '" . $Nfunc->getCookieData('assetID') . "' 
                    AND add_date = '" . $dateNowStock . "'";
                $dataStock = $db->createCommand($sql)->queryAll();

                $dateNow = date('Y-m-d');
                $modelTran->transfer_code = $Nfunc->getCookieData('assetID');
                $modelTran->transfer_date = $dateNow;
                $modelTran->tb_stocks_stock_id = $dataStock[0]['stock_id'];
                $modelTran->tb_institution_institution_id = $Nfunc->getCookieData('institution_id');

                $modelTran->save();
            } else {
                echo 'none';
                echo $Nfunc->getCookieData('assetID');
            }
        }
    }
    
    public function actionShowListDataFile() {
        $Nfunc = new NFunc();

        if (isset($_GET['assetID'])) {
            $Nfunc->setCookieData('assetID', (24 * 60 * 60), $_GET['assetID']);
        }

        if (isset($_POST['assetID'])) {
            $Nfunc->setCookieData('assetID', (24 * 60 * 60), $_POST['assetID']);
        }

        if (isset($_COOKIE['assetID'])) {
            $db = Yii::app()->db;
            $sql = "SELECT * FROM tb_asset WHERE asset_id = '" . $Nfunc->getCookieData('assetID') . "'";
            $dataFile = $db->createCommand($sql)->queryAll();
            // $dataFile = TbAsset::model()->findByPk($Nfunc->getCookieData('assetID'));

            if (!empty($dataFile)) {
                echo json_encode($dataFile);
            } else {
                echo 'none';
            }
        }
    }

}
