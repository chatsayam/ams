<!-- Page Breadcrumb -->
<?php
$this->renderPartial("//layouts/Breadcrumb", array('pageTitle' => 'ตรวจสอบคำขอขึ้นทะเบียนสินทรัพย์'));
$Nfunc = new NFunc();
?>

<!-- Page Body -->
<div class="page-body" ng-controller="mainController">
    <div class="row">
        <div class="col-md-12">
            <button id="vReport" ng-click="openReport()" class="btn btn-info" name="yt0" type="button"><span class="glyphicon glyphicon-eye-open"></span> เรียกดู</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn btn-info" ng-click="exportPDF()" type="button"><span class="glyphicon glyphicon-file"></span> ส่งออก PDF</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn btn-info" ng-click="showDetail()" data-toggle="modal" data-target=".bs-example-modal-lg" type="button"><span class="glyphicon glyphicon-list-alt"></span> รายละเอียดเพิ่มเติม</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn btn-warning" ng-click="warning()" id="id_warning" type="button"><span class="glyphicon glyphicon-pencil"></span> ตอบกลับข้อมูล</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn btn-success" ng-click="success()" id="id_saccess" type="button"><span class="glyphicon glyphicon-check"></span> คลิกเพื่ออนุมัติ</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
    
    <div class="modal fade bs-example-modal-lgPD" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">อนุมัติคำขอขึ้นทะเบียน</h4>
                </div>
                <div class="modal-body" id="showListDetail">
                    <table class="table table-hover">
                        <thead>
                            <tr class="success">
                                <th>ลำดับ</th>
                                <th>หมายเลขเครื่อง</th>
                                <th>รหัสครุภัณฑ์</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>
                        <tbody id='showDataIDApprove'>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/ApprovePD.js', CClientScript::POS_END);