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
                <a href="<?=Yii::app()->createUrl("Stock/RequestStock")?>">
                    <span class="menu-text">รายการคำขอขึ้นทะเบียน</span>
                </a>
            </li>
            <li>
                <a href="<?=Yii::app()->createUrl("Stock/RequestStock")?>">
                    <span class="menu-text">รายการคำขอโอน / ย้าย</span>
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
        <a href="profile.html">
            <i class="menu-icon fa fa-envelope-o"></i>
            <span class="menu-text"> รายการแจ้งเตือน </span>
        </a>
    </li>
    <li>
        <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-table"></i>
            <span class="menu-text"> รายงานข้อมูล </span>

            <i class="menu-expand"></i>
        </a>

        <ul class="submenu">
            <li>
                <a href="tables-simple.html">
                    <span class="menu-text">รายงานประจำปี</span>
                </a>
            </li>
            <li>
                <a href="tables-data.html">
                    <span class="menu-text">รายงานการคลาดเคลื่อนค่าเสื่อมราคา</span>
                </a>
            </li>
            <li>
                <a href="tables-data.html">
                    <span class="menu-text"></span>
                </a>
            </li>
            <li>
                <a href="tables-data.html">
                    <span class="menu-text">รายงานคำของบประมาณ</span>
                </a>
            </li>
        </ul>
    </li>

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