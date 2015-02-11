<?php
include './MPDF54/mpdf.php';
ob_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>

    <?php
    $Nfunc = new NFunc;
    ?>
    <body>
        <div class="contentarea">
            <form name="frmMain">
                <table width="1080" border="0" align="center" >
                    <?php
                    $this->renderPartial("//Asset/_ReportPD44PDF", array(
                        'model' => $model,
                        'pageAll' => $pageAll,
                        'num' => $num
                    ));
                    ?>

                </table> 
            </form>
        </div>
        <?php
            if($pageAll > 1){
                $page = 2;
                    while ($page <= $pageAll){
        ?>
        <pagebreak />
        <div class="contentarea">
            <form name="frmMain">
                <table width="1080" border="0" align="center" >
                    <?php
                    $this->renderPartial("//Asset/_ReportPD44PDFLoop", array(
                        'pageAll' => $pageAll,
                        'page' => $page
                    ));
                    ?>

                </table> 
            </form>
        </div>
        <?php
                    $page++;
                    }
            }
        ?>
    </body>
</html>

<?Php
$html = ob_get_contents();

ob_end_clean();

$pdf = new mPDF('th_angsana','A4-L', 0, '', 5, 5, 15, 5, 5, 5, '');

$pdf->SetAutoFont();

$pdf->SetDisplayMode('fullpage');

$stylesheet = file_get_contents('./css/ReportPDF.css');
$pdf->WriteHTML($stylesheet, 1);

$pdf->WriteHTML($html,2);

$pdf->Output();
