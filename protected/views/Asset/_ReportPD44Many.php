<?php
    $Nfunc = new NFunc;
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
        <div id="apDiv2" style="text-align: center;">
            <?= $page . ' / ' . $pageAll ?>
            <br />
        </div>
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
            <?= $model[0]['register_code'] ?>
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
        โปรดรับมอบสิ่งของตามรายการข้างล่างนี้ ซึ่งได้ส่งจาก &nbsp;&nbsp;&nbsp;&nbsp;กองพัสดุ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ไปที่&nbsp;&nbsp;&nbsp;
        <?= $model[0]['institution'] ?>&nbsp;&nbsp;(<?= $model[0]['division'] ?>)
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
                <td width="11%" rowspan="2" align="center" class="buy">
                    ประมาณการที่
                </td>
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

                <td align="left" valign="top" class="buy" colspan="8">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 70%;"><!--content-->
                                <table style="width: 100%;">
                                    <tr>
                                        <td colspan="3" style="text-align: center;">
                                            <span class="unl">รายละเอียดแนบท้าย</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ที่</td>
                                        <td>หมายเลขเครื่อง</td>
                                        <td>รหัสครุภัณฑ์</td>
                                        <td></td>
                                    </tr>
                                    <?php
                                    $i = ($limit * 10) + 1;
                                    foreach ($DurableGoods as $r) {
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $r['machine_code'] ?></td>
                                            <td><?= $r['asset_code'] ?></td>
                                            <td>ใช้งานที่ <?= $r['base_in'] ?></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </table>
                            </td>
                            <td style="width: 30%;" valign="middle">
                                <br />
                                <br />
                                <br />
                                <div id="apDiv2">
                                    <?= $model[0]['fullname'] ?>&nbsp;&nbsp;
                                    ผู้พิมพ์
                                    <br />

                                </div>
                            </td>
                        </tr>
                    </table>

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