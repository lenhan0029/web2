<?php session_start(); ?>
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                    <!-- <input class="au-input au-input--xl" type="text" name="search" value="" placeholder="Search..."/> -->
                    <!-- <button class="au-btn--submit" type="submit" onclick="SearchProduct()">
                        <i class="zmdi zmdi-search"></i>
                    </button> -->
                </form>
                <div class="header-button">
                    <div class="noti-wrap">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="images/icon/avatar.jpg" alt="images" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#"><?php echo $_SESSION['tkam']['firstname'],$_SESSION['tkam']['lastname']?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="images/icon/avatar.jpg" alt="avata" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#"><?php echo $_SESSION['tkam']['firstname'],$_SESSION['tkam']['lastname']?></a>
                                        </h5>
                                        <span class="email"><?php echo $_SESSION['tkam']['email'] ?></span>
                                    </div>
                                </div>
                                <!-- <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-settings"></i>Setting</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-money-box"></i>Billing</a>
                                    </div>
                                </div> -->
                                <div class="account-dropdown__footer" onclick="sign_out1();">
                                    <a href="#">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header> 