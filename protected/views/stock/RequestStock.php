<!-- Page Breadcrumb -->
<?php
$this->renderPartial("//Layouts/Breadcrumb", array('pageTitle' => 'คำขอขึ้นทะเบียน'));
$Nfunc = new NFunc();
?>

<!-- Page Body -->
<div class="page-body" ng-controller="mainController">
    <div role="tabpanel" class="tab-pane fade contentAsset in active" id="home" aria-labelledby="home-tab">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="type_asset_id">ประเภทครุภัณฑ์</label>
                                <div>
                                    <select ng-model="st.type_asset_id" required="true" data-placeholder="เลือกประเภทครุภัณฑ์..." class="chosen-select" name="type_asset_id" id="type_asset_id">
                                        <option value=""></option>
                                        <?php
                                        $this->renderPartial('//Asset/selectOption', array(
                                            'model' => $typeAsset,
                                            'indexValue' => 'type_asset_id',
                                            'indexLabel' => 'type_asset'
                                        ));
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="tb_nature_asset_nature_asset_id">ลักษณะครุภัณฑ์</label>
                                <div>
                                    <select ng-model="st.tb_nature_asset_nature_asset_id" required="true" data-placeholder="เลือกประเภทครุภัณฑ์..." class="chosen-select" name="tb_nature_asset_nature_asset_id" id="tb_nature_asset_nature_asset_id">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="well">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-condensed">
                                    <thead>
                                        <tr class="success">
                                            <th>ที่</th>
                                            <th style="width: 200px;">คำขอที่</th>
                                            <th style="width: 220px;">วันที่ขอขึ้นทะเบียน</th>
                                            <th style="width: 220px;">ที่ spec</th>
                                            <th style="width: 250px;">ที่รายงานความต้องการ</th>
                                            <th style="width: 200px;">ประเภท</th>
                                            <th style="width: 200px;">ลักษณะ</th>
                                            <th style="width: 200px;">ราคา : หน่วย</th>
                                            <th style="width: 200px;">รายการแก้ไข</th>
                                            <th style="width: 200px;">จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bodyDataTable">
                                        <?php
                                            $i = 1;
                                            foreach ($data AS $r){
                                        ?>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$r['register_code']?></td>
                                            <td><?= $Nfunc->getDateThaiBH ($Nfunc->convertSQLToDate( $r['date_asset'] ))?></td>
                                            <td><?=$r['specification_code']?></td>
                                            <td><?=$r['report_pd01_code']?></td>
                                            <td><?=$r['type_asset']?></td>
                                            <td><?=$r['nature_asset']?></td>
                                            <td><?= number_format($r['price_per'],2)?></td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success editListPro" data-id="<?=$r['asset_id']?>" title="แก้ไขคำขอ"><i class="glyphicon glyphicon-edit"></i></button>
                                                <button type="button" class="btn btn-danger deleteListPro" data-id="<?=$r['asset_id']?>" title="ยกเลิกคำขอ"><i class="glyphicon glyphicon-remove"></i></button>
                                            </td>
                                        </tr>
                                        <?php
                                                $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>        
                    </div>
                </div>
</div>


<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/assets/layout/assets/js/chosen.jquery.js', CClientScript::POS_END); ?>

<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/RequestStock.js', CClientScript::POS_END); ?>