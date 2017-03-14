<script>
    function shipping(e) {

        window.location.href = "<?php echo Configure::read('Settings.DOMAIN');?>/shop/shipupdate/" + e.options[e.selectedIndex].value
            +"/" + $('#billing_first_name').val()
            +"/" + $('#billing_last_name').val()
            +"/" + $('#billing_email').val()
            +"/" + $('#billing_phone').val()
            +"/" + $('#billing_address_1').val();
    }
</script>
<div class="woocommerce">

    <div class="woocommerce-message_wrapper">


    </div>



    <div class="store-two_col">

        <h2 class="store-heading">giao hàng</h2>


        <?php echo $this->Form->create('Order'); ?>

            <div class="store-two_col_wrapper">

                <div class="store-two_col_wrapper-col store-two_col_wrapper-col--large">



                    <div id="customer_details">

                        <div class="woocommerce-billing-fields">

                            <h4>thông tin khách hàng</h4>




                            <p class="form-row form-row form-row-first validate-required" id="billing_first_name_field"><label for="billing_first_name" class="">tên <abbr class="required" title="required">*</abbr></label><input type="text" class="input-text " name="data[Order][first_name]" id="billing_first_name" placeholder="" autocomplete="given-name" required value="<?php echo $shop['Order']['firstname'];?>"></p>

                            <p class="form-row form-row form-row-last validate-required" id="billing_last_name_field"><label for="billing_last_name" class="">họ <abbr class="required" title="required">*</abbr></label><input type="text" class="input-text " name="data[Order][last_name]" id="billing_last_name" placeholder="" autocomplete="family-name" required value="<?php echo $shop['Order']['lastname'];?>"></p><div class="clear"></div>



                            <p class="form-row form-row form-row-first validate-required validate-email" id="billing_email_field"><label for="billing_email" class="">Email <abbr class="required" title="required">*</abbr></label><input type="email" class="input-text " name="data[Order][email]" id="billing_email" placeholder="" autocomplete="email" required value="<?php echo $shop['Order']['email'];?>"></p>

                            <p class="form-row form-row form-row-last validate-required validate-phone" id="billing_phone_field"><label for="billing_phone" class="">Điện thoại <abbr class="required" title="required">*</abbr></label><input type="tel" class="input-text " name="data[Order][phone]" id="billing_phone" placeholder="" autocomplete="tel" required value="<?php echo $shop['Order']['phone'];?>"></p><div class="clear"></div>

                            <p class="form-row form-row form-row-wide address-field validate-required" id="billing_address_1_field"><label for="billing_address_1" class="">Địa chỉ <abbr class="required" title="required">*</abbr></label><input type="text" class="input-text " name="data[Order][billing_address]" id="billing_address_1" required placeholder="Street address" autocomplete="address-line1" value="<?php echo $shop['Order']['address'];?>"></p>


                            <p class="form-row form-row form-row-first address-field validate-required" id="billing_city_field" data-o_class="form-row form-row form-row-wide address-field validate-required"><label for="billing_city" class="">tỉnh / thành  <abbr class="required" title="required">*</abbr></label>

                                <select name="data[Order][billing_city]"  id="billing_city" style="max-width: none" onchange="shipping(this)">

                                    <option value="" disabled <?php if ($shop['Order']['city'] == 0) echo 'selected';?>>Chọn tỉnh/thành phố</option>
                                   <?php foreach ($locations as $key => $value){ ?>
                                      <option value="<?php echo $value['DevvnTinhthanhpho']['matp'];?>" <?php if ($shop['Order']['city'] == $value['DevvnTinhthanhpho']['matp']) echo 'selected';?>><?php echo $value['DevvnTinhthanhpho']['name'];?></option>
                                   <?php } ?>
                                </select>
                            </p>
                            <p class="form-row form-row form-row-last address-field validate-required" id="billing_city_field" data-o_class="form-row form-row form-row-wide address-field validate-required"><label for="billing_city" class="">Quận / huyện  <abbr class="required" title="required">*</abbr></label>

                                <select name="data[Order][state]"  id="state" style="max-width: none" onchange="shipping(this)">

                                    <option value="" disabled selected>Chọn quận/huyện</option>
                                    <?php foreach ($states as $key => $value){ ?>
                                        <option value="<?php echo $value['DevvnQuanhuyen']['matp'];?>" ><?php echo $value['DevvnQuanhuyen']['name'];?></option>
                                    <?php } ?>
                                </select>
                            </p>

                            <div class="clear"></div>








                        </div>

                        <div class="woocommerce-shipping-fields">








                            <p class="form-row form-row notes" id="order_comments_field"><label for="order_comments" class="">ghi chú</label><textarea name="data[Order][note]" class="input-text " id="order_comments" placeholder="ghi chú về đơn hàng, đặc biệt là giao hàng v.v." rows="2" cols="5"></textarea></p>


                        </div>

                    </div>





                </div>

                <div class="store-two_col_wrapper-col store-two_col_wrapper-col--small">

                    <h4 id="order_review_heading">đặt hàng</h4>


                    <div id="order_review" class="woocommerce-checkout-review-order">



                        <table class="shop_table woocommerce-checkout-review-order-table checkout">
                            <thead>
                            <tr>
                                <th class="product-name product-name--heading">sản phẩm</th>
                                <th class="product-total product-total--heading">tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($shop['OrderItem'] as $key => $item): ?>
                            <tr class="cart_item product">

                                <td class="product-name">

                                    <div class="product-details_container">

                                        <div class="product-thumbnail">
                                            <?php echo $this->Html->image('/images/small/' . $item['Product']['image'], array('class' => 'px20','width' => 100)); ?>									 <span class="product-quantity"><?php echo $item['quantity'];?></span>								</div>

                                        <div class="product-data">
                                            <strong><?php echo $item['Product']['name'];?></strong>
                                        </div>

                                    </div>

                                </td>

                                <td class="product-total">
                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"><?php echo number_format($item['subtotal']); ?></span> VND</span>						</td>

                            </tr>
                            <?php endforeach;?>
                            </tbody>
                            <tfoot>

                            <tr class="cart-subtotal">
                                <th>thành tiền</th>
                                <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"><?php echo number_format($shop['Order']['subtotal']); ?> VND</span></td>
                            </tr>



                            <tr class="shipping">
                                <th>phí giao hàng</th>
                                <td data-title="Shipping">
                                    <p> <?php echo number_format($shop['Order']['shipping']); ?> VND</p>


                                </td>
                            </tr>

                            <tr class="shipping">
                                <th>khuyến mãi</th>
                                <td data-title="Shipping">
                                    <p>- <?php echo number_format($shop['Order']['discount']); ?> VND</p>


                                </td>
                            </tr>






                            <tr class="order-total">
                                <th>số tiền thanh toán</th>
                                <td><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"><?php echo number_format($shop['Order']['total']); ?> VND</span></strong> </td>
                            </tr>


                            </tfoot>
                        </table>

                        <div id="payment" class="woocommerce-checkout-payment payment_method">


                            <ul class="wc_payment_methods payment_methods methods">
                                <li class="wc_payment_method payment_method_paypal">


                                    <label for="payment_method_paypal">
                                        <h4 class="payment_method-title">hình thức thanh toán</h4>

                                    </label>
                                    <div class="payment_box payment_method_paypal">
                                        <p class="form-row form-row-wide create-account woocommerce-validated">
                                            <input class="input-checkbox" id="createaccount" type="checkbox" name="data[Order][direct]" value="1"> <label for="createaccount" class="checkbox">trực tiếp khi giao hàng</label>
                                        </p>
                                        <p class="form-row form-row-wide create-account woocommerce-validated">
                                            <input class="input-checkbox" id="createaccount" type="checkbox" name="data[Order][transfer]" value="1"> <label for="createaccount" class="checkbox">chuyển khoản qua ngân hàng</label>
                                            <label style="color : #0a4e9b">
                                                Chủ TK : Lê Khánh Duy </br>
                                                Vietcombank chi nhánh Hồ Chí Minh </br>
                                                STK : 0071001150198
                                            </label>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <div class="form-row place-order">
                                <noscript>
                                    Since your browser does not support JavaScript, or it is disabled, please ensure you click the &lt;em&gt;Update Totals&lt;/em&gt; button before placing your order. You may be charged more than the amount stated above if you fail to do so.			&lt;br/&gt;&lt;input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals" /&gt;
                                </noscript>




                                <?php echo $this->Form->button('<i class="fa fa-check"></i> &nbsp; Xong', array('class' => 'button woocommerce-update_button'));?>
                                <?php echo $this->Form->end(); ?>
                            </div>
                        </div>


                    </div>


                </div>

            </div>

        </form>

    </div>

</div>

<?php echo $this->Html->script(array('shop_address.js'), array('inline' => false)); ?>




