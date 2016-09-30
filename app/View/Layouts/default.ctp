<?php
/**
*
* PHP 5
*
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @package       Cake.View.Layouts
* @since         CakePHP(tm) v 0.10.0.1076
* @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
*/

?>
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Hoffee</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
   
    <?= $this->Html->meta('icon') ?>
    
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	
		 <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  <!-- Compiled and minified CSS -->

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <?= $this->Html->css('materialize.min.css') ?>
     
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600&amp;subset=latin,latin-ext" rel="stylesheet">
                                <meta name="generator" content="Pagekit">
      
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.1/js/uikit.min.js"></script>
   <?= $this->Html->css('theme.css') ?>
      
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', '<?php echo Configure::read('Settings.ANALYTICS'); ?>', '<?php echo Configure::read('Settings.DOMAIN'); ?>');
        ga('send', 'pageview');
	
	
		
    </script>
</head>
<body>
   <div class="uk-sticky-placeholder" style="height: 80px; margin: 0px;"><div class="tm-navbar" data-uk-sticky="{&quot;media&quot;:767,&quot;showup&quot;:true,&quot;animation&quot;:&quot;uk-animation-slide-top&quot;}" style="margin: 0px;">
            <div class="uk-container uk-container-center">

                <nav class="uk-navbar">

                    <a class="uk-navbar-brand" href="/<?php echo Configure::read('Settings.SHOP_TITLE');?>/">
                                                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 110 30" style="width: 110px; height: 30px;" width="110" height="30"><defs><style>.cls-1{fill:#0a4e9b;}</style></defs><title>Artboard 1</title><path class="cls-1" d="M16.43,25V15.33H7.72V25H5V5H5A2.73,2.73,0,0,1,7.72,7.73V13h8.71V7.73A2.73,2.73,0,0,1,19.15,5h0V25Z"></path><path class="cls-1" d="M24.78,7.53V22.47A2.52,2.52,0,0,0,27.3,25h7.84a2.52,2.52,0,0,0,2.51-2.52V7.53A2.52,2.52,0,0,0,35.14,5H27.3A2.52,2.52,0,0,0,24.78,7.53ZM27.5,21.35V7.46h6a1.47,1.47,0,0,1,1.47,1.47V21.24a1.3,1.3,0,0,1-1.3,1.3H28.69A1.19,1.19,0,0,1,27.5,21.35Z"></path><path class="cls-1" d="M46.06,7.46V13h7a2.32,2.32,0,0,1-2.31,2.32H46.06V25H43.34V5H55.65A2.45,2.45,0,0,1,53.2,7.46Z"></path><path class="cls-1" d="M62,7.46V13h7a2.32,2.32,0,0,1-2.31,2.32H62V25H59.27V5H71.58a2.45,2.45,0,0,1-2.45,2.46Z"></path><path class="cls-1" d="M78.85,7.46V13h6.58a2.32,2.32,0,0,1-2.31,2.32H78.85v7.21h9V25H76.13V5H88a2.45,2.45,0,0,1-2.45,2.46Z"></path><path class="cls-1" d="M95.82,7.46V13h6.58a2.32,2.32,0,0,1-2.31,2.32H95.82v7.21h9V25H93.1V5H105a2.45,2.45,0,0,1-2.45,2.46Z"></path></svg>
                                            </a>

                                        <div class="uk-navbar-flip uk-hidden-small">
                        <ul class="uk-navbar-nav">
	 				<li id="cartbutton" style="display:none">
	 					
                        <?php echo $this->Html->link('<i class="fa fa-cart-plus"></i> &nbsp; Shopping Cart', array('controller' => 'shop', 'action' => 'cart'), array('class' => '', 'style'=>'color:#0FCC06','escape' => false)); ?>
                    </li>
        <li class="">
        <a href="<?php echo Configure::read('Settings.DOMAIN');?>/">Home</a>

        
    </li>
        <li class="">
        <a href="<?php echo Configure::read('Settings.DOMAIN');?>/blog">Blog</a>

        
    </li>
        <li class=" uk-active">
        <a href="<?php echo Configure::read('Settings.DOMAIN');?>/products">Product</a>

        
    </li>
    
    
</ul>
                                            </div>
                    
                                        <div class="uk-navbar-flip uk-visible-small">
                        <a href="#offcanvas" class="uk-navbar-toggle" data-uk-offcanvas=""></a>
                    </div>
                    
                </nav>
<div id="offcanvas" class="uk-offcanvas" aria-hidden="true">
a
                                <div class="uk-offcanvas-bar" mode="push">

                                    <div class="uk-panel">Lorem ipsum dolor sit amet, <a href="#">consetetur</a> sadipscing elitr.</div>

                                </div>

                            </div>
            </div>
        </div></div>

    <main class="tm-main uk-container uk-container-center">
        <div id="site" class="uk-form">

            <?php echo $this->Flash->render(); ?>
            <br />
           

            <?php echo $this->fetch('content'); ?>
            <br />
            <div id="msg"></div>
            <br />

            

        </div>
    </main>
	
    <div class="footer">
        <div id="tm-footer" class="tm-footer uk-block uk-block-secondary uk-contrast">
            <div class="uk-container uk-container-center">

                <section class="uk-grid uk-grid-match" data-uk-grid-margin="">
                    <div class="uk-width-medium-1-1 uk-row-first">

    <div class="uk-panel  uk-text-center ">

        
        <ul class="uk-grid uk-grid-medium uk-flex uk-flex-center">
 &nbsp; &nbsp;<li><a href="https://github.com/pagekit" class="uk-icon-hover uk-icon-small uk-icon-github"></a></li>
 &nbsp; &nbsp;<li><a href="https://twitter.com/pagekit" class="uk-icon-hover uk-icon-small uk-icon-twitter"></a></li>
 &nbsp; &nbsp;<li><a href="https://gitter.im/pagekit/pagekit" class="uk-icon-hover uk-icon-small uk-icon-comment-o"></a></li>
 &nbsp; &nbsp;<li><a href="https://plus.google.com/communities/104125443335488004107" class="uk-icon-hover uk-icon-small uk-icon-google-plus"></a></li>
</ul>

<p><a href="<?php echo Configure::read('Settings.DOMAIN');?>">Hoffee</a></p>
    </div>

</div>
                </section>

            </div>
        </div>
    </div>

    <!-- <div class="sqldump">
        <?php echo $this->element('sql_dump'); ?>
    </div> -->

</body>
</html>
