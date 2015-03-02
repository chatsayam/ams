<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ทะเบียนคุมทรัพย์สิน</title>
        <link href="<?= Yii::app()->baseUrl ?>/css/Report.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
            <!--
            body,td,th {
                font-family: AngsanaUPC;
                font-size: 18px;
                padding-left: 17px;
                line-height: 25px;
            }
            body {
                background-color: #FFFFFF;
                margin-left: 0px;
                margin-top: 20px;
                margin-right: 0px;
                margin-bottom: 0px;
            }
            .style1 {font-size: 20px}
            .style3 {
                font-size: 30px;
                font-weight: bold;
            }
            .style4 {font-size: 30px}
            @media print{
                .no-print{ display:none;}
                #head, #foot{display:none }
                .contentarea{ width:100%;}
            }
            -->
        </style>
    </head>
    <?php
        $Nfunc = new NFunc;
    ?>
    <body>

        <form name="frmMain" >
            <table width="1050" border="0" align="center" >
                <tr>
                    <td width="193" align="left" ></td>
                    <td width="149" align="left" class="style1" >           </td>
                    <td width="333" align="center" class="style1" > 
                        <span class="style3">
                            ทะเบียนคุมทรัพย์สิน ครุภัณฑ์ต่ำกว่าเกณฑ์
                        </span>
                    </td>
                    <td width="280" align="right" valign="top" >
                        <strong class="style3">
                            พด.59-1
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="left" class="style4" >&nbsp;</td>
                    <td align="center" >
                        &nbsp;
                    </td>
                    <td align="left" >
                        <label class="ind4">
                            ส่วนราชการ
                            <span class="h1">
                                &nbsp;&nbsp;กรมชลประทาน&nbsp;&nbsp;&nbsp;
                            </span>
                        </label>
                        <br />
                        <label class="ind4">
                            หน่วยงาน
                            <span class="h1">
                                &nbsp;&nbsp;<?=$model[0]['institution']?>&nbsp;&nbsp;
                            </span>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="left" class="buy2">
                        ประเภท
                        <span class="h1"> 
                            &nbsp;&nbsp;<?=$model[0]['type_asset']?>&nbsp;&nbsp;<?=$model[0]['nature_asset']?>&nbsp;&nbsp;&nbsp;
                        </span>
                        รหัส
                        <span class="h1">&nbsp;&nbsp;
                            <?=$model[0]['asset_code']?>&nbsp;&nbsp;&nbsp;
                        </span>
                        หมายเลขและทะบียน
                        <span class="h1">&nbsp;&nbsp;
                            <?=$model[0]['machine_code']?>&nbsp;&nbsp;&nbsp;
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="left" class="buy2">
                        ลักษณะ/คุณสมบัติ
                        <span class="h1"> 
                            &nbsp;&nbsp;<?=$model[0]['feature']?>&nbsp;&nbsp;&nbsp;&nbsp;
                        </span>
                        ยี่ห้อ
                        <span class="h1">
                            &nbsp;&nbsp;<?=$model[0]['brand']?>&nbsp;&nbsp;&nbsp;
                        </span>
                        รุ่น/แบบ
                        <span class="h1">
                            &nbsp;&nbsp;<?=$model[0]['version']?>&nbsp;&nbsp;&nbsp;
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="left" class="buy2">
                        สถานที่ตั้ง/หน่วยงานที่รับผิดชอบ
                        <span class="h1">
                            &nbsp;&nbsp;<?=$model[0]['institution']?>  <?=$model[0]['division']?>&nbsp;&nbsp;&nbsp;&nbsp;
                        </span>
                        ชื่อผู้ขาย/ผู้รับจ้าง/ผู้บริจาค
                        <span class="h1">
                            &nbsp;&nbsp;&nbsp;<?=$model[0]['supply']?>&nbsp;&nbsp;&nbsp;
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="left" class="buy2">
                        ที่อยู่
                        <span class="h1">
                            &nbsp;&nbsp;<?=$model[0]['supply_address']?>&nbsp;&nbsp;&nbsp;
                        </span>
                        โทรศัพท์
                        <span class="h1">
                            &nbsp;&nbsp;<?=$model[0]['supply_tel']?>&nbsp;&nbsp;&nbsp;
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="left" class="buy2">
                        ประเภทเงิน
                        <span class="h1">
                            &nbsp;&nbsp; <?=$model[0]['type_cost']?>&nbsp;&nbsp;&nbsp;
                        </span>
                        &nbsp;&nbsp;&nbsp;วิธีการได้มา
                        <span class="h1">
                            &nbsp;&nbsp;&nbsp;&nbsp;<?=$model[0]['get_asset']?> &nbsp;&nbsp;&nbsp;
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="left" >
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="center" class="table1">
                        <table width="100%" border="1" cellpadding="0" cellspacing="0" class="table2">
                            <tr align="center">
                                <td width="6%" class="htb59" aling="center">
                                    วัน เดือน ปี
                                    <br />
                                    กก.ตรวจรับ
                                </td>
                                <td width="6%" class="htb59">
                                    ที่เอกสาร
                                </td>
                                <td width="" class="htb59">
                                    รายการ
                                </td>
                                <td width="5%" class="htb59">
                                    จำนวน
                                    <br />
                                    หน่วย
                                </td>
                                <td width="6%" class="htb59">
                                    ราคาต่อ
                                    <br />
                                    หน่วย/ชุด/
                                    <br />
                                    กลุ่ม
                                </td>
                                <td width="5%" class="htb59">
                                    มูลค่า
                                    <br />
                                    รวม
                                </td>
                                <td width="5%" class="htb59">
                                    มูลค่า
                                    <br />
                                    ราคาใหม่
                                </td>
                                <td width="5%" class="htb59">
                                    อายุ
                                    <br />
                                    ใช้งาน
                                </td>
                                <td width="5%" class="htb59">
                                    ค่าเสื่อม
                                    <br />
                                    ราคา
                                    <br />
                                    ประจำปี
                                </td>
                                <td width="5%"  class="htb59">
                                    คำเสื่อม
                                    <br />
                                    ราคา
                                    <br />
                                    สะสม
                                </td>
                                <td width="5%"  class="htb59">
                                    มูลค่า
                                    <br />
                                    สุทธิ
                                </td>
                                <td width="5%"  class="htb59">
                                    ใช้ประจำที่
                                </td>
                                <td width="5%"  class="htb59">
                                    หลักฐาน
                                    <br />
                                    การจ่าย
                                </td>
                                <td width="10%"  class="htb59">
                                    หมายเหตุ
                                </td>
                            </tr>
                            <tr height="370">
                                <td align="center" valign="top" class="htb59">
                                    <?=$Nfunc->getDateThai($Nfunc->convertSQLToDate($model[0]['date_examine']))?>
                                </td>
                                <td align="center" valign="top" class="htb59">
                                    <?=$model[0]['register_code']?>
                                    <br />
                                    ลงวันที่
                                    <br />
                                    <?=$Nfunc->getDateThaiBH($Nfunc->convertSQLToDate($model[0]['date_asset']))?>
                                    <br />
                                    <br />
                                    
                                </td>
                                <td align="left" valign="top" class="htb59">
                                    <?=  nl2br($model[0]['feature'])?> 
                                    <br>ยี่ห้อ <?=$model[0]['brand']?> 
                                    รุ่น <?=$model[0]['version']?>
                                    &nbsp;&nbsp;
                                    <br>ผลิตจากประเทศ <?=$model[0]['made_in']?>
                                    <br />
                                    หมายเลขเครื่อง &nbsp;<?=$model[0]['machine_code']?>
                                   
                                    <br />รับประกัน&nbsp; -&nbsp; ปี
                                </td>
                                <td align="center" valign="top" class="htb59">
                                    <?=$model[0]['amount']?>
                                </td>
                                <td align="right" valign="top" class="htb59">
                                    <?=  number_format($model[0]['price_per'], 2)?>
                                </td>
                                <td align="right" valign="top" class="htb59">
                                    <?=  number_format($model[0]['price_per']*$model[0]['amount'], 2)?>
                                </td>
                                <td align="center" class="htb59">
                                    &nbsp;
                                </td>
                                <td align="center" class="htb59">
                                    &nbsp;
                                </td>
                                <td align="center" class="htb59">
                                    &nbsp;
                                </td>
                                <td align="center" class="htb59">
                                    &nbsp;
                                </td>
                                <td align="center" class="htb59">
                                    &nbsp;
                                </td>
                                <td align="left" valign="top" class="htb59">
                                    <?= $model[0]['base_in']?>
                                </td>
                                <td align="center" valign="top" class="htb59">
                                    
                                </td>
                                <td align="center" width="10"  valign="top" class="htb59">
                                    
                                </td>
                            </tr>

                        </table></td>
                </tr>
                <tr>
                    <td colspan="4" align="center">
                        <div class="no-print">
                            <input name="print" type="button" value="พิมพ์แบบฟอร์ม" onclick="window.print()" />
                        </div>
                    </td>
                </tr>
            </table>
        </form>


    </body>
</html>
