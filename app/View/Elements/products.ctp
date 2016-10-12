
    <?php
    $i = 0;
    foreach ($products as $product):
        $i++;
    if (($i % 4) == 0) { echo "\n<div class=\"row\">\n\n";}
    ?>
    <!-- <div class="uk-panel">
            <div class="uk-overlay uk-overlay-hover">
        <?php echo $this->Html->image('/images/large/' . $product['Product']['image'], array('url' => array('controller' => 'products', 'action' => 'view', 'slug' => $product['Product']['slug']), 'alt' => $product['Product']['name'], 'class' => 'image')); ?>
         <div class="uk-overlay-panel uk-overlay-icon uk-overlay-background uk-overlay-fade"></div>
                <a class="uk-position-cover" href="./products/view/<?php echo $product['Product']['slug'];?>"></a>
             </div>
              <h3 class="uk-h4">
                <a class="uk-link-reset" href="#"><?php echo $this->Html->link($product['Product']['name'], array('controller' => 'products', 'action' => 'view', 'slug' => $product['Product']['slug'])); ?></a>
            </h3>   
            <h3 class="uk-h4">
                <a class="uk-link-reset" href="#"> <?php echo $product['Product']['price']; ?> VND</a>
            </h3> 
        
       
       
    </div> -->
    
    <div class="uk-row-first" >
    
<div class="uk-panel uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-fade" style="min-height: 395px;">

    <div class="uk-panel-teaser">

        <figure class="uk-overlay uk-overlay-hover uk-border-rounded">

            <img src="<?php echo '/images/large/' . $product['Product']['image'];?>" class="uk-overlay-scale" alt="Aperture News Portal" width="960" height="960">
            
            
            
                                                                        <a class="uk-position-cover" href="./products/view/<?php echo $product['Product']['slug'];?> " data-lightbox-type="image" data-uk-lightbox="{group:'.wk-1da4'}"></a>
                                                
        </figure>

    </div>

    
                <h3 class="uk-panel-title uk-margin-bottom-remove"><?php echo $product['Product']['name'];?></h3>
        
                <div class="tm-tags tm-text-lead uk-text-muted"><span><?php echo $product['Product']['price']; ?> </span><span>VND</span></div>
        
        
    
</div>
    </div>
    
    	
    
    
    <?php
    if (($i % 4) == 0) { echo "\n</div>\n\n";}
    endforeach;
    ?>



