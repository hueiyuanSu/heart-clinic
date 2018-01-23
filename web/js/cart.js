$(document).ready(function(){
    var naviCartItemTemplate = Handlebars.compile($("#navi-cart-template").html());
    var CartPageTemplate = Handlebars.compile($("#cart-page-template").html());
    var CartCheckoutTemplate = Handlebars.compile($("#cart-checkout-template").html());

    var cartUrl = $('#navi-cart').attr('data-url');
    var itemWraper = $('#navi-cart-item-wrapper');
    var cartTotal = 0;
    // update navi cart preview
    var updatenaviCart = function(cart){
        // console.log('cart',cart);
        cartTotal = 0;
        itemWraper.empty();
        $.each(cart, function(key,value){
            // console.log(key);
            cartTotal += value.total_price;
            $.each(value.items, function(index,item){
                item.type = key;
                itemWraper.append(naviCartItemTemplate(item));
            });
        });
        $('#cart-navi-total').html(cartTotal);
    }

    var updateCart = function(cart){
        if($('#cart-table').length){
            cartTotal = 0;
            $('.cart-item').remove();
            $.each(cart, function(key,value){
                // console.log(key);
                cartTotal += value.total_price;
                $.each(value.items, function(index,item){
                    item.type = key;
                    item.subtotal = item.price*item.qty;
                    $( CartPageTemplate(item) ).insertBefore( ".cart-operation" );
                    // $('#cart-table').append(CartPageTemplate(item));
                });
            });
            $('#cart-subtotal').html(cartTotal);
            $('#cart-total').html(cartTotal);
        }

    }
    var checkoutCart = function(cart){
        if($('#checkout-table').length){
            cartTotal = 0;
            $('.cart-item').remove();
            $.each(cart, function(key,value){
                // console.log(key);
                cartTotal += value.total_price;
                $.each(value.items, function(index,item){
                    item.type = key;
                    item.subtotal = item.price*item.qty;
                    $('#checkout-table tbody').append(CartCheckoutTemplate(item));
                });
            });
            $('#cart-subtotal').html(cartTotal);
            $('#cart-total').html(cartTotal);
        }

    }

    var getCart = function(){
        $.get(cartUrl,{},function(callback){
            if(callback.success){
                updatenaviCart(callback.cart);
                updateCart(callback.cart);
                checkoutCart(callback.cart);
            }else{
                // console.log(callback.message);
            }
        },'json');
    }

	// add to cart
    $('body').on('click', '.add-to-cart', function(){
        var _this = $(this);
        var item = {
            'id' : _this.attr('data-id'),
            'name' : _this.attr('data-name'),
            'price' : _this.attr('data-price'),
            'avatar' : _this.attr('data-avatar'),
            'qty' : _this.attr('data-qty'),
        }
        $.post(cartUrl+'/add-item?type='+_this.attr('data-type'),{item:item},function(callback){
            if(callback.success){
                updatenaviCart(callback.cart);
                updateCart(callback.cart);
                $.notifyBar({
                    cssClass: "success",
                    html: "加入購物車成功"
                });
            }else{
                // console.log(callback.message);
                $.notifyBar({
                    cssClass: "error",
                    html: callback.message
                });
            }
        },'json');
    });

    // update cart
    if($('#cart-table').length){
        $('#update-cart').on('click', function(){
            // console.log('update cart');
            var _this = $(this);
            var type = '';
            items = [];
            $('.cart-item').each(function(index, value){
                var qty = $(this).find('input').val();
                if(qty*1){
                    var item = {
                        'id' : $(this).attr('data-id'),
                        'name' : $(this).attr('data-name'),
                        'price' : $(this).attr('data-price'),
                        'avatar' : $(this).attr('data-avatar'),
                        'qty' : qty,
                    }
                    type = $(this).attr('data-type');
                    items.push(item);
                }

            });
            // console.log('items', items);
            $.post(cartUrl+'/update-cart?type='+type,{items:items},function(callback){
                if(callback.success){
                    updatenaviCart(callback.cart);
                    updateCart(callback.cart);
                    $.notifyBar({
                        cssClass: "success",
                        html: "購物車更新成功"
                    });
                }else{
                    $.notifyBar({
                        cssClass: "error",
                        html: callback.message
                    });
                }
            },'json');
        });

    }

    // remove from cart
    $('body').on('click', '.js-remove-cart-item', function(){
        var _this = $(this);
        $.post(cartUrl+'/remove-item?type='+_this.attr('data-type'),{item_id:_this.attr('data-id')},function(callback){
            if(callback.success){
                updatenaviCart(callback.cart);
                updateCart(callback.cart);
                $.notifyBar({
                    cssClass: "success",
                    html: "購物車項目移除成功"
                });
            }else{
                $.notifyBar({
                    cssClass: "error",
                    html: callback.message
                });
            }
        },'json');
    });
    // empty cart

    //send order
    if($('#send-order').length){
        $('#send-order').on('click', function(){
            if($('#agree-policy').is(':checked')){
                $('#delivery-form').submit();
            }else{
                $.notifyBar({
                    cssClass: "error",
                    html: '請先確認服務條款'
                });
            }
        });
    }
    //init
    getCart();
});
