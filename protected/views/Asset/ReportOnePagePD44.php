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
                    $this->renderPartial("//Asset/_ReportPD44", array(
                        'model' => $model,
                        'pageAll' => $pageAll,
                        'num' => $num
                    ));
                    ?>
                    <tr>
                        <td colspan="4" align="center">
                            <div class="no-print">
                                <input name="print" type="button" value="พิมพ์แบบฟอร์ม" onclick="window.print()" />
                                <?php
                                if ($page > 1) {
                                    ?>
                                    <input name="next" type="button" value="หน้าถัดไป" onclick="window.location.href = 'ReportManyPagePD44?limit=0&thisPage=2&page=<?= $page ?>'" />
                                    <?php
                                }
                                if ($pCom <> 0) {
                                    ?>
                                    <input name="next" type="button" value="รายละเอียดแนบท้าย" onclick="window.location.href = 'ReportCommentPD44?limit=0&thisPage=2&page=<?= $page ?>&pCom=<?= $pCom ?>&tpCom=1'" />
                                    <?php
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

