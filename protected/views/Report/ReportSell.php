<!-- Page Breadcrumb -->
<?php
$this->renderPartial("//layouts/Breadcrumb", array('pageTitle' => 'รายงานประจำปีครุภัณฑ์ ชำรุด'));
$Nfunc = new NFunc();
?>
<div class="page-body" ng-controller="mainController">

    <div class="well">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-2" style="text-align: left;">
                เลือกปีงบประมาณ
            </div>
            <div class="col-md-3">
                <input ng-change="changeYear()" ng-model="st.y" class="form-control" ng-pattern="/^\d\d\d\d$/" list="listYearCost" type="text" required="true" name="year_cost" id="year_cost" placeholder="เลือกปี...">
                <datalist id="listYearCost">
                    <?= $Nfunc->optionSelectYear() ?>
                </datalist>
            </div>
            <div class="col-md-3">

            </div>
        </div>
        <hr>
        <div class="row">
            ครุภัณฑ์จัดจำหน่ายภายในหน่วยงาน
        </div>
        <div class="row">
            <div class="table-responsive" id="ReportShow">
                <table class="table table-bordered">
                    <thead>
                        <tr class="success">
                            <th>ลำดับ</th>
                            <th>เลขรหัสครุภัณฑ์</th>
                            <th>หมายเลขเครื่อง</th>
                            <th>วันที่ตรวจรับ</th>
                            <th>ราคาต่อหน่วย</th>
                            <th>อายุใช้งานอย่างมีประสิทธิภาพ</th>
                            <th>ค่าเสื่อมราคาสะสม</th>
                            <th>มูลค่าคงเหลือ</th>
                            <th>ประเภทครุภัณฑ์</th>
                            <th>ลักษณะครุภัณฑ์</th>
                            <th>หมายเหตุ</th>
                        </tr>
                    </thead>
                    <tbody id="ReportData">
                        
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <hr>
        <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <button class="btn btn-info" type="button"><span class="glyphicon glyphicon-print"></span> พิมพ์</button>&nbsp;&nbsp;
                <button class="btn btn-info" type="button"><span class="glyphicon glyphicon-file"></span> PDF</button>
            </div>
        </div>
    </div>
</div>

<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/ReportSell.js', CClientScript::POS_END); ?>
