<script>
    function addMoney() {

        $('#totalOwe').html(<?php echo $order['Order']['total'] - $fee;?> - $('#money').val());
    }
    
    function checkOut() {
        $('#money').val(<?php echo $order['Order']['total'] - $fee;?>);
        addMoney();
    }
</script>
<div class="outer">
    <div class="inner" id="viewareaid">


        <!-- ko if:ShowType() === 'List'--><!-- /ko -->
        <!-- ko if:ShowType() === 'CartList'--><!-- /ko -->
        <!-- ko if:ShowType() === 'Detail' -->
        <div>
            <div class="hide-print pageheader hide-print two-actions-header-mobile title-longer-md">
                <div class="col-xs-12" style="margin : 5px">
                    <div class="breadcrumb-new">
                        <span><a href="/admin/order/#/list">Đơn hàng</a></span>
                        <span class="border-row hidden-xs">/ </span>
                        <span class="active">#<?php echo $order['Order']['id'];?></span>
                        <span class="border-row hidden-xs text-small inline-vertical-top">/ </span>
                        <span class="text-small inline-vertical-top hidden-xs"><?php echo $order['Order']['created'];?></span>
                        <button type="button" class="btn btn-default ml10" style="float:right"><i class="fa fa-print"></i> In</button>
                   </div>
                </div>
            </div>
            <?php echo $this->Form->create('Order'); ?>
            <div class="one-row-actions hide-print">
                <div class="flexbox-grid no-pd-none">
                    <div class="flexbox-content">


                        <div class="row wrap-col clearfix">
                            <div class="col-md-9">
                                <div class="order-detail">
                                    <div class="widget">
                                        <table cellspacing="0" class="table borderless">
                                            <!-- line items -->
                                            <tbody data-bind="foreach: OrderProduct">
                                            <?php foreach ($order['OrderItem'] as $orderItem): ?>
                                            <tr class="border-bottom ">

                                                <td class="order-border text-center p-small width-40-px min-width-40-px">
                                                    <i class="fa-notfulfilled"></i>
                                                </td>

                                                <td class="order-border p-small ">
                                                    <div class="flexbox-grid-default pl5 p-r5">
                                                        <div class="flexbox-content">
                                                            <p data-bind="text:ProductName" class="show-print"><?php echo $orderItem['name'];?></p>


                                                           


                                                            <p data-bind="visible:VariantValue,text:VariantValue" style="display: none;"></p>

                                                            <div class="ws-nm">

                                                                <label class="inline" data-bind="text:InventoryText">(còn trong kho chính)</label>

                                                            </div>

                                                            <span data-bind="text:RestockQuantity"></span>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right order-border p-small p-sm-r">
                                                    <div class="inline_block" data-bind="css: { 'vertical-align-m': ShowOriginalPrice() == true}">
                                                        <strong data-bind="text: Quantity" class="item-quantity"><?php echo $orderItem['quantity'];?></strong>
                                                        <span class="item-multiplier mr5">×</span>
                                                    </div>
                                                    <div class="inline_block vertical-align-m">
                                                        <b class="block-display-no-i color-blue-line-through" data-bind="textMoneyWithSymbol: ProductPrice"><?php echo number_format($orderItem['price']);?> ₫</b>
                                                    </div>
                                                </td>
                                                <td class="text-right p-small p-sm-r order-border border-none-r">
                                                    <span data-bind="textMoneyWithSymbol:TotalPrice"><?php echo number_format($orderItem['quantity'] * $orderItem['price']);?> ₫</span>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                            </tbody>
                                            <tbody class="height-light bg-order">
                                            
                                             <tr>
                                                <td colspan="3" class="text-right p-sm-r">
                                                   Tổng giá trị sản phẩm:
                                                </td>
                                                <td class="text-right p-sm-r">
                                                    <span><?php echo h(number_format($order['Order']['subtotal'])); ?> ₫</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-right p-sm-r">
                                                    Mã khuyến mãi<span class="bold-light" style="display: none;">()</span>:
                                                </td>
                                                <td class="text-right p-sm-r">
                                                    <span data-bind="textMoneyWithSymbol: Order().DiscountAmountText">0 ₫</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-right p-sm-r">
                                                    Phí vận chuyển
                                                </td>
                                                <td class="text-right p-sm-r">
                                                    <span data-bind="textMoneyWithSymbol: Order().OrderShippingFee"><?php echo h(number_format($order['Order']['shipping'])); ?> ₫</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-right p-sm-r bold-light">
                                                    Số tiền phải thanh toán:
                                                </td>
                                                <td class="text-right p-sm-r bold-light">
                                                    <span data-bind="textMoneyWithSymbol: Order().TotalPaid"><?php echo h(number_format($order['Order']['total'])); ?> ₫</span>
                                                </td>
                                            </tr>
                                          
                                            <tr>
                                                <td colspan="3" class="text-right p-sm-r">
                                                    Số tiền đã thanh toán:
                                                </td>
                                                <td class="text-right p-sm-r bold-light">
                                                    <span data-bind="textMoneyWithSymbol: Order().AmountPaid"><?php echo h(number_format($fee));?> ₫</span>
                                                </td>
                                            </tr>
                                            <?php if($fee < $order['Order']['total']) { ?>
                                            <tr>
                                                <td colspan="3" class="text-right p-sm-r">
                                                    <a onclick="checkOut()" class="hover-underline"><i
                                                            class="fa fa-plus-circle"></i> Thanh Toán Hết</a>
                                                </td>
                                                <td class="p-xs">

                                                    <input class="form-control p-none-r" name="data[Order][money]" placeholder="Thanh toán 1 phần" type="number" id="money" min="1" onchange="addMoney()">

                                                </td>
                                                <!--/ko-->

                                            </tr>
                                            <tr class="bold-light">
                                                <td  colspan="3" class="text-right p-sm-r">Còn nợ</td>
                                                <td class="text-right p-sm-r bold-light" id="totalOwe"><?php echo number_format($order['Order']['total'] - $fee);?> </td>
                                                <td> ₫</td>



                                            <?php } ?>
                                            </tr>
                                            <tr class="bold-light">
                                                <td  colspan="3" class="text-right p-sm-r"><a class="hover-underline"><i
                                                        ></i> Trạng thái</a></td>
                                                <td class="text-right p-sm-r bold-light" id="totalOwe">
                                                    <select class="form-control" name="data[Order][shipping_status]"   id="billing_city" style="max-width: none" onchange="shipping(this)">

                                                        <?php foreach ($status as $key => $value){ ?>
                                                            <option value="<?php echo $value['ShippingStatus']['id'];?>" <?php if ($value['ShippingStatus']['id'] == $order['Order']['shipping_status']) echo 'selected';?>><?php echo $value['ShippingStatus']['status'];?></option>
                                                        <?php } ?>
                                                    </select>

                                                </td>
                                                <td> ₫</td>
                                            </tr>
                                            </tbody>


                                        </table>


                                        <table>
                                            <!-- ko if:Order().TotalTransactions()  < 2 --><!-- /ko -->
                                            <!-- ko if:Order().TotalTransactions()  > 1 -->
                                            <tbody class="list-transactions">

                                            </tbody>
                                            <!-- /ko -->
                                        </table>
                                    </div>

                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <p>Ghi chú đơn hàng</p>
                                        <textarea name="data[Order][note]" style="resize: none" class="form-control mt15 textarea-auto-height" rows="4" placeholder="Thêm ghi chú cho đơn hàng…"><?php echo $order['Order']['note'];?></textarea>
                                    </div>
                                    <div data-bind="foreach:NoteAttributes"></div>
                                    <div class="panel-footer text-right p-sm-r">
                                        <button type="submit" class="btn btn-default">Lưu đơn hàng</button>
                                    </div>
                                </div>
                                <?php echo $this->Form->end();?>



                                <div class="mt20 mb20">
                                    <div data-bind="commentLog: CommentLog">
                                        <div class="comment-log ws-nm">
                                            <!-- ko if: !IsSmallVersion() -->
                                            <div class="comment-log-title">
                                                <label class="bold-light m-xs-b hide-print">Lịch sử</label>
                                            </div>
                                            <div class="comment-log-timeline">
                                                <div class="column-left-history ps-relative">

                                                <?php foreach ($logs as $key =>$value) { ?>
                                                    <div class="p-xs p-l15 pr15 item-card">
                                                        <div class="item-card-body clearfix">
                                                            <div class="item item-quantity">
                                                                <?php if($value['Log']['action'] == 0){ ?>
                                                                    <i class="fa fa-check border-cycle bg-slateGray mr5 img-icon-history"></i>
                                                                <?php } else { ?>
                                                                <i class="glyphicon glyphicon-arrow-right border-cycle bg-green mr5 img-icon-history"></i>
                                                                <?php } ?>
                                                                <p class="detail-history-order">
                                                                    <a class="bold-light show-timeline-dropdown"><?php echo $value['Log']['detail'];?> </span></a>
                                                                </p>
                                                                <span class="pull-right text-gray" data-bind="timeshort:LogDate"><?php echo $value['Log']['created'];?></span>

                                                            </div>
                                                        </div>
                                                    </div>


                                            <?php } ?>





                                                </div>
                                                <!-- ko if: Total() > PageSize() --><!-- /ko -->
                                            </div>
                                            <!-- /ko -->
                                            <!-- ko if: IsSmallVersion() --><!-- /ko -->
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group mt15">

                                    <?php echo $this->Form->postLink('Xóa đơn hàng', array('action' => 'delete', $order['Order']['id']), array('class' => 'btn btn-default btn-danger'), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?>
                                </div>
                            </div>
                            <div class="widget col-md-3 ">


                                <div class="panel panel-default">
                                    <div class="">
                                        <span class="pull-left pre-line" style="line-height: 23px;">Địa chỉ giao hàng</span>

                                    </div>
                                    <div class="panel-body">
                                        <div id="customerInfo" class="panel-body pull-left">
                                            <div class="text-xs-center">
                                                <img class="thumb-image radius-cycle" src="https://secure.gravatar.com/avatar/2efd8534a82578a162535ce9abd0224c.jpg?s=40&amp;d=https%3A%2F%2Fsecure.gravatar.com%2Favatar%2F18f9f20ec1a7be8020924ce0048b6ef2.jpg%3Fs%3D40"></div>
                                            
                                                <p>
                                                    <span id="customerName" class="pre-line"><?php echo h($order['Order']['first_name']); ?></span>
                                                </p>
                                                <p>
                                                    <i class="fa fa-check-square-o"></i>
                                                    <span id="customerAddress"><?php echo h($order['Order']['shipping_address']); ?></span>
                                                </p>
                                                <p>
                                                    <span><a title="Click để gọi"><i class="fa fa-phone-square cursor-pointer mr10"></i></a></span>
                                                    <span id="customerPhone"><?php echo h($order['Order']['phone']); ?></span>
                                                </p>

                                                <p class="overflow-ellipsis mt10 p-r15 ps-relative">
                                                    <i class="glyphicon glyphicon-envelope color-gray-icons mr10"></i>

                                                    <a>
                                                        <span data-bind="text: email"><?php echo h($order['Order']['email']); ?></span>
                                                    </a>

                                                    <a class="hide-print ps-absolute-default" href="#" data-bind="click:openEditEmail">
                                                        <span data-placement="left" title="Chỉnh sửa email" data-toggle="tooltip"><i class="fa fa-pencil-square-o color_gray "></i> </span>
                                                    </a>
                                                </p>
                                                <p class="hide-print normal-line">
                                                    <i class="glyphicon glyphicon-user color-gray-icons mr10 hide-print"></i>
                                                    <a class="hide-print text-underline hover-tooltip hover-underline color-dark-link" id="customerDetail" href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/customers/view/<?php echo $order['Order']['customer_id']; ?>">Xem thông tin khách hàng</a>
                                                </p>

                                           
                                        </div>
                                    </div>
                                    <div class="panel-footer">

                                        <ul>
                                            <li class="hide-print">Tổng khối lượng: <strong><?php echo $order['Order']['weight']; ?> kg</strong></li>
                                        </ul>

                                      
                                    </div>
                                </div>








                                <div class="panel panel-default hide-print">
                                    <div class="panel-body p-b5">
                                        <!--ko if : Order().UserName()-->
                                        <div class="p-b10">
                                            <span>Nhân viên tạo</span>
                                            <ul class="p-sm-l p-sm-r">
                                                <li class="overflow-ellipsis">
                                                    <span class="ww-bw bold-light" data-bind="text:Order().UserName">admin</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <!--/ko-->
                                        <!--ko if : Order().LocationName()-->
                                        <div class="p-b10">
                                            <span>Kho bán</span>
                                            <ul class="p-sm-l p-sm-r">
                                                <li class="ws-nm">
                                                    <span class="ww-bw bold-light" data-bind="text:Order().LocationName">Địa điểm mặc định</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <!--/ko-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






           
                        
        

    </div>

    <!-- end .inner -->
</div>

