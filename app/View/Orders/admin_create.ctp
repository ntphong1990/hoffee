<style>
.box-search-advance {
	position: relative;
	z-index: 3
}

.box-search-advance .panel-default {
	position: absolute;
	top: 100%;
	left: 0;
	-moz-transform: translateY(0) scale(0);
	-ms-transform: translateY(0) scale(0);
	-o-transform: translateY(0) scale(0);
	-webkit-transform: translateY(0) scale(0);
	transform: translateY(0) scale(0);
	max-width: 100%;
	margin-top: 5px;
	background-color: rgba(255,255,255,.98);
	border-radius: 3px;
	opacity: 0;
	-webkit-transition: -webkit-transform .3s ease,opacity .3s ease;
	-moz-transition: all .3s ease,opacity .3s ease;
	-o-transition: all .3s ease,opacity .3s ease;
	transition: all .3s ease,opacity .3s ease;
	width: 100%;
	-moz-transform-origin: 50% -20px;
	-ms-transform-origin: 50% -20px;
	-o-transform-origin: 50% -20px;
	-webkit-transform-origin: 50% -20px;
	transform-origin: 50% -20px
}

.box-search-advance .panel-default .panel-body {
	max-height: 300px;
	overflow-y: auto;
    padding-top: 0;
       background: #fff;
  color: #000;
  border: 1px solid #aaa;
  border-top: 0;
  border-radius: 0 0 4px 4px;
  -webkit-box-shadow: 0 4px 5px rgba(0, 0, 0, 0.15);
  box-shadow: 0 4px 5px rgba(0, 0, 0, 0.15); 
  overflow : auto;
}

.box-search-advance .panel-default.active {
	-webkit-transform: translateY(0) scale(1);
	-moz-transform: translateY(0) scale(1);
	-ms-transform: translateY(0) scale(1);
	-o-transform: translateY(0) scale(1);
	transform: translateY(0) scale(1);
	opacity: 1;
	z-index: 1
}

.box-search-advance .panel-default.active:before {
	position: absolute;
	top: -7px;
	left: 0;
	right: 0;
	margin: auto;
	display: inline-block;
	border-right: 7px solid transparent;
	border-bottom: 7px solid #f3faff;
	border-left: 7px solid transparent;
	border-bottom-color: rgba(175,166,166,.2);
	content: '';
	width: 3px
}

.box-search-advance .panel-default.active:after {
	position: absolute;
	left: 0;
	right: 0;
	top: -6px;
	margin: auto;
	display: inline-block;
	border-right: 6px solid transparent;
	border-bottom: 6px solid #fff;
	border-left: 6px solid transparent;
	content: '';
	width: 3px
}

.box-search-advance .panel-default .list-search-data>ul>li {
	padding: 10px 13px;
	cursor: pointer;
	border-top: 1px solid #ebeef0
}

.box-search-advance .panel-default .list-search-data>ul>li:first-child {
	border-top: 0
}

.findcustomer .list-search-data>ul>li {
	padding: 5px 13px!important
}

.findcustomer .box-search-advance .panel-default .list-search-data>ul>li.active,.findcustomer .box-search-advance .panel-default .list-search-data>ul>li:hover {
	background: #479ccf
}

.findcustomer .box-search-advance .panel-default .list-search-data>ul>li.active *,.findcustomer .box-search-advance .panel-default .list-search-data>ul>li:hover * {
	color: #fff!important
}

.box-search-advance .panel-default .list-search-data>ul>li ul {
	padding-left: 40px
}

.box-search-advance .panel-default .list-search-data>ul>li ul li {
	padding: 7px 10px
}

.box-search-advance .panel-default .list-search-data>ul>li ul li:hover {
	background: #eff9fd
}

.box-search-advance .panel-default .list-search-data .wrap-img,.box-search-advance .panel-default .list-search-data .img-empty {
	min-height: 32px;
	min-width: 32px;
	height: 30px;
	width: 30px;
	margin-top: 2px
}

.box-search-advance .panel-default .list-search-data .img-empty {
	padding: 6px 2px
}

.box-search-advance .panel-default .list-search-data .wrap-img img {
	min-height: 30px;
	min-height: 30px;
	height: 30px;
	width: 30px
}

.box-search-advance-head {
	padding: 10px 15px;
	border-bottom: 1px solid #e0e6ec;
	margin-left: -15px;
	margin-right: -15px;
	cursor: pointer
}

.box-search-advance-head:hover {
	background: #eff9fd
}

.findcustomer .box-search-advance-head:hover {
	background: #479ccf;
	color: #fff
}

.list-search-data {
 
}
</style>
<script>

    function pageLoad(){

    }

    function openSearchProduct() {
        $("#productSearch").addClass('active');
    }

    function closeSearchProduct() {

    setTimeout(function(){

        $("#productSearch").attr('class', 'panel panel-default');
    }, 100);
    }

    function openSearchCustomer() {
        $("#searchCustomer").addClass('active');
    }

    function closeSearchCustomer() {
        setTimeout(function(){

            setTimeout( $("#searchCustomer").attr('class', 'panel panel-default'),500);
        }, 100);


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
                '<div class="wrap-img"><img height="50" class="thumb-image" '
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
    
    function closeModal() {
        event.stopPropagation();
    }
</script>
<div class="row" id="viewareaid" onclick="closeModal()">

    <div class="row head-action">
						<div class="col-sm-12 col-lg-6">
						
							<span><a class="back-list hidden-xs" href="/admin/orders/index">Quản lý đơn hàng</a></span>
							<span class="border-row hidden-xs">/ </span>
							<span class="active">Tạo mới</span>
						
						</div>
						<div class="col-sm-12 col-lg-6">
						<div class="right">
						<button class="btn btn-primary ml15"
                                        data-bind="enable :IsPaid" id="done" onclick="submit(1)">Đã thanh toán
                                </button>
                                <button class="btn btn-primary ml15" id="notdone" data-toggle="modal" onclick="submit(2)"
                                        >Thanh toán sau
                                </button>
                        <button class="btn btn-default ml10" id="draff" onclick="submit(3)">Lưu nháp</button>
						</div>	
                        
						</div>

	</div>
    <!-- ko if:ShowType() === 'List'--><!-- /ko -->
    <!-- ko if:ShowType() === 'New'-->
    <div class="col-lg-8 widget-container ui-sortable">
        <div class="pageheader two-actions-header-mobile">
            <div class="col-xs-12">
              
                <div class="header__primary-actions">
                    
                </div>
                <div class="header__secondary-actions">
                    <a class="btn btn-default" data-bind="attr: { href: DraftOrderListLink }"
                       href="/admin/order/draft_orders/list">Hủy</a>
                </div>
            </div>
        </div>
        <div class="">
            <div class="max-width-1200">
                <div class="flexbox-grid no-pd-none">
                    <div class="flexbox-content">
                        <div class="widget">
                            <div class="">
                                <label class="title-product-main text-no-bold">Chi tiết đơn hàng</label>
                            </div>
                            <div class="pd-all-10-20 border-top-title-main">
                                <div class="clearfix">

                                    <div class="widget-body">
                                        <table class="table">
                                            <tbody id="tableProduct" data-bind="foreach:ProductList">



                                            </tbody>
                                </table>
                            </div>

                            <div class="box-search-advance product">
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
                                            <ul class="nav navbar-nav">
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
                                            
                                        </div>
                                        
                                      
                                    </div>

                                   
                                </div>

                            </div>

                            
                        </div>
                    </div>
                    <div class="pd-all-10-20 p-none-t">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="title-product-main text-no-bold">Ghi chú</label>
                                    <textarea class="form-control textarea-auto-height" rows="2"
                                              placeholder="Ghi chú đơn hàng" id="note"></textarea>
                                </div>
                               
                            </div>
                            <div class="col-sm-6" style="margin-top:10px">
                                <table class="table borderless">
                                    <tbody>
                                    <tr>
                                        <td class="color-stateGray p-xs">Tổng giá trị sản phẩm</td>
                                        <td id="sumProduct" style="padding-left:20px">0</td>
                                        <td> ₫</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <a data-bind="click:OpenShippingPopup" class="hover-underline"><i
                                                    class="fa fa-plus-circle"></i> Thêm phí vận chuyển</a>
                                        </td>
                                        <td class="p-xs">

                                            <input class="form-control p-none-r" type="number" id="shipFee" min="1" onchange="addShipFee(this)" value="0">
                                        </td>
                                       <td> ₫</td>

                                    </tr>
                                    <tr class="bold-light">
                                        <td  class="p-xs">Số tiền phải thanh toán</td>
                                        <td id="totalSumProduct" style="padding-left:20px">0 </td>
                                        <td> ₫</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>

    </div>
</div>




    <div class="col-lg-4 widget-container ui-sortable">
                <div class="panel panel-default wrapper-content">
                    <div class="widget">
                        <label class="title-product-main text-no-bold block-display mb15">Thông tin khách hàng</label>
                        <div class="findcustomer">


                            <div class="box-search-advance customer">
                                <div>
                                    <input type="text" onkeyup="filterCustomer(this.value)" class="form-control textbox-advancesearch"
                                          onclick="openSearchCustomer()" onblur="closeSearchCustomer()"
                                           placeholder="Tìm hoặc tạo khách hàng mới">
                                </div>

                                <div id="searchCustomer" class="panel panel-default ">
                                    <div class="panel-body" style="padding:0px">
                                       
                                       
                                            <div class="list-group list-group-lg ">
                                                 <a class="list-group-item" href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/customers/add">
                                                    
                                                    <span class="thumb-sm pull-xs-left mr">
                                                        <img class="img-circle" src="//hstatic.net/0/0/global/design/imgs/next-create-customer.svg" alt="...">
                                                    </span>
                                                    <i class="fa fa-circle pull-xs-right text-danger mt-sm"></i>
                                                    <h6 class="no-margin">Tạo mới khách hàng</h6>
                                                    <small class="text-muted">Click here to create new customer</small>
                                                    </a>
                                                <?php foreach ($customers as $key => $value) { ?>
                                                <a class="list-group-item customeritem" id ="<?php echo strtolower($value['Customer']['name']).$value['Customer']['phone'];?>"
                                                    onClick="changeCustomer(<?php echo $value['Customer']['id'];?>,'<?php echo $value['Customer']['name'];?>','<?php echo $value['Customer']['phone'];?>','<?php echo $value['Customer']['address'];?>')">
                                                    <!-- ko if:  Thumbnail() -->
                                                   
                                                    <span class="thumb-sm pull-xs-left mr">
                                                        <img class="img-circle" src="https://secure.gravatar.com/avatar/2efd8534a82578a162535ce9abd0224c.jpg?s=40&d=https%3A%2F%2Fsecure.gravatar.com%2Favatar%2F18f9f20ec1a7be8020924ce0048b6ef2.jpg%3Fs%3D40" alt="...">
                                                    </span>
                                                    <i class="fa fa-circle pull-xs-right text-danger mt-sm"></i>
                                                    <h6 class="no-margin"><?php echo $value['Customer']['name'];?></h6>
                                                    <small class="text-muted"><?php echo $value['Customer']['phone'];?></small>
                        
                                                </a>
                                                <?php } ?>
                                            </div>
                                            
                                        
                                        <!--/ko-->
                                        <!--ko if: ObjectType() == 'supplier'--><!--/ko-->
                                    </div>

                                   
                                </div>

                            </div>

                        </div>
                        <div id="customerInfo" class="panel-body hide">
                            <div class="text-xs-center">
                                    <img class="center"
                                     src="https://secure.gravatar.com/avatar/2efd8534a82578a162535ce9abd0224c.jpg?s=40&amp;d=https%3A%2F%2Fsecure.gravatar.com%2Favatar%2F18f9f20ec1a7be8020924ce0048b6ef2.jpg%3Fs%3D40"
                                     >
                            </div>
                            <ul class="text-list">
                                <p>
                                    <span id="customerName" class="pre-line">Duy Le</span>
                                </p>
                                <p>
                                    <i class="fa fa-check-square-o"></i>
                                    <span id="customerAddress">Vietnam</span>
                                </p>
                                <p>
                                    <span><a title="Click để gọi"><i class="fa fa-phone-square cursor-pointer mr10"></i></a></span>
                                    <span id="customerPhone">0919555909</span>
                                </p>

                                <p class="overflow-ellipsis mt10 p-r15 ps-relative">
                                    <i class="glyphicon glyphicon-envelope color-gray-icons mr10"></i>

                                    <a data-bind="attr: { href: href }">
                                        <span data-bind="text: email">-</span>
                                    </a>

                                    <a class="hide-print ps-absolute-default" href="#" data-bind="click:openEditEmail">
                                        <span data-placement="left" title="Chỉnh sửa email" data-toggle="tooltip"><i class="fa fa-pencil-square-o color_gray "></i> </span>
                                    </a>
                                </p>
                                <p class="hide-print normal-line">
                                    <i class="glyphicon glyphicon-user color-gray-icons mr10 hide-print"></i>
                                    <a class="hide-print text-underline hover-tooltip hover-underline color-dark-link" id="customerDetail" href="">Xem thông tin khách hàng</a>
                                </p>

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
                                    name="channel">
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