$(document).ready(function(){

    cartNoti();
    showTable();

    $('.hideForm').hide();

	$('.addtocartBtn').click(function(){
		var id = $(this).data('id');
		var name = $(this).data('name');
		var price = $(this).data('price');
		var photo = $(this).data('photo');
		var codeno = $(this).data('codeno');
		var discount = $(this).data('discount');
        var qty = 1;

		var mylist = {
			id: id,
			name: name,
			price: price,
			photo: photo,
			codeno: codeno,
			discount: discount,
			qty: qty,
		}

		var cart = localStorage.getItem('cart');

		var cartArr;

		if(cart==null){
			cartArr = Array();
		}else{
			cartArr = JSON.parse(cart);
		}

		var status = false;

		$.each(cartArr,function(i,v){
			if(id == v.id){
				v.qty++;
				status = true;
			}
		});

		if (status==false){
			cartArr.push(mylist);
		}

		var cartData = JSON.stringify(cartArr);
		localStorage.setItem("cart", cartData);

        cartNoti();
	});

	function cartNoti(){
		var cart = localStorage.getItem("cart");
		if(cart){
			var cartArr = JSON.parse(cart);
			var noti = 0;
            var total = 0;        
			$.each(cartArr,function(i,v){
				var unitprice = v.price;
                var discount = v.discount;
                var qty = v.qty;
                if(discount){
                    var price = discount;
                }else{
                    var price = unitprice;
                }
                var subtotal = price * qty;

                noti += v.qty;
                total += subtotal;

                // noti += qty ++;             
                // total += subtotal ++;
			})
			$('.cartNoti').html(noti);
            $('.cartTotal').html(total);
		}else{
            $('.cartNoti').html(0);
            $('.cartTotal').html(0 + ' Ks');
        }
	}

    function showTable(){
        var cart = localStorage.getItem('cart');

        if(cart){
            $('.shoppingcart_div').show();
            $('.noneshoppingcart_div').hide();

            var cartArray = JSON.parse(cart);
            var shoppingcartData = '';

            if(cartArray.length > 0){
                var total = 0;
                $.each(cartArray, function(i,v){
                    var id = v.id;
                    var codeno = v.codeno;
                    var name = v.name;
                    var unitprice = v.price;
                    var discount = v.discount;
                    var photo = v.photo;
                    var qty = v.qty;

                    if(discount){
                        var price = discount;
                    }else{
                        var price = unitprice;
                    }

                    var subtotal = price * qty;

                    shoppingcartData += `<tr>
                                            <td>
                                                <button class="btn btn-outline-danger remove_btn btn-sm" data-id="${i}" style="border-radius: 50%">
                                                    <i class="icofont-close-line"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <img src="${item.photo}" class="cartImg">
                                            </td>
                                            <td>
                                                <p> ${item.name} </p>
                                                <p> ${item.codeno} </p>
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-secondary plus_btn" data-id="${i}">
                                                    <i class="icofont-plus"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <p> ${item.qty} </p>
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-secondary minus_btn" data-id="${i}">
                                                    <i class="icofont-minus"></i>
                                                </button>
                                            </td>
                                            <td>`;
                    if(discount > 0){
                        shoppingcartData +=     `<p class="text-danger">
                                                    ${item.discount} Ks
                                                </p>
                                                <p class="font-weight-lighter">
                                                    <del> ${item.unitprice} Ks</del>
                                                </p>`;
                                    }else{
                                        shoppingcartData += `<p class="text-danger">
                                                                ${item.unitprice} Ks
                                                            </p>`;
                                    }
                    shoppingcartData += `</td>
                                            <td>
                                                <p> ${item.subtotal} Ks</p>
                                            </td>
                                        </tr>`;
                    total += subtotal ++;

                });
                $('#shoppingcart_table').html(shoppingcartData);
            }else{
                $('.shoppingcart_div').hide();
                $('.noneshoppingcart_div').show();
            }
        }else{
            $('.shoppingcart_div').hide();
            $('.noneshoppingcart_div').show();
        }
    }

    $('#shoppingcart_table').on('click','.plus_btn',function(){
        var id = $(this).data('id');
        var cart = localStorage.getItem('cart');
        var cartArray = JSON.parse(cart);

        $.each(cartArray, function(i,v){
            if(id == i){
                v.qty ++;
            }
        });

        var cartData = JSON.stringify(cartArray);
        localStorage.setItem('cart',cartData);

        cartNoti();
        showTable();
    });

    $('#shoppingcart_table').on('click','.minus_btn',function(){
        var id = $(this).data('id');
        var cart = localStorage.getItem('cart');
        var cartArray = JSON.parse(cart);

        $.each(cartArray, function(i,v){
            if(id == i){
                v.qty --;

                if(v.qty == 0){
                    cartArray.splice(id,1);
                }
            }
        });

        var cartData = JSON.stringify(cartArray);
        localStorage.setItem('cart',cartData);

        cartNoti();
        showTable();
    });

    $('#shoppingcart_table').on('click','.remove_btn',function(){
        var id = $(this).data('id');
        var cart = localStorage.getItem('cart');
        var cartArray = JSON.parse(cart);

        $.each(cartArray, function(i,v){
            cartArray.splice(id,1);
        });

        var cartData = JSON.stringify(cartArray);
        localStorage.setItem('cart',cartData);

        cartNoti();
        showTable();
    });

    $('.checkoutbtn').on('click', function(){
        var notes = $('#notes').val();
        var cart = localStorage.getItem('cart');
        var cartArray = JSON.parse(cart);

        var total = 0;

        $.each(cartArray, function(i, v){
            var unitprice = v.price;
            var discount = v.discount;
            var qty = v.qty;

            if (discount){
                var price = discount;
            }else{
                var price = unitprice;
            }

            var subtotal = price*qty;

            total += subtotal++;
        });

        $.post("/order",{data:mycartjson,total:total},function(res){
      // console.log(res);
      // remove ls
      localStorage.clear();
      getData();
      
  
    
        })

        

    })
})