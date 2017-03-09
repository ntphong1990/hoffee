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
    <div class="inner" id="viewareaid" style="margin-top: 100px">


        <!-- ko if:ShowType() === 'List'--><!-- /ko -->
        <!-- ko if:ShowType() === 'CartList'--><!-- /ko -->
        <!-- ko if:ShowType() === 'Detail' -->
        <div data-bind="template: { name: 'OrderDetailTmpl', data: mvdetail }">
            <div class="hide-print pageheader hide-print two-actions-header-mobile title-longer-md">
                <div class="col-xs-12">
                    <div class="breadcrumb-new">
                        <svg class="svg-next-icon svg-next-icon-size-20 svg-next-icon-header hidden-xs">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-orders"></use>
                        </svg>
                        <span><a class="back-list hidden-xs" data-bind="attr: { href: LinkToList }" href="/admin/order/#/list">Đơn hàng</a></span>
                        <span class="border-row hidden-xs">/ </span>
                        <span class="active">#<?php echo $order['Order']['id'];?></span>
                        <span class="border-row hidden-xs text-small inline-vertical-top">/ </span>
                        <span class="text-small inline-vertical-top hidden-xs"><?php echo $order['Order']['created'];?></span>
                    </div>
                    <div class="header__primary-actions">
                        <!-- ko if:Order().IsArchived()--><!-- /ko -->
                        <!-- ko if:!Order().IsArchived()-->
<!--                        <button type="button" --><?php //if($order['Order']['status'] != 3) echo 'disabled';?><!-- class="btn btn-primary" data-bind="click:ArchiveOrder">-->
<!--                            <span>Lưu</span>-->
<!--                        </button>-->
                        <!-- /ko -->
                    </div>
                    <div class="header__secondary-actions">
                <span class="pull-left mr5" data-bind="template: { name: 'AppButtonTmpl', data: TopAppButton }">
    <!-- ko if: TopLinkButton() && TopLinkButton().length > 0 --><!-- /ko -->
</span>
                        <button type="button" class="btn btn-default ml10" data-bind="click:OrderPrint"><i class="fa fa-print"></i> In</button>
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
                                    <div class="panel panel-default overflow-auto">
                                        <div class="panel-heading order-bottom hide-print">

                                        </div>


                                        <table cellspacing="0" class="order-totals-summary">
                                            <!-- line items -->
                                            <tbody data-bind="foreach: OrderProduct">
                                            <?php foreach ($order['OrderItem'] as $orderItem): ?>
                                            <tr class="border-bottom ">

                                                <td class="order-border text-center p-small width-40-px min-width-40-px">
                                                    <i class="fa-notfulfilled"></i>
                                                </td>

                                                <td class="order-border p-small ">
                                                    <div class="flexbox-grid-default pl5 p-r5">
                                                        <div class="flexbox-auto-50">

<!--                                                            <div class="wrap-img"><img class="thumb-image thumb-image-cartorderlist" src="//product.hstatic.net/1000145935/product/upload_035edbbd6f154d2a8c7dd7b3ca99d296_thumb.jpg"></div>-->

                                                        </div>
                                                        <div class="flexbox-content">
                                                            <p data-bind="text:ProductName" class="show-print"><?php echo $orderItem['name'];?></p>


                                                            <div data-bind="template: { name: TemplateName() }">
                                                                <div>
                                                                    <div class="dropup ps-relative inline_block dropdown-orderdetail">
                                                                        <a data-bind="text: AdditionData().ProductName, attr: { href: AdditionData().ProductLink, title: AdditionData().ProductName }, event: { mouseover: MouseOver }" href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/products/view/<?php echo $orderItem['product_id'];?>" target="_blank" class="text-underline wordwrap hide-print" data-hover="dropdown" data-close-others="true" title=""><?php echo $orderItem['name'];?></a>
                                                                        <div class="dropdown-menu p-none m-none" role="menu">
                                                                            <div class="col-xs-12 p-none m-none" style="min-height: 90px">

                                                                                <div class="loading-main m-auto mt20"></div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


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
                                                <td></td>
                                                <td></td>
                                                <td class="text-right p-sm-r ">
                                                    Tổng giá trị sản phẩm:
                                                </td>
                                                <td class="text-right p-sm-r">
                                                    <span data-bind="textMoneyWithSymbol: Order().SubTotal"><?php echo h(number_format($order['Order']['subtotal'])); ?> ₫</span>
                                                </td>
                                            </tr><tr>
                                                <td colspan="3" class="text-right p-sm-r">
                                                    Mã khuyến mãi<span class="bold-light" data-bind="visible:Order().DiscountCode(),text:'(' + Order().DiscountCode() + ')'" style="display: none;">()</span>:
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
                                                <td class="p-none-important" colspan="2"></td>
                                                <td class="p-none-important border-bottom" colspan="2"></td>
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


                                            <?php } ?>
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



<!--                                <div class="mt20 mb20">-->
<!--                                    <div data-bind="commentLog: CommentLog">-->
<!--                                        <div class="comment-log ws-nm">-->
<!--                                            <!-- ko if: !IsSmallVersion() -->-->
<!--                                            <div class="comment-log-title">-->
<!--                                                <label class="bold-light m-xs-b hide-print">Lịch sử</label>-->
<!--                                            </div>-->
<!--                                            <div class="comment-log-timeline">-->
<!--                                                <div data-bind="css: { 'no-comment': Total() == 0 }" class="column-left-history ps-relative">-->
<!---->
<!---->
<!--                                                    <div class="p-xs p-l15 pr15 item-card">-->
<!--                                                        <div class="item-card-body clearfix">-->
<!--                                                            <div class="item item-quantity" data-bind="template: { name: TemplateName, data: $data }">-->
<!--                                                                <i class="glyphicon glyphicon-arrow-right border-cycle bg-green mr5 img-icon-history"></i>-->
<!--                                                                <p class="detail-history-order">-->
<!--                                                                    <a class="bold-light show-timeline-dropdown" data-bind="attr: {'data-target': '#dd_CapturePayment_' + Id() }" data-target="#dd_CapturePayment_53809345">Chúng tôi xác nhận thanh toán thành công <span data-bind="textMoneyWithSymbol:LogData().Amount">1,550,000 ₫</span></a>-->
<!--                                                                </p>-->
<!--                                                                <span class="pull-right text-gray" data-bind="timeshort:LogDate">3:49 CH</span>-->
<!--                                                                -->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!---->
<!---->
<!---->
<!---->
<!--                                                    <div class="p-xs p-l15 pr15 item-card">-->
<!--                                                        <div class="item-card-body clearfix">-->
<!--                                                            <div class="item item-quantity" data-bind="template: { name: TemplateName, data: $data }">-->
<!--                                                                <i class="fa fa-check border-cycle bg-slateGray mr5 img-icon-history"></i>-->
<!--                                                                <p class="detail-history-order">-->
<!--                                                                    Đơn hàng đã được xác thực bởi-->
<!--                                                                    <span data-bind="text:LogData().ConfirmUser">Mr Duy (TheSkinna)</span>-->
<!--                                                                </p>-->
<!--                                                                <span class="pull-right text-gray" data-bind="timeshort:LogDate">3:49 CH</span>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!---->
<!---->
<!---->
<!---->
<!--                                                    <div class="p-xs p-l15 pr15 item-card">-->
<!--                                                        <div class="item-card-body clearfix">-->
<!--                                                            <div class="item item-quantity" data-bind="template: { name: TemplateName, data: $data }">-->
<!--                                                                <i class="fa fa-star border-cycle bg-slateGray mr5 img-icon-history"></i>-->
<!--                                                                <p class="detail-history-order">-->
<!--                                                                    Đơn hàng được tạo bởi-->
<!--                                                                    <span data-bind="text:LogData().UserCreatedFullName">Mr Duy (TheSkinna)</span>-->
<!--                                                                </p>-->
<!--                                                                <span class="pull-right text-gray" data-bind="timeshort:LogDate">3:49 CH</span>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!---->
<!---->
<!---->
<!--                                                </div>-->
<!--                                                <!-- ko if: Total() > PageSize() --><!-- /ko -->-->
<!--                                            </div>-->
<!--                                            <!-- /ko -->-->
<!--                                            <!-- ko if: IsSmallVersion() --><!-- /ko -->-->
<!--                                        </div>-->
<!---->
<!--                                    </div>-->
<!--                                </div>-->
                                <div class="form-group mt15">

                                    <?php echo $this->Form->postLink('Xóa đơn hàng', array('action' => 'delete', $order['Order']['id']), array('class' => 'btn btn-default btn-danger'), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?>
                                </div>
                            </div>
                            <div class="col-md-3 ">


                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <span class="pull-left pre-line" style="line-height: 23px;">Địa chỉ giao hàng</span>

                                    </div>
                                    <div class="panel-body">
                                        <div id="customerInfo" class="panel-body">
                                            <div class="wrap-img inline_block vertical-align-t radius-cycle ">
                                                <img class="thumb-image radius-cycle" src="https://secure.gravatar.com/avatar/2efd8534a82578a162535ce9abd0224c.jpg?s=40&amp;d=https%3A%2F%2Fsecure.gravatar.com%2Favatar%2F18f9f20ec1a7be8020924ce0048b6ef2.jpg%3Fs%3D40"></div>
                                            <ul>
                                                <li>
                                                    <span id="customerName" class="pre-line"><?php echo h($order['Order']['first_name']); ?></span>
                                                </li>
                                                <li>
                                                    <i class="fa fa-check-square-o"></i>
                                                    <span id="customerAddress"><?php echo h($order['Order']['shipping_city']); ?></span>
                                                </li>
                                                <li>
                                                    <span><a title="Click để gọi"><i class="fa fa-phone-square cursor-pointer mr10"></i></a></span>
                                                    <span id="customerPhone"><?php echo h($order['Order']['phone']); ?></span>
                                                </li>

                                                <li class="overflow-ellipsis mt10 p-r15 ps-relative">
                                                    <i class="glyphicon glyphicon-envelope color-gray-icons mr10"></i>

                                                    <a>
                                                        <span data-bind="text: email"><?php echo h($order['Order']['email']); ?></span>
                                                    </a>

                                                    <a class="hide-print ps-absolute-default" href="#" data-bind="click:openEditEmail">
                                                        <span data-placement="left" title="Chỉnh sửa email" data-toggle="tooltip"><i class="fa fa-pencil-square-o color_gray "></i> </span>
                                                    </a>
                                                </li>
                                                <li class="hide-print normal-line">
                                                    <i class="glyphicon glyphicon-user color-gray-icons mr10 hide-print"></i>
                                                    <a class="hide-print text-underline hover-tooltip hover-underline color-dark-link" id="customerDetail" href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/customers/view/<?php echo $order['Order']['customer_id']; ?>">Xem thông tin khách hàng</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-footer">

                                        <ul>
                                            <!--ko if : Order().ShippingMethodName()--><!--/ko-->
                                            <li class="hide-print">Tổng khối lượng: <strong data-bind="text:Order().TotalWeightText"><?php echo $order['Order']['weight']; ?> kg</strong></li>
                                        </ul>

                                        <!--ko if : !Order().ShippingMethodName  && Order().OrderShippingFee() == 0--><!--/ko-->
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






            <div id="printer-preview-content" class="printer-preview-content">
                <div class="show-print" data-bind="html:Order().OrderPrinterResult"><meta charset="UTF-8">
                    <div style="width:100%; float:left; margin:0px 0px;font-family: Helvetica; line-height: 30px; font-size:12px"><p style="float: right; text-align: right; padding-right:20px; line-height: 140%">
                            Ngày đặt hàng: 03/01/2017<br>
                            <img style="margin-right:-10px" class="print_barcode order" val="#100004" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIQAAAA3CAYAAADNGuJ8AAAEn0lEQVR4Xu3cachtYxQH8N9VxqQUMnwxJ0SUKGNmSRHK8NEN3VuKD5SEFL4YP0gUkZAMiWTIlCgZMmSMSMYIERkyta5n3/c5+937vMe9++Q9b2vX7Z73PPuss/da/+e//ms9zz7LTH78XU5dhngd/8dRv26s9Y3XNvrObd6v7cd7Xd9bn9u23b6G/+vc5trbvmqut7639jU291zbaOz0vdf2VZfPe6PeOH0SWCQg5k+AvqB2gTkB0cEgyRCjzNrFWpPM8D4/TsowyRCVB7poeJrpJVPGGI2RDJEMMU+Adomhds5tz6oUlXNASlFZ6D6rjLm8lxoiy87VZX4yRDLEKg/ULYJkiGSIBER2Kue6s8kQrdZ4VhmZMkbWShIQCYgERKWbMmVkyljd0BtXUXRVHpOsheRaRq5ljFQpCYgERAJimiuYfWsvXZt0crUzVzs7BXFukMkNMquEYTJEMkQyRHtvZm6y/ZcZkiF60kTfptOF8mrbqYtFKKaobKE9t+GPMkDdDGprhtQQqSFSQ6SG6F6qTg2RGmJemZkpI1NGpoxMGZky8mHfqvLKKiOf/h5pPCUgEhAJiPw5gLlmVHYqs1PZqZny9yF6HpjJKiOrjKwyssqY2+yRi1u5uDWytp+ASEAkIMZsCcw+RPYhsg9RPdqQL5eqB/7L71QuVR/kfVUemEVA7IWPsBV+xBcZ0eE8MGuAWAcv4mTchPPwDjbBcTgRl+LNlov2xUP4BCfg82o8gPUYtsMxeGHCsfVxJc7FctzSEZb9cRWOwE/DhW16lmYNEDvifFyGO3BoaQ4FawQgVuJYvFK5bHN8jYOwPS7EbvgDAbDncDtex0uFeb5aYCzMX4C9cREexDl4qvreDfAqNsMu+H56YRzO8qwAImbgntgdu+JpnILrSoB/KS65G9fg5cpFwSb7FCCtW8ByGt5GAOyRCiDX4zXctsBYE+zD8WVhlrMK+zTrGwHc9QqbHZKAGA60YSlm2TZ4AkcX+j8Kv+LjqoV8T6HoGhCnY0tcXYEmAh+pJ2buzYiA/YVTsXU5d9xYAOIN7FcCHcC6vzDGn9gWj5fxZ3Fg0TvDemUK1maBITbFwdi4BCp0w404o8z2AERzTAqIhkV2wn2IlNMGxLixPkCEnWCIhwvLPIr3cCTenUL8Bjc5K4AIh15R0sGZiMB/WGbp+5VXulJGzPrQDpcXXRDMsKKAKYIe+X8PxMy+GN/iBowbawBxAL4pDHMJDsOGpQraorquz7AzmtQ2eCCHMjgLgIh7jdwf6j8cHjk/BOQPlRMiV0cgHigpI4Tiz2U8qoeg9x0Klcc5TXAaLXA23iqzOcRngGzcWJiOKueDwlpP4lbcWb4zqp7wbaSOEKuhf9qVz1AxHNTOrAAixFv8u6uo+9AF9XES7q3eiKoiZnj0KeIIRohZH0dUJs9U50Zp+Hz5O9LRtROOhS4JkAb7RIoI8fpb9dkGUCGCY/z4kpYGDeDQxmYFECEofy8O3QifroEjYtZGWmiYozYRNoOFatZpxseNBTOFtvluDa5nUX5kVgCxKJ23FC8qAbEUo7oW95SAWAvnLcWP/gNFho2Du5MsWwAAAABJRU5ErkJggg==">
                        </p>
                        <script>
                            $.getScript("//hstatic.net/0/0/global/design/seller/js/JsBarcode.all.min.js",function(){

                                var barcode = $('.print_barcode').attr('val');

                                $('.print_barcode').JsBarcode(barcode ,{
                                    width:  1,
                                    height: 40,
                                    quite: 10,
                                    format: "CODE128",
                                    displayValue: true,
                                    font:"monospace",
                                    textAlign:"center",
                                    fontSize: 12,
                                    backgroundColor:"",
                                    lineColor:"#000"})
                            })


                        </script>
                        <div style=" margin: 0 0 1.5em 0; ">
                            <strong style="font-size: 18px;">theskinna</strong>
                            <br>
                            <strong>Địa chỉ:</strong> 233/5b Võ Thị Sáu, Quận 3, TP. HCM,  , Hồ Chí Minh , Vietnam


                            <br>
                            <strong>Điện thoại:</strong> 0909055578

                            <br>
                            <strong>Website:</strong> http://theskinna.myharavan.com/
                            <br>
                            <strong>Email:</strong> duyle.skinna@gmail.com
                        </div>


                        <div style="clear:both"></div>

                        <table style="width: 100%"><tbody><tr><td valign="top" style="width: 65%">
                                    <h3 style="font-size: 14px;line-height: 0">Chi tiết đơn hàng</h3>
                                    <hr style="border: none; border-top: 2px solid #0975BD;">

                                    <table style="margin: 0 0 1.5em 0;font-size: 12px;" width="100%">
                                        <thead>
                                        <tr>
                                            <th style="width:25%;text-align: left;padding: 5px 0px">Mã sản phẩm</th>
                                            <th style="width:35%;text-align: left;padding: 5px 0px">Sản phẩm</th>
                                            <th style="width:15%;text-align: right;padding: 5px 0px">Số lượng</th>
                                            <th style="width:25%;text-align: right;padding: 5px 0px">Giá</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr valign="top" style="border-top: 1px solid #d9d9d9;">
                                            <td align="left" style="padding: 5px 0px"></td>
                                            <td align="left" style="padding: 5px 5px 5px 0px;white-space: pre-line;">Bình đun siêu tốc Kangaroo KG331 1.7L - Default Title</td>
                                            <td align="center" style="padding: 5px 0px">1</td>
                                            <td align="right" style="padding: 5px 0px">1,550,000₫</td>
                                        </tr>

                                        </tbody>
                                    </table>

                                    <h3 style="font-size: 14px;margin: 0 0 1em 0;">Thông tin thanh toán</h3>

                                    <table style="font-size: 12px;width: 100%; margin: 0 0 1.5em 0;">
                                        <tbody><tr>
                                            <td style="padding: 5px 0px">Tổng giá sản phẩm:</td>
                                            <td style="text-align:right">1,550,000₫</td>
                                        </tr>



                                        <tr>
                                            <td style="width: 50%;padding: 5px 0px">Phí vận chuyển:</td>
                                            <td style="text-align:right;padding: 5px 0px">0₫</td>
                                        </tr>

                                        <tr>
                                            <td style="padding: 5px 0px"><strong>Tổng tiền:</strong></td>
                                            <td style="text-align:right;padding: 5px 0px"><strong>1,550,000₫</strong></td>
                                        </tr>

                                        </tbody></table>





                                </td><td valign="top" style="padding: 0px 20px">
                                    <h3 style="font-size: 14px;line-height: 0">Thông tin đơn hàng</h3>
                                    <hr style="border: none; border-top: 2px solid #0975BD;">

                                    <div style="margin: 0 0 1em 0; padding: 1em; border: 1px solid #d9d9d9;">

                                        <strong>Mã đơn hàng:</strong><br>#100004<br>
                                        <strong>Ngày đặt hàng:</strong><br>03/01/2017<br>
                                        <strong>Phương thức thanh toán</strong><br>Thanh toán khi giao hàng (COD)
                                        <br>
                                        <strong>Phương thức vận chuyển</strong><br>
                                    </div>

                                    <h3 style="font-size: 14px;line-height: 0">Thông tin mua hàng</h3>
                                    <hr style="border: none; border-top: 2px solid #0975BD;">

                                    <div style="margin: 0 0 1em 0; padding: 1em; border: 1px solid #d9d9d9;  white-space: normal;">
                                        <strong>Duy Le</strong><br>


                                        233/5b vo thi sau, , Quận 10   , Hồ Chí Minh ,  Vietnam<br>


                                        Điện thoại: 0919555909<br>

                                        Email: -
                                    </div>



                                </td></tr></tbody></table><br><p>Nếu bạn có thắc mắc, vui lòng liên hệ chúng tôi qua email <u>duyle.skinna@gmail.com </u> hoặc 0909055578 </p></div></div>
            </div>
        </div>
        <!-- /ko -->
        <!-- ko if:ShowType() === 'Reorder' --><!-- /ko -->


    </div>

    <!-- end .inner -->
</div>

