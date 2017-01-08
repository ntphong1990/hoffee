<?php echo $this->Html->script(array('addtocart.js'), array('inline' => false)); ?>

<?php
$this->Html->addCrumb($product['Brand']['name'], array('controller' => 'brands', 'action' => 'view', 'slug' => $product['Brand']['slug']));
$this->Html->addCrumb($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', 'slug' => $product['Category']['slug']));
$this->Html->addCrumb($product['Product']['name']);
?>

<script>
$(document).ready(function() {

    $('#modselector').change(function(){
        $('#productprice').html($(this).find(':selected').data('price'));
        $('#modselected').val($(this).find(':selected').val());
    });

});
</script>


<section product-details="" id="productDetails" class="product_detail-container">




    <?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'add'))); ?>
    <?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $product['Product']['id'])); ?>

    <div class="product_detail" itemscope="" itemtype="http://schema.org/Product" id="product-2024">





        <div id="product" class="product_detail-inner">

            <div id="productFigure" class="product_detail-inner-figure" style="height: 521px;">

                <img src="<?php echo Configure::read('Settings.DOMAIN').'/images/large/' . $product['Product']['image'];?>" class="product_detail-inner-figure-image">

                <span class="product_detail-scroll" ng-click="scrollToInformation()">

					Learn More

					<icon src="https://us.camposcoffee.com/wp-content/themes/campos-wp-theme/assets/images/icons/arrow.svg" class="product_detail-scroll-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="19px" height="10px" viewBox="0 0 19 10" version="1.1" class="injected-svg icon-svg">
    <!-- Generator: Sketch 39.1 (31720) - http://www.bohemiancoding.com/sketch -->
    <title>arrow</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="[Desk]-Homepage---√" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" opacity="0.6" stroke-linejoin="round">
        <g id="[Desk]-Homepage_Full" transform="translate(-693.000000, -846.000000)" stroke="#FFFFFF">
            <g id="/-Header-+-Hero" transform="translate(-17.000000, 0.000000)">
                <g id="/-Hero">
                    <polyline id="arrow" points="728.264379 846.72781 719.63219 855.36 711 846.72781"></polyline>
                </g>
            </g>
        </g>
    </g>
</svg></icon>

				</span>

            </div>

            <div id="productInnerDetails" class="product_detail-inner-details">

                <sticky-item class="product_detail-inner-details-inner">




                    <div class="product_detail-inner-details-container content">

                        <h6 class="product_detail-inner-details-subtitle">

                            Hoffee
                        </h6>

                        <h1 itemprop="name" class="product_title entry-title"><?php echo $product['Product']['name']; ?></h1>

                        <div class="pill pill--center">

                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>12.00</span>
                        </div>


                        <p class="product_detail-inner-details-description">
                        </p><div itemprop="description">

                        </div>
                        <p></p>

                        <!-- <a href="/brew-coffee-grind-size" target="_blank" rel="noopener noreferrer" class="product_detail-inner-details-link">Need help picking your grind?</a> -->

                        <div class="product_detail-inner-details-order waiting_list" ng-non-bindable="">

                            <div class="ng-non-bindable" ng-non-bindable="">

                                <form class="variations_form cart" method="post" enctype="multipart/form-data" data-product_id="2024" data-product_variations="[{&quot;variation_id&quot;:3898,&quot;variation_is_visible&quot;:true,&quot;variation_is_active&quot;:true,&quot;is_purchasable&quot;:true,&quot;display_price&quot;:12,&quot;display_regular_price&quot;:12,&quot;attributes&quot;:{&quot;attribute_pa_weight&quot;:&quot;8oz&quot;,&quot;attribute_pa_grind&quot;:&quot;whole-beans&quot;},&quot;image_src&quot;:&quot;&quot;,&quot;image_link&quot;:&quot;&quot;,&quot;image_title&quot;:&quot;&quot;,&quot;image_alt&quot;:&quot;&quot;,&quot;image_caption&quot;:&quot;&quot;,&quot;image_srcset&quot;:&quot;&quot;,&quot;image_sizes&quot;:&quot;&quot;,&quot;price_html&quot;:&quot;&quot;,&quot;availability_html&quot;:&quot;<p class=\&quot;stock in-stock\&quot;><span class=\&quot;woocommerce-stock_level woocommerce-stock_level--in_stock\&quot;>In Stock<\/span><\/p>&quot;,&quot;sku&quot;:&quot;&quot;,&quot;weight&quot;:&quot;.252 kg&quot;,&quot;dimensions&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;max_qty&quot;:56,&quot;backorders_allowed&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_downloadable&quot;:false,&quot;is_virtual&quot;:false,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;variation_description&quot;:&quot;&quot;}]">

                                    <table class="variations" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td class="label">
                                                <label for="pa_weight">
                                                    weight																	</label>
                                            </td>
                                            <td class="value">
                                                <select id="pa_weight" class="" name="attribute_pa_weight" data-attribute_name="attribute_pa_weight" "="" data-show_option_none="yes"><option value="">Choose an option</option><option value="8oz" selected="selected">500g</option></select>							</td>
                                        </tr>
                                        <tr>
                                            <td class="label">
                                                <label for="pa_grind">
                                                    grind
                                                    <a href="/brew-coffee-grind-size" target="_blank" rel="noopener noreferrer" tooltip="Need help picking your grind?" class="product-single-tooltip"></a>

                                                </label>
                                            </td>
                                            <td class="value">
                                                <select id="pa_grind" class="" name="attribute_pa_grind" data-attribute_name="attribute_pa_grind" "="" data-show_option_none="yes"><option value="">Choose an option</option><option value="whole-beans" selected="selected">Whole Beans</option></select><a class="reset_variations" href="#">Clear</a>							</td>
                                        </tr>
                                        </tbody>
                                    </table>


                                    <div class="single_variation_wrap">
                                        <div class="woocommerce-variation single_variation" style="">
                                            <div class="woocommerce-variation-description">

                                            </div>

                                            <!-- <div class="woocommerce-variation-price">

                                            </div> -->

                                            <div class="woocommerce-variation-availability">
                                                <span class="woocommerce-variation-price"></span>
                                                <p class="stock in-stock"><span class="woocommerce-stock_level woocommerce-stock_level--in_stock">In Stock</span></p>
                                            </div>
                                        </div><div class="woocommerce-variation-add-to-cart variations_button woocommerce-variation-add-to-cart-enabled">
                                            <div class="quantity">
                                                <input type="number" step="1" min="1" max="56" name="data[Product][quantity]" value="1" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric">
                                            </div>
                                            <?php echo $this->Form->button('<i class="fa fa-cart-plus"></i> &nbsp; Add to Cart', array('class' => 'uk-button uk-button-large addtocart', 'id' => 'addtocart', 'id' => $product['Product']['id']));?>
                                            <?php echo $this->Form->end(); ?>
                                            <input type="hidden" name="add-to-cart" value="2024">
                                            <input type="hidden" name="product_id" value="2024">
                                            <input type="hidden" name="variation_id" class="variation_id" value="3898">
                                        </div>
                                    </div>


                                </form>

                            </div>
                            <p class="first-payment-date"><small></small></p>
                        </div>

                    </div>





                </sticky-item>

            </div>

            <div id="productInformation" class="product_detail-inner-information">

                <div class="product_information-inner-column-content">

                    <div class="content"><h4>ABOUT THIS COFFEE</h4>
                        <p> <?php echo $product['Product']['description']; ?></p>
                    </div>


                    <div class="product_info-heading">


                        <h6 class="product_info-heading-title">INFORMATION</h6>


                        <hr class="product_info-heading-spacer">

                    </div>


                    <ul class="product_info">


                        <li class="product_info-item">

                            <div class="product_info-item-title">Country</div>

                            <div class="product_info-item-description">Lam Dong / Viet Nam</div>

                        </li>


                        <li class="product_info-item">

                            <div class="product_info-item-title">Cupping Notes</div>

                            <div class="product_info-item-description">Bright and juicy with citrus and floral notes mixed with berry sweetness</div>

                        </li>


                    </ul>



                </div>

            </div>

        </div>


    </div></section>