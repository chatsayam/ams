<?php

class AssetController extends Controller {

    public function actionManageRegister() {

        $typeAsset = TbTypeAsset::model()->findAll();
        $natureAsset = TbNatureAsset::model()->findAll();

        $this->render('//Asset/ManageRegister', array(
            'typeAsset' => $typeAsset,
            'natureAsset' => $natureAsset
        ));
    }

    public function actionLoadDataAssetRegister() {

        $dataUser = TbUser::model()->findByPk(Yii::app()->user->id);

        $wh = "tb_institution_institution_id = " . $dataUser->tb_institution_institution_id . " AND ";

        if ($dataUser->user_types_id == 1 || $dataUser->user_types_id == 4) {
            $wh = "";
        }

        $db = Yii::app()->db;
        $sql = "SELECT * FROM tb_asset,tb_nature_asset,tb_type_asset WHERE " . $wh
                . " tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                . "AND tb_asset.tb_status_status = 'ขอขึ้นทะเบียน' "
                . "GROUP BY asset_id "
                . "ORDER BY asset_id DESC";

        if (isset($_POST)) {
            if ($_POST['ta']) {
                $sql = "SELECT * FROM tb_asset,tb_nature_asset,tb_type_asset WHERE " . $wh
                        . " tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                        . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                        . "AND tb_type_asset.type_asset_id = " . $_POST['ta']
                        . " AND tb_asset.tb_status_status = 'ขอขึ้นทะเบียน' "
                        . "GROUP BY asset_id "
                        . "ORDER BY asset_id DESC";
            }

            if ($_POST['nt']) {
                $sql = "SELECT * FROM tb_asset,tb_nature_asset,tb_type_asset WHERE " . $wh
                        . " tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                        . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                        . " AND tb_nature_asset.nature_asset_id = " . $_POST['nt']
                        . " AND tb_asset.tb_status_status = 'ขอขึ้นทะเบียน' "
                        . "GROUP BY asset_id "
                        . "ORDER BY asset_id DESC";
            }

            if ($_POST['tta']) {
                $sql = "SELECT * FROM tb_asset,tb_nature_asset,tb_type_asset WHERE " . $wh
                        . " tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                        . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                        . "AND tb_type_asset.type_asset_id = " . $_POST['tta']
                        . " AND tb_institution_institution_id = " . $_POST['int']
                        . " AND tb_asset.tb_status_status = 'ขอขึ้นทะเบียน' "
                        . "GROUP BY asset_id "
                        . "ORDER BY asset_id DESC";
            }

            if ($_POST['nnt']) {
                $sql = "SELECT * FROM tb_asset,tb_nature_asset,tb_type_asset WHERE " . $wh
                        . " tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                        . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                        . " AND tb_nature_asset.nature_asset_id = " . $_POST['nnt']
                        . " AND tb_institution_institution_id = " . $_POST['int']
                        . " AND tb_asset.tb_status_status = 'ขอขึ้นทะเบียน' "
                        . "GROUP BY asset_id "
                        . "ORDER BY asset_id DESC";
            }

            if ($_POST['di']) {
                $sql = "SELECT * FROM tb_asset,tb_nature_asset,tb_type_asset,tb_institution,tb_division WHERE " . $wh
                        . " tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                        . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                        . "AND tb_institution_institution_id = tb_institution.institution_id "
                        . "AND tb_division.division_id =" . $_POST['di'] . " "
                        . "AND tb_division.division_id = tb_division_division_id"
                        . " AND tb_asset.tb_status_status = 'ขอขึ้นทะเบียน' "
                        . "GROUP BY asset_id "
                        . "ORDER BY asset_id DESC";
            }

            if ($_POST['ins']) {
                $sql = "SELECT * FROM tb_asset,tb_nature_asset,tb_type_asset WHERE " . $wh
                        . " tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                        . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                        . " AND tb_institution_institution_id = " . $_POST['ins']
                        . " AND tb_asset.tb_status_status = 'ขอขึ้นทะเบียน' "
                        . "GROUP BY asset_id "
                        . "ORDER BY asset_id DESC";
            }
        }



        $dataStock = $db->createCommand($sql)->queryAll();
        $i = 1;
        foreach ($dataStock AS $r) {
            $manage = '<button type="button" data-id="' . $r['asset_id'] . '" class="data-id btn btn-success">
                <span class="glyphicon glyphicon-eye-open"></span></button>';

            echo '<tr> '
            . '<td> '
            . $i
            . '</td>'
            . '<td> '
            . $r['register_code']
            . '</td>'
            . '<td> '
            . $r['specification_code']
            . '</td>'
            . '<td> '
            . $r['report_pd01_code']
            . '</td>'
            . '<td> ' 
            . $r['type_asset']
            . '</td>'
            . '<td> '
            . $r['nature_asset']
            . '</td>'
            . '<td> '
            . number_format($r['price_per'], 2)
            . '</td>'
            . '<td> '
            . $manage
            . '</td>'
            . '</tr>';
            $i++;
        }
    }

    public function actionRegister() {
        $getAsset = TbGetAsset::model()->findAll();
        $typeCost = TbTypeCost::model()->findAll();
        $purchase = TbPurchase::model()->findAll();
        $typeAsset = TbTypeAsset::model()->findAll();
        //$natureAsset = TbNatureAsset::model()->findAll();
        //$status_s = TbStatus::model()->findAll();

        $db = Yii::app()->db;
        $sql = "SELECT * FROM tb_status WHERE status_index = '1' ";
        $status = $db->createCommand($sql)->queryAll();

        $this->render('//Stock/AddStock', array(
            'getAsset' => $getAsset,
            'typeCost' => $typeCost,
            'purchase' => $purchase,
            'typeAsset' => $typeAsset,
            //'natureAsset' => $natureAsset, //ลักษณะครุภัณฑ์
            'status' => $status
        ));
  
        //echo 'hello';
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

    public function actionShowListDataStock() {
        $Nfunc = new NFunc;
        if (!empty($Nfunc->getCookieData('assetID'))) {
            //$attributes = array('tb_asset_asset_id' => $Nfunc->getCookieData('assetID'));
            //$dataStock = TbStocks::model()->findAll();//findByAttributes($attributes);
            //$dataStock = TbStocks::model()->findByAttributes($attributes);

            $db = Yii::app()->db;
            $sql = "SELECT * FROM tb_stocks WHERE tb_asset_asset_id = '" . $Nfunc->getCookieData('assetID') . "'";
            $dataStock = $db->createCommand($sql)->queryAll();

            if (!empty($dataStock)) {
                echo json_encode($dataStock);
            } else {
                echo 'none';
            }
        }
    }

    public function actionRemoveDataStockRegister() {
        if (isset($_POST)) {
            if (TbStocks::model()->deleteByPk($_POST['data'])) {
                echo 1;
            } else {
                echo 'none';
            }
        }
    }

    public function actionOpenFilePDF() {
        if (isset($_GET)) {
            echo '<object data="' . Yii::app()->baseUrl . '/Uploads/' . $_GET['fileData'] . '" type="application/pdf" 
                width="100%" height="100%"></object>';
        }
    }

    public function actionShowListDataFile() {
        $Nfunc = new NFunc;

        if (isset($_GET['assetID'])) {
            $Nfunc->setCookieData('assetID', (24 * 60 * 60), $_GET['assetID']);
        }

        if (isset($_POST['assetID'])) {
            $Nfunc->setCookieData('assetID', (24 * 60 * 60), $_POST['assetID']);
        }

        if (!empty($Nfunc->getCookieData('assetID'))) {
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

    public function actionRegisterLow() {

        $getAsset = TbGetAsset::model()->findAll();
        $typeCost = TbTypeCost::model()->findAll();
        $purchase = TbPurchase::model()->findAll();
        $typeAsset = TbTypeAsset::model()->findAll();
        $natureAsset = TbNatureAsset::model()->findAll();
        //$status_s = TbStatus::model()->findAll();

        $db = Yii::app()->db;
        $sql = "SELECT * FROM tb_status WHERE status_index = '1' ";
        $status = $db->createCommand($sql)->queryAll();

        $this->render('//Asset/RegisterLow', array(
            'getAsset' => $getAsset,
            'typeCost' => $typeCost,
            'purchase' => $purchase,
            'typeAsset' => $typeAsset,
            'natureAsset' => $natureAsset,
            'status' => $status
        ));
    }

    public function actionSaveRegisterLow() {
        if (isset($_POST)) {
            $stock = $_POST['data'];
            $vandor = $_POST['fp'];

            $Nfunc = new NFunc();

            $modelAsset = new TbAsset();
            $modelStock = new TbStocks();

            $modelAsset->attributes = $stock;
            $modelAsset->attributes = $vandor;
            $modelStock->attributes = $stock;

            $dateNow = date('Y-m-d h:i:s');

            $modelAsset->date_asset = $dateNow;
            $modelAsset->tb_status_status = 'ขึ้นทะเบียนสำเร็จ';
            $modelAsset->asset = 2;

            $modelStock->add_date = $dateNow;

            $dataUser = TbUser::model()->findByPk(Yii::app()->user->id);

            $modelAsset->tb_institution_institution_id = $dataUser->tb_institution_institution_id;
            $modelAsset->invoice_date = $Nfunc->convertDateToSQL($stock['invoice_date']);

            if ($modelAsset->save()) {
                $sql = "SELECT * FROM tb_asset WHERE tb_institution_institution_id ='" . 
                        $dataUser->tb_institution_institution_id . "' AND date_asset = '" . $dateNow . "'";
                //$dataAsset = TbAsset::model()->findBySql($sql);
                $db = Yii::app()->db;
                $dataAsset = $db->createCommand($sql)->queryAll();
                $modelStock->tb_asset_asset_id = $dataAsset[0]['asset_id'];
                $Nfunc->setCookieData('assetIDLow', (24 * 60 * 60), $dataAsset[0]['asset_id']);

                echo $modelStock->save();
            } else {
                echo 'none';
                echo $modelAsset->tb_get_asset_get_asset_id . ',';
                echo $modelAsset->tb_institution_institution_id . ',';
                echo $modelAsset->tb_purchase_purchase_id . ',';
                echo $modelAsset->tb_vendors_vendors_id . ',';
                echo $modelAsset->tb_status_status . ',';
                echo $modelAsset->tb_type_cost_type_cost_id . ',';
                echo $modelAsset->tb_nature_asset_nature_asset_id . ',';
            }
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

    public function actionFilVendor() {
        $Nfunc = new NFunc();
        $condition = array('supply_code' => $_POST['data']);
        $model = TbVendors::model()->findAllByAttributes($condition);
        echo CJSON::encode($Nfunc->convertModelToArray($model));
    }

    public function actionSelectShowTypeAsset() {
        $model = TbTypeAsset::model()->findByPk($_POST['id']);
        echo $model->type_asset;
    }

    public function actionListNatureAsset() {
        $Nfunc = new NFunc();
        $condition = array('tb_type_asset_type_asset_id' => $_POST['id']);
        $natureAsset = TbNatureAsset::model()->findAllByAttributes($condition);
        echo CJSON::encode($Nfunc->convertModelToArray($natureAsset));
    }

    public function actionListInstitutionOption() {
        $Nfunc = new NFunc();
        $condition = array('tb_division_division_id' => $_POST['id']);
        $ins = TbInstitution::model()->findAllByAttributes($condition);
        echo CJSON::encode($Nfunc->convertModelToArray($ins));
    }

    public function actionPD01Upload() {
        $file = $_FILES['file_pd01']['name'];
        $dot = explode('.', $file);
        if ($dot[1] == 'pdf' || $dot[1] == 'PDF' || $dot[1] == 'Pdf') {
            $name = sha1($dot[0] . date('Ymd,h:i:s')) . '.' . $dot[1];
            if (move_uploaded_file($_FILES["file_pd01"]["tmp_name"], './File_Uploads/' . $name)) {
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
            $name = sha1($dot[0] . date('Ymd,h:i:s')) . '.' . $dot[1];
            if (move_uploaded_file($_FILES["file_pd38"]["tmp_name"], './File_Uploads/' . $name)) {
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
            if (move_uploaded_file($_FILES["file_spec"]["tmp_name"], './File_Uploads/' . $name)) {
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
            if (move_uploaded_file($_FILES["file_invoice"]["tmp_name"], './File_Uploads/' . $name)) {
                echo $name;
            } else {
                echo "noUpload";
            }
        } else {
            echo 'noPDF';
            //echo $dot[1];
        }
    }

    public function actionReportPD591() {
        $NFunc = new NFunc;
        $assetID = NULL;

        if (isset($_GET['assetID'])) {
            $assetID = $_GET['assetID'];
            $NFunc->setCookieData('assetIDLow', (60 * 60 * 24), $assetID);
        } else {
            $assetID = $NFunc->getCookieData('assetIDLow');
        }

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
                . "tb_user "
                . "WHERE asset_id = $assetID "
                . "AND tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                . "AND tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                . "AND tb_purchase_purchase_id = tb_purchase.purchase_id "
                . "AND tb_vendors_vendors_id = tb_vendors.vendors_id "
                . "AND tb_type_cost_type_cost_id = tb_type_cost.type_cost_id "
                . "AND tb_get_asset_get_asset_id = tb_get_asset.get_asset_id "
                . "AND tb_asset.tb_institution_institution_id = tb_institution.institution_id "
                . "AND tb_division_division_id = tb_division.division_id "
                . "AND tb_user.tb_institution_institution_id = tb_asset.tb_institution_institution_id "
                . "AND tb_stocks.tb_asset_asset_id = tb_asset.asset_id";



        $model = $db->createCommand($sql)->queryAll();

        $this->renderPartial("//Asset/ReportPD59_1", array(
            'model' => $model
        ));
    }

    public function actionReportOnePagePD44() {
        $NFunc = new NFunc;
        $assetID = NULL;
        $page = 0;

        if (isset($_GET['assetID'])) {
            $assetID = $_GET['assetID'];
            $NFunc->setCookieData('assetID', (60 * 60 * 24), $assetID);
        } else {
            $assetID = $NFunc->getCookieData('assetID');
        }

        $db = Yii::app()->db;
        $sql = "SELECT COUNT(stock_id) AS stockID FROM tb_stocks WHERE tb_asset_asset_id = " . $assetID; // 
        $result = $db->createCommand($sql)->queryAll();

        $num = $result[0]['stockID'];

        if ($num == 1) {
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
                    . "tb_user "
                    . "WHERE asset_id = $assetID "
                    . "AND tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                    . "AND tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                    . "AND tb_purchase_purchase_id = tb_purchase.purchase_id "
                    . "AND tb_vendors_vendors_id = tb_vendors.vendors_id "
                    . "AND tb_type_cost_type_cost_id = tb_type_cost.type_cost_id "
                    . "AND tb_get_asset_get_asset_id = tb_get_asset.get_asset_id "
                    . "AND tb_asset.tb_institution_institution_id = tb_institution.institution_id "
                    . "AND tb_division_division_id = tb_division.division_id "
                    . "AND tb_user.tb_institution_institution_id = tb_asset.tb_institution_institution_id "
                    . "AND tb_stocks.tb_asset_asset_id = tb_asset.asset_id";
            $page = $num;
        } else {
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
                    . "tb_user "
                    . "WHERE asset_id = $assetID "
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
                    . "GROUP BY tb_stocks.tb_asset_asset_id";

            $page = (int) ($num / 10);

            if (($num % 10) > 0) {
                $page += 1;
            }
            $page += 1;
        }

        $model = $db->createCommand($sql)->queryAll();

        $this->renderPartial("//Asset/ReportOnePagePD44", array(
            'model' => $model,
            'pageAll' => $page,
            'num' => $num
        ));
    }

    public function actionReportManyPagePD44() {

        $NFunc = new NFunc;
        $page = 0;

        if (isset($_GET['assetID'])) {
            $assetID = $_GET['assetID'];
        } else {
            $assetID = $NFunc->getCookieData('assetID');
        }

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 2;
        }

        if (isset($_GET['pageAll'])) {
            $pageAll = $_GET['pageAll'];
        } else {
            $pageAll = 2;
        }

        $limit = 0;

        if ($page <= $pageAll) {
            $limit = $page - 2;
        }

        $sql = "SELECT * FROM tb_asset,"
                . "tb_purchase,"
                . "tb_get_asset,"
                . "tb_institution,"
                . "tb_division,"
                . "tb_type_cost,"
                . "tb_user "
                . "WHERE asset_id = $assetID "
                . "AND tb_purchase_purchase_id = tb_purchase.purchase_id "
                . "AND tb_get_asset_get_asset_id = tb_get_asset.get_asset_id "
                . "AND tb_asset.tb_institution_institution_id = tb_institution.institution_id "
                . "AND tb_division_division_id = tb_division.division_id "
                . "AND tb_type_cost_type_cost_id = tb_type_cost.type_cost_id "
                . "AND tb_user.tb_institution_institution_id = tb_asset.tb_institution_institution_id ";

        $db = Yii::app()->db;
        $model = $db->createCommand($sql)->queryAll();

        $sql = "SELECT * FROM tb_stocks WHERE tb_asset_asset_id = " . $assetID . " LIMIT " . $limit * 10 . " , 10";

        $DurableGoods = $db->createCommand($sql)->queryAll();

        $this->renderPartial("//Asset/ReportManyPagePD44", array(
            'model' => $model,
            'DurableGoods' => $DurableGoods,
            'page' => $page,
            'pageAll' => $pageAll,
            'limit' => $limit
        ));
    }

    public function actionReportOnePagePD44TOPDF() {
        $NFunc = new NFunc;
        $assetID = NULL;
        $page = 0;

        if (isset($_GET['assetID'])) {
            $assetID = $_GET['assetID'];
            $NFunc->setCookieData('assetID', (60 * 60 * 24), $assetID);
        } else {
            $assetID = $NFunc->getCookieData('assetID');
        }

        $db = Yii::app()->db;
        $sql = "SELECT COUNT(stock_id) AS stockID FROM tb_stocks WHERE tb_asset_asset_id = " . $assetID; // 
        $result = $db->createCommand($sql)->queryAll();

        $num = $result[0]['stockID'];

        if ($num == 1) {
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
                    . "tb_user "
                    . "WHERE asset_id = $assetID "
                    . "AND tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                    . "AND tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                    . "AND tb_purchase_purchase_id = tb_purchase.purchase_id "
                    . "AND tb_vendors_vendors_id = tb_vendors.vendors_id "
                    . "AND tb_type_cost_type_cost_id = tb_type_cost.type_cost_id "
                    . "AND tb_get_asset_get_asset_id = tb_get_asset.get_asset_id "
                    . "AND tb_asset.tb_institution_institution_id = tb_institution.institution_id "
                    . "AND tb_division_division_id = tb_division.division_id "
                    . "AND tb_user.tb_institution_institution_id = tb_asset.tb_institution_institution_id "
                    . "AND tb_stocks.tb_asset_asset_id = tb_asset.asset_id";
            $page = $num;
        } else {
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
                    . "tb_user "
                    . "WHERE asset_id = $assetID "
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
                    . "GROUP BY tb_stocks.tb_asset_asset_id";

            $page = (int) ($num / 10);

            if (($num % 10) > 0) {
                $page += 1;
            }
            $page += 1;
        }

        $model = $db->createCommand($sql)->queryAll();

        $this->renderPartial("//Asset/ReportPagePDFPD44", array(
            'model' => $model,
            'pageAll' => $page,
            'num' => $num
        ));
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

    public function actionShowDataDetail() {
        $NFunc = new NFunc;
        $db = Yii::app()->db;
        $pd44 = $NFunc->getCookieData('assetID');

        $sql = "SELECT * FROM comment WHERE tb_asset_asset_id='" . $pd44 . "';";
        $result = $db->createCommand($sql)->queryAll();

        echo $result[0]['comment'];
    }

    public function actionCancelDataAssetRegister() {
        if (isset($_POST)) {
            $NFunc = new NFunc;

            echo TbAsset::model()->deleteByPk($NFunc->getCookieData('assetID'));
        }
    }

    public function actionSetListAsset() {
        $NFunc = new NFunc;

        //$model = TbAsset::model()->findByPk($NFunc->getCookieData('assetID'));
        //echo json_encode($NFunc->convertModelToArray($model));

        $assetID = $NFunc->getCookieData('assetID');

        $db = Yii::app()->db;

        $sql = "SELECT * FROM tb_asset,"
                . "tb_nature_asset,"
                . "tb_purchase,"
                . "tb_vendors,"
                . "tb_type_cost,"
                . "tb_get_asset,"
                . "tb_institution,"
                . "tb_type_asset,"
                . "tb_division "
                . "WHERE asset_id = $assetID "
                . "AND tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                . "AND tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                . "AND tb_purchase_purchase_id = tb_purchase.purchase_id "
                . "AND tb_vendors_vendors_id = tb_vendors.vendors_id "
                . "AND tb_type_cost_type_cost_id = tb_type_cost.type_cost_id "
                . "AND tb_get_asset_get_asset_id = tb_get_asset.get_asset_id "
                . "AND tb_asset.tb_institution_institution_id = tb_institution.institution_id "
                . "AND tb_division_division_id = tb_division.division_id ";



        $model = $db->createCommand($sql)->queryAll();


        $model[0]['date_report_pd01'] = $NFunc->convertSQLToDate($model[0]['date_report_pd01']);
        $model[0]['date_examine'] = $NFunc->convertSQLToDate($model[0]['date_examine']);
        $model[0]['invoice_date'] = $NFunc->convertSQLToDate($model[0]['invoice_date']);
        $model[0]['contract_date'] = $NFunc->convertSQLToDate($model[0]['contract_date']);

        echo CJSON::encode($model);
    }

    public function actionNotificationsList() {

        $typeAsset = TbTypeAsset::model()->findAll();
        $natureAsset = TbNatureAsset::model()->findAll();
        $divi = TbDivision::model()->findAll();
        
         $dataUser = TbUser::model()->findByPk(Yii::app()->user->id);
        
        if($dataUser->user_types_id == 4 || $dataUser->user_types_id == 1){

        $this->render('//Asset/Notification', array(
            'typeAsset' => $typeAsset,
            'natureAsset' => $natureAsset,
            'divi' => $divi
        ));
        }else {
            $this->render('//Site/Index');
        }
    }

    public function actionAppStock() {
        if (isset($_POST)) {

            $NFunc = new NFunc;

            $assetID = $NFunc->getCookieData('assetID');

            $data = $_POST['data'];
            $id = $_POST['id'];

            $modelStock = TbStocks::model()->findByPk($id);
            $modelStock->asset_code = $data;

            if ($modelStock->save()) {
                $modelAsset = TbAsset::model()->findByPk($assetID);

                $modelAsset->tb_status_status = 'ขึ้นทะเบียนสำเร็จ';

                echo $modelAsset->save();
            }
        }
    }

    public function actionReportPD59($id = null) {

        $Nfunc = new NFunc;

        if ($id == null) {
            $id = $Nfunc->getCookieData('$stockID');
        }


        $db = Yii::app()->db;

        $sql = "SELECT *,tb_stocks.tb_status_status AS state FROM tb_asset,"
                . "tb_nature_asset,"
                . "tb_purchase,"
                . "tb_vendors,"
                . "tb_type_cost,"
                . "tb_get_asset,"
                . "tb_institution,"
                . "tb_type_asset,"
                . "tb_division,"
                . "tb_stocks,"
                . "tb_user "
                . "WHERE stock_id = $id "
                . "AND tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                . "AND tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                . "AND tb_purchase_purchase_id = tb_purchase.purchase_id "
                . "AND tb_vendors_vendors_id = tb_vendors.vendors_id "
                . "AND tb_type_cost_type_cost_id = tb_type_cost.type_cost_id "
                . "AND tb_get_asset_get_asset_id = tb_get_asset.get_asset_id "
                . "AND tb_asset.tb_institution_institution_id = tb_institution.institution_id "
                . "AND tb_division_division_id = tb_division.division_id "
                . "AND tb_user.tb_institution_institution_id = tb_asset.tb_institution_institution_id "
                . "AND tb_stocks.tb_asset_asset_id = tb_asset.asset_id";



        $model = $db->createCommand($sql)->queryAll();

        $this->renderPartial("//Asset/ReportPD59", array(
            'model' => $model,
            'idot' => $id
        ));
    }

    public function actionShowListStock() {

        $typeAsset = TbTypeAsset::model()->findAll();
        $natureAsset = TbNatureAsset::model()->findAll();
        $divi = TbDivision::model()->findAll();

        $this->render('//Asset/ShowListStock', array(
            'typeAsset' => $typeAsset,
            'natureAsset' => $natureAsset,
            'divi' => $divi
        ));
    }

    public function actionLoadDataAsset() {

        $Nfunc = new NFunc;

        $db = Yii::app()->db;

        $sql = "SELECT * FROM tb_asset,tb_nature_asset,tb_type_asset,tb_stocks WHERE "
                . "tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                . "AND tb_asset.asset_id = tb_stocks.tb_asset_asset_id "
                . "AND tb_asset.tb_status_status = 'ขึ้นทะเบียนสำเร็จ' "
                . "ORDER BY stock_id DESC";

        if (isset($_POST)) {
            if ($_POST['ta']) {
                $sql = "SELECT * FROM tb_asset,tb_nature_asset,tb_type_asset,tb_stocks WHERE "
                        . "tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                        . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                        . "AND tb_type_asset.type_asset_id = " . $_POST['ta']
                        . " AND tb_asset.asset_id = tb_stocks.tb_asset_asset_id "
                        . "AND tb_asset.tb_status_status = 'ขึ้นทะเบียนสำเร็จ' "
                        . "ORDER BY stock_id DESC";
            }

            if ($_POST['nt']) {
                $sql = "SELECT * FROM tb_asset,tb_nature_asset,tb_type_asset,tb_stocks WHERE "
                        . "tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                        . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                        . " AND tb_nature_asset.nature_asset_id = " . $_POST['nt']
                        . " AND tb_asset.asset_id = tb_stocks.tb_asset_asset_id "
                        . "AND tb_asset.tb_status_status = 'ขึ้นทะเบียนสำเร็จ' "
                        . "ORDER BY stock_id DESC";
            }

            if ($_POST['tta']) {
                $sql = "SELECT * FROM tb_asset,tb_nature_asset,tb_type_asset,tb_stocks WHERE "
                        . "tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                        . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                        . "AND tb_type_asset.type_asset_id = " . $_POST['tta']
                        . " AND tb_institution_institution_id = " . $_POST['int']
                        . " AND tb_asset.asset_id = tb_stocks.tb_asset_asset_id "
                        . "AND tb_asset.tb_status_status = 'ขึ้นทะเบียนสำเร็จ' "
                        . "ORDER BY stock_id DESC";
            }

            if ($_POST['nnt']) {
                $sql = "SELECT * FROM tb_asset,tb_nature_asset,tb_type_asset,tb_stocks WHERE "
                        . "tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                        . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                        . " AND tb_nature_asset.nature_asset_id = " . $_POST['nnt']
                        . " AND tb_asset.tb_institution_institution_id = " . $_POST['int']
                        . " AND tb_asset.asset_id = tb_stocks.tb_asset_asset_id "
                        . "AND tb_asset.tb_status_status = 'ขึ้นทะเบียนสำเร็จ' "
                        . "ORDER BY stock_id DESC";
            }

            if ($_POST['di']) {
                $sql = "SELECT * FROM tb_asset,tb_nature_asset,tb_type_asset,tb_stocks,tb_institution,tb_division WHERE "
                        . "tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                        . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                        . "AND tb_institution_institution_id = tb_institution.institution_id "
                        . "AND tb_division.division_id =" . $_POST['di'] . " "
                        . "AND tb_division.division_id = tb_division_division_id "
                        . "AND tb_asset.asset_id = tb_stocks.tb_asset_asset_id "
                        . "AND tb_asset.tb_status_status = 'ขึ้นทะเบียนสำเร็จ' "
                        . "ORDER BY stock_id DESC";
            }

            if ($_POST['ins']) {
                $sql = "SELECT * FROM tb_asset,tb_nature_asset,tb_type_asset,tb_stocks WHERE "
                        . "tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                        . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                        . " AND tb_institution_institution_id = " . $_POST['ins']
                        . " AND tb_asset.asset_id = tb_stocks.tb_asset_asset_id "
                        . "AND tb_asset.tb_status_status = 'ขึ้นทะเบียนสำเร็จ' "
                        . "ORDER BY stock_id DESC";
            }
        }

        $dataStock = $db->createCommand($sql)->queryAll();
        $i = 1;
        foreach ($dataStock AS $r) {
            $manage = '<button type="button" data-assetID="' . $r['asset_id'] . '" data-stockID="' . $r['stock_id'] 
                    . '" class="data-id btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></button>';

            echo '<tr> '
            . '<td> '
            . $i
            . '</td>'
            . '<td> '
            . $r['asset_code']
            . '</td>'
            . '<td> '
            . $r['machine_code']
            . '</td>'
            . '<td> '
            . $Nfunc->convertSQLToDate($r['date_examine'])
            . '</td>'
            . '<td> '
            . $r['feature']
            . '</td>'
            . '<td> '
            . $r['gfmis_code']
            . '</td>'
            . '<td> '
            . number_format($r['lifetime'], 2) . ' ปี'
            . '</td>'
            . '<td> '
            . $manage
            . '</td>'
            . '</tr>';
            $i++;
        }
    }

    public function actionNotificationsListTransfer() {
        
    }

    public function changeStatus($id, $state) {
        $model = TbStocks::model()->findByPk($id);

        $model->tb_status_status = $state;

        $model->save();
    }

}
