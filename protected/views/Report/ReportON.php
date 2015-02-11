<div  ng-controller="mainController">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="glyphicon glyphicon-hand-right"></i> <span id="topicPd44Plus">รายงานครุภัณฑ์ประจำปี</span></h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <?php
    $Nfunc = new NFunc;
    ?>

    <div class="content">
        
        <hr>
        <div class="row">
            ครุภัณฑ์ภายในหน่วยงาน
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

<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/ReportON.js', CClientScript::POS_END); ?>
