<!-- Page Breadcrumb -->
<?php
$this->renderPartial("//layouts/Breadcrumb", array('pageTitle' => 'ขอ โอน/ย้าย ครุภัณฑ์'));
$Nfunc = new NFunc();
?>
<div class="page-body" ng-controller="mainController">
    <div class="row">
        <div class="col-md-3 col-md-offset-9">
            <div class="form-group">
                <label for="asset_code">รหัสครุภัณฑ์</label>
                <input type="text" class="form-control" id="asset_code" placeholder="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <div class="form-group">
                    <label class="control-label" for="type_asset_id">ประเภทครุภัณฑ์</label>
                    <div>
                        <select required="true" data-placeholder="เลือกประเภทครุภัณฑ์..." class="chosen-select" name="type_asset_id" id="type_asset_id">
                            <option value=""></option>
                            <?php
                            $this->renderPartial('//Asset/selectOption', array(
                                'model' => $TbTypeAsset,
                                'indexValue' => 'type_asset_id',
                                'indexLabel' => 'type_asset'
                            ));
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="form-group">
                    <label class="control-label" for="nature_asset_id">ลักษณะครุภัณฑ์</label>
                    <div>
                        <select required="true" data-placeholder="เลือกลักษณะครุภัณฑ์..." class="chosen-select" name="nature_asset_id" id="nature_asset_id">
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="form-group">
                    <label class="control-label" for="division_id">สำนัก/กองงาน</label>
                    <div>
                        <select required="true" data-placeholder="เลือกสำนัก/กองงาน..." class="chosen-select" name="division_id" id="division_id">
                            <option></option>
                            <?php
                            $this->renderPartial('//Asset/selectOption', array(
                                'model' => $TbDivision,
                                'indexValue' => 'division_id',
                                'indexLabel' => 'division'
                            ));
                            ?>
                        </select>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="form-group">
                    <label class="control-label" for="institution_id">หน่วยงาน/โครงการ</label>
                    <div>
                        <select required="true" data-placeholder="เลือกหน่วยงาน/โครงการ..." class="chosen-select" name="institution_id" id="institution_id">
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="well" style="overflow-y:hidden;">
            <table class="table table-hover">
                <thead>
                    <tr class="success">
                        <th style="vertical-align: middle;">#</th>
                        <th style="vertical-align: middle;">รหัสครุภัณฑ์</th>
                        <th style="vertical-align: middle;">ประเภทครุภัณฑ์</th>
                        <th style="vertical-align: middle;">ลักษณะครุภัณฑ์</th>
                        <th style="vertical-align: middle;">คุณสมบัติครุภัณฑ์</th>
                        <th style="vertical-align: middle;">หมายเลขเครื่อง</th>
                        <th style="vertical-align: middle;">สำนัก/กองงาน</th>
                        <th style="vertical-align: middle;">หน่วยงาน/โครงการ</th>
                        <th style="vertical-align: middle;">จัดการ</th>
                    </tr>
                </thead>
                <tbody id="ShowList"></tbody>
            </table>
        </div>
    </div>

</div>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/assets/layout/assets/js/chosen.jquery.js', CClientScript::POS_END); ?>

<?php 

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/transfer/Request.js', CClientScript::POS_END); 