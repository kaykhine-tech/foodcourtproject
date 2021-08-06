// Custom JS
$(document).ready(function(){

    cartNoti();
    getData();

  // Insert into LS
  $('.add-to-cart').click(function(){
    // id, name, photo, price, description, qty
    var id = $(this).data('id');
    var name = $(this).data('name');
    var photo = $(this).data('photo');
    var price = $(this).data('price');
    var discount = $(this).data('discount');
    

    var item = {id:id,name:name,photo:photo,price:price,discount:discount,qty:1};

    var mycartjson = localStorage.getItem('mycart');

    var mycartarray;

    if (mycartjson==null) {
      mycartarray = Array();
    }else{
      mycartarray = JSON.parse(mycartjson);
    }
    // console.log(mycartarray);
    // condition

    var status = false;

    $.each(mycartarray, function(i,v){
      if(id == v.id){
        v.qty++;
        status = true;
      }

    });

    if (status==false){
      mycartarray.push(item);
    }

    var cartData = JSON.stringify(mycartarray);
    localStorage.setItem('mycart', cartData);

    
    cartNoti();
    getData();

    });

  // Retrieve For Cart Page
  

  function getData(argument) {
    var mycartjson = localStorage.getItem('mycart');
    var html="";
    var total = 0;
    var i=0;
    if (mycartjson) {
      mycartarray = JSON.parse(mycartjson);

      for(item of mycartarray){
        total += (item.price*item.qty);

        html+= `<tr>
            <td><button class="removebtn btn-danger btn-sm" data-id="${i}">x</button>${item.id}</td>
            <td>
              ${item.name}
              <img src="${item.photo}" class="w-25">
            </td>
            <td>
              ${item.price}
            </td>
            <td>
              <button class="btn plus_btn btn-outline-secondary" data-id="${i}">+</button>
            </td>
            <td>
              ${item.qty}
            </td>
            <td>
              <button class="btn minus_btn btn-outline-secondary" data-id="${i}">-</button>
            </td>
            <td>
              ${(item.price*item.qty)}
            </td>
          </tr>`;

          i++;
      }

      html += `<tr>
                <td colspan="6">Total: </td>
                <td>${total}</td>
              </tr>`;
      $('.checkout').attr('data-total',total);
    }else{
      $('.checkout').addClass('disabled');
      html = `<tr>
                <td colspan="5">Empty Cart!</td>
              </tr>`;
    }
    $('#tbody').html(html);

    cartNoti();
  }

  function cartNoti(){
    var mycart = localStorage.getItem('mycart');
    if(mycart){
      var mycartarray = JSON.parse(mycart);
      var noti = 0;
            var total = 0;        
      $.each(mycartarray,function(i,v){
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

  $('#tbody').on('click','.removebtn',function(){
        //alert('ok');
        var id = $(this).data('id');
        var mycart = localStorage.getItem('mycart');
        var mycartArray = JSON.parse(mycart);

        // $.each(mycartArray, function(i,v){
            mycartArray.splice(id,1);
        // });

        var cartData = JSON.stringify(mycartArray);
        localStorage.setItem('mycart',cartData);

        cartNoti();
        getData();
    });

    

    $('#tbody').on('click','.plus_btn',function(){
        var id = $(this).data('id');
        var mycart = localStorage.getItem('mycart');
        var mycartArray = JSON.parse(mycart);

        $.each(mycartArray, function(i,v){
            if(id == i){
                v.qty ++;
            }
        });

        var cartData = JSON.stringify(mycartArray);
        localStorage.setItem('mycart',cartData);

        cartNoti();
        getData();
    });

    $('#tbody').on('click','.minus_btn',function(){
        var id = $(this).data('id');
        var mycart = localStorage.getItem('mycart');
        var mycartArray = JSON.parse(mycart);

        $.each(mycartArray, function(i,v){
            if(id == i){
                v.qty --;

                if(v.qty == 0){
                    mycartArray.splice(id,1);
                }
            }
        });

        var cartData = JSON.stringify(mycartArray);
        localStorage.setItem('mycart',cartData);

        cartNoti();
        getData();
    });


  // checkout process
  $('.checkout').click(function(){
    //alert('ok');
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var mycartjson = localStorage.getItem('mycart');
    var total = $(this).data('total');
    $.post("/orders",{data:mycartjson,total:total},function(res){
      //console.log(res);
      // remove ls
      localStorage.clear();
      getData();
      // use sweetalert
    })
  })
})