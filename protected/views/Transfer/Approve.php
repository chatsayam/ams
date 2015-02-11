<div ng-controller="mainController">
    <style>.datepicker { z-index: 1151 !important;  }</style>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="glyphicon glyphicon-hand-right"></i> อนุมัติ โอน/ย้าย ครุภัณฑ์</h4>
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
                        <th style="vertical-align: middle;">สำนัก/กองงาน <br>(ที่ขอ)</th>
                        <th style="vertical-align: middle;">หน่วยงาน/โครงการ </br>(ที่ขอ)</th>
                        <th style="vertical-align: middle;">จัดการ</th>
                    </tr>
                </thead>
                <tbody id="ShowList"></tbody>
            </table>
        </div>
    </div>
    <div id="modalApprove" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="mySmallModalLabel">อนุมัติ โอน/ย้าย ครุภัณฑ์</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>เลขรหัสครุภัณฑ์</label>
                        <div id="t_asset_code"></div>
                    </div>
                    <div class="form-group">
                        <label for="transfer_code">เลขที่ใบโอน</label>
                        <input type="text" class="form-control" id="transfer_code" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="transfer_data">วันที่โอน</label>
                        <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-language="th" data-date-autoclose="true">
                            <input class="form-control" type="text" required="true" id="transfer_date">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-th"></i>
                            </span>
                        </div>
                    </div>
                    <input id="transfer_id" type="hidden" value="">
                </div>
                <div class="modal-footer">
                    <button id="bDelRequest" type="button" class="btn btn-danger">ยกเลิกการร้องขอ</button>
                    <button id="bSaveApprove" type="button" class="btn btn-success">อนุมัติ</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/transfer/Approve.js', CClientScript::POS_END); ?>