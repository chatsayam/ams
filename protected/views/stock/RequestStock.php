<!-- Page Breadcrumb -->
<?php
$this->renderPartial("//Layouts/Breadcrumb", array('pageTitle' => 'คำขอขึ้นทะเบียน'));
$Nfunc = new NFunc();
?>

<!-- Page Body -->
<div class="page-body" ng-controller="mainController">
    <?=$int_id?>
</div>