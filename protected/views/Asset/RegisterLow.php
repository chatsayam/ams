<!-- Page Breadcrumb -->
<?php
$this->renderPartial("//Layouts/Breadcrumb", array('pageTitle' => 'บันทึกข้อมูลครุภัณฑ์ต่ำกว่าเกณฑ์'));
$Nfunc = new NFunc();
?>

<div class="page-body" ng-controller="mainController">

    <div class="wizard wizard-tabbed" data-target="#tabbedwizardsteps">
        <ul id="mytab" >
            <li class="active">
                <span class="step">1</span>
                <a href="#tabBudget" data-toggle="tab">การจัดซื้อ</a>
                <span class="chevron"></span>
            </li>
            <li>
                <span class="step">2</span>
                <a href="#tabPurchasing" data-toggle="tab">คุณสมบัติ</a>
                <span class="chevron"></span>
            </li>
            <li>
                <span class="step">3</span>
                <a href="#tabSeller" data-toggle="tab">ผู้ขาย</a>
                <span class="chevron"></span>
            </li>
            <li>
                <span class="step">4</span>
                <a href="#tabDetail" data-toggle="tab">ข้อมูลทั่วไป</a>
                <span class="chevron"></span>
            </li>
            <li>
                <span class="step">5</span>
                <a href="#tabRegiter" data-toggle="tab">รายงาน</a>
                <span class="chevron"></span>
            </li>
                
        </ul>
    </div>
    <div class="tab-content" style="margin-top:20px;">
        <div class="tab-pane fade in active" id="tabBudget">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="register_code">ที่เอกสาร</label>
                        <input ng-model="st.register_code" class="form-control" type="text" required="true" name="register_code" id="register_code">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="tb_purchase_purchase_id">ผู้จัดซื้อ</label>
                        <div>
                            <select ng-model="st.tb_purchase_purchase_id" required="true" data-placeholder="เลือกผู้จัดซื้อ..." class="chosen-select" name="tb_purchase_purchase_id" id="tb_purchase_purchase_id">
                                <option value=""></option>
                                <?php
                                $this->renderPartial('//Asset/selectOption', array(
                                    'model' => $purchase,
                                    'indexValue' => 'purchase_id',
                                    'indexLabel' => 'purchase'
                                ));
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="tb_get_asset_get_asset_id">วิธีการได้มา</label>
                        <div>
                            <select ng-model="st.tb_get_asset_get_asset_id" required="true" data-placeholder="เลือกวิธีการได้มา..." class="chosen-select" name="tb_get_asset_get_asset_id" id="tb_get_asset_get_asset_id">
                                <option value=""></option>
                                <?php
                                $this->renderPartial('//Asset/selectOption', array(
                                    'model' => $getAsset,
                                    'indexValue' => 'get_asset_id',
                                    'indexLabel' => 'get_asset'
                                ));
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="tb_type_cost_type_cost_id">ประเภทเงิน</label>
                        <div>
                            <select ng-model="st.tb_type_cost_type_cost_id" required="true" data-placeholder="เลือกประเภทเงิน..." class="chosen-select" name="tb_type_cost_type_cost_id" id="tb_type_cost_type_cost_id">
                                <option value=""></option>
                                <?php
                                $this->renderPartial('//Asset/selectOption', array(
                                    'model' => $typeCost,
                                    'indexValue' => 'type_cost_id',
                                    'indexLabel' => 'type_cost'
                                ));
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="brand">ยี่ห้อ</label>
                        <input ng-model="st.brand" class="form-control" type="text" required="true" name="brand" id="brand">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="version">แบบ&nbsp;(รุ่น)</label>
                        <input ng-model="st.version" class="form-control" type="text" required="true" name="version" id="version">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="made_in">ประเทศผู้ผลิต</label>
                        <input ng-model="st.made_in" class="form-control" type="text" required="true" name="made_in" id="made_in">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="amount">จำนวน</label>
                        <input ng-model="st.amount" class="form-control" type="number" required="true" name="amount" id="amount">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="price_per">ราคาต่อหน่วย</label>
                        <input ng-model="st.price_per" class="form-control" type="number" required="true" name="price_per" id="price_per">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="call_unit">หน่วยเรียก</label>
                        <input ng-model="st.call_unit" class="form-control" type="text" required="true" list="listCallUnit" name="call_unit" id="call_unit" placeholder="เลือก...">
                        <datalist id="listCallUnit">
                            <option value="คัน">คัน</option>
                            <option value="เครื่อง">เครื่อง</option>
                            <option value="อัน">อัน</option>
                            <option value="ชิ้น">ชิ้น</option>
                            <option value="ชุด">ชุด</option>
                            <option value="หน่วย">หน่วย</option>
                        </datalist>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="year_cost">ปีงบประมาณ</label>
                        <input ng-model="st.year_cost" class="form-control" list="listYearCost" type="text" required="true" name="year_cost" id="year_cost" placeholder="เลือกปี...">
                        <datalist id="listYearCost">
                            <?= $Nfunc->optionSelectYear() ?>
                        </datalist>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tabPurchasing">
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
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="feature">คุณสมบัติครุภัณฑ์ทั่วไป</label>
                        <textarea ng-model="st.feature" class="form-control" required="true" name="feature" id="feature" style="height: 100px;"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="orther">รายละเอียดอื่นๆ</label>
                        <textarea ng-model="st.orther" class="form-control" required="true" name="orther" id="orther" style="height: 100px;"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tabSeller">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="invoice_code">เลขที่ใบส่งของ/ใบกากับภาษี</label>
                        <input ng-model="st.invoice_code" class="form-control" type="text" required="true" name="invoice_code" id="invoice_code">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="invoice_date">วันที่ส่งของ</label>
                        <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-language="th" data-date-autoclose="true">
                            <input ng-model="st.invoice_date" ng-pattern="/^\d\d/\d\d/\d\d\d\d$/" class="form-control" type="text" required="true" name="invoice_date" id="invoice_date">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-th"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="vendors_id">ค้นหาผู้ขาย</label>
                        <input ng-model="fv.vendors_id" ng-keyup="selectVendor()" ng-change="filVendeor()" class="form-control" type="text" list="listVendors" name="vendors_id" id="vendors_id">
                        <datalist id="listVendors">

                        </datalist>
                        <input type="hidden" required="true" ng-model="fp.tb_vendors_vendors_id" value="" name="tb_vendors_vendors_id" id="tb_vendors_vendors_id" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="vendors">รายละเอียดผู้ขาย</label>
                        <textarea disabled="true" ng-model="fvshow.vendors" class="form-control" name="vendors" id="vendors" style="height: 200px"></textarea>

                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tabDetail">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="machine_code">หมายเลขเครื่อง</label>
                        <textarea ng-model="st.machine_code" class="form-control" name="machine_code" id="machine_code" style="height: 100px"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="base_in">ใช้ประมาณการที่</label>
                        <textarea ng-model="st.base_in" class="form-control" name="base_in" id="base_in" style="height: 100px"></textarea>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label class="control-label" for="work">สำหรับงาน</label>
                        <input ng-model="st.work" class="form-control" type="text" required="true" name="work" id="work">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="gfmis_code">เลขรหัสครุภัณฑ์</label>
                        <input ng-model="st.asset_code" class="form-control" type="text" required="true" name="gfmis_code" id="gfmis_code">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="tb_status_status">สถานะ</label>
                        <div>
                            <select ng-model="st.tb_status_status" required="true" data-placeholder="เลือกสถานะ..." class="chosen-select" name="tb_status_status" id="tb_status_status">
                                <option value=""></option>
                                <?php
                                $this->renderPartial('//Asset/selectOption', array(
                                    'model' => $status,
                                    'indexValue' => 'status',
                                    'indexLabel' => 'status'
                                ));
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tabRegiter">
            <div class="row">
                <div class="col-md-12">
                    <button id="vReport" class="btn btn-info" ng-click="openReport()" type="button"><span class="glyphicon glyphicon-eye-open"></span> เรียกดู</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                </div>
            </div>
        </div>
    </div>
    <hr style="border-color:#DDD; margin-bottom: 10px;">

    <div id="alertText" class="alert alert-danger alert-dismissable">
        <button id="closeAlertText" type="button" class="close" onclick="$('#alertText').hide();" aria-hidden="true">×</button>
        <a href="#" class="alert-link">หมายเหตุ</a>. หากกรอกข้อมูลไม่ถูกต้อง กล่องข้อความจะกลายเป็นสีแดง.
    </div>

    <div class="row">
        <div class="col-md-12" style="text-align: right;">
            <button id="bPrevious" type="button" class="btn btn-info" style="display:none;">&#60;&#60;&nbsp;กลับ</button>
            &nbsp;&nbsp;
            <button id="bNext" type="button" class="btn btn-info">ถัดไป&#62;&#62;</button>
        </div>

    </div>

</div>


<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/assets/layout/assets/js/wysihtml5-0.3.0.js', CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/assets/layout/assets/bootstrap/js/bootstrap-wysihtml5.js', CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/assets/layout/assets/js/chosen.jquery.js', CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/RegisterLow.js', CClientScript::POS_END); ?>