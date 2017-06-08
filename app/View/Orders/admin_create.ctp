<script>

    function openSearchProduct() {
        $("#productSearch").addClass('active');
    }

    function closeSearchProduct() {
        $("#productSearch").attr('class', 'panel panel-default');
    }

    function openSearchCustomer() {
        $("#searchCustomer").addClass('active');
    }

    function closeSearchCustomer() {
        $("#searchCustomer").attr('class', 'panel panel-default');
    }

    var products = [];
    var sum = 0;
    var shipFee = 0;
    var totalSum = 0;
    var customer = 0;
    function addProduct(id,brand,name,price,image,weight) {


        var product = Object();
        product.id = id;
        product.brand = brand;
        product.name = name;
        product.quanlity = 1;
        product.price = price;
        product.image = image;
        product.weight = weight;
        products.push(product);
        updateView();
    }

    function submit(flag) {
        if(customer != 0 && products.length > 0) {


            var data = JSON.stringify(products);

            $('#done').attr("disabled", true);
            $('#notdone').attr("disabled", true);
            $('#draff').attr("disabled", true);
            $.post('<?php echo 'http://' . $_SERVER['HTTP_HOST']?><?php echo Configure::read('Settings.DOMAIN');?>/admin/orders/submit',
                {
                    orderitem: data,
                    customerid: customer,
                    subtotal: sum,
                    shipping: shipFee,
                    total: totalSum,
                    status: flag,
                    note : $('#note').val()
                }, function (result) {
                    window.location.href = '<?php echo Configure::read('Settings.DOMAIN');?>/admin/orders/index';
                });
        } else {
            alert('Hãy nhập khách hàng và sản phẩm');
        }
    }
    
    function updateView() {
        $("#tableProduct").html('');
        sum = 0;
        for(var i = 0; i < products.length; i++){
            var html = '<tr>'+
                '<td class="width-60-px min-width-60-px">'+
                '<div class="wrap-img"><img class="thumb-image" '
                +'src="<?php echo Configure::read('Settings.DOMAIN');?>/images/small/'+products[i].image+'" '
                +'title="image"> '
                +'</div>'
                +'</td>'
                +'<td class="pl5 p-r5 min-width-200-px">'
                +'<a class="text-underline hover-underline pre-line" target="_blank" '
                +'href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/products/view/'+products[i].id+'">'+products[i].brand+'</a>'
                +'<p data-bind="text:VariantTitle">'+products[i].name+'</p>'
                +'</td>'
                +'<td class="pl5 p-r5 width-100-px min-width-100-px text-center">'
                +'<div class="dropup dropdown-priceOrderNew">'
                +'<div class="inline_block dropdown">'
                +'<a class="wordwrap hide-print"'
                +' data-bind="textMoneyWithSymbol :PriceDiscount,click:$parent.OpenPopupDiscountItem"><input class="form-control p-none-r" type="number" min="1"  onchange="changePrice(this,'+i+')" value="'+products[i].price+'">'
                +'</td> </a> </div> </div></td>'
                +'<td class="pl5 p-r5 width-20-px min-width-20-px text-center">₫</td>'
                +'<td class="pl5 p-r5 width-20-px min-width-20-px text-center"> x</td>'
                +'<td class="pl5 p-r5 width-100-px min-width-100-px"><input class="form-control p-none-r" type="number" min="1" onchange="changeQuanlity(this,'+i+')" value="'+products[i].quanlity+'"><td class="pl5 p-r5 width-100-px min-width-100-px text-center" data-bind="textMoneyWithSymbol:TotalPriceDisplay">'+products[i].price * products[i].quanlity+' ₫ </td>'
                +'<td class="pl5 p-r5 text-right width-20-px min-width-20-px"><a onclick="deleteProduct('+i+')"><i class="fa fa-times color-stateGray"></i></a>'
                +'</td></tr>';
            sum = sum + products[i].price * products[i].quanlity;
            $( "#tableProduct" ).append(html);
        }
        $('#sumProduct').html(sum);
        shipFee =  parseInt($('#shipFee').val());
        totalSum = sum + shipFee;
        $('#totalSumProduct').html(totalSum);

    }
    function deleteProduct(index) {
        products.splice(index, 1);
        updateView();
    }
    function changeQuanlity(ele,index) {
        products[index].quanlity = ele.value;
        updateView();
    }

    function changePrice(ele,index) {
        products[index].price = ele.value;
        updateView();
    }

    function changeCustomer(id,name,phone,address) {
        customer = id;
        $('#customerInfo').attr('class', 'panel-body');
        $('#customerName').html(name);
        $('#customerPhone').html(phone);
        $('#customerAddress').html(address);
        $('#customerDetail').attr('href', '<?php echo Configure::read('Settings.DOMAIN');?>/admin/customers/view/'+id);
    }
    function addShipFee(ele) {

        updateView();
    }


    function filterCustomer(key) {
        $('.customeritem').each(function(i, obj) {
            var temp = $(obj).attr('id');
            if(temp.indexOf(key) > -1){
                $(obj).css('display','block');
            } else {
                $(obj).css('display','none');
            }
        });
    }

</script>
<div class="inner" id="viewareaid" style="margin-top: 150px">


    <!-- ko if:ShowType() === 'List'--><!-- /ko -->
    <!-- ko if:ShowType() === 'New'-->
    <div data-bind="template: { name: '_DraftOrderNewTmpl', data: mvadd }">
        <div class="pageheader two-actions-header-mobile">
            <div class="col-xs-12">
                <div class="breadcrumb-new">
                    <svg class="svg-next-icon svg-next-icon-size-20 svg-next-icon-header hidden-xs">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-orders"></use>
                    </svg>
                    <span><a class="back-list hidden-xs" data-bind="attr: { href: DraftOrderListLink }"
                             href="/admin/order/draft_orders#/list">Đơn hàng nháp</a></span>
                    <span class="border-row hidden-xs">/ </span>
                    <span class="active">Tạo mới</span>
                </div>
                <div class="header__primary-actions">
                    <a class="btn btn-primary" id="draff" onclick="submit(3)">Lưu nháp</a>
                </div>
                <div class="header__secondary-actions">
                    <a class="btn btn-default" data-bind="attr: { href: DraftOrderListLink }"
                       href="/admin/order/draft_orders#/list">Hủy</a>
                </div>
            </div>
        </div>
        <div class="one-row-actions">
            <div class="max-width-1200">
                <div class="flexbox-grid no-pd-none">
                    <div class="flexbox-content">
                        <div class="wrapper-content">
                            <div class="pd-all-20">
                                <label class="title-product-main text-no-bold">Chi tiết đơn hàng</label>
                            </div>
                            <div class="pd-all-10-20 border-top-title-main">
                                <div class="clearfix">

                                    <div class="table-wrapper p-none mb20">
                                        <table class="table-normal">
                                            <tbody id="tableProduct" data-bind="foreach:ProductList">



                                            </tbody>
                                </table>
                            </div>

                            <div class="box-search-advance product" data-bind="css:ObjectType()">
                                <div>
                                    <input type="text" class="form-control textbox-advancesearch"
                                           onclick="openSearchProduct()" onblur="closeSearchProduct()"
                                           placeholder="Tìm hoặc tạo mới 1 sản phẩm">
                                </div>
                                <div id="productSearch" class="panel panel-default">
                                    <div class="panel-body">
                                        <!--ko if: ObjectType() == 'product'-->
                                        <!--ko if : IsShowCreateObject() || IsShowCreateObject() == true-->
                                        <div class="box-search-advance-head"
                                             data-bind="click: function(data, event){ShowCustomLineModal(data,event);}">
                                            <img width="30"
                                                 src="//hstatic.net/0/0/global/design/imgs/next-create-custom-line-item.svg">
                                            <a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/products/add">
                                            <span class="ml10"
                                                  data-bind="text:CustomFieldName">Tạo mới 1 sản phẩm tùy ý</span></a>
                                        </div>
                                        <!--/ko-->
                                        <div class="list-search-data">
                                            <ul class="clearfix" data-bind="foreach:Data">
                                                <?php foreach ($products as $key => $value) { ?>

                                                    <li class="row ">
                                                        <!-- ko if:  ImageUrlDisplay() -->

                                                        <!-- /ko -->
                                                        <!-- ko if: !ImageUrlDisplay() --><!-- /ko -->
                                                        <label class="inline_block ml10"
                                                               data-bind="text:Value"><?php echo $value['brand_name']; ?></label>
                                                        <div class="clear"></div>
                                                        <ul data-bind="foreach: Model">
                                                            <?php foreach ($value['data'] as $key => $value1) { ?>
                                                                <li class="clearfix product-variant" onclick="addProduct(<?php echo $value1['Product']['id'];?>,'<?php echo $value['brand_name'];?>','<?php echo $value1['Product']['name'];?>',<?php echo $value1['Product']['price'];?>,'<?php echo $value1['Product']['image'];?>',<?php echo $value1['Product']['weight'];?>)"
                                                                    data-bind="click: function(data, event){$parents[1].SelectedItem(data,event);}">

                                                                    <a class="color_green pull-left" style="margin-right: 5px">
                                                                        <div class="wrap-img"><img class="thumb-image" src="<?php echo Configure::read('Settings.DOMAIN');?>/images/small/<?php echo $value1['Product']['image']; ?>" title="image"> </div>
                                                                    </a>
                                                                    <a class="color_green pull-left">

                                                                        <span
                                                                            data-b    "text: VariantTitle"><?php echo $value1['Product']['name']; ?></span>
                                                                    </a>
                                                                    <div class="pull-right">
                                                                        <!-- ko if: IsTrackingInventory() == true -->
                                                                        <!--/ko-->
                                                                        <span
                                                                            data-bind="textMoneyWithSymbol: Price"><?php echo $value1['Product']['price']; ?>
                                                                            ₫</span>
                                                                    </div>
                                                                </li>
                                                            <?php } ?>

                                                        </ul>
                                                    </li>
                                                <?php } ?>

                                            </ul>
                                            </li>
                                            </ul>
                                            <div class="search-loading hidden">Đang tìm kiếm..</div>
                                        </div>
                                        <div class="list-search-data">
                                            <ul class="clearfix" data-bind="foreach:Data"></ul>
                                            <div class="search-loading hidden">Đang tìm kiếm..</div>
                                        </div>
                                        <!--/ko-->
                                        <!--ko if: ObjectType() == 'customer'--><!--/ko-->
                                        <!--ko if: ObjectType() == 'supplier'--><!--/ko-->
                                    </div>

                                    <div class="panel-footer">
                                        <div class="btn-group pull-right"
                                             data-bind="template: { name: 'ExOptionTmplPagingTmpl', data: $data}">
                                            <!-- ko with: Page -->
                                            <button
                                                data-bind="click: function() { UserChangePage(CurrentPage() - 1); }, attr: { 'class': TotalItemCount() > 0 &amp;&amp; CurrentPage() != 1 ? 'btn btn-default' : 'btn btn-default disable'}"
                                                type="button" class="btn btn-default disable"><i
                                                    class="fa fa-chevron-left"></i></button>
                                            <button
                                                data-bind="click: function() { UserChangePage(CurrentPage() + 1); }, attr: { 'class': TotalItemCount() > 0 &amp;&amp; CurrentPage() != LastPage() ? 'btn btn-default' : 'btn btn-default disable'}"
                                                type="button" class="btn btn-default disable"><i
                                                    class="fa fa-chevron-right"></i></button>
                                            <!-- /ko -->
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>

                            </div>

                            <div class="modal addcustomitem fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Đóng popup"><span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Thêm sản phẩm tùy ý</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row form-group">
                                                <div class="col-sm-6">
                                                    <label>Tên</label>
                                                    <input type="text" class="form-control"
                                                           data-bind="value:ProductName">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>Giá</label>
                                                    <input type="text" class="form-control"
                                                           data-bind="moneyMaskWithSymbol:Price">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>Số lượng</label>
                                                    <input type="number" min="1" class="form-control"
                                                           data-bind="value:Quantity">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group inline">
                                                    <label>
                                                        <input type="checkbox" class="hrv-checkbox"
                                                               data-bind="checked: ischecked,value:value,enable:enable, attr: { name: name, id: id }"
                                                               value="" name="">
                                                        Có giao hàng</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer" style="position: relative;">
                                            <button type="button" class="btn btn-default" data-toggle="modal"
                                                    data-dismiss="modal">Hủy
                                            </button>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-dismiss="modal" data-bind="click:AddCustomProduct">Lưu
                                            </button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
                    </div>
                    <div class="pd-all-10-20 p-none-t">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    <textarea class="form-control textarea-auto-height" rows="2"
                                              placeholder="Ghi chú đơn hàng" id="note"></textarea>
                                </div>
                                <div class="form-group">
<!--                                    <a class="mb10 inline_block" role="button" data-toggle="collapse"-->
<!--                                       href="#add-more-properties" aria-expanded="false"-->
<!--                                       aria-controls="add-more-properties">-->
<!--                                        <i class="fa fa-plus-circle"></i> Thuộc tính-->
<!--                                    </a>-->
                                    <div class="collapse" id="add-more-properties">
                                        <div class="row clearfix">
                                            <div class="col-xs-12">
                                                <div class="form-group mb0" data-bind="foreach:Attributes"></div>
                                                <button type="button" data-toggle="tooltip" data-placement="top"
                                                        title="" data-original-title="Thêm thuộc tính"
                                                        class="btn btn-default" data-bind="click:AddAttribute">Thêm
                                                    thuộc tính
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <table class="text-right ">
                                    <tbody>
                                    <tr>
                                        <td class="color-stateGray p-xs">Tổng giá trị sản phẩm</td>
                                        <td id="sumProduct">0</td>
                                        <td> ₫</td>
                                    </tr>

                                    <tr>
                                        <!--ko if : OrderShippingFee() > 0 || ShippingMethodName()--><!--/ko-->
                                        <!--ko if : !ShippingMethodName()-->
                                        <td>
                                            <a data-bind="click:OpenShippingPopup" class="hover-underline"><i
                                                    class="fa fa-plus-circle"></i> Thêm phí vận chuyển</a>
                                        </td>
                                        <td class="p-xs">

                                            <input class="form-control p-none-r" type="number" id="shipFee" min="1" onchange="addShipFee(this)" value="0">
                                        </td>
                                        <!--/ko-->

                                    </tr>
                                    <tr class="bold-light">
                                        <td  class="p-xs">Số tiền phải thanh toán</td>
                                        <td id="totalSumProduct">0 </td>
                                        <td> ₫</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="pd-all-10-20 border-top-color">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-12 col-lg-6 mb10">
                                <i class="fa fa-credit-card fa-1-5 color-blue mt5"></i>
                                <span class="text-upper p-sm">Xác nhận thanh toán và tạo đơn hàng</span>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-12 col-lg-6 text-right">
                                <button class="btn btn-primary ml15"
                                        data-bind="enable :IsPaid" id="done" onclick="submit(1)">Đã thanh toán
                                </button>
                                <button class="btn btn-primary ml15" id="notdone" data-toggle="modal" onclick="submit(2)"
                                        >Thanh toán sau
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flexbox-content flexbox-right">
                <div class="panel panel-default wrapper-content">
                    <div class="panel-body pd-all-20">
                        <label class="title-product-main text-no-bold block-display mb15">Thông tin khách hàng</label>
                        <div class="findcustomer">


                            <div class="box-search-advance customer" data-bind="css:ObjectType()">
                                <div>
                                    <input type="text" onkeyup="filterCustomer(this.value)" class="form-control textbox-advancesearch"
                                          onclick="openSearchCustomer()" onblur="closeSearchCustomer()"
                                           placeholder="Tìm hoặc tạo khách hàng mới">
                                </div>

                                <div id="searchCustomer" class="panel panel-default ">
                                    <div class="panel-body">
                                        <a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/customers/add">
                                        <div class="box-search-advance-head"

                                             data-bind="click: function(data, event){ShowCustomLineModal(data,event);}">

                                            <img width="30"
                                                 src="//hstatic.net/0/0/global/design/imgs/next-create-customer.svg">
                                            <span class="ml10">Tạo mới khách hàng</span>
                                        </div>
                                        </a>
                                        <div class="list-search-data">
                                            <ul data-bind="foreach: Data">

                                                <?php foreach ($customers as $key => $value) { ?>
                                                <li class="row customeritem" id ="<?php echo strtolower($value['Customer']['name']).$value['Customer']['phone'];?>"
                                                    onclick="changeCustomer(<?php echo $value['Customer']['id'];?>,'<?php echo $value['Customer']['name'];?>','<?php echo $value['Customer']['phone'];?>','<?php echo $value['Customer']['address'];?>')">
                                                    <!-- ko if:  Thumbnail() -->
                                                    <div class="wrap-img inline_block vertical-align-t radius-cycle ">
                                                        <img class="thumb-image radius-cycle"
                                                             data-bind="attr: { src: Thumbnail, title: Value }"
                                                             src="https://secure.gravatar.com/avatar/2efd8534a82578a162535ce9abd0224c.jpg?s=40&amp;d=https%3A%2F%2Fsecure.gravatar.com%2Favatar%2F18f9f20ec1a7be8020924ce0048b6ef2.jpg%3Fs%3D40"
                                                             title="189460628183005@facebook.com"></div>

                                                    <div class="inline_block ml10">
                                                        <a class="block-display" style="line-height:16px">
                                                            <span data-bind="text: FullName"><?php echo $value['Customer']['name'];?></span>
                                                        </a>
                                                        <a>

                                                            <a data-bind="attr: { href: href }">
                                                                <span data-bind="text: email"><?php echo $value['Customer']['phone'];?></span>
                                                            </a>

                                                        </a>
                                                    </div>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                            <div class="search-loading hidden">Đang tìm kiếm..</div>
                                        </div>
                                        <!--/ko-->
                                        <!--ko if: ObjectType() == 'supplier'--><!--/ko-->
                                    </div>

                                    <div class="panel-footer">
                                        <div class="btn-group pull-right"
                                             data-bind="template: { name: 'ExOptionTmplPagingTmpl', data: $data}">
                                            <!-- ko with: Page -->
                                            <button
                                                data-bind="click: function() { UserChangePage(CurrentPage() - 1); }, attr: { 'class': TotalItemCount() > 0 &amp;&amp; CurrentPage() != 1 ? 'btn btn-default' : 'btn btn-default disable'}"
                                                type="button" class="btn btn-default disable"><i
                                                    class="fa fa-chevron-left"></i></button>
                                            <button
                                                data-bind="click: function() { UserChangePage(CurrentPage() + 1); }, attr: { 'class': TotalItemCount() > 0 &amp;&amp; CurrentPage() != LastPage() ? 'btn btn-default' : 'btn btn-default disable'}"
                                                type="button" class="btn btn-default disable"><i
                                                    class="fa fa-chevron-right"></i></button>
                                            <!-- /ko -->
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div id="customerInfo" class="panel-body hidden">
                            <div class="wrap-img inline_block vertical-align-t radius-cycle ">
                                <img class="thumb-image radius-cycle"
                                     data-bind="attr: { src: Thumbnail, title: Value }"
                                     src="https://secure.gravatar.com/avatar/2efd8534a82578a162535ce9abd0224c.jpg?s=40&amp;d=https%3A%2F%2Fsecure.gravatar.com%2Favatar%2F18f9f20ec1a7be8020924ce0048b6ef2.jpg%3Fs%3D40"
                                     ></div>
                            <ul>
                                <li>
                                    <span id="customerName" class="pre-line">Duy Le</span>
                                </li>
                                <li>
                                    <i class="fa fa-check-square-o"></i>
                                    <span id="customerAddress">Vietnam</span>
                                </li>
                                <li>
                                    <span><a title="Click để gọi"><i class="fa fa-phone-square cursor-pointer mr10"></i></a></span>
                                    <span id="customerPhone">0919555909</span>
                                </li>

                                <li class="overflow-ellipsis mt10 p-r15 ps-relative">
                                    <i class="glyphicon glyphicon-envelope color-gray-icons mr10"></i>

                                    <a data-bind="attr: { href: href }">
                                        <span data-bind="text: email">-</span>
                                    </a>

                                    <a class="hide-print ps-absolute-default" href="#" data-bind="click:openEditEmail">
                                        <span data-placement="left" title="Chỉnh sửa email" data-toggle="tooltip"><i class="fa fa-pencil-square-o color_gray "></i> </span>
                                    </a>
                                </li>
                                <li class="hide-print normal-line">
                                    <i class="glyphicon glyphicon-user color-gray-icons mr10 hide-print"></i>
                                    <a data-bind="attr: { href: Order().LinkCustomerDetail}" class="hide-print text-underline hover-tooltip hover-underline color-dark-link" id="customerDetail" href="">Xem thông tin khách hàng</a>
                                </li>

                            </ul>
                        </div>
                        <div class="modal searchcustomer fade">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" data-toggle="modal"
                                                data-target=".model-add-customer" aria-label="Đóng popup"><span
                                                aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Thêm khách hàng mới</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row form-group">
                                            <div class="col-sm-6">
                                                <label>Tên</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="col-sm-3">
                                                <label>Giá</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="col-sm-3">
                                                <label>Số lượng</label>
                                                <input type="number" min="1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><input type="checkbox"> Checkbox 1</label>
                                        </div>
                                        <div class="form-group">
                                            <label><input type="checkbox"> Checkbox 1</label>
                                        </div>
                                        <div class="box-comment top0">
                                            with weight specified to calculate shipping rates accurately
                                        </div>
                                    </div>
                                    <div class="modal-footer" style="position: relative;">
                                        <button type="button" class="btn btn-default" data-toggle="modal"
                                                data-dismiss="modal">Hủy
                                        </button>
                                        <button type="button" class="btn btn-default">Lưu</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ko-->
                </div>
                <div class="panel panel-default wrapper-content">
                    <div class="panel-body pd-all-20 zindex-default-i">
                        <label class="title-product-main text-no-bold block-display mb15">Kênh bán hàng</label>
                        <div class="form-group ws-nm">
                            <select class="form-control pl10"
                                    data-bind="options: OrderSources, optionsText: 'Value', optionsValue: 'Key', value: SelectedSource">
                                <option value="web">web</option>
                                <option value="pos">pos</option>
                                <option value="fb">fb</option>
                                <option value="haravan_draft_order">draft</option>
                                <option value="zalo">zalo</option>
                                <option value="phone">phone</option>
                                <option value="staff">staff</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal add-discounts-line-item fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog width-400-px">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Thêm khuyến mãi</h4>
            </div>
            <div class="modal-body next-form-section">
                <div class="next-form-grid">
                    <div class="next-form-grid-cell">
                        <label class="text-title-field">Đặt giá bán mới cho sản phẩm này</label>
                        <div class="flexbox-grid-default p-none">
                            <div
                                class="flexbox-auto-20 flexbox-grid-default flexbox-alignItems-center flexbox-justifyContent-center p-none">

                                <!-- ko if: (value == undefined || value == null) && (checkedValue != undefined && checkedValue != null) -->
                                <!-- /ko -->
                                <!-- ko ifnot: (value == undefined || value == null) && (checkedValue != undefined && checkedValue != null) -->
                                <input type="radio" class=" hrv-radio"
                                       data-bind="checked: ischecked, value: value, attr: { name: name, id: id, class: (attrClass + ' hrv-radio') }"
                                       value="ForceDiscountAmount" name="rdChooseDiscount" id="">
                                <!-- /ko -->

                            </div>
                            <div class="flexbox-content p-none-b pl10">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <button class="btn active btn-default btn-active"
                                                data-bind="text:CommonUtils.getCurrentCurrencySymbol()">₫
                                        </button>
                                    </div>
                                    <div class="input-group">
                                        <input
                                            class="form-control border-none-radius border-none-r width-input-discount"
                                            data-bind="moneyMask:ExactPrice, valueUpdate: 'afterkeydown',enable:IsEnableForceDiscount"
                                            disabled="">
                                        <span class="input-group-addon input-text-currency"
                                              data-bind="text:CommonUtils.getCurrentCurrencySymbol()">₫</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="next-form-grid">
                    <div class="next-form-grid-cell">
                        <label class="text-title-field">Tương ứng giảm giá</label>
                        <div class="flexbox-grid-default p-none">
                            <div
                                class="flexbox-auto-20 flexbox-grid-default flexbox-alignItems-center flexbox-justifyContent-center p-none">

                                <!-- ko if: (value == undefined || value == null) && (checkedValue != undefined && checkedValue != null) -->
                                <!-- /ko -->
                                <!-- ko ifnot: (value == undefined || value == null) && (checkedValue != undefined && checkedValue != null) -->
                                <input type="radio" class=" hrv-radio"
                                       data-bind="checked: ischecked, value: value, attr: { name: name, id: id, class: (attrClass + ' hrv-radio') }"
                                       value="SetDiscountAmountNormal" name="rdChooseDiscount" id="">
                                <!-- /ko -->

                            </div>
                            <div class="flexbox-content p-none-b pl10">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <!--ko if :IsAmountItem() == true-->
                                        <button value="fixed_amount" class="btn active btn-default btn-active"
                                                data-bind="click:ChangeDiscountTypeItem,text:CommonUtils.getCurrentCurrencySymbol(),enable:IsEnableSetDiscountNormal"
                                                disabled="">₫
                                        </button>
                                        <button value="percentage" class="btn ac btn-default btn-active"
                                                data-bind="click:ChangeDiscountTypeItem,enable:IsEnableSetDiscountNormal"
                                                disabled="">
                                            %
                                        </button>
                                        <!--/ko-->
                                        <!--ko if :IsPercentageItem() == true--><!--/ko-->
                                    </div>
                                    <!--ko if :IsAmountItem() == true-->
                                    <div class="input-group">
                                        <input
                                            class="form-control border-none-radius border-none-r width-input-discount"
                                            data-bind="moneyMask:DiscountAmountItem, valueUpdate: 'afterkeydown',enable:IsEnableSetDiscountNormal"
                                            disabled="">
                                        <span class="input-group-addon input-text-currency"
                                              data-bind="text:CommonUtils.getCurrentCurrencySymbol()">₫</span>
                                    </div>
                                    <!--/ko--><!--ko if :IsPercentageItem() == true--><!--/ko-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="next-form-grid">
                    <div class="next-form-grid-cell">
                        <label class="text-title-field">Lý do</label>
                        <input placeholder="Giảm giá sản phẩm, khách hàng thân thiết" class="form-control"
                               data-bind="value:DiscountDescriptionItem">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-left">
                    <!--ko if : IsShowRemoveDiscountItemButton() == false -->
                    <a class="btn btn btn-default" data-toggle="modal" data-dismiss="modal">Đóng</a>
                    <!--/ko-->
                    <!--ko if : IsShowRemoveDiscountItemButton() == true --><!--/ko-->
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-primary" data-bind="click:AddDiscountItem">Thêm khuyến mãi
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal add-discounts fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog width-400-px">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Thêm khuyến mãi</h4>
            </div>
            <div class="modal-body next-form-section">
                <div class="next-form-grid">
                    <div class="next-form-grid-cell">
                        <label class="text-title-field">Giảm giá đơn hàng này theo </label>
                        <div class="input-group width100">
                            <div class="input-group-btn">
                                <!--ko if :IsAmount() == true-->
                                <button value="fixed_amount" class="btn active btn-default btn-active"
                                        data-bind="click:ChangeDiscountType,text:CommonUtils.getCurrentCurrencySymbol()">
                                    ₫
                                </button>
                                <button value="percentage" class="btn ac btn-default btn-active"
                                        data-bind="click:ChangeDiscountType">
                                    %
                                </button>
                                <!--/ko-->
                                <!--ko if :IsPercentage() == true--><!--/ko-->
                            </div>
                            <!--ko if :IsAmount() == true-->
                            <div class="input-group width100">
                                <input class="form-control border-none-radius border-none-r width-input-discount"
                                       data-bind="moneyMask:DiscountAmount">
                                <span class="input-group-addon input-text-currency"
                                      data-bind="text:CommonUtils.getCurrentCurrencySymbol()">₫</span>
                            </div>
                            <!--/ko--><!--ko if :IsPercentage() == true--><!--/ko-->
                        </div>
                    </div>
                </div>
                <div class="next-form-grid">
                    <div class="next-form-grid-cell">
                        <label class="text-title-field">Hoặc mã giảm giá</label>
                        <div class="input-group width100">
                            <!--ko if : IsShowRemoveCouponCode() == true--><!--/ko-->
                            <!--ko if : IsShowRemoveCouponCode() == false-->
                            <input class="form-control" data-bind="value:CouponCode">
                            <!--/ko-->
                        </div>
                    </div>
                </div>
                <div class="next-form-grid">
                    <div class="next-form-grid-cell">
                        <label class="text-title-field">Lý do</label>
                        <input placeholder="Giảm giá sản phẩm, khách hàng thân thiết" class="form-control"
                               data-bind="value:DiscountCode">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-left">
                    <a class="btn btn btn-default" data-toggle="modal" data-dismiss="modal">Đóng</a>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-primary" data-bind="click:AddDiscount">Thêm khuyến mãi</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal edit-email fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog rps-modal-width-400px">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Cập nhật email</h4>
            </div>
            <div class="modal-body next-form-section">
                <div class="next-form-grid">
                    <div class="next-form-grid-cell">
                        <label class="text-title-field">Email thông báo sẽ được gởi đến địa chỉ này</label>
                        <div class="input-group">
                            <span class="input-group-addon border-color-input-group">Email</span>
                            <input class="form-control" data-bind="value:CurrentEmail">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-left">
                    <a class="btn btn btn-default" data-toggle="modal" data-dismiss="modal">Đóng</a>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-dismiss="modal"
                            data-bind="click:EditEmail">Cập nhật
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modalUpdateShippingAddress" class="modal fade model-edit-address" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Cập nhật địa chỉ</h4>
                </div>
                <div class="modal-body next-form-section">
                    <div class="next-form-grid">
                        <div class="next-form-grid-cell">
                            <!--ko if : Addresses().length > 0-->
                            <div class="form-group dropdown btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    Chọn địa chỉ giao hàng <span class="caret"></span></button>
                                <div class="dropdown-menu animate-scale-dropdown" role="menu"
                                     aria-labelledby="dropdownfilter">
                                    <ul data-bind="foreach: Addresses">
                                        <li class="p-l10 p-xs cursor-pointer text-hover-field"
                                            data-bind="click:$parent.ChooseAddress">
                                            <div data-bind="text:FullName">Duy Le</div>
                                            <div data-bind="text:Phone">0919555909</div>
                                            <div data-bind="text:Address1">233/5b vo thi sau,</div>
                                            <div data-bind="text:DistrictName">Quận 10</div>
                                            <div data-bind="text:ProvinceName">Hồ Chí Minh</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--/ko-->
                        </div>
                    </div>
                    <div class="next-form-grid">
                        <div class="next-form-grid-cell">
                            <label class="text-title-field">Họ</label>
                            <input type="text" class="form-control" data-bind="value:CurrentCustomerAddress().LastName">
                        </div>
                        <div class="next-form-grid-cell">
                            <label class="text-title-field">Tên</label>
                            <input type="text" class="form-control"
                                   data-bind="value:CurrentCustomerAddress().FirstName">
                        </div>
                    </div>
                    <div class="next-form-grid">
                        <div class="next-form-grid-cell">
                            <label class="text-title-field">Số điện thoại</label>
                            <input type="text" class="form-control" data-bind="value:CurrentCustomerAddress().Phone">
                        </div>
                        <div class="next-form-grid-cell">
                            <label class="text-title-field">Địa chỉ</label>
                            <input type="text" class="form-control" data-bind="value:CurrentCustomerAddress().Address1">
                        </div>
                    </div>
                    <div class="next-form-grid">
                        <div class="next-form-grid-cell">
                            <label class="text-title-field">Tỉnh/Thành phố</label>
                            <select class="form-control"
                                    data-bind="options: Provinces, optionsText: 'Name', optionsValue: 'Id', optionsCaption: 'Chọn tỉnh/thành', value: ProvinceSelectedValue,valueAllowUnset:true">
                                <option value="">Chọn tỉnh/thành</option>
                                <option value="50">Hồ Chí Minh</option>
                                <option value="1">Hà Nội</option>
                                <option value="32">Đà Nẵng</option>
                                <option value="57">An Giang</option>
                                <option value="49">Bà Rịa - Vũng Tàu</option>
                                <option value="47">Bình Dương</option>
                                <option value="45">Bình Phước</option>
                                <option value="39">Bình Thuận</option>
                                <option value="35">Bình Định</option>
                                <option value="62">Bạc Liêu</option>
                                <option value="15">Bắc Giang</option>
                                <option value="4">Bắc Kạn</option>
                                <option value="18">Bắc Ninh</option>
                                <option value="53">Bến Tre</option>
                                <option value="3">Cao Bằng</option>
                                <option value="63">Cà Mau</option>
                                <option value="59">Cần Thơ</option>
                                <option value="41">Gia Lai</option>
                                <option value="2">Hà Giang</option>
                                <option value="23">Hà Nam</option>
                                <option value="28">Hà Tĩnh</option>
                                <option value="11">Hòa Bình</option>
                                <option value="21">Hưng Yên</option>
                                <option value="19">Hải Dương</option>
                                <option value="20">Hải Phòng</option>
                                <option value="60">Hậu Giang</option>
                                <option value="37">Khánh Hòa</option>
                                <option value="58">Kiên Giang</option>
                                <option value="40">Kon Tum</option>
                                <option value="8">Lai Châu</option>
                                <option value="51">Long An</option>
                                <option value="6">Lào Cai</option>
                                <option value="44">Lâm Đồng</option>
                                <option value="13">Lạng Sơn</option>
                                <option value="24">Nam Định</option>
                                <option value="27">Nghệ An</option>
                                <option value="25">Ninh Bình</option>
                                <option value="38">Ninh Thuận</option>
                                <option value="16">Phú Thọ</option>
                                <option value="36">Phú Yên</option>
                                <option value="29">Quảng Bình</option>
                                <option value="33">Quảng Nam</option>
                                <option value="34">Quảng Ngãi</option>
                                <option value="14">Quảng Ninh</option>
                                <option value="30">Quảng Trị</option>
                                <option value="61">Sóc Trăng</option>
                                <option value="9">Sơn La</option>
                                <option value="26">Thanh Hóa</option>
                                <option value="22">Thái Bình</option>
                                <option value="12">Thái Nguyên</option>
                                <option value="31">Thừa Thiên Huế</option>
                                <option value="52">Tiền Giang</option>
                                <option value="54">Trà Vinh</option>
                                <option value="5">Tuyên Quang</option>
                                <option value="46">Tây Ninh</option>
                                <option value="55">Vĩnh Long</option>
                                <option value="17">Vĩnh Phúc</option>
                                <option value="10">Yên Bái</option>
                                <option value="7">Điện Biên</option>
                                <option value="42">Đắk Lắk</option>
                                <option value="43">Đắk Nông</option>
                                <option value="48">Đồng Nai</option>
                                <option value="56">Đồng Tháp</option>
                            </select>
                        </div>
                        <div class="next-form-grid-cell">
                            <label class="text-title-field">Quận/Huyện</label>
                            <select class="form-control"
                                    data-bind="options: Districts, optionsText: 'DistrictName', optionsValue: 'Id', optionsCaption: 'Chọn quận/huyện', value: DistrictSelectedValue,valueAllowUnset:true">
                                <option value="">Chọn quận/huyện</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-dismiss="modal"
                            data-bind="click:UpdateShippingAddress">Lưu
                    </button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div id="model-add-customer" class="modal fade model-add-customer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Tạo khách hàng mới</h4>
                </div>
                <div class="modal-body next-form-section">
                    <div class="next-form-grid">
                        <div class="next-form-grid-cell">
                            <label class="text-title-field">Họ</label>
                            <input type="text" class="form-control" data-bind="value:NewFirstName">
                        </div>
                        <div class="next-form-grid-cell">
                            <label class="text-title-field">Tên</label>
                            <input type="text" class="form-control" data-bind="value:NewLastName">
                        </div>
                    </div>
                    <div class="next-form-grid">
                        <div class="next-form-grid-cell">
                            <label class="text-title-field">Email</label>
                            <input type="text" class="form-control" data-bind="value:NewEmail">
                        </div>
                    </div>
                    <div class="next-form-grid">
                        <div class="next-form-grid-cell">
                            <label class="text-title-field label-checkbox">
                                <input type="checkbox" class="hrv-checkbox"
                                       data-bind="checked: ischecked,value:value,enable:enable, attr: { name: name, id: id }"
                                       value="" name="">
                                Nhận email quảng cáo</label>
                        </div>
                    </div>
                    <div class="next-form-devide-hr"></div>
                    <div class="next-form-grid">
                        <div class="next-form-grid-cell">
                            <label class="text-title-field">Số điện thoại</label>
                            <input type="text" class="form-control" data-bind="value:NewPhone">
                        </div>
                        <div class="next-form-grid-cell">
                            <label class="text-title-field">Địa chỉ</label>
                            <input type="text" class="form-control" data-bind="value:NewAddress">
                        </div>
                    </div>
                    <div class="next-form-grid">
                        <div class="next-form-grid-cell">
                            <label class="text-title-field">Tỉnh/Thành phố</label>
                            <select class="form-control"
                                    data-bind="options: Provinces, optionsText: 'Name', optionsValue: 'Id', optionsCaption: 'Chọn tỉnh/thành phố', value: NewProvinceSelectedValue,valueAllowUnset:true">
                                <option value="">Chọn tỉnh/thành phố</option>
                                <option value="50">Hồ Chí Minh</option>
                                <option value="1">Hà Nội</option>
                                <option value="32">Đà Nẵng</option>
                                <option value="57">An Giang</option>
                                <option value="49">Bà Rịa - Vũng Tàu</option>
                                <option value="47">Bình Dương</option>
                                <option value="45">Bình Phước</option>
                                <option value="39">Bình Thuận</option>
                                <option value="35">Bình Định</option>
                                <option value="62">Bạc Liêu</option>
                                <option value="15">Bắc Giang</option>
                                <option value="4">Bắc Kạn</option>
                                <option value="18">Bắc Ninh</option>
                                <option value="53">Bến Tre</option>
                                <option value="3">Cao Bằng</option>
                                <option value="63">Cà Mau</option>
                                <option value="59">Cần Thơ</option>
                                <option value="41">Gia Lai</option>
                                <option value="2">Hà Giang</option>
                                <option value="23">Hà Nam</option>
                                <option value="28">Hà Tĩnh</option>
                                <option value="11">Hòa Bình</option>
                                <option value="21">Hưng Yên</option>
                                <option value="19">Hải Dương</option>
                                <option value="20">Hải Phòng</option>
                                <option value="60">Hậu Giang</option>
                                <option value="37">Khánh Hòa</option>
                                <option value="58">Kiên Giang</option>
                                <option value="40">Kon Tum</option>
                                <option value="8">Lai Châu</option>
                                <option value="51">Long An</option>
                                <option value="6">Lào Cai</option>
                                <option value="44">Lâm Đồng</option>
                                <option value="13">Lạng Sơn</option>
                                <option value="24">Nam Định</option>
                                <option value="27">Nghệ An</option>
                                <option value="25">Ninh Bình</option>
                                <option value="38">Ninh Thuận</option>
                                <option value="16">Phú Thọ</option>
                                <option value="36">Phú Yên</option>
                                <option value="29">Quảng Bình</option>
                                <option value="33">Quảng Nam</option>
                                <option value="34">Quảng Ngãi</option>
                                <option value="14">Quảng Ninh</option>
                                <option value="30">Quảng Trị</option>
                                <option value="61">Sóc Trăng</option>
                                <option value="9">Sơn La</option>
                                <option value="26">Thanh Hóa</option>
                                <option value="22">Thái Bình</option>
                                <option value="12">Thái Nguyên</option>
                                <option value="31">Thừa Thiên Huế</option>
                                <option value="52">Tiền Giang</option>
                                <option value="54">Trà Vinh</option>
                                <option value="5">Tuyên Quang</option>
                                <option value="46">Tây Ninh</option>
                                <option value="55">Vĩnh Long</option>
                                <option value="17">Vĩnh Phúc</option>
                                <option value="10">Yên Bái</option>
                                <option value="7">Điện Biên</option>
                                <option value="42">Đắk Lắk</option>
                                <option value="43">Đắk Nông</option>
                                <option value="48">Đồng Nai</option>
                                <option value="56">Đồng Tháp</option>
                            </select>
                        </div>
                        <div class="next-form-grid-cell">
                            <label class="text-title-field">Quận/Huyện</label>
                            <select class="form-control"
                                    data-bind="options: Districts, optionsText: 'DistrictName', optionsValue: 'Id', optionsCaption: 'Chọn quận/huyện', value: NewDistrictSelectedValue,valueAllowUnset:true">
                                <option value="">Chọn quận/huyện</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" data-bind="click:CreateNewCustomer">Lưu</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div class="modal make-paid fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Tạo đơn hàng mới</h4>
            </div>
            <div class="modal-body">
                <label class="ws-nm"> Xác nhận đã thanh toán cho đơn hàng này?</label>
                <p>
                    Trạng thái thanh toán của đơn hàng là Đã thanh toán.Sau khi đơn hàng đã tạo, bạn không thể thay đổi
                    phương thức hoặc trạng thái thanh toán.
                </p>
                <p>Chọn phương thức thanh toán cho đơn hàng này</p>
                <div class="form-group">
                    <select class="form-control"
                            data-bind="options: PaymentList, optionsText: 'Name', optionsValue: 'Id', value: PaymentSelectedValue">
                        <option value="382579">Thanh toán khi giao hàng (COD)</option>
                        <option value="382581">Chuyển khoản qua ngân hàng</option>
                    </select>
                </div>
                <p>Số tiền đã nhận : <span data-bind="textMoneyWithSymbol:GrandTotal">0 ₫</span></p>
            </div>
            <div class="modal-footer">
                <div class="pull-left">
                    <a class="btn btn btn-default" data-toggle="modal" data-dismiss="modal">Đóng</a>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-primary save-value-autocomplete" data-toggle="modal"
                            data-dismiss="modal" data-bind="click:MakePaid">Tạo đơn hàng
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal make-pending fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Tạo đơn hàng mới</h4>
            </div>
            <div class="modal-body">
                <label class="ws-nm">Xác nhận sẽ nhận thanh toán sau cho đơn hàng này?</label>
                <p>
                    Trạng thái thanh toán của đơn hàng là Chờ xử lý.Sau khi đơn hàng đã tạo, bạn không thể thay đổi
                    phương thức hoặc trạng thái thanh toán.
                </p>
                <p>Chọn phương thức thanh toán cho đơn hàng này</p>
                <div class="form-group">
                    <select class="form-control"
                            data-bind="options: PaymentList, optionsText: 'Name', optionsValue: 'Id', value: PaymentSelectedValue">
                        <option value="382579">Thanh toán khi giao hàng (COD)</option>
                        <option value="382581">Chuyển khoản qua ngân hàng</option>
                    </select>
                </div>
                <p>Chờ thanh toán : <span data-bind="textMoneyWithSymbol:GrandTotal">0 ₫</span></p>
            </div>
            <div class="modal-footer">
                <div class="pull-left">
                    <a class="btn btn btn-default" data-toggle="modal" data-dismiss="modal">Đóng</a>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-dismiss="modal"
                            data-bind="click:MakePending">Tạo đơn hàng
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal add-shipping fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Phí vận chuyển</h4>
            </div>
            <div class="modal-body next-form-section">
                <!--ko if : !CustomerId()-->
                <div class="next-form-grid">
                    <div class="next-form-grid-cell">
                        <div class="alert-warning alert">
                            <label class="block-display mb10">Làm sao để chọn phí vận chuyển đã cấu hình ? </label>
                            <p>Hãy thêm thông tin khách hàng với địa chỉ giao hàng đầy đủ để thấy các mức phí vận chuyển
                                đã cấu hình.</p>
                        </div>
                    </div>
                </div>
                <!--/ko-->
                <div data-bind="foreach:ShippingList"></div>
                <div class="next-form-grid">
                    <div class="next-form-grid-cell">
                        <label class="text-title-field label-checkbox">
                            <!-- ko if: (value == undefined || value == null) && (checkedValue != undefined && checkedValue != null) -->
                            <!-- /ko -->
                            <!-- ko ifnot: (value == undefined || value == null) && (checkedValue != undefined && checkedValue != null) -->
                            <input type="radio" class=" hrv-radio"
                                   data-bind="checked: ischecked, value: value, attr: { name: name, id: id, class: (attrClass + ' hrv-radio') }"
                                   value="free-shipping" name="ko_unique_1" id="">
                            <!-- /ko -->
                            Miễn phí vận chuyển</label>
                    </div>
                </div>
                <div class="next-form-grid">
                    <div class="next-form-grid-cell">
                        <label class="text-title-field label-checkbox">
                            <!-- ko if: (value == undefined || value == null) && (checkedValue != undefined && checkedValue != null) -->
                            <!-- /ko -->
                            <!-- ko ifnot: (value == undefined || value == null) && (checkedValue != undefined && checkedValue != null) -->
                            <input type="radio" class=" hrv-radio"
                                   data-bind="checked: ischecked, value: value, attr: { name: name, id: id, class: (attrClass + ' hrv-radio') }"
                                   value="custom" name="ko_unique_2" id="">
                            <!-- /ko -->
                            Tùy chỉnh</label>
                    </div>
                </div>
                <div class="next-form-grid">
                    <div class="next-form-grid-cell">
                        <input type="text" class="form-control" placeholder="Tên phí vận chuyển"
                               data-bind="value:CustomShippingMethodName">
                    </div>
                    <div class="next-form-grid-cell next-form-grid-cell-third">
                        <input type="text" class="form-control" data-bind="moneyMaskWithSymbol:OrderShippingFee">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-left">
                    <a class="btn btn btn-default" data-toggle="modal" data-dismiss="modal">Đóng</a>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-primary" data-bind="click:UpdateShipping">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /ko -->
<!-- ko if:ShowType() === 'Detail' --><!-- /ko -->


</div>