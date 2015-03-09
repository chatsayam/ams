<?php

class ReportController extends Controller {

    public function actionManage() {
        $typeAsset = TbTypeAsset::model()->findAll();


        $this->render('//Report/Manage', array(
            'typeAsset' => $typeAsset
        ));
    }

    public function actionLoadDataAsset() {

        $Nfunc = new NFunc;

        $dataUser = TbUser::model()->findByPk(Yii::app()->user->id);

        $wh = "tb_institution_institution_id = " . $dataUser->tb_institution_institution_id . " AND ";

        if ($dataUser->user_types_id == 1 || $dataUser->user_types_id == 4) {
            $wh = "";
        }

        $db = Yii::app()->db;
        $sql = "SELECT *,tb_stocks.tb_status_status AS state FROM tb_asset,tb_nature_asset,tb_type_asset,tb_stocks WHERE " . $wh
                . " tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                . "AND tb_asset.asset_id = tb_stocks.tb_asset_asset_id "
                . "AND tb_stocks.tb_status_status != 'จำหน่าย' "
                . "AND tb_asset.tb_status_status = 'ขึ้นทะเบียนสำเร็จ' "
                . "ORDER BY stock_id DESC";

        if (isset($_POST)) {
            if (isset($_POST['ta'])) {
                $sql = "SELECT *,tb_stocks.tb_status_status AS state FROM tb_asset,tb_nature_asset,tb_type_asset,tb_stocks WHERE " . $wh
                        . " tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                        . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                        . "AND tb_type_asset.type_asset_id = " . $_POST['ta']
                        . " AND tb_asset.asset_id = tb_stocks.tb_asset_asset_id "
                        . "AND tb_stocks.tb_status_status != 'จำหน่าย' "
                        . "AND tb_asset.tb_status_status = 'ขึ้นทะเบียนสำเร็จ' "
                        . "ORDER BY stock_id DESC";
            }

            if (isset($_POST['nt'])) {
                $sql = "SELECT *,tb_stocks.tb_status_status AS state FROM tb_asset,tb_nature_asset,tb_type_asset,tb_stocks WHERE " . $wh
                        . " tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                        . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                        . " AND tb_nature_asset.nature_asset_id = " . $_POST['nt']
                        . " AND tb_asset.asset_id = tb_stocks.tb_asset_asset_id "
                        . "AND tb_stocks.tb_status_status != 'จำหน่าย' "
                        . "AND tb_asset.tb_status_status = 'ขึ้นทะเบียนสำเร็จ' "
                        . "ORDER BY stock_id DESC";
            }
        }



        $dataStock = $db->createCommand($sql)->queryAll();
        $i = 1;
        foreach ($dataStock AS $r) {
            $manage = '<button type="button" data-assetID="' . $r['asset_id'] . '" data-stockID="' . $r['stock_id'] . '" class="data-id btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></button>';

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
            . $r['state']
            . '</td>'
            . '<td> '
            . $manage
            . '</td>'
            . '</tr>';
            $i++;
        }
        /* foreach ($dataStock AS $r) {
          $manage = '<button type="button" data-id="' . $r['asset_id'] . '" class="data-id btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></button>';

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
         * 
         */
    }

    public function actionLoadDataAssetOnSell() {

        if (isset($_POST)) {

            $year = $_POST['id'];

            $Nfunc = new NFunc;

            $dataUser = TbUser::model()->findByPk(Yii::app()->user->id);

            $wh = "tb_institution_institution_id = " . $dataUser->tb_institution_institution_id . " AND ";

            if ($dataUser->user_types_id == 1 || $dataUser->user_types_id == 4) {
                $wh = "";
            }

            $db = Yii::app()->db;
            $sql = "SELECT *,tb_stocks.tb_status_status AS state FROM tb_asset,tb_nature_asset,tb_type_asset,tb_stocks WHERE " . $wh
                    . " tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                    . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                    . "AND tb_asset.asset_id = tb_stocks.tb_asset_asset_id "
                    . "AND tb_stocks.tb_status_status = 'รอจำหน่าย' "
                    . "AND tb_stocks.YearChange = '" . $year . "' "
                    . "AND tb_asset.tb_status_status = 'ขึ้นทะเบียนสำเร็จ' "
                    . "ORDER BY stock_id DESC";



            $dataStock = $db->createCommand($sql)->queryAll();
            $i = 1;
            foreach ($dataStock AS $r) {

                $day = $Nfunc->countDay($r['date_examine'], date('Y-m-d'));
                $per = $r['lifetime'] * 365;

                if ($per > 0) {

                    $per = $r['price_per'] / $per;
                    $sum = $per * $day;

                    $s = $sum;

                    if ($sum <= ($r['price_per'] - 1)) {
                        $all = number_format($sum, 2);
                    } else {
                        $all = number_format($r['price_per'] - 1, 2);
                        $s = $r['price_per'] - 1;
                    }

                    if ($r['state'] != 'คงเหลือหนึ่งบาท') {

                        $avg = $r['price_per'] - $s;

                        if ($avg > 1) {
                            $avg = number_format($avg, 2);
                        } else {
                            $avg = '1.00';
                        }
                    } else {
                        $avg = '1.00';
                    }
                } else {
                    
                }


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
                . $Nfunc->getDateThai($Nfunc->convertSQLToDate($r['date_examine']))
                . '</td>'
                . '<td style="text-align: right;"> '
                . number_format($r['price_per'], 2)
                . '</td>'
                . '<td  style="text-align: right;"> '
                . number_format($r['lifetime'], 2)
                . '</td>'
                . '<td style="text-align: right;"> '
                . $all
                . '</td>'
                . '<td style="text-align: right;"> '
                . $avg
                . '</td>'
                . '<td> '
                . $r['type_asset']
                . '</td>'
                . '<td> '
                . $r['nature_asset']
                . '</td>'
                . '<td> '
                . ''
                . '</td>'
                . '</tr>';
                $i++;
            }
        }
    }
    
    public function actionLoadDataAssetOn() {

        if (isset($_POST)) {

            //$year = $_POST['id'];

            $Nfunc = new NFunc;

            $dataUser = TbUser::model()->findByPk(Yii::app()->user->id);

            $wh = "tb_institution_institution_id = " . $dataUser->tb_institution_institution_id . " AND ";

            if ($dataUser->user_types_id == 1 || $dataUser->user_types_id == 4) {
                $wh = "";
            }

            $db = Yii::app()->db;
            $sql = "SELECT *,tb_stocks.tb_status_status AS state FROM tb_asset,tb_nature_asset,tb_type_asset,tb_stocks WHERE " . $wh
                    . " tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                    . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                    . "AND tb_asset.asset_id = tb_stocks.tb_asset_asset_id "
                    . "AND tb_stocks.tb_status_status != 'รอจำหน่าย' "
                    . "AND tb_stocks.tb_status_status != 'จำหน่าย' "
                    . "AND asset = 1 "
                    . "AND tb_asset.tb_status_status = 'ขึ้นทะเบียนสำเร็จ' "
                    . "ORDER BY stock_id DESC";



            $dataStock = $db->createCommand($sql)->queryAll();
            $i = 1;
            foreach ($dataStock AS $r) {

                $day = $Nfunc->countDay($r['date_examine'], date('Y-m-d'));
                $per = $r['lifetime'] * 365;

                if ($per > 0) {

                    $per = $r['price_per'] / $per;
                    $sum = $per * $day;

                    $s = $sum;

                    if ($sum <= ($r['price_per'] - 1)) {
                        $all = number_format($sum, 2);
                    } else {
                        $all = number_format($r['price_per'] - 1, 2);
                        $s = $r['price_per'] - 1;
                    }

                    if ($r['state'] != 'คงเหลือหนึ่งบาท') {

                        $avg = $r['price_per'] - $s;

                        if ($avg > 1) {
                            $avg = number_format($avg, 2);
                        } else {
                            $avg = '1.00';
                        }
                    } else {
                        $avg = '1.00';
                    }
                } else {
                    
                }


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
                . $Nfunc->getDateThai($Nfunc->convertSQLToDate($r['date_examine']))
                . '</td>'
                . '<td style="text-align: right;"> '
                . number_format($r['price_per'], 2)
                . '</td>'
                . '<td  style="text-align: right;"> '
                . number_format($r['lifetime'], 2)
                . '</td>'
                . '<td style="text-align: right;"> '
                . $all
                . '</td>'
                . '<td style="text-align: right;"> '
                . $avg
                . '</td>'
                . '<td> '
                . $r['type_asset']
                . '</td>'
                . '<td> '
                . $r['nature_asset']
                . '</td>'
                . '<td> '
                . ''
                . '</td>'
                . '</tr>';
                $i++;
            }
        }
    }
    
    public function actionLoadDataAssetLow() {

        if (isset($_POST)) {

            //$year = $_POST['id'];

            $Nfunc = new NFunc;

            $dataUser = TbUser::model()->findByPk(Yii::app()->user->id);

            $wh = "tb_institution_institution_id = " . $dataUser->tb_institution_institution_id . " AND ";

            if ($dataUser->user_types_id == 1 || $dataUser->user_types_id == 4) {
                $wh = "";
            }

            $db = Yii::app()->db;
            $sql = "SELECT *,tb_stocks.tb_status_status AS state FROM tb_asset,tb_nature_asset,tb_type_asset,tb_stocks WHERE " . $wh
                    . " tb_nature_asset_nature_asset_id = tb_nature_asset.nature_asset_id "
                    . "AND tb_nature_asset.tb_type_asset_type_asset_id = tb_type_asset.type_asset_id "
                    . "AND tb_asset.asset_id = tb_stocks.tb_asset_asset_id "
                    . "AND tb_stocks.tb_status_status != 'รอจำหน่าย' "
                    . "AND tb_stocks.tb_status_status != 'จำหน่าย' "
                    . "AND asset = 2 "
                    . "AND tb_asset.tb_status_status = 'ขึ้นทะเบียนสำเร็จ' "
                    . "ORDER BY stock_id DESC";



            $dataStock = $db->createCommand($sql)->queryAll();
            $i = 1;
            foreach ($dataStock AS $r) {

                


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
                . $Nfunc->getDateThai($Nfunc->convertSQLToDate($r['date_examine']))
                . '</td>'
                . '<td style="text-align: right;"> '
                . number_format($r['price_per'], 2)
                . '</td>'
                . '<td  style="text-align: right;"> '
                . number_format($r['lifetime'], 2)
                . '</td>'
                . '<td style="text-align: right;"> '
                . ''
                . '</td>'
                . '<td style="text-align: right;"> '
                . ''
                . '</td>'
                . '<td> '
                . $r['type_asset']
                . '</td>'
                . '<td> '
                . $r['nature_asset']
                . '</td>'
                . '<td> '
                . ''
                . '</td>'
                . '</tr>';
                $i++;
            }
        }
    }

    public function actionSellAdd($id = null) {
        if ($id != null) {
            //echo 1;
            $model = TbStocks::model()->findByPk($id);

            $model->tb_status_status = 'รอจำหน่าย';
            $model->YearChange = date('Y') + 543;
            echo $model->save();
        }
    }

    public function actionReportSell() {
        $this->render('//Report/ReportSell');
    }
    
    public function actionReportON(){
        $this->render('//Report/ReportON');
    }
    
    public function actionReportLow(){
        $this->render('//Report/ReportLow');
    }

}
