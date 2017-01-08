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

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo Configure::read('Settings.SHOP_TITLE');?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <?= $this->Html->css('uikit.css') ?>
    <?= $this->Html->css('theme1.css') ?>
    <?= $this->Html->script('uikit') ?>
    <?= $this->Html->script('theme') ?>
    <?= $this->Html->script('sticky') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?php if($this->Session->check('Shop')) : ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#cartbutton').show();
            });
        </script>
    <?php endif; ?>
</head>

<body>
<div class="uk-sticky-placeholder" style="margin: 0px;"><div  style="margin: 0px;">
        <div class="uk-container-center">

            <nav class="tm-navbar uk-navbar uk-active uk-animation-slide-top" data-uk-sticky="{'top': '.uk-block', 'animation': 'uk-animation-slide-top'}">

                <a class="uk-navbar-brand" href="/<?php echo Configure::read('Settings.SHOP_TITLE');?>/">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 110 30" style="width: 110px; height: 30px;" width="110" height="30"><defs><style>.cls-1{fill:#0a4e9b;}</style></defs><title>Artboard 1</title><path class="cls-1" d="M16.43,25V15.33H7.72V25H5V5H5A2.73,2.73,0,0,1,7.72,7.73V13h8.71V7.73A2.73,2.73,0,0,1,19.15,5h0V25Z"></path><path class="cls-1" d="M24.78,7.53V22.47A2.52,2.52,0,0,0,27.3,25h7.84a2.52,2.52,0,0,0,2.51-2.52V7.53A2.52,2.52,0,0,0,35.14,5H27.3A2.52,2.52,0,0,0,24.78,7.53ZM27.5,21.35V7.46h6a1.47,1.47,0,0,1,1.47,1.47V21.24a1.3,1.3,0,0,1-1.3,1.3H28.69A1.19,1.19,0,0,1,27.5,21.35Z"></path><path class="cls-1" d="M46.06,7.46V13h7a2.32,2.32,0,0,1-2.31,2.32H46.06V25H43.34V5H55.65A2.45,2.45,0,0,1,53.2,7.46Z"></path><path class="cls-1" d="M62,7.46V13h7a2.32,2.32,0,0,1-2.31,2.32H62V25H59.27V5H71.58a2.45,2.45,0,0,1-2.45,2.46Z"></path><path class="cls-1" d="M78.85,7.46V13h6.58a2.32,2.32,0,0,1-2.31,2.32H78.85v7.21h9V25H76.13V5H88a2.45,2.45,0,0,1-2.45,2.46Z"></path><path class="cls-1" d="M95.82,7.46V13h6.58a2.32,2.32,0,0,1-2.31,2.32H95.82v7.21h9V25H93.1V5H105a2.45,2.45,0,0,1-2.45,2.46Z"></path></svg>

                </a>

                <div class="uk-navbar-flip uk-hidden-small">
                    <ul class="uk-navbar-nav">
                        <li id="cartbutton" style="display:none">

                            <?php echo $this->Html->link('<i class="fa fa-cart-plus"></i> &nbsp; Shopping Cart', array('controller' => 'shop', 'action' => 'cart'), array('class' => 'btn btn-sm btn-success', 'style'=>'color:#0FCC06','escape' => false)); ?>
                        </li>
                        <li class=" uk-active">
                            <a href="<?php echo Configure::read('Settings.DOMAIN');?>">Home</a>


                        </li>
                        <li class="">
                            <a href="<?php echo Configure::read('Settings.DOMAIN');?>/blog">Blog</a>


                        </li>
                        <li class="">
                            <a href="<?php echo Configure::read('Settings.DOMAIN');?>/products">Product</a>


                        </li>

                    </ul>
                </div>

                <div class="uk-navbar-flip uk-visible-small">
                    <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas=""></a>
                </div>

            </nav>
            <div id="offcanvas" class="uk-offcanvas">
                <div class="uk-offcanvas-bar uk-offcanvas-bar-flip">


                    <ul class="uk-nav uk-nav-offcanvas">

                        <li class=" uk-active">
                            <a href="/pagekit/">Home</a>

                        </li>
                        <li class="">
                            <a href="/pagekit/blog">Blog</a>

                        </li>
                        <li class="">
                            <a href="/pagekit/hello">Hello</a>

                        </li>

                    </ul>


                </div>
            </div>
        </div>
    </div></div>
<?= $this->Flash->render() ?>
<div class="container clearfix">
    <?= $this->fetch('content') ?>
</div>
<footer>
</footer>
</body>
</html>
