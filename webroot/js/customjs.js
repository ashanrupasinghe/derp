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
	    //var productId = $('option:selected', this).val();
		var productId = $('option:selected', this).text();
		
	    //alert(myBaseUrl+"orders/getProductSeller");
	    //alert(productId);
	    
	    $.post(myBaseUrl+"orders/productsuppliers",
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
	}).keyup();
	
});

