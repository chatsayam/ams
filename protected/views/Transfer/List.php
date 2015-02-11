<div ng-controller="mainController">
    <style>.datepicker { z-index: 1151 !important;  }</style>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="glyphicon glyphicon-hand-right"></i> รายการรับครุภัณฑ์</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="">เลขรหัสครุภัณฑ์</label>
                <input id="f_string" class="form-control" check-exp="notnull" placeholder="" type="text">   
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">&nbsp;</label><br>
                <button id="bLookAll" type="button" class="btn btn-primary">ดูทั้งหมด</button>   
            </div>
        </div>
        

    </div>
    <div class="row">
        <div class="well" style="overflow-y:hidden;">
            <table class="table table-hover">
                <thead>
                    <tr class="success">
                        <th style="vertical-align: middle;">#</th>
                        <th style="vertical-align: middle;">เลขรหัสครุภัณฑ์</th>
                        <th style="vertical-align: middle;">ประเภทครุภัณฑ์</th>
                        <th style="vertical-align: middle;">ลักษณะครุภัณฑ์</th>
                        <th style="vertical-align: middle;">หมายเลขเครื่อง</th>
                        <th style="vertical-align: middle;">จัดการ</th>
                    </tr>
                </thead>
                <tbody id="ShowList"></tbody>
            </table>
        </div>
    </div>
   
</div>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/transfer/List.js', CClientScript::POS_END); ?>