<style>.datepicker { z-index: 1151 !important;  }</style>
<div class="row">
    <div class="col-lg-12">
        <h4 class="page-header"><i class="glyphicon glyphicon-hand-right"></i> จ่ายยืมพัสดุ</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <?= CHtml::label("รหัสครุภัณฑ์", "s_durableCode", array('class' => 'control-label')) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <?= CHtml::textField("s_durableCode", NULL, array('class' => 'form-control', 'check-exp' => 'notnull', 'placeholder' => '')) ?>
                </div>
                <?php // BsHtml::button('ค้นหา', array('color' => BSHtml::BUTTON_COLOR_INFO, 'icon' => BSHtml::GLYPHICON_SEARCH, 'id' => 'sendSearch', 'class' => 'col-md-3')) ?>    
            </div>
        </div>
    </div>       
</div>
<hr style="border-color:#DDD; margin-bottom: 20px; margin-top:5px;">
<div id="alertInfo" class="bs-callout bs-callout-info">
    <h4>โปรดกรอกรหัสครุภัณฑ์</h4>
    <p>โปรดกรอกกรอกรหัสครุภัณฑ์จากนั้นกดปุ่มค้นหา เพื่อดำเนินการโอน/ย้ายครุภัณฑ์</p>
</div>
<div id="alertWarning" class="bs-callout bs-callout-warning" style="display:none;">
    <h4>ไม่พบข้อมูล</h4>
    <p>ไม่มีข้อมูลรหัสครุภัณฑ์ชุดนี้ หรืออาจเกิดจากกรอกรหัสครุภัณฑ์ผิด</p>
</div>
<div class="row">
    <div class="col-lg-12">
        <table id="tableDurable" class="table table-hover" style="display:none;">
            <thead>
                <tr class="info">
                    <th style="width:5%">#</th>
                    <th style="width:30%">หมายเลขเครื่อง</th>
                    <th style="width: 18%">รหัสครุภัณฑ์</th>
                    <th style="width: 18%">หมายเลข ชป.</th>
                    <th style="width: 18%">ใช้งานที่</th>
                    <th>จัดการข้อมูล</th>
                </tr>
            </thead>
            <tbody id="tboby-showData"></tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="TranHitoryModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">ประวัติการโอน/ย้าย ครุภัณฑ์</h4>
            </div>
            <div class="modal-body" id="TranHitoryBody">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div id="viewModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myLargeModalLabel">เรียกดูข้อมูลรายการ</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= CHtml::label("รหัสครุภัณฑ์", null, array('class' => 'control-label')) ?>
                            <p id="t_durableCode" class="form-control-static"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= CHtml::label("หมายเลข ชป.", null, array('class' => 'control-label')) ?>
                            <p id="t_weekDurableCode" class="form-control-static"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= CHtml::label("หมายเลขเครื่อง", null, array('class' => 'control-label')) ?>
                            <p id="t_idMachine" class="form-control-static"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= CHtml::label("ใช้งานที่", null, array('class' => 'control-label')) ?>
                            <p id="t_durableBase" class="form-control-static"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= CHtml::label("ยี่ห้อ", null, array('class' => 'control-label')) ?>
                            <p id="t_brand" class="form-control-static"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= CHtml::label("รุ่น", null, array('class' => 'control-label')) ?>
                            <p id="t_version" class="form-control-static"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= CHtml::label("ประเภทครุภัณฑ์", null, array('class' => 'control-label')) ?>
                            <p id="t_tgName" class="form-control-static"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= CHtml::label("ลักษณะครุภัณฑ์", null, array('class' => 'control-label')) ?>
                            <p id="t_ngName" class="form-control-static"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= CHtml::label("คุณสมบัติครุภัณฑ์", null, array('class' => 'control-label')) ?>
                            <p id="t_popName" class="form-control-static"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= CHtml::label("สถานะ", null, array('class' => 'control-label')) ?>
                            <p id="t_status" class="form-control-static"></p>
                        </div>
                    </div>
                </div>
                <hr style="border-color:#DDD; margin-bottom: 20px;">
                <div class="row">
                    <div class="col-md-12" style="text-align: right;">
                        <?php // BsHtml::button('ปิด', array('color' => BSHtml::BUTTON_COLOR_DANGER, 'icon' => BSHtml::GLYPHICON_REMOVE, 'id' => 'bCloseViewModal', 'data-dismiss' => 'modal')) ?>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="viewModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myLargeModalLabel">เรียกดูข้อมูลรายการ</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= CHtml::label("รหัสครุภัณฑ์", null, array('class' => 'control-label')) ?>
                            <p id="t_durableCode" class="form-control-static"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= CHtml::label("หมายเลข ชป.", null, array('class' => 'control-label')) ?>
                            <p id="t_weekDurableCode" class="form-control-static"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= CHtml::label("หมายเลขเครื่อง", null, array('class' => 'control-label')) ?>
                            <p id="t_idMachine" class="form-control-static"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= CHtml::label("ใช้งานที่", null, array('class' => 'control-label')) ?>
                            <p id="t_durableBase" class="form-control-static"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= CHtml::label("ยี่ห้อ", null, array('class' => 'control-label')) ?>
                            <p id="t_brand" class="form-control-static"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= CHtml::label("รุ่น", null, array('class' => 'control-label')) ?>
                            <p id="t_version" class="form-control-static"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= CHtml::label("ประเภทครุภัณฑ์", null, array('class' => 'control-label')) ?>
                            <p id="t_tgName" class="form-control-static"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= CHtml::label("ลักษณะครุภัณฑ์", null, array('class' => 'control-label')) ?>
                            <p id="t_ngName" class="form-control-static"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= CHtml::label("คุณสมบัติครุภัณฑ์", null, array('class' => 'control-label')) ?>
                            <p id="t_popName" class="form-control-static"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= CHtml::label("สถานะ", null, array('class' => 'control-label')) ?>
                            <p id="t_status" class="form-control-static"></p>
                        </div>
                    </div>
                </div>
                <hr style="border-color:#DDD; margin-bottom: 20px;">
                <div class="row">
                    <div class="col-md-12" style="text-align: right;">
                        <?php // BsHtml::button('ปิด', array('color' => BSHtml::BUTTON_COLOR_DANGER, 'icon' => BSHtml::GLYPHICON_REMOVE, 'id' => 'bCloseViewModal', 'data-dismiss' => 'modal')) ?>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="transferModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myLargeModalLabel">โอน/ย้าย ครุภัณฑ์</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= CHtml::label("เลขที่/ใบโอน", 'thCode', array('class' => 'control-label')) ?>
                            <?= CHtml::textField("thCode", null, array('class' => 'form-control', 'check-exp' => 'notnull')) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= CHtml::label("ลงวันที่/ใบโอน", 'dateTranfer', array('class' => 'control-label')) ?>
                            <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-language="th" data-date-autoclose="true">
                                <?= CHtml::textField("dateTranfer", null, array('class' => 'form-control', 'check-exp' => 'notnull')) ?>
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-th"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= CHtml::label("รหัสครุภัณฑ์", 'division_divID', array('class' => 'control-label')) ?>
                            <?= CHtml::textField("durableCode", NULL, array('class' => 'form-control', 'disabled' => 'true')) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= CHtml::label("ประเภทครุภัณฑ์", 'tgName', array('class' => 'control-label')) ?>
                            <?= CHtml::textField("tgName", null, array('class' => 'form-control', 'disabled' => 'true')) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= CHtml::label("ลักษณะครุภัณฑ์", 'ngName', array('class' => 'control-label')) ?>
                            <?= CHtml::textField("ngName", null, array('class' => 'form-control', 'disabled' => 'true')) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= CHtml::label("คุณสมบัติครุภัณฑ์", 'popName', array('class' => 'control-label')) ?>
                            <?= CHtml::textField("popName", null, array('class' => 'form-control', 'disabled' => 'true')) ?>
                        </div>
                    </div>
                </div>
                <hr style="border-color:#DDD; margin-bottom: 20px; margin-top:10px;">
                <h4 id="less-variables-colors">โอน/ย้าย ไปที่</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= CHtml::label("ผู้ถือครอง", "divID", array('class' => 'control-label')) ?>
                            <?= CHtml::dropDownList("divID", NULL, array("" => "===กรุณาเลือกสำนัก==="), array("class" => "form-control", 'check-exp' => 'notnull')) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= CHtml::label("สำนักหน่วยงาน/โครงการ", "deptID", array('class' => 'control-label')) ?>
                            <?= CHtml::dropDownList("deptID", NULL, array("" => "===กรุณาเลือกสำนักหน่วยงาน/โครงการ==="), array("class" => "form-control", 'check-exp' => 'notnull')) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= CHtml::label("ส่วนงาน/โครงการ", "office_station_osID", array('class' => 'control-label')) ?>
                            <?= CHtml::dropDownList("osID", NULL, array("" => "===กรุณาเลือกส่วนงาน/โครงการ==="), array("class" => "form-control", 'check-exp' => 'notnull')) ?>
                        </div>
                    </div>
                </div>
                <div id="alertEdit" class="alert alert-danger">กรุณากรอกข้อมูลให้สมบูรณ์</div>
                <hr style="border-color:#DDD; margin-bottom: 20px; margin-top:10px;">
                <div class="row">
                    <div class="col-md-12" style="text-align: right;">
                        <?= CHtml::hiddenField('dgID', '') ?>
                        <?php // BsHtml::button('ปิด', array('color' => BSHtml::BUTTON_COLOR_DANGER, 'icon' => BSHtml::GLYPHICON_REMOVE, 'id' => 'bCloseSaveModal', 'data-dismiss' => 'modal')) ?>&nbsp;
                        <?php // BsHtml::button('บันทึก', array('color' => BSHtml::BUTTON_COLOR_SUCCESS, 'icon' => BSHtml::GLYPHICON_OK, 'id' => 'bSaveModal')) ?>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php Yii::app()->clientScript->registerScript('LaunchScript', "$.getScript('" . Yii::app()->request->baseUrl . "/js/Stock/TransferDurableGoods.js');", CClientScript::POS_READY); ?>