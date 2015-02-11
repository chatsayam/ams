<?php

$NFunc = new NFunc;

$assetID = $NFunc->getCookieData('assetID');

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

$this->renderPartial("//Asset/_ReportPD44ManyPDF", array(
    'model' => $model,
    'DurableGoods' => $DurableGoods,
    'page' => $page,
    'pageAll' => $pageAll,
    'limit' => $limit
));
