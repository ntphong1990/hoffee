<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Hoffee';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/admin/img/icon.png" type="image/jpg" rel="icon">
    <title>
        <?= $cakeDescription ?> | <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->css('datepicker3') ?>
    <?= $this->Html->css('styles') ?>

    <?= $this->Html->css('owl.carousel') ?>
    <?= $this->Html->css('font-awesome.min') ?>

    <?= $this->Html->script('lumino.glyphs') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<?php if (isset($authUser)){ ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#sidebar-collapse">
                <span class="sr-only">Admin Panels</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span>Hoffee </span> Admin System</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <svg class="glyph stroked male-user">
                            <use xlink:href="#stroked-male-user"></use>
                        </svg><?php echo $authUser['name'] ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/admin/users/profile">
                                <svg class="glyph stroked male-user">
                                    <use xlink:href="#stroked-male-user"></use>
                                </svg>
                                Profile</a></li>
                        <li><a href="/admin/users/logout">
                                <svg class="glyph stroked cancel">
                                    <use xlink:href="#stroked-cancel"></use>
                                </svg>
                                Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
    <!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
<!--        <li><a href="--><?php //echo Configure::read('Settings.DOMAIN');?><!--/admin/productmods/index">-->
<!--                <svg class="glyph stroked folder">-->
<!--                    <use xlink:href="#stroked-folder"></use>-->
<!--                </svg>-->
<!--                Kho</a></li>-->

<!--        <li><a href="--><?php //echo Configure::read('Settings.DOMAIN');?><!--/admin/products/chart">-->
<!--                <svg class="glyph stroked line-graph">-->
<!--                    <use xlink:href="#stroked-line-graph"></use>-->
<!--                </svg>-->
<!--                Doanh Thu</a></li>-->
        <li><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/financials/index">
                <svg class="glyph stroked notepad">
                    <use xlink:href="#stroked-notepad"></use>
                </svg>
                Thu Chi</a></li>
        <li><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/users/index">
                <svg class="glyph stroked male-user">
                    <use xlink:href="#stroked-male-user"></use>
                </svg>
                Nhân Viên</a></li>
        <li><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/customers/index">
                <svg class="glyph stroked male-user">
                    <use xlink:href="#stroked-male-user"></use>
                </svg>
                Khách Hàng</a></li>
<!--        <li><a href="--><?php //echo Configure::read('Settings.DOMAIN');?><!--/admin/brands/index">-->
<!--                <svg class="glyph stroked dashboard-dial">-->
<!--                    <use xlink:href="#stroked-dashboard-dial"></use>-->
<!--                </svg>-->
<!--                Brands</a></li>-->
<!--        <li><a href="--><?php //echo Configure::read('Settings.DOMAIN');?><!--/admin/categories/index">-->
<!--                <svg class="glyph stroked table">-->
<!--                    <use xlink:href="#stroked-table"></use>-->
<!--                </svg>-->
<!--                Categories</a></li>-->





        <li class="parent ">
            <a>
                <span data-toggle="collapse" href="#sub-item-1" class=""><svg class="glyph stroked chevron-down"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-chevron-down"></use></svg></span> Đơn Đặt Hàng
            </a>
            <ul class="children collapse in" id="sub-item-1">
                <li>
                    <a class="" href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/orders/index">
                        <svg class="glyph stroked chevron-right"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-chevron-right"></use></svg> Đơn Hàng
                    </a>
                </li>
                <li>
                    <a class="" href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/orders/temp">
                        <svg class="glyph stroked chevron-right"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-chevron-right"></use></svg> Nháp
                    </a>
                </li>

            </ul>
        </li>
        <li class="parent ">
            <a>
                <span data-toggle="collapse" href="#sub-item-1" class=""><svg class="glyph stroked chevron-down"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-chevron-down"></use></svg></span> Hàng Hoá
            </a>
            <ul class="children collapse in" id="sub-item-1">
                <li>
                    <a class="" href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/products/index">
                        <svg class="glyph stroked chevron-right"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-chevron-right"></use></svg> Sản phẩm
                    </a>
                </li>
                <li>
                    <a class="" href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/brands/index">
                        <svg class="glyph stroked chevron-right"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-chevron-right"></use></svg> Nhóm sản phẩm
                    </a>
                </li>

            </ul>
        </li>

        <li><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/BlogPosts/index">
                <svg class="glyph stroked notepad">
                    <use xlink:href="#stroked-notepad"></use>
                </svg>
                Articles</a></li>
        <li><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/order_items/index">
                <svg class="glyph stroked basket">
                    <use xlink:href="#stroked-basket"></use>
                </svg>
                Orders Items</a></li>
        <li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout', 'admin' => false)); ?></li>
    </ul>
</div>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/js/jquery-1.11.1.min.js"></script>
<!--/.sidebar-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <?php } ?>
    <?= $this->fetch('content') ?>
</div>
<div class="loading"></div>
<div id="snackbar" style="z-index: 9999">Some text some message..</div>
<footer>
</footer>
</body>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/js/bootstrap.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/js/bootstrap.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/js/chart.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/js/chart-data.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/js/easypiechart.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/js/easypiechart-data.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/js/bootstrap-datepicker.js"></script>
<script>
    $(".menu li a").each(function() {
        if (this.href == window.location.href) {
            $(this).parents("li").addClass("active");
        }
    });
    $('#calendar').datepicker({});
    !function ($) {
        $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })

    function showSnack(message) {
        var x = document.getElementById("snackbar")
        x.innerHTML = message;
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
</script>
</html>
