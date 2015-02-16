<?php
    $load = new LoadData();
?>
<a class="login-area dropdown-toggle" data-toggle="dropdown">
    <div class="avatar" title="View your public profile">
        <img src="<?= Yii::app()->baseUrl ?>/assets/layout/assets/img/user-group-icon.png">
    </div>
    <section>
        <h2><span class="profile"><span><?= Yii::app()->user->Name ?></span></span></h2>
    </section>
</a>
<?php
if(Yii::app()->user->id != NULL){
?>
<!--Login Area Dropdown-->
<ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
    <li class="username"><a><?=Yii::app()->user->Name ?></a></li>
    <li class="email"><a><?= $load->loadInstitutionName() ?></a></li>
    <li class="email"><a><?= $load->loadDivisionName() ?></a></li>
    <!--Avatar Area-->
    <li class="edit">
        <a href="profile.html" class="pull-left">โปรไฟล์</a>
        <a href="#" class="pull-right">ตั้งค่า</a>
    </li>

    <!--/Theme Selector Area-->
    <li class="dropdown-footer">
        <a href="<?=Yii::app()->createUrl("site/logout")?>">
            ออกจากระบบ
        </a>
    </li>
</ul>
<?php
}else {
?>
<ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
    <li class="username"><a><?= Yii::app()->user->Name ?></a></li>
    <li class="dropdown-footer">
        <a href="<?=Yii::app()->createUrl("site/login")?>">
            เข้าสู่ระบบ
        </a>
    </li>
</ul>
<?php
}
?>