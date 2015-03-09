<?php
    $Nfunc = new NFunc;
    
    $dbs = Yii::app()->db;
    //$sqls = "SELECT * FROM tb_transfer WHERE tb_stocks_stock_id = ".$model[0]['transfer_id']." ORDER BY transfer_id";
    $sqls= "SELECT * FROM tb_transfer,tb_division,tb_institution WHERE tb_stocks_stock_id = ".$model[0]['tb_stocks_stock_id']." AND tb_transfer.tb_institution_institution_id=tb_institution.institution_id AND tb_institution.tb_division_division_id=tb_division.division_id ORDER BY transfer_id DESC";
    $results = $dbs->createCommand($sqls)->queryAll();
    echo $model[0]['tb_stocks_stock_id'];
    /*$afterOwner = '';
    if(count($results)==1){
        $afterOwner = 'กองพัสดุ';
    }else if(count($results)>1){*/
        $afterOwner1 = $results[0]['division'];
        $afterOwner2 = $results[0]['institution'];
    /*}*/
?>
<tr>
    <td width="193" align="left" class="buy">กรมชลประทาน<br />
        กระทรวงเกษตรและสหกรณ์</td>
    <td width="149" align="left" class="style1" ><br />
        <span class="style4">
            <?= $model[0]['purchase'] ?>
        </span>
    </td>
    <td width="333" align="center" class="style1" > 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <img src="<?= Yii::app()->baseUrl ?>/images/krut.jpg" width="80" height="72" />
    </td>
    <td width="307" align="right" valign="top" >
        <strong class="style3">พด.44</strong>
        <br />
    </td>
</tr>
<tr>
    <td colspan="2" align="left" class="buy" >
        <span class="style4"> <?= $model[0]['type_cost'] ?> ประจำปี <?= $model[0]['year_cost'] ?></span>
    </td>
    <td align="center" >
        <span class="style3">ใบรับสิ่งของ</span>
    </td>
    <td align="left" >
        <label class="ind2">
            เลขที่&nbsp;&nbsp;&nbsp;
            <?= $model[0]['transfer_code'] ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </label>
        <br />
        <label class="ind2">
            วันที่&nbsp;&nbsp;
            <?= $Nfunc->getDateThai($Nfunc->convertSQLToDate($model[0]['date_asset'])) ?>
            &nbsp;&nbsp;&nbsp;&nbsp;
        </label>
    </td>
</tr>
<tr>
    <td colspan="4" align="left" class="buy" >
        โปรดรับมอบสิ่งของตามรายการข้างล่างนี้ ซึ่งได้ส่งจาก &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $afterOwner1 ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ไปที่&nbsp;&nbsp;&nbsp;
        <?php echo $afterOwner2; ?>
        &nbsp;&nbsp;&nbsp;&nbsp;
    </td>
</tr>
<tr>
    <td colspan="4" align="left" class="buy" >
        วิธีการได้มา&nbsp;&nbsp;&nbsp;&nbsp;
        <?= $model[0]['get_asset'] ?>
        <span class="ind3">
            สำหรับ&nbsp;&nbsp;&nbsp;&nbsp;
            <?= $model[0]['orther_asset'] ?>
            &nbsp;
        </span>
    </td>
</tr>
<tr >
    <td colspan="4" align="left" class="table1" >
        <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#666666" class="table2" >
            <tr>
                <td colspan="2" align="center" class="buy">สิ่งของ</td>
                <td width="4%" rowspan="2" align="center" class="buy">
                    จำนวน
                </td>
                <td width="5%" rowspan="2" align="center" class="buy">
                    หน่วย
                </td>
                <td colspan="2" align="center" class="buy">
                    ราคา
                </td>
                <!--td width="11%" rowspan="2" align="center" class="buy">
                    ประมาณการที่
                </td-->
                <td width="14%" rowspan="2" align="center" class="buy">
                    ผู้ขาย และ
                    <br />
                    หลักฐานการสั่งซื้อ
                </td>
                <td width="14%" rowspan="2" align="center" class="buy">
                    หมายเหตุ
                </td>
            </tr>
            <tr>
                <td width="4%" align="center" class="buy">
                    ลำดับที่
                </td>
                <td width="" align="center" class="buy">
                    รายละเอียด
                </td>
                <td width="8%" align="center" class="buy">
                    ต่อหน่วย
                </td>
                <td width="9%" align="center" class="buy">
                    รวม
                </td>
            </tr>
            <tr height="370">
                <td width="4%" align="center" valign="top" class="buy">
                    &nbsp;
                </td>
                <td align="left" valign="top" class="buy">
                    <?= $model[0]['type_asset'] ?><br>
                    <?= $model[0]['nature_asset'] ?><br>
                    <?= nl2br($model[0]['feature']) ?><br>
                    ยี่ห้อ&nbsp;&nbsp;<?= $model[0]['brand'] ?>&nbsp;&nbsp;
                    รุ่น&nbsp;&nbsp;<?= $model[0]['version'] ?>&nbsp;&nbsp;
                    <br />  
                    <span class="unl">
                        ผลิตจากประเทศ
                    </span>
                    &nbsp;&nbsp;<?= $model[0]['made_in'] ?>
                    <br />
                    <span class="unl">
                        หมายเลขเครื่อง
                    </span>
                    &nbsp;&nbsp;<?php
                    
                    //$idm = nl2br($model[0]['machine_code']);
                    $idm = str_replace($model[0]['machine_code'], '<br />', '::');
                    $idm = explode('<br />', $idm);
                    //echo $idm[0];
                    if (sizeof($idm) > 1) {
                        $i = 1;
                        $j = 2;
                        while ($i < sizeof($idm)) {
                            echo '<br><span class="unl">' . $idm[$i] . '</span>&nbsp;&nbsp;'
                            . $idm[$j];
                            $i += 2;
                            $j += 2;
                        }
                    } else {
                        echo $model[0]['machine_code'];
                    }


                    //echo $idm;
                    
                    ?>
                    <br />
                    <span class="unl">
                        รหัสครุภัณฑ์
                    </span>
                    &nbsp;&nbsp;<?php

                    echo $model[0]['asset_code'];

                    ?>
                    <br />
                    รับประกัน&nbsp;<?= number_format($model[0]['warrenty'], 2) ?>&nbsp;ปี&nbsp;
                    (กรรมการตรวจรับ&nbsp;<?= $Nfunc->getDateThai($Nfunc->convertSQLToDate($model[0]['date_examine'])) ?>&nbsp;)<br />
                    SPEC.เลขที่&nbsp;<?= $model[0]['specification_code'] ?><br />
                </td>
                <td width="4%" align="center" valign="top" class="buy">
<?= number_format(1) ?>
                </td>
                <td width="5%" align="center" valign="top" class="buy">
<?= $model[0]['call_unit'] ?>
                </td>
                <td align="right" valign="top" class="buy">
<?= number_format($model[0]['price_per'], 2) ?>
                </td>
                <td align="right" valign="top" class="buy">
<?= number_format(1* $model[0]['price_per'], 2) ?>
                    <hr color="#000000" noshade >
                    <div align="left" class="buy">
                        ราคารวมภาษี
                        <br />
                        มูลค่าเพิ่ม
                    </div>
                </td>
                <!--td align="left" valign="top" class="buy"> 
                    <span class="unl">
                        ศูนย์ต้นทุน
                    </span>
                    <br />
<?= $model[0]['cost_code'] ?>
                    <br />
                    <span class="unl">
                        รหัสแหล่งของเงิน
                    </span>
                    <br />
<?= $model[0]['source_cost_code'] ?>
                    <br />
                    <span class="unl">
                        รหัสงบประมาณ
                    </span>
                    <br />
<?= $model[0]['budget_code'] ?>
                    <br />
                    <span class="unl">
                        รหัสกิจกรรมหลัก
                    </span>
                    <br />
<?= $model[0]['activity_code'] ?>
                    <br />
                    <span class="unl">
                        รหัสกิจกรรมย่อย
                    </span>
                    <br />
<?= $model[0]['sub_activity_code'] ?>
                </td-->
                <td align="left" valign="top" class="buy">
<?= nl2br($model[0]['supply']) ?>
                    <br />
                    <?= nl2br($model[0]['supply_address']) ?>
                    <br />
                    โทร. <?= $model[0]['supply_tel'] ?>
                    <br />
                    ใบสั่งเลขที่
                    <br />
<?= $model[0]['invoice_code'] ?>
                    <br />
                    ลว.&nbsp;<?= $Nfunc->getDateThai($Nfunc->convertSQLToDate($model[0]['invoice_date'])) ?>
                    <br />
                    <br />
                    <br />
                    <div id="apDiv2">
<?= $model[0]['fullname'] ?>&nbsp;&nbsp;
                        ผู้พิมพ์
                        <br />

                    </div>
                    <br />
                </td>
                <td width="14%" align="left" valign="top" class="buy">
                    รายงานความต้องการพัสดุ 
                    <br />
<?= $model[0]['report_pd01_code'] ?>
                    <br>
                    ลว.
                    <br>
<?= $Nfunc->getDateThai($Nfunc->convertSQLToDate($model[0]['date_report_pd01'])) ?>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td colspan="2">
        (ลายมือชื่อ)&nbsp;
        <span class="h2"> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </span>
        ผู้สั่งจ่าย
        <br />
        (ชื่อตัวบรรจง)
        <span class="h2"> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </span>
        <br />
        วันที่
        <span class="h2">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </span>
    </td>
    <td>
        (ลายมือชื่อ)&nbsp;
        <span class="h2"> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </span>
        ผู้จ่ายของ
        <br />
        (ชื่อตัวบรรจง)
        <span class="h2"> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </span>
        <br />
        วันที่
        <span class="h2">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </span>
    </td>
    <td>
        (ลายมือชื่อ)&nbsp;
        <span class="h2"> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </span>
        ผู้รับของ
        <br />
        (ชื่อตัวบรรจง)
        <span class="h2"> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </span>
        <br />
        วันที่
        <span class="h2">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </span>
    </td>
</tr>
<tr>
    <td colspan="4" align="center">  </tr>