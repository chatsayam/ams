<a class="login-area dropdown-toggle" data-toggle="dropdown">
    <div class="avatar" title="View your public profile">
        <img src="<?= Yii::app()->baseUrl ?>/assets/layout/assets/img/user-group-icon.png">
    </div>
    <section>
        <h2><span class="profile"><span>ชื่อผู้ใช้งานระบบ</span></span></h2>
    </section>
</a>
<!--Login Area Dropdown-->
<ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
    <li class="username"><a>ชื่อผู้ใช้งานระบบ</a></li>
    <li class="email"><a>หน่วยงาน</a></li>
    <li class="email"><a>สำนักชลประทาน</a></li>
    <!--Avatar Area-->
    <li class="edit">
        <a href="profile.html" class="pull-left">โปรไฟล์</a>
        <a href="#" class="pull-right">ตั้งค่า</a>
    </li>

    <!--/Theme Selector Area-->
    <li class="dropdown-footer">
        <a href="login.html">
            ออกจากระบบ
        </a>
    </li>
</ul>