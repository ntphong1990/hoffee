/**
 * Created by ANH on 9/12/2016.
 */
var App = {
    foodClickItem: function () {
        $('.owl-item').on('click', '.btn-cart', function () {
            var itemList = new Array();
            var list = $('.list-order').find('.active');
            list.each(function () {
                var listId = jQuery(this).data('item-id');
                var listSl = jQuery(this).data('item-sl');
                itemList.push({'itemId': listId, 'itemSl': listSl});
            });
            $.cookie('cart', JSON.stringify(itemList));
            var $itemId = $(this).data('item-id');
            var $itemName = $(this).data('item-name');
            var $itemPrice = $(this).data('item-price');
            var $itemSl = 1;
            for (var key in itemList) {
                if ($itemId == itemList[key].itemId) {
                    $itemSl = parseInt(itemList[key].itemSl) + 1;
                    $itemPrice = $itemPrice * $itemSl;
                    $('#item-' + itemList[key].itemId).remove();
                    $('#item-' + itemList[key].itemId).removeClass('active');
                    $('#item-' + itemList[key].itemId).addClass('remove');
                }
            }
            var $itemImage = $(this).parents('.product-col').find('.image').find('.img-responsive').attr('src');
            $template = '\
                <tr class="item-child active" id="item-' + $itemId + '" data-item-id="' + $itemId + '" data-item-name="' + $itemName + '" data-item-price="' + $itemPrice + '" data-item-sl="' + $itemSl + '">\
                    <td class="text-left img-food">\
                        <a href="javacript:;">\
                            <img src="' + $itemImage + '" alt="Item-product" title="Item-product" class="img-thumbnail img-responsive"> </a>\
                    </td>\
                    <td class="text-left">\
                        <a href="#">' + $itemName + '</a>\
                    </td>\
                    <td class="text-left item-sl">x ' + $itemSl + '</td>\
                    <td class="text-right item-price">$' + $itemPrice + '</td>\
                    <td class="text-center">\
                        <a href="#" class="remove-item"><i class="fa fa-times"></i></a>\
                    </td>\
                </tr>';
            $('.list-cart .list-order').prepend($template);
            App.caculator();
        });
    },
    removeItem: function () {
        $('.list-cart').on('click', '.remove-item', function () {
            if (confirm('You are sure ?')) {
                $(this).parents('.item-child').remove();
                App.caculator();
                return false;
            }
            return false
        });
    },
    caculator: function () {
        var prices = $('.list-order').find('.active');
        if (prices.length > 0) {
            var total = 0;
            prices.each(function () {
                var listPrice = jQuery(this).data('item-price');
                total = total + listPrice;
                jQuery('.sub-total').text('$' + total);
                jQuery('.total-vat').text('$' + (total * 7.5) / 100);
                jQuery('.total-price').text('$' + (total * 107.5) / 100);
                $.cookie('totalPrice', (total * 107.5) / 100);
            });
        }
        else {
            jQuery('.sub-total').text('$' + 0);
            jQuery('.total-vat').text('$' + 0);
            jQuery('.total-price').text('$' + 0);
            $.cookie('totalPrice', 0);
        }

    },
    cancelFunction: function () {
        $('.list-cart').on('click', '.btn-cancel', function () {
            if (confirm('You are sure ?')) {
                var item = $('.list-order').find('.item-child').remove();
                var total = 0;
                jQuery('.sub-total').text('$' + total);
                jQuery('.total-vat').text('$' + (total * 7.5) / 100);
                jQuery('.total-price').text('$' + (total * 107.5) / 100);
                $.cookie('totalPrice', (total * 107.5) / 100);
            }
            return false;
        });
    },
    publicFunction: function () {
        console.log($.cookie('totalPrice'));
        if ($.cookie('totalPrice') > 0) {
            $('#foodModal').modal();
            $('.datetimepicker').datetimepicker(
            );
            $("#foodModal").on("shown.bs.modal", function () {
                google.maps.event.trigger(map, "resize");
                jQuery.ajax({
                    type: "GET",
                    url: jQuery('input[name="url"]').val() + '/admin/food/getStore',
                    success: function (response) {
                        var $json = jQuery.parseJSON(response);
                        if ($json.status == 200) {
                            $('#addr_from').prepend($json.html);
                            return false;
                        }
                        else if ($json.status == 201) {
                            console.log($json.data);
                            return false;
                        }
                        else {
                            return false;
                        }
                    },
                    error: function () {
                        window.location.reload();
                    }
                });
            });
        } else {
            alert('No order');
            return false;
        }
    },
    submitOrder: function () {
        jQuery('form#formOrder').submit(function () {
            var addr_to = $(this).find('input[name="addr_to"]').val();
            if (addr_to) {
                var to_lat = $('input[name="addr_to"]').attr('data-lat');
                var to_lng = $('input[name="addr_to"]').attr('data-lng');
                var addr_from = $("#addr_from option:selected").text();
                var from_lat = $("#addr_from option:selected").attr('data-lat');
                var from_to = $("#addr_from option:selected").attr('data-lng');
                $('input[name="from_lat"]').val(from_lat);
                $('input[name="addr_to_name"]').val(addr_to);
                $('input[name="addr_from_name"]').val($("#addr_from option:selected").attr('data-name'));
                $('input[name="from_lng"]').val(from_to);
                $('input[name="to_lat"]').val(to_lat);
                $('input[name="to_lng"]').val(to_lng);
                var itemList = new Array();
                var list = $('.list-order').find('.active');
                list.each(function () {
                    var listId = jQuery(this).data('item-id');
                    var listSl = jQuery(this).data('item-sl');
                    var listPrice = jQuery(this).data('item-price');
                    itemList.push({'itemId': listId, 'itemSl': listSl, 'itemPrice': listPrice});
                });
                $('input[name="listOrder"]').val(JSON.stringify(itemList));
                $('input[name="totalPrice"]').val($.cookie('totalPrice'));
                return true;
            }
            else {
                alert('Address to is required');
                return false;
            }
        });
    },
    removeShipper: function () {
        jQuery('.list-shipper').on('click', '.remove-shipper', function () {
            if (confirm('You are sure ?')) {
                var email = $(this).data('item');
                var id = $(this).data('id');
                if (email) {
                    jQuery.ajax({
                        type: "POST",
                        url: jQuery('input[name="url"]').val() + '/admin/users/remove',
                        data: {
                            'email': email
                        },
                        beforeSend: function () {
                            jQuery('.loading').fadeIn();
                        },
                        success: function (response) {
                            jQuery('.loading').fadeOut();
                            var $json = jQuery.parseJSON(response);
                            if ($json.status == 200) {
                                $('#shipper-' + id).remove();
                                return true;
                            }
                            else {
                                alert('System error !!!');
                            }
                        },
                        error: function () {
                            jQuery('.loading').fadeOut();
                            window.location.reload();
                        }

                    });
                }
                else {
                    return false;
                }
            }
            return false;
        });
    },
    editShipper :function(){
        jQuery('.list-shipper').on('click', '.edit-shipper', function (){
            $('#shipperEdit').modal();
            $('.datetimepicker').datepicker({
                format: "dd-mm-yyyy"
            });
            $('input[name="edit_name"]').val($(this).data('name'));
            $('input[name="edit_email"]').val($(this).attr('data-item'));
            $('input[name="edit_phone"]').val($(this).attr('data-phone'));
            $('input[name="edit_birthday"]').val($(this).attr('data-birthday'));

        });
    },
    removeStore : function() {
        $('.remove-store').on('click',function(){
            if(confirm('You are sure')){
                var item = $(this).data('item');
                if(item){
                    jQuery.ajax({
                        type: "POST",
                        url: jQuery('input[name="url"]').val() + '/admin/store/remove',
                        data: {
                            'id': item
                        },
                        beforeSend: function () {
                            jQuery('.loading').fadeIn();
                        },
                        success: function (response) {
                            jQuery('.loading').fadeOut();
                            var $json = jQuery.parseJSON(response);
                            if ($json.status == 200) {
                                $('#store-' + item).remove();
                                return true;
                            }
                            else {
                                alert('System error !!!');
                            }
                        },
                        error: function () {
                            jQuery('.loading').fadeOut();
                            window.location.reload();
                        }

                    });
                }
            }
        });
    },
    addStore : function (){
        $('form#formStore').submit(function(){
            var store = $("input[name='store']").val();
            if(!store){
                alert('Address is required !');
                return false;
            }
            return true;
        });
    }
};
jQuery(document).ready(function () {
    App.foodClickItem();
    App.removeItem();
    App.cancelFunction();
    var cookies = $.cookie();
    for (var cookie in cookies) {
        $.removeCookie(cookie);
    }
    App.submitOrder();
    App.removeShipper();
    App.editShipper();
    App.removeStore();
    App.addStore();
});