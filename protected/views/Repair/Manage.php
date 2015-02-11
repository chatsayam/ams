<div ng-controller="mainController">
    <style>.datepicker { z-index: 1151 !important;  }</style>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="glyphicon glyphicon-hand-right"></i> ประวัติการซ่อม</h4>
        </div>
    </div>
    <input type="hidden" id="idStock" value="<?php echo $id; ?>">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="">เลขรหัสครุภัณฑ์</label>
                <input class="form-control" check-exp="notnull" placeholder="" type="text" value="<?php echo $tb_stocks[0]['asset_code']; ?>" disabled>   
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="">ประเภทครุภัณฑ์</label>
                <input class="form-control" check-exp="notnull" placeholder="" type="text" value="<?php echo $tb_stocks[0]['type_asset']; ?>" disabled>     
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="">ลักษณะครุภัณฑ์</label>
                <input class="form-control" check-exp="notnull" placeholder="" type="text" value="<?php echo $tb_stocks[0]['nature_asset']; ?>" disabled>     
            </div>
        </div>
    </div>
    <p style="text-align:right;">
        <button id="bShowInput" type="button" class="btn btn-success">เพิ่มประวัติการซ่อม</button>
    </p>
    
    <div class="row">
        <div class="well" style="overflow-y:hidden;">
            <table class="table table-hover">
                <thead>
                    <tr class="success">
                        <th style="vertical-align: middle;">#</th>
                        <th style="vertical-align: middle;">วันที่ซ่อม</th>
                        <th style="vertical-align: middle;">รายละเอียดการซ่อม</th>
                        <th style="vertical-align: middle;">จำนวนเงิน</th>
                        <th style="vertical-align: middle;">หมายเหตุ</th>
                        <th style="vertical-align: middle;">ใบส่งของ/ใบกำกับภาษี</th>
                    </tr>
                </thead>
                <tbody id="ShowList"></tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myInput" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">บันทึกประวัติการซ่อม</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_repair">วันที่ซ่อม</label>
                                <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-language="th" data-date-autoclose="true">
                                    <input class="form-control" type="text" required="true" id="date_repair">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-th"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price_repair">ค่าใช้จ่ายในการซ่อม</label>
                                <input class="form-control" check-exp="notnull" placeholder="บาท" type="text" name="price_repair" id="price_repair">     
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="repair">รายละเอียดการซ่อม</label>
                                <textarea multiple="3" class="form-control" check-exp="notnull" placeholder="รายละเอียดเพิ่มเติม" type="text" name="repair" id="repair"> </textarea>               
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="repair_orther">หมายเหตุ</label>
                                <textarea multiple="3" class="form-control" check-exp="notnull" placeholder="รายละเอียดเพิ่มเติม" type="text" name="repair_orther" id="repair_orther"> </textarea>               
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" id="frm_file_repair" enctype="multipart/form-data" action="#">
                                <div class="form-group">
                                    <label for="s_durableCode">ใบส่งของ/ใบกำกับภาษี</label>
                                    <input id="file_repair" name="file_repair" type="file">
                                </div>
                            </form>
                            <input id="file_repair_invoice" type="hidden" value="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    <button id="bSave" type="button" class="btn btn-primary">บันทึก</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/repair/Manage.js', CClientScript::POS_END); ?>