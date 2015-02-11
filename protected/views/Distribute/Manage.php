<div ng-controller="mainController">
    <style>.datepicker { z-index: 1151 !important;  }</style>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="glyphicon glyphicon-hand-right"></i> จัดการการจำหน่ายครุภัณฑ์</h4>
        </div>
    </div>
    <p><button id="bAddModal" type="button" class="btn btn-success">เพิ่มการจำหน่ายครุภัณฑ์</button></p>
    <div class="row">
        <div class="well" style="overflow-y:hidden;">
            <table class="table table-hover">
                <thead>
                    <tr class="success">
                        <th style="vertical-align: middle;">#</th>
                        <th style="vertical-align: middle;">เลขที่คำสั่งแต่งตั้ง</th>
                        <th style="vertical-align: middle;">รายชื่อคณะกรรมการ</th>
                        <th style="vertical-align: middle;">จัดการ</th>
                    </tr>
                </thead>
                <tbody id="ShowList"></tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="ModalCode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">เพิ่มเลขรหัสครุภัณฑ์ที่ต้องการจำหน่าย</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tb_stocks_asset_code">เลขรหัสครุภัณฑ์</label>
                                <input class="form-control" check-exp="notnull" placeholder="" type="text" id="tb_stocks_asset_code">     
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <input id="tb_distribute_distribute_id" type="hidden" value="">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    <button id="bAdd" type="button" class="btn btn-primary">บันทึก</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">เพิ่มการจำหน่ายครุภัณฑ์</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_repair">วันที่แต่งตั้งคณะกรรมการ</label>
                                <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-language="th" data-date-autoclose="true">
                                    <input class="form-control" type="text" required="true" id="distribute_date">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-th"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price_repair">รหัสหนังสือแต่งตั้ง</label>
                                <input class="form-control" check-exp="notnull" placeholder="" type="text" name="distribute_code" id="distribute_code">     
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="repair">รายชื่อคณะกรรมการพิจารณาครุภัณฑ์</label>
                                <textarea multiple="3" class="form-control" check-exp="notnull" placeholder="รายละเอียดเพิ่มเติม" type="text" name="distribute_name" id="distribute_name"> </textarea>               
                            </div>
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
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/distribute/Manage.js', CClientScript::POS_END); ?>