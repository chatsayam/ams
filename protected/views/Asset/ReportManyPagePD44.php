<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ใบรับสิ่งของ</title>
        <link href="<?= Yii::app()->baseUrl ?>/css/Report.css" rel="stylesheet" type="text/css" />
    </head>
    <?php
    $Nfunc = new NFunc;
    ?>
    <body>
        <div class="contentarea">
            <form name="frmMain">
                <table width="1080" border="0" align="center" >
                    <?php
                    $this->renderPartial('//Asset/_ReportPD44Many', array(
                        'model' => $model,
                        'DurableGoods' => $DurableGoods,
                        'page' => $page,
                        'pageAll' => $pageAll,
                        'limit' => $limit
                    ));
                    ?>
                    <tr>
                        <td colspan="4" align="center">
                            <div class="no-print">
                                <?php
                                $thispage = $page;
                                if ($thispage > 2) {
                                    $thispage -= 1;
                                    ?>
                                    <input name="next" type="button" value="ย้อนกลับ" onclick="window.location.href = 'ReportManyPagePD44?page=<?= $thispage ?>&pageAll=<?= $pageAll ?>'" />
                                    <?php
                                } else {
                                    ?>
                                    <input name="next" type="button" value="ย้อนกลับ" onclick="window.location.href = 'ReportOnePagePD44'" />
                                    <?php
                                }
                                ?>
                                <input name="print" type="button" value="พิมพ์แบบฟอร์ม" onclick="window.print()" />
                                <?php
                                //echo $thisPage.'='.$page;

                                if ($page < $pageAll) {
                                    $page += 1;
                                    echo '<input name="next" type="button" value="หน้าถัดไป" onclick="window.location.href = \'ReportManyPagePD44?page=' . $page . '&pageAll=' . $pageAll . '\'" />';
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                </table> 
            </form>
        </div>
    </body>
</html>

