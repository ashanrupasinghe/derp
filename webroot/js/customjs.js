/**
 * 
 */
$(document).ready(function(){
	/*$('#confirmation').click(function(){
		var url="";
		var conf=confirm("Are you sure,\nproceed an order with this client?");
		if(conf==true){
			 $.get("http://"+ document.domain +"/o/yourAction/param1/param2/");
			 window.location.href  = "http://"+ document.domain +"/direct2door.erp/orders/add/";
		}
		else{
			return;
		}
	});*/
/*	$('#orders-products-id').change(function(){
		alert('fuck you');
		
	});
	*/
	
	// delegate event handler
	$('#order').on('change keyup', 'select[id^=orders-products-id]', function() {
		//alert(this.id);
		var divid=$(this).closest("div.prod-left").parent().attr('id');
		var listItems=""
	    var productId = $('option:selected', this).val();
		//var productId = $('option:selected', this).text();
		
	    //alert(myBaseUrl+"orders/getProductSeller");
	    //alert(productId);
	    
	    $.post(myBaseUrl+"orders/productsuppliersbyid",
	    	    {productId:productId},
	    	    function(data, status){
	    	    	//alert(data);
	    	    	var supplier=JSON.parse(data);    	    	
	    	    	
	    	    	listItems= "<option value=''>select product</option>";
	    	        for (var i = 0; i < supplier.length; i++){
	    	          listItems+= "<option value='" + supplier[i].s.id + "'>" + supplier[i].s.firstName+" "+supplier[i].s.lastName+" - "+supplier[i].city.cname + "</option>";
	    	        }
	    	        
	    	        
	    	        //$(this).next().next().html(listItems);
	    	        $("#"+divid).find("select.sup-select").html(listItems);
	    	        $("#"+divid).find("input.packagetype").val("X "+supplier[0].pack.type);
	    	        //$("select#orders-products-id").closest("div.prod-left").next().next().find("select").html(listItems);
	    	        //$("select#orders-products-id").closest("div.prod-left").next().next().find("select").html(listItems);
	    	        //$("#orders-suppliers-id").html(listItems);
	    	    });
	    //alert(this.id);
	   // $(this).closest("div.prod-left").next().next().find("select").html(listItems);
	    
	    /*$.get(myBaseUrl+"orders/productsuppliers", function(data, status){
	        alert("Data: " + data + "\nStatus: " + status);
	    });*/
	    
	    
	    //$(this).next('input#fuck').val(value.split('-')[6]);
	    
	  //count product total price if quantity field not empty
	    var quantity=$("#"+divid).find("input.product-quantity").val();
	    if(quantity){
	    	displayProductPrice(divid,quantity);
	    	displaySubTotalWithTimeout();
	    }
	    
	    
	}).keyup();
	
	//calculationg price
	 
	    $(document).on('focusout','.product-quantity',function() {
	    	/// $(this).css("background-color", "#FFFFCC");
	    	 var divid=$(this).closest("div").parent().parent().attr('id');
	    	 var quantity=$(this).val();
	    	 
	    	 //var productammount="prpayaring";
	    	 
	    	 displayProductPrice(divid,quantity);
	//    	 alert($('input[name="product_price[]"]').length);
	    	 displaySubTotalWithTimeout();
	    
	    	 
	    	 
	    	 
	    });
	    
	   /* $( ".btnRemove" ).click(function() {
	    	alert('xxxx');
	    	//displaySubTotalWithTimeout();
	    	});*/
	    
	    
	    function displayProductPrice(divid,quantity){
	    	//alert(divid+" : "+quantity);
	    	//if(quantity!="" && productId!=""){
	    	var productId=$("#"+divid).find("select#orders-products-id").val();
	    	if(quantity && productId){
		    	 $.post(myBaseUrl+"orders/singlecal",
		 	    	    {"productId":productId,"quantity":quantity},
		 	    	    function(data, status){
		 	    	    	//alert(data);//{"productQuantity":5,"productPrice":100,total":500}
		 	    	    	var productTotalPrice=JSON.parse(data);
		 	    	    	var totalstring=productTotalPrice['productPrice']+" X "+productTotalPrice['productQuantity']+" = "+productTotalPrice['total'];
		 	    	    	$("#"+divid).find("input.product-ammount").val(totalstring);
		 	    	    	$("#"+divid).find("input.product-ammount-hidden").val(productTotalPrice['total']);
		 	    	    	
		 	    	    });
		    	 }
	    }
	    
	    
	    
	    function displaySubTotal(){
	    	var productPrices = $('input[name="product_price[]"]');
	    	 var totalPrice=0;
	    	 for(var i = 0; i < productPrices.length; i++){
	    		 totalPrice+=parseInt(($(productPrices[i]).val()));
	    		}
	    	//tax, discount
	    	 var tax_p=10;//persantage
	    	 var discount_p=5;//persantage
	    	 var tax=(totalPrice*tax_p)/100;
	    	 var discount=(totalPrice*discount_p)/100;
	    	 var total=(totalPrice+tax-discount);
	    	// alert(discount);
	    	 $("#subtotal").val(totalPrice);
	    	 $("#tax").val(tax); 
	    	 $("#discount").val(discount); 
	    	 $("#total").val(total); 
	    	  
	    }
	    
	    function displaySubTotalWithTimeout(){
	    	setTimeout(displaySubTotal, 2000);
	    }
	    
	    $(document).on("pageload",function(){
	    	  alert("pageload event fired!");
	    	});
	    
	
});


