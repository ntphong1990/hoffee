<?php echo $this->set('title_for_layout', 'Shopping Cart'); ?>

<?php $this->Html->addCrumb('Shopping Cart'); ?>

<?php echo $this->Html->script(array('cart.js'), array('inline' => false)); ?>



<?php if(empty($shop['OrderItem'])) : ?>

Shopping Cart is empty

<?php else: ?>

<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'cartupdate'))); ?>




        <div class="woocommerce">
            <div class="woocommerce-message_wrapper">


            </div>



            <div class="store-two_col">

                <h2 class="store-heading">chi tiết đặt hàng</h2>

                <div class="store-two_col_wrapper">

                    <div class="store-two_col_wrapper-col store-two_col_wrapper-col--large cart">

                        <h4 class="product-table_heading">sản phẩm</h4>




                            <table class="shop_table shop_table_responsive cart" cellspacing="0">
                                <thead>
                                <tr>
                                    <th class="product-heading product-thumbnail">&nbsp;</th>
                                    <th class="product-heading product-name">&nbsp;</th>
                                    <th class="product-heading product-price">&nbsp;</th>
                                    <th class="product-heading product-quantity">số.lg</th>
                                    <th class="product-heading product-subtotal">tiền</th>
                                    <th class="product-heading product-remove">&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $tabindex = 1; ?>
                                <?php foreach ($shop['OrderItem'] as $key => $item): ?>
                                <tr class="product">

                                    <td class="product-thumbnail">
                                        <a href="https://us.camposcoffee.com/product/campos-blade-runner-blend/?attribute_pa_weight=8oz&amp;attribute_pa_grind=whole-beans"><?php echo $this->Html->image('/images/small/' . $item['Product']['image'], array('class' => 'px20','width' => 100)); ?></a>								</td>

                                    <td class="product-name" data-title="Product">
                                        <?php echo $this->Html->link($item['Product']['name'], array('controller' => 'products', 'action' => 'view', 'slug' => $item['Product']['slug'])); ?>

                                    </td>

                                    <td class="product-price" data-title="Price">
                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"><span id="price-<?php echo $key; ?>"><?php echo number_format($item['Product']['price']); ?></span> VND</span>								</td>

                                    <td class="product-quantity" data-title="số.lg">
                                        <div class="quantity">
                                    <?php
                                    $mods = 0;
                                    if(isset($item['Product']['productmod_name'])) {
                                        $mods = $item['Product']['productmod_id'];
                                    }
                                         ?>
                                            <?php echo $this->Form->input('quantity-' . $key, array('div' => false, 'class' => 'numeric form-control input-small', 'label' => false, 'size' => 2, 'maxlength' => 2, 'tabindex' => $tabindex++, 'data-id' => $item['Product']['id'], 'data-mods' => $mods, 'value' => $item['quantity'])); ?>
                                        </div>
                                    </td>

                                    <td class="product-subtotal" data-title="Subtotal">
                                        <span class="woocommerce-Price-amount amount"> <span id="subtotal_<?php echo $key; ?>"><?php echo number_format($item['subtotal']); ?></span> VND</span>								</td>

                                    <td class="product-remove">
                                        <a href="https://us.camposcoffee.com/cart/?remove_item=02e8f2e4364042907ef9df3764b3546b&amp;_wpnonce=c60eaf3f9c" class="remove" title="Remove this item" data-product_id="2024" data-product_sku=""><icon src="https://us.camposcoffee.com/wp-content/themes/campos-wp-theme/assets/images/icons/rubbish.svg" class="product-remove-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22px" height="21px" viewBox="0 0 22 21" version="1.1" class="injected-svg icon-svg">
                                                    <defs>
                                                        <polygon id="rubbish-path-1" points="0 0.0364737768 0 1.22261286 21.6336942 1.22261286 21.6336942 0.0364737768 0 0.0364737768"></polygon>
                                                    </defs>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-697.000000, -452.000000)">
                                                            <g transform="translate(112.000000, 284.000000)">
                                                                <g>
                                                                    <g transform="translate(80.000000, 57.000000)">
                                                                        <g transform="translate(0.000000, 70.000000)">
                                                                            <g transform="translate(504.000000, 39.000000)">
                                                                                <g transform="translate(1.000000, 2.000000)">
                                                                                    <path d="M7.58191964,16.9372358 C7.27293041,16.9372358 7.01257288,16.6976357 6.9906293,16.3850881 L6.40823501,7.92376492 C6.38569837,7.5969836 6.63182223,7.31408943 6.95919662,7.29155279 C7.28360566,7.27138842 7.56887211,7.51573308 7.59200182,7.84251439 L8.17439611,16.3032445 C8.19633968,16.6300258 7.95021582,16.91292 7.62284143,16.9360497 C7.60920084,16.9366427 7.59556024,16.9372358 7.58191964,16.9372358" id="Fill-1"></path>
                                                                                    <path d="M4.67908146,19.27648 L16.9544348,19.27648 L18.1097343,3.89344224 L3.52378199,3.89344224 L4.67908146,19.27648 Z M17.5048034,20.4626191 L4.12871292,20.4626191 C3.81853755,20.4626191 3.5605523,20.2236121 3.53742259,19.9140298 L2.29316269,3.34425984 C2.28070823,3.17997958 2.33764291,3.01747852 2.44913998,2.89649234 C2.56182319,2.77550615 2.71898662,2.70730315 2.88445302,2.70730315 L18.7490633,2.70730315 C18.9139366,2.70730315 19.0716931,2.77550615 19.1837832,2.89649234 C19.2958734,3.01747852 19.352215,3.17997958 19.3403536,3.34425984 L18.0960937,19.9140298 C18.072964,20.2236121 17.8149787,20.4626191 17.5048034,20.4626191 L17.5048034,20.4626191 Z" id="Fill-3"></path>
                                                                                    <path d="M14.0512408,16.9372358 C14.0376002,16.9372358 14.0239596,16.9366427 14.010319,16.9360497 C13.6829446,16.91292 13.4368208,16.6300258 13.4587643,16.3032445 L14.0411586,7.84251439 C14.0642883,7.51514001 14.3489617,7.27138842 14.6739638,7.29155279 C15.0013382,7.31408943 15.2474621,7.5969836 15.2249254,7.92376492 L14.6425311,16.3850881 C14.6205876,16.6976357 14.36023,16.9372358 14.0512408,16.9372358" id="Fill-5"></path>
                                                                                    <g transform="translate(0.000000, 2.670533)">
                                                                                        <mask>
                                                                                            <use xlink:href="#rubbish-path-1"></use>
                                                                                        </mask>
                                                                                        <g id="Clip-8"></g>
                                                                                        <path d="M21.0406247,1.22261286 L0.592773007,1.22261286 C0.26539862,1.22261286 -0.000296534771,0.956917706 -0.000296534771,0.629543319 C-0.000296534771,0.302168932 0.26539862,0.0364737768 0.592773007,0.0364737768 L21.0406247,0.0364737768 C21.3685921,0.0364737768 21.6336942,0.302168932 21.6336942,0.629543319 C21.6336942,0.956917706 21.3685921,1.22261286 21.0406247,1.22261286" id="Fill-7" mask="url(#mask-2)"></path>
                                                                                    </g>
                                                                                    <path d="M14.3419635,3.3012623 C14.013996,3.3012623 13.748894,3.03556714 13.748894,2.70819276 L13.748894,1.18637631 L7.88402926,1.18637631 L7.88402926,2.70819276 C7.88402926,3.03556714 7.61892718,3.3012623 7.29095972,3.3012623 C6.96358533,3.3012623 6.69789018,3.03556714 6.69789018,2.70819276 L6.69789018,0.59330677 C6.69789018,0.265339313 6.96358533,0.000237227816 7.29095972,0.000237227816 L14.3419635,0.000237227816 C14.669931,0.000237227816 14.935033,0.265339313 14.935033,0.59330677 L14.935033,2.70819276 C14.935033,3.03556714 14.669931,3.3012623 14.3419635,3.3012623" id="Fill-10"></path>
                                                                                    <path d="M10.8165802,17.0258404 C10.4886128,17.0258404 10.2235107,16.7601453 10.2235107,16.4327709 L10.2235107,7.97204078 C10.2235107,7.64466639 10.4886128,7.37897124 10.8165802,7.37897124 C11.1445477,7.37897124 11.4096498,7.64466639 11.4096498,7.97204078 L11.4096498,16.4327709 C11.4096498,16.7601453 11.1445477,17.0258404 10.8165802,17.0258404" id="Fill-12"></path>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg></icon></a>								</td>

                                </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td>
                                        <?php echo $this->Html->link('<i class="fa fa-ban"></i> &nbsp; Xoá ', array('controller' => 'shop', 'action' => 'clear'), array('class' => 'button woocommerce-update_button', 'escape' => false)); ?>
                                    </td>
                                    <td colspan="6" class="actions coupon-td">




                                        <?php echo $this->Form->button('<i class="fa fa-calculator"></i> &nbsp; cập nhật', array('class' => 'button woocommerce-update_button', 'escape' => false));?>
                                        <?php echo $this->Form->end(); ?>

                                    </td>

                                </tr>


                                </tbody>
                            </table>

                            <div class="cart-order_total">

                                <div class="cart-order_total-column">

                                    <span class="cart-order_total-heading">Tổng (VND)</span>

                                    <span class="cart-order_total-amount"><strong><span class="woocommerce-Price-amount amount"><?php echo number_format($shop['Order']['total']); ?> VND</span></strong> </span>

                                </div>

                                <div class="cart-order_total-column">



                                    <?php echo $this->Html->link('<i class="fa fa-check"></i> &nbsp; Thanh toán', array('controller' => 'shop', 'action' => 'address'), array('class' => 'checkout-button button alt wc-forward', 'escape' => false)); ?>
                                </div>

                            </div>

                            <div class="cart-shop_link">

                                <a href="../products" class="cart-shop_link-a">mua tiếp</a>

                            </div>




                    </div>

                    <div class="store-two_col_wrapper-col store-two_col_wrapper-col--small">

                        <div class="cart-collaterals">

                            <div class="">


                                <h4>khuyến mãi</h4>

                                <table cellspacing="0" class="shop_table shop_table_responsive">

                                    <tbody><tr class="cart-subtotal">
                                        <th>giảm (%)</th>
                                        <td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">- <?php echo $shop['Order']['voucher'];?>%</span></td>
                                    </tr>





                                    <tr class="shipping">
                                        <div class="coupon">

                                            <label for="coupon_code"></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="<?php echo $shop['Order']['code'];?>" placeholder="Mã khuyến mãi"> <input type="submit" class="button" name="clear" value="NHẬN">

                                        </div>

                                    </tr>






                                    <tr class="order-total">
                                        <th>giảm (VND)</th>
                                        <td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"><?php echo number_format($shop['Order']['discount']); ?> VND</span></strong> </td>
                                    </tr>


                                    </tbody></table>

                                <div class="wc-proceed-to-checkout">

                                    <a href="https://us.camposcoffee.com/checkout/" class="checkout-button button alt wc-forward">
                                        Proceed to Checkout</a>
                                </div>


                            </div>

                        </div>

                    </div>


                </div>

            </div>
        </div>






<?php endif; ?>
