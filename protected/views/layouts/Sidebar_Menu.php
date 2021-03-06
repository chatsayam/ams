<!-- Sidebar Menu -->
<ul class="nav sidebar-menu">
    <!--Dashboard-->
    <li class="active">
        <a href="<?=Yii::app()->createUrl("site/index")?>">
            <i class="menu-icon glyphicon glyphicon-home"></i>
            <span class="menu-text"> หน้าหลัก </span>
        </a>
    </li>
    <!--pd44-->
    <li>
        <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-pencil-square-o"></i>
            <span class="menu-text"> จัดการทะเบียนสินทรัพย์ </span>
            <i class="menu-expand"></i>
        </a>

        <ul class="submenu">
            <li>
                <a href="<?=Yii::app()->createUrl("Asset/Register")?>">
                    <span class="menu-text">ขึ้นทะเบียนสินทรัพย์</span>
                </a>
            </li>
            <li>
                <a href="<?=Yii::app()->createUrl("Asset/RegisterLow")?>">
                    <span class="menu-text">เพิ่มครุภัณฑ์ต่ำกว่าเกณฑ์</span>
                </a>
            </li>
            <li>
                <a href="<?=Yii::app()->createUrl("Stock/RequestStock")?>">
                    <span class="menu-text">รายการคำขอขึ้นทะเบียน</span>
                </a>
            </li>
            <li>
                <a  href="<?=Yii::app()->createUrl("Asset/ShowListStock")?>">
                    <span class="menu-text">รายการสินทรัพย์</span>
                </a>
            </li>
        </ul>
    </li>

    <li>
        <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-send"></i>
            <span class="menu-text"> จัดการโอนย้ายครุภัณฑ์ </span>
            <i class="menu-expand"></i>
        </a>

        <ul class="submenu">
            <li>
                <a href="<?= Yii::app()->createUrl("Transfer/Request") ?>">
                    <span class="menu-text">ร้องขอครุภัณฑ์</span>
                </a>
            </li>
            <li>
                <a href="<?=Yii::app()->createUrl("Transfer/Approve")?>">
                    <span class="menu-text">โอนย้ายครุภัณฑ์</span>
                </a>
            </li>
            <li>
                <a href="<?=Yii::app()->createUrl("Transfer/List")?>">
                    <span class="menu-text">รายการโอนย้ายครุภัณฑ์</span>
                </a>
            </li>
        </ul>
    </li>
<!--
    <li>
        <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-retweet"></i>
            <span class="menu-text"> จัดการจ่ายยืมครุภัณฑ์ </span>
            <i class="menu-expand"></i>
        </a>
-->
        <ul class="submenu">
            <li>
                <a href="<?=Yii::app()->createUrl("Stock/AddStock")?>">
                    <span class="menu-text">จ่ายยืมครุภัณฑ์</span>
                </a>
            </li>
            <li>
                <a href="<?=Yii::app()->createUrl("Stock/AddStock")?>">
                    <span class="menu-text">รายการจ่ายยืมครุภัณฑ์</span>
                </a>
            </li>
        </ul>
    </li>
    
    <li>
        <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-wrench"></i>
            <span class="menu-text"> ประวัติการซ่อม </span>
            <i class="menu-expand"></i>
        </a>

        <ul class="submenu">
            <li>
                <a href="<?= Yii::app()->createUrl("Repair/List") ?>">
                    <span class="menu-text">บันทึกประวัติการซ่อม</span>
                </a>
            </li>
       <!--     <li>
                <a href="<?=Yii::app()->createUrl("Stock/AddStock")?>">
                    <span class="menu-text">รายการประวัติการซ่อม</span>
                </a>
            </li>-->
        </ul>
    </li>
    
    <li>
        <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-barcode"></i>
            <span class="menu-text"> การจำหน่ายครุภัณฑ์ </span>
            <i class="menu-expand"></i>
        </a>

        <ul class="submenu">
            <li>
                <a href="<?=Yii::app()->createUrl("Distribute/Manage")?>">
                    <span class="menu-text">บันทึกการตรวจสอบ</span>
                </a>
            </li>
            <li>
                <a href="<?=Yii::app()->createUrl("Report/ReportSell")?>">
                    <span class="menu-text">รายการขออนุมัติจำหน่าย</span>
                </a>
            </li>
            <li>
                <a href="<?=Yii::app()->createUrl("Distribute/ManageSell")?>">
                    <span class="menu-text">บันทึกรายการจำหน่าย</span>
                </a>
            </li>
            <li>
                <a href="<?=Yii::app()->createUrl("Report/ReportSell")?>">
                    <span class="menu-text">รายการครุภัณฑ์จำหน่าย</span>
                </a>
            </li>
        </ul>
    </li>
    
    <li>
        <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-table"></i>
            <span class="menu-text"> รายงานข้อมูล </span>

            <i class="menu-expand"></i>
        </a>

        <ul class="submenu">
            <li>
                <a href="<?=Yii::app()->createUrl("Asset/ShowListStock")?>">
                    <span class="menu-text">รายงานประจำปี</span>
                </a>
            </li>
            <li>
                <a href="<?=Yii::app()->createUrl("Stock/AddStock")?>">
                    <span class="menu-text">รายงานการคลาดเคลื่อนค่าเสื่อมราคา</span>
                </a>
            </li>
            <li>
                <a href="<?=Yii::app()->createUrl("Stock/AddStock")?>">
                    <span class="menu-text"></span>
                </a>
            </li>
            <li>
                <a href="<?=Yii::app()->createUrl("Stock/AddStock")?>">
                    <span class="menu-text">รายงานคำของบประมาณ</span>
                </a>
            </li>
        </ul>
    </li>
    <!--Notification-->
    <li>
        <a href="Notification.html">
            <i class="menu-icon fa fa-envelope-o"></i>
            <span class="menu-text"> รายการแจ้งเตือน </span>
        </a>
    </li>
    
    <!--setting
    <li>
        <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-gears"></i>
            <span class="menu-text"> ตั้งค่าข้อมูลพื้นฐาน </span>

            <i class="menu-expand"></i>
        </a>
        <ul class="submenu">
            <li>
                <a href="">
                    <span class="menu-text">ประเภทครุภัณฑ์</span>
                </a>
            </li>

            <li>
                <a href="">
                    <span class="menu-text">ลักษณะครุภัณฑ์</span>
                </a>
            </li>
            
            <li>
                <a href="">
                    <span class="menu-text">สำนักชลประทาน</span>
                </a>
            </li>
            
            <li>
                <a href="">
                    <span class="menu-text">หน่วยงานโครงการ</span>
                </a>
            </li>

            <li>
                <a href="">
                    <span class="menu-text">การจัดซื้อ</span>
                </a>
            </li>
            
            <li>
                <a href="">
                    <span class="menu-text">งบประมาณ</span>
                </a>
            </li>
            
            <li>
                <a href="">
                    <span class="menu-text">วิธีการได้มา</span>
                </a>
            </li>
            
            <li>
                <a href="">
                    <span class="menu-text">ข้อมูลผู้ขาย</span>
                </a>
            </li>
            
            <li>
                <a href="">
                    <span class="menu-text">Users</span>
                </a>
            </li>

        </ul>
    </li>
    
    -->
    
    <li>
        <a href="<?=Yii::app()->createUrl("site/logout")?>">
            <i class="menu-icon glyphicon glyphicon-fire themesecondary"></i>
            <span class="menu-text">
                ออกจากระบบ
            </span>
        </a>
    </li>
</ul>
<!-- /Sidebar Menu -->