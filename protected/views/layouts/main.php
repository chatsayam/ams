<!DOCTYPE html>

<html ng-app="myApp">
<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title><?=CHtml::encode($this->pageTitle)?></title>

    <meta name="description" content="assets_project_end" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="<?=Yii::app()->baseUrl?>/assets/layout/assets/img/favicon.ico" type="image/x-icon">


    <!--Basic Styles-->
    <link href="<?=Yii::app()->baseUrl?>/assets/layout/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=Yii::app()->baseUrl?>/assets/layout/assets/bootstrap/css/bootstrap-wysihtml5.css" rel="stylesheet" />
    <link href="<?=Yii::app()->baseUrl?>/assets/layout/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?=Yii::app()->baseUrl?>/assets/layout/assets/weather-icons/css/weather-icons.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">

    <!--noom styles-->
    <link href="<?=Yii::app()->baseUrl?>/assets/layout/assets/css/noom-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=Yii::app()->baseUrl?>/assets/layout/assets/css/demo.min.css" rel="stylesheet" />
    <link href="<?=Yii::app()->baseUrl?>/assets/layout/assets/typicons/src/font/typicons.min.css" rel="stylesheet" />
    <link href="<?=Yii::app()->baseUrl?>/assets/layout/assets/css/animate.min.css" rel="stylesheet" />
    <link href="<?=Yii::app()->baseUrl?>/assets/layout/assets/css/chosen.css" rel="stylesheet" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="<?=Yii::app()->baseUrl?>/assets/layout/assets/js/skins.min.js"></script>
</head>
<!-- /Head -->
<!-- Body -->
<body>
    <!-- Loading Container -->
    <div class="loading-container">
        <div class="loading-progress">
            <div class="rotator">
                <div class="rotator">
                    <div class="rotator colored">
                        <div class="rotator">
                            <div class="rotator colored">
                                <div class="rotator colored"></div>
                                <div class="rotator"></div>
                            </div>
                            <div class="rotator colored"></div>
                        </div>
                        <div class="rotator"></div>
                    </div>
                    <div class="rotator"></div>
                </div>
                <div class="rotator"></div>
            </div>
            <div class="rotator"></div>
        </div>
    </div>
    <!--  /Loading Container -->
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left">
                    <a href="<?=Yii::app()->createUrl("site/index")?>" class="navbar-brand">
                        <h5 style="margin-top: 5px;">
                            <img src="<?=Yii::app()->baseUrl?>/assets/layout/assets/img/logo.png" alt="" />
                            <?=CHtml::encode(Yii::app()->name)?>
                        </h5>
                    </a>
                </div>
                <!-- /Navbar Barnd -->
                
                <!-- Sidebar Collapse -->
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="collapse-icon fa fa-bars"></i>
                </div>
                <!-- /Sidebar Collapse -->
                
                <!-- Account Area and Settings --->
                <div class="navbar-header pull-right">
                    <div class="navbar-account">
                        <ul class="account-area">
                            <li>
                                <!--Messages Dropdown-->
                                <?php

                                if(Yii::app()->user->id != NULL){

                                    $this->renderPartial('//layouts/Messages');
                                }
                                ?>
                                <!--/Messages Dropdown-->
                            </li>
                            <li>
                                <!--Area User-->
                                <?=$this->renderPartial('//layouts/Area_User')?>
                                <!--/Login Area Dropdown-->
                            </li>
                            <!-- /Account Area -->
                            <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                            <!-- Settings -->
                        </ul><div class="setting">
                            <a id="btn-setting" title="Setting" href="#">
                                <i class="icon glyphicon glyphicon-cog "></i>
                            </a>
                        </div><div class="setting-container">
                            <label>
                                <input type="checkbox" id="checkbox_fixednavbar">
                                <span class="text">Fixed Navbar</span>
                            </label>
                            <label>
                                <input type="checkbox" id="checkbox_fixedsidebar">
                                <span class="text">Fixed SideBar</span>
                            </label>
                            <label>
                                <input type="checkbox" id="checkbox_fixedbreadcrumbs">
                                <span class="text">Fixed BreadCrumbs</span>
                            </label>
                            <label>
                                <input type="checkbox" id="checkbox_fixedheader">
                                <span class="text">Fixed Header</span>
                            </label>
                        </div>
                        <!-- Settings -->
                    </div>
                </div>
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>
    <!-- /Navbar -->
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar <?php if(Yii::app()->user->id == NULL){ echo 'menu-compact'; } ?>" id="sidebar">
        <?php

            if(Yii::app()->user->id != NULL){
        ?>
            
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <input type="text" class="searchinput" />
                    <i class="searchicon fa fa-search"></i>
                    <div class="searchhelper">ค้นหารายการสินทรัพย์ ด้วยรหัสหรือข้อมูลใดๆ ตามรายละเอียดสินทรัพย์</div>
                </div>
                <!-- /Page Sidebar Header -->
                
                <?php 
                    $loadMain = new LoadData();
                    
                    if($loadMain->loadTypeUser() == 2){
                        $this->renderPartial('//layouts/Sidebar_Menu');
                    }else if($loadMain->loadTypeUser() == 4){
                        $this->renderPartial('//layouts/Sidebar_Menu_Level2');
                    }
                
                ?>
                 
            
            <!-- /Page Sidebar -->
        <?php
            }else {
                if ($this->action->id == 'Index' || $this->action->id == 'index') {
                    //echo $content;
                }else {
                    $this->redirect(Yii::app()->baseUrl.'/index.php/site/index'); 
                }
            }
        ?>
            </div>
            <!-- Page Content -->
            <div class="page-content">
                <?=$content?><!--render content yii-->
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Container -->
        <!-- Main Container -->

    </div>

    <!--Basic Scripts-->
    <script src="<?=Yii::app()->baseUrl?>/assets/layout/assets/js/jquery-2.0.3.min.js"></script>
    <script src="<?=Yii::app()->baseUrl?>/assets/layout/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=Yii::app()->baseUrl?>/assets/layout/assets/bootstrap/js/bootstrap-datepicker.js"></script>
    <script src="<?=Yii::app()->baseUrl?>/assets/layout/assets/bootstrap/js/bootstrap-datepicker.th.js"></script>
    <script src="<?=Yii::app()->baseUrl?>/assets/mainScript/angular.min.js"></script>
    <!--noom Scripts-->
    <script src="<?=Yii::app()->baseUrl?>/assets/layout/assets/js/noom-theme.js"></script>
    
    <script src="<?=Yii::app()->baseUrl?>/assets/layout/assets/js/toastr/toastr.js"></script>
    
    <?php
    if(Yii::app()->user->id != NULL){
        if($loadMain->loadTypeUser() == 2){
    ?>
    <script src="<?=Yii::app()->baseUrl?>/js/main-script2.js"></script>
    <?php
        }else if($loadMain->loadTypeUser() == 4){
    ?>
    <script src="<?=Yii::app()->baseUrl?>/js/main-script4.js"></script>
    <?php
        }
    }
        //echo $this->uniqueid;
    ?>

</body>
<!--  /Body -->
</html>