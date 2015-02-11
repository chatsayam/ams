<?php
$Nfunc = new NFunc();
?>
<div  ng-controller="mainController">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="glyphicon glyphicon-hand-right"></i> <span id="topicPd44Plus">บันทึกข้อมูลขอขึ้นทะเบียน</span></h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>


    <ul id="mytab" class="nav nav-tabs">
        <li class="active">
            <a href="#tabObject" data-toggle="tab">ความต้องการพัสดุ</a>
        </li>
        <li>
            <a href="#tabBudget" data-toggle="tab">การจัดซื้อ</a>
        </li>
        <li>
            <a href="#tabPurchasing" data-toggle="tab">การตรวจรับ</a>
        </li>
        <li>
            <a href="#tabSeller" data-toggle="tab">ผู้ขาย</a>
        </li>
        <li>
            <a href="#tabExaminer" data-toggle="tab">เพิ่มเติมรายละเอียด</a>
        </li>
        <li>
            <a href="#tabDetail" data-toggle="tab">ข้อมูลทั่วไป</a>
        </li>
        <li>
            <a href="#tabRegiter" data-toggle="tab">รายงาน</a>
        </li>

    </ul>

    <div class="tab-content" style="margin-top:20px;">
        <div class="tab-pane fade in active" id="tabObject">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="register_code">เลขที่คำขอขึ้นทะเบียน</label>
                        <input ng-model="st.register_code" ng-change="addLocalStorage()" class="form-control" type="text" required="true" name="register_code" id="register_code">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="report_pd01_code">รายงานความต้องการพัสดุที่</label>
                        <input ng-model="st.report_pd01_code" ng-change="addLocalStorage()" class="form-control" type="text" required="true" name="report_pd01_code" id="report_pd01_code">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="date_report_pd01">ลงวันที่</label>
                        <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-language="th" data-date-autoclose="true">
                            <input ng-model="st.date_report_pd01" ng-change="addLocalStorage()" ng-pattern="/^\d\d/\d\d/\d\d\d\d$/" class="form-control" type="text" required="true" name="date_report_pd01" id="date_report_pd01">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-th"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="year_cost">ปีงบประมาณ</label>
                        <input ng-model="st.year_cost" ng-change="addLocalStorage()" class="form-control" ng-pattern="/^\d\d\d\d$/" list="listYearCost" type="text" required="true" name="year_cost" id="year_cost" placeholder="เลือกปี...">
                        <datalist id="listYearCost">
                            <?= $Nfunc->optionSelectYear() ?>
                        </datalist>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="source_cost_code">รหัสแหล่งของเงิน</label>
                        <input ng-model="st.source_cost_code" ng-change="addLocalStorage()" class="form-control" type="text" required="true" name="source_cost_code" id="source_cost_code">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="budget_code">รหัสงบประมาณ</label>
                        <input ng-model="st.budget_code" ng-change="addLocalStorage()" class="form-control" type="text" required="true" name="budget_code" id="budget_code">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="activity_code">รหัสกิจกรรมหลัก</label>
                        <input ng-model="st.activity_code" ng-change="addLocalStorage()" class="form-control" type="text" required="true" name="activity_code" id="activity_code">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="sub_activity_code">รหัสกิจกรรมย่อย</label>
                        <input ng-model="st.sub_activity_code" ng-change="addLocalStorage()" class="form-control" type="text" required="true" name="sub_activity_code" id="sub_activity_code">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="orther_asset">รายละเอียดการใช้งาน</label>
                        <textarea ng-model="st.orther_asset" ng-change="addLocalStorage()" class="form-control" style="height: 100px" required="true" name="orther_asset" id="orther_asset"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <form method="post" id="frm_file_pd01" enctype="multipart/form-data" action="#">
                        <div class="form-group">
                            <label class="control-label" for="file_pd01">แนบไฟล์รายงานความต้องการ</label>
                            <input ng-disabled="fl.file_pd01_name != ''" id="file_pd01" name="file_pd01" class="form-control" type="file" multiple="true">
                        </div>
                    </form>
                    <input type="hidden"  ng-model="fl.file_pd01_name" required="true" value="" name="file_pd01_name" id="file_pd01_name" >
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tabBudget">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="specification_code">เลขที่&nbsp;specification</label>
                        <input ng-model="st.specification_code" ng-change="addLocalStorage()" class="form-control" type="text" required="true" name="specification_code" id="specification_code">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="amount">จำนวน</label>
                        <input ng-model="st.amount" ng-change="addLocalStorage()" class="form-control" type="text" ng-pattern="/^[1-9]\d{0,10}$/" required="true" name="amount" id="amount">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="price_per">ราคาต่อหน่วย</label>
                        <input ng-model="st.price_per" ng-change="addLocalStorage()" class="form-control" type="number" required="true" name="price_per" id="price_per">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="call_unit">หน่วยเรียก</label>
                        <input ng-model="st.call_unit" ng-change="addLocalStorage()" class="form-control" type="text" required="true" list="listCallUnit" name="call_unit" id="call_unit" placeholder="เลือก...">
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
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="brand">ยี่ห้อ</label>
                        <input ng-model="st.brand" ng-change="addLocalStorage()" class="form-control" type="text" required="true" name="brand" id="brand">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="version">แบบ&nbsp;(รุ่น)</label>
                        <input ng-model="st.version" ng-change="addLocalStorage()" class="form-control" type="text" required="true" name="version" id="version">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="made_in">ประเทศผู้ผลิต</label>
                        <input ng-model="st.made_in" ng-change="addLocalStorage()" class="form-control" type="text" required="true" name="made_in" id="made_in">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="tb_purchase_purchase_id">ผู้จัดซื้อ</label>
                        <div>
                            <select ng-model="st.tb_purchase_purchase_id" ng-change="addLocalStorage()" required="true" data-placeholder="เลือกผู้จัดซื้อ..." class="chosen-select" name="tb_purchase_purchase_id" id="tb_purchase_purchase_id">
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
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="tb_get_asset_get_asset_id">วิธีการได้มา</label>
                        <div>
                            <select ng-model="st.tb_get_asset_get_asset_id" ng-change="addLocalStorage()" required="true" data-placeholder="เลือกวิธีการได้มา..." class="chosen-select" name="tb_get_asset_get_asset_id" id="tb_get_asset_get_asset_id">
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
                            <select ng-model="st.tb_type_cost_type_cost_id" ng-change="addLocalStorage()" required="true" data-placeholder="เลือกประเภทเงิน..." class="chosen-select" name="tb_type_cost_type_cost_id" id="tb_type_cost_type_cost_id">
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
                <div class="col-md-6">
                    <form method="post" id="frm_file_spec" enctype="multipart/form-data" action="#">
                        <div class="form-group">
                            <label class="control-label" for="file_spec">แนบไฟล์ไฟล์&nbsp;specification</label>
                            <input ng-disabled="fn.file_spec_name != ''" id="file_spec" name="file_spec" class="form-control" type="file" multiple="true">
                        </div>
                    </form>
                    <input type="hidden" required="true" ng-model="fn.file_spec_name" value="" name="file_spec_name" id="file_spec_name" >
                </div>
            </div>

        </div>
        <div class="tab-pane fade" id="tabPurchasing">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="contract_code">เลขที่สัญญาซื้อขาย</label>
                        <input ng-model="st.contract_code" ng-change="addLocalStorage()" class="form-control" type="text" required="true" name="contract_code" id="contract_code">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="contract_date">ลงวันที่</label>
                        <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-language="th" data-date-autoclose="true">
                            <input ng-model="st.contract_date" ng-change="addLocalStorage()" ng-pattern="/^\d\d/\d\d/\d\d\d\d$/" class="form-control" type="text" required="true" name="contract_date" id="contract_date">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-th"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="date_examine">วันที่ตรวจรับ</label>
                        <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-language="th" data-date-autoclose="true">
                            <input ng-model="st.date_examine" ng-change="addLocalStorage()" ng-pattern="/^\d\d/\d\d/\d\d\d\d$/" class="form-control" type="text" required="true" name="date_examine" id="date_examine">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-th"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="lifetime">อายุการใช้งาน</label>
                        <input ng-model="st.lifetime" ng-change="addLocalStorage()" class="form-control" type="number" required="true" name="lifetime" id="lifetime">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="warrenty">อายุการรับประกัน</label>
                        <input ng-model="st.warrenty" ng-change="addLocalStorage()" class="form-control" type="number" required="true" name="warrenty" id="warrenty">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="type_asset_id">ประเภทครุภัณฑ์</label>
                        <div>
                            <select ng-model="st.type_asset_id" ng-change="addLocalStorage()" required="true" data-placeholder="เลือกประเภทครุภัณฑ์..." class="chosen-select" name="type_asset_id" id="type_asset_id">
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
                            <select ng-model="st.tb_nature_asset_nature_asset_id" ng-change="addLocalStorage()" required="true" data-placeholder="เลือกประเภทครุภัณฑ์..." class="chosen-select" name="tb_nature_asset_nature_asset_id" id="tb_nature_asset_nature_asset_id">
                                <option value=""></option>
                                <?php
                                $this->renderPartial('//Asset/selectOption', array(
                                    'model' => $natureAsset,
                                    'indexValue' => 'nature_asset_id',
                                    'indexLabel' => 'nature_asset'
                                ));
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="feature">คุณสมบัติครุภัณฑ์ทั่วไป</label>
                        <textarea ng-model="st.feature" ng-change="addLocalStorage()" class="form-control" required="true" name="feature" id="feature" style="height: 100px;"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="orther">รายละเอียดอื่นๆ</label>
                        <textarea ng-model="st.orther" ng-change="addLocalStorage()" class="form-control" required="true" name="orther" id="orther" style="height: 100px;"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form method="post" id="frm_file_pd38" enctype="multipart/form-data" action="#">
                        <div class="form-group">
                            <label class="control-label" for="file_pd38">แนบไฟล์รายงานการตรวจรับพัสดุ</label>
                            <input ng-disabled="fm.file_pd38_name != ''" id="file_pd38" name="file_pd38" class="form-control" type="file" multiple="true">
                        </div>
                    </form>
                    <input type="hidden" required="true" ng-model="fm.file_pd38_name" value="" name="file_pd38_name" id="file_pd38_name" >
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tabSeller">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="invoice_code">เลขที่ใบส่งของ/ใบกากับภาษี</label>
                        <input ng-model="st.invoice_code" ng-change="addLocalStorage()" class="form-control" type="text" required="true" name="invoice_code" id="invoice_code">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="invoice_date">วันที่ส่งของ</label>
                        <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-language="th" data-date-autoclose="true">
                            <input ng-model="st.invoice_date" ng-change="addLocalStorage()" ng-pattern="/^\d\d/\d\d/\d\d\d\d$/" class="form-control" type="text" required="true" name="invoice_date" id="invoice_date">
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
                        <textarea disabled="true" class="form-control" name="vendors" id="vendors" style="height: 120px"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form method="post" id="frm_file_invoice" enctype="multipart/form-data" action="#">
                        <div class="form-group">
                            <label class="control-label" for="file_invoice">แนบไฟล์ใบส่งของ/ใบกำกับภาษี</label>
                            <input ng-disabled="fo.file_invoice_name != ''" id="file_invoice" name="file_invoice" class="form-control" type="file" multiple="true">
                        </div>
                    </form>
                    <input type="hidden" required="true" ng-model="fo.file_invoice_name" value="" name="file_invoice_name" id="file_invoice_name" >
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tabExaminer">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="hidden" id="idForPageComment" value="1">
                        <?= CHtml::label("รายละเอียดแนบท้าย", "Detail", array('class' => 'control-label')) ?>
                        <?= CHtml::textField("txtDetail", null, array('class' => 'form-control', 'ng-model' => 'dt.detail', 'ng-change' => 'addDetailStorage()', 'style' => 'height:250px;')) ?>
                    </div>
                </div>
            </div>

        </div>
        <div class="tab-pane fade" id="tabDetail">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="machine_code">หมายเลขเครื่อง</label>
                        <textarea ng-model="st.machine_code" ng-change="addLocalStorage()" class="form-control" name="machine_code" id="machine_code" style="height: 100px"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="base_in">ใช้ประมาณการที่</label>
                        <textarea ng-model="st.base_in" ng-change="addLocalStorage()" class="form-control" name="base_in" id="base_in" style="height: 100px"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="work">สำหรับงาน</label>
                        <input ng-model="st.work" ng-change="addLocalStorage()" class="form-control" type="text" required="true" name="work" id="work">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="gfmis_code">เลขรหัสสินทรัพย์&nbsp;ถาวร&nbsp;GFMIS</label>
                        <input ng-model="st.gfmis_code" ng-change="addLocalStorage()" class="form-control" type="text" required="true" name="gfmis_code" id="gfmis_code">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="tb_status_status">สถานะ</label>
                        <select ng-model="st.tb_status_status" ng-change="addLocalStorage()" required="true" data-placeholder="เลือกสถานะ..." class="form-control" name="tb_status_status" id="tb_status_status">
                            <option value="">กำหนดสถานะ...</option>
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
            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3">
                    <button class="btn btn-success" id="saveStock" ng-click="saveStockData()" type="button"><span class="glyphicon glyphicon-save"></span> บันทึก</button>&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-danger" id="ClaerStock" type="button"><span class="glyphicon glyphicon-remove"></span> ยกเลิก</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="well">
                    <table class="table table-hover">
                        <thead>
                            <tr class="success">
                                <th>#</th>
                                <th>หมายเลขเครื่อง</th>
                                <th>ใช้ประมาณการที่</th>
                                <th>สำหรับงาน</th>
                                <th>ที่ GFMIS</th>
                                <th>สถานะ</th>
                                <th>ลบรายการ</th>
                            </tr>
                        </thead>
                        <tbody id="showDataStock">
                            <tr ng-repeat="x in listDataStock">
                                <th scope="row">{{$index + 1}}</th>
                                <td>{{x.machine_code}}</td>
                                <td>{{x.base_in}}</td>
                                <td>{{x.work}}</td>
                                <td>{{x.gfmis_code}}</td>
                                <td>{{x.tb_status_status}}</td>
                                <td><button class="RemoveDataListStock btn btn-danger" type="button" data-remove="{{x.stock_id}}" title="ลบรายการออก"><span class="glyphicon glyphicon-trash"></span></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tabRegiter">
            <div class="row">
                <div class="col-md-12">
                    <button id="vReport" ng-click="openReport()" class="btn btn-info" name="yt0" type="button"><span class="glyphicon glyphicon-eye-open"></span> เรียกดู</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-info" ng-click="exportPDF()" type="button"><span class="glyphicon glyphicon-file"></span> ส่งออก PDF</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-info" ng-click="showDetail()" data-toggle="modal" data-target=".bs-example-modal-lg" type="button"><span class="glyphicon glyphicon-list-alt"></span> รายละเอียดเพิ่มเติม</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="well">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr class="warning">
                                    <th>ไฟล์รายงานความต้องการ</th>
                                    <th>ไฟล์รายงาน Spec.</th>
                                    <th>ไฟล์รายงานการตรวจรับ</th>
                                    <th>ไฟล์รายงานใบส่งของ/ใบกำกับภาษี</th>
                                </tr>
                            </thead>
                            <tbody id="showDataFile">
                                <tr ng-repeat="x in listDataFile">
                                    <td>
                                        <button class="dataFile btn btn-success" data-src="{{x.file_pd01}}" type="button"><span class="glyphicon glyphicon-eye-open"></span> เปิดไฟล์ที่แนบ</button>
                                    </td>
                                    <td>
                                        <button class="dataFile btn btn-success" data-src="{{x.file_spec}}" type="button"><span class="glyphicon glyphicon-eye-open"></span> เปิดไฟล์ที่แนบ</button>
                                    </td>
                                    <td>
                                        <button class="dataFile btn btn-success" data-src="{{x.file_pd38}}" type="button"><span class="glyphicon glyphicon-eye-open"></span> เปิดไฟล์ที่แนบ</button>
                                    </td>
                                    <td>
                                        <button class="dataFile btn btn-success" data-src="{{x.file_invoice}}" type="button"><span class="glyphicon glyphicon-eye-open"></span> เปิดไฟล์ที่แนบ</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">รายละเอียดอื่นๆ</h4>
                </div>
                <div class="modal-body" id="showListDetail">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
if (isset($_GET['EDIT']) && $_GET['EDIT'] == 'EDIT') {
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/Register_edit.js', CClientScript::POS_END);
} else {
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/Register.js', CClientScript::POS_END);
}