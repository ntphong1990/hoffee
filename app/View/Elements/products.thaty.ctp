<div class="uk-grid-margin uk-grid" uk-grid="">
    <?php
    $i = 0;
    foreach ($products as $product) :
        $i++;
    ?>



<div class="uk-width-1-1 uk-width-1-3@l uk-first-column">

    
    <a href="<?php echo Configure::read('Settings.DOMAIN'); ?>/products/view/<?php echo $product['Product']['slug'];?>">
<div class="uk-margin uk-text-center uk-card uk-card-hover uk-scrollspy-inview uk-animation-slide-bottom-medium" uk-scrollspy-class="" style="">

    
    
                <div class="uk-card-media-top"><img src="<?php echo Configure::read('Settings.DOMAIN').'/images/large/' . $product['Product']['image'];?>" class="el-image" alt=""></div>        
                    <div class="uk-card-body">
                
<div class="el-meta uk-margin uk-text-meta uk-margin-remove-adjacent"><?php echo $product['Brand']['name'];?> </div>

<h3 class="el-title uk-margin uk-h2">
<?php echo $product['Product']['name'];?>    </h3>




<p><a href="#" uk-scroll="" class="el-link uk-button uk-button-primary">129 000 đ</a></p>
            </div>
        
        
    
</div>
</a>
    
</div>





        <?php
    endforeach;
    ?>

</div>

