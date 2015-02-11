<div  ng-controller="mainController">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="glyphicon glyphicon-hand-right"></i> <span id="topicPd44Plus">คำขอขึ้นทะเบียน</span></h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="content">
        <!--
        <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control txtMainSearch" placeholder="ค้นหารายการ...">
                    <span class="input-group-btn">
                        <button class="btn btn-default mainSearch" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        -->
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
                                <th style="width: 220px;">ที่ spec</th>
                                <th style="width: 250px;">รายงานความต้องการ</th>
                                <th style="width: 200px;">ประเภท</th>
                                <th style="width: 200px;">ลักษณะ</th>
                                <th style="width: 200px;">ราคา</th>
                                <th style="width: 100px;">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody id="bodyDataTable">

                        </tbody>
                    </table>
                </div>
            </div>        
        </div>
    </div>

    <div class="modal fade bs-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">รายละเอียดอื่นๆ</h4>
                </div>
                <div class="modal-body" id="showListDetail2">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">จัดการ</h4>
                </div>
                <div class="modal-body" id="showListDetail">

                    <div class="col-md-12">
                        <button id="vReport" ng-click="openReport()" class="btn btn-info" name="yt0" type="button"><span class="glyphicon glyphicon-eye-open"></span> เรียกดู</button>&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-info" ng-click="exportPDF()" type="button"><span class="glyphicon glyphicon-file"></span> ส่งออก PDF</button>&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-info" ng-click="showDetail()"  type="button"><span class="glyphicon glyphicon-list-alt"></span> รายละเอียดเพิ่มเติม</button>&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-info" ng-click="ReportEdit()" type="button"><span class="glyphicon glyphicon-edit"></span> แก้ไขคำขอ</button>&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-info" ng-click="ReportCancel()"  type="button"><span class="glyphicon glyphicon-remove"></span> ยกเลิกคำขอ</button>&nbsp;&nbsp;&nbsp;
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/ManageRegister.js', CClientScript::POS_END); ?>
