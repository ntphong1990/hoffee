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
    <?= $this->Html->css('mystyle') ?>
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
        <li><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/productmods/index">
                <svg class="glyph stroked folder">
                    <use xlink:href="#stroked-folder"></use>
                </svg>
                Store</a></li>
        <li><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/products/chart">
                <svg class="glyph stroked line-graph">
                    <use xlink:href="#stroked-line-graph"></use>
                </svg>
                Chart</a></li>
        <li><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/users/index">
                <svg class="glyph stroked male-user">
                    <use xlink:href="#stroked-male-user"></use>
                </svg>
                Users</a></li>
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
<!--        <li><a href="--><?php //echo Configure::read('Settings.DOMAIN');?><!--/admin/tags/index">-->
<!--                <svg class="glyph stroked notepad">-->
<!--                    <use xlink:href="#stroked-notepad"></use>-->
<!--                </svg>-->
<!--                Tags</a></li>-->
        <li><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/products/index">
                <svg class="glyph stroked star">
                    <use xlink:href="#stroked-star"></use>
                </svg>
                Products</a></li>

        <li><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/orders/index">
                <svg class="glyph stroked bag">
                    <use xlink:href="#stroked-bag"></use>
                </svg>
                Orders</a></li>
        <li><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/order_items/index">
                <svg class="glyph stroked basket">
                    <use xlink:href="#stroked-basket"></use>
                </svg>
                Orders Items</a></li>

<!--        <li class="dropdown">-->
<!--            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Utils<b class="caret"></b></a>-->
<!--            <ul class="dropdown-menu">-->
<!--                <li>--><?php //echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index', 'admin' => true)); ?><!--</li>-->
<!--                <li>--><?php //echo $this->Html->link('User Add', array('controller' => 'users', 'action' => 'add', 'admin' => true)); ?><!--</li>-->
<!--                <li>--><?php //echo $this->Html->link('Products CSV Export', array('controller' => 'products', 'action' => 'csv', 'admin' => true)); ?><!--</li>-->
<!--            </ul>-->
<!--        </li>-->
        <li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout', 'admin' => false)); ?></li>
    </ul>
</div>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/admin/js/jquery-1.11.1.min.js"></script>
<!--/.sidebar-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <?php } ?>
    <?= $this->fetch('content') ?>
</div>
<div class="loading"></div>
<footer>
</footer>
</body>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/admin/js/bootstrap.min.js"></script>
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
</script>
</html>
