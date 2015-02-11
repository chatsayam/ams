<!-- Page Breadcrumb -->
<div class="page-breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= Yii::app()->createUrl("site/index") ?>">เข้าสู่ระบบ</a>
        </li>
        <li class="active">เข้าสู่ระบบ</li>
    </ul>
</div>
<!-- /Page Breadcrumb -->
<!-- Page Header -->
<div class="page-header position-relative">
    <div class="header-title">
        <h1>
            เข้าสู่ระบบ
        </h1>
    </div>
    <!--Header Buttons-->
    <div class="header-buttons">
        <a class="sidebar-toggler" href="#">
            <i class="fa fa-arrows-h"></i>
        </a>
        <a class="refresh" id="refresh-toggler" href="">
            <i class="glyphicon glyphicon-refresh"></i>
        </a>
        <a class="fullscreen" id="fullscreen-toggler" href="#">
            <i class="glyphicon glyphicon-fullscreen"></i>
        </a>
    </div>
    <!--Header Buttons End-->
</div>
<!-- /Page Header -->
<!-- Page Body -->
<div class="page-body">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
        //        'layout' => BsHtml::FORM_LAYOUT_HORIZONTAL,
        'enableAjaxValidation' => true,
        'id' => 'user_form',
        'htmlOptions' => array(
            'class' => 'well'
        )
    ));
    ?>
        <div class="row">
            <div class="col-sm-4 col-xs-4">
                <?php
                //echo $form->textFieldGroup($model, 'username', array('required' => 'required', 'style' => 'width: 250px;'));
                echo $form->textFieldControlGroup($model, 'username', array('required' => 'required'));
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 col-xs-4">
                <?php
                //echo $form->passwordFieldGroup($model, 'password', array('required' => 'required', 'style' => 'width: 250px;'));
                echo $form->passwordFieldControlGroup($model, 'password', array('required' => 'required'));
                ?>
            </div>
        </div>
        <button type="submit" class="btn btn-labeled btn-palegreen">
            <i class="btn-label glyphicon glyphicon-user"></i>เข้าสู่ระบบ
        </button>

    <?php $this->endWidget(); ?>
</div><!-- body -->

