<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ใบรับสิ่งของ</title>
        <link href="<?= Yii::app()->baseUrl ?>/css/Report.css" rel="stylesheet" type="text/css" />
    </head>
    <?php
    $page = 1;
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
                        'num' => $num,
                        'page' => $page
                    ));
                    ?>
                    <tr>
                        <td colspan="4" align="center">
                            <div class="no-print">
                                <input name="print" type="button" value="พิมพ์แบบฟอร์ม" onclick="window.print()" />
                                
                            </div>
                        </td>
                    </tr>
                </table> 
            </form>
        </div>
    </body>
</html>

