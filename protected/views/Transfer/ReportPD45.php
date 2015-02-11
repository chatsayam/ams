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
                    $this->renderPartial("//Transfer/_ReportPD45", array(
                        'model' => $model
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

