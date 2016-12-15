<style>
.prod{
padding-left: 0px;
padding-right: 0px;
}
.prod-left{
padding-left: 0px;
}

.btnRemove{
display: inline-block;
margin-top: 20px;
padding-top: 9px;
padding-bottom: 9px;
}
</style>
<div class="orders form large-10 medium-10 columns content">
    <?= $this->Form->create($order,['id'=>'order']) ?>
    <fieldset>
        <legend><?= __('Add Order') ?></legend>
        
<div class="orders view large-12 medium-12 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0 ">
<?php echo $this->Form->input('Orders.products_id',['empty'=>'select product','options'=>$products,'name'=>'product_name_list[]','required'=>true,'multiple'=>'multiple', 'id'=>'product-list']);?>
			<div class="dynamic-fields-product-list"></div>
</div> 
<div class="orders view large-12 medium-12 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0 ">

<div class="orders view large-4 medium-4 columns content div-top-pad-0 div-left-pad-0">		
			<?php
            echo $this->Form->input('subTotal',['disabled'=>true]);
            echo $this->Form->input('tax',['disabled'=>true]);
            echo $this->Form->input('discount',['disabled'=>true]);?>
	            
          <?php  echo $this->Form->input('couponCode');
            
            echo $this->Form->input('total',['disabled'=>true]);

        ?>
</div>        
<div class="orders view large-4 medium-4 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0">
			 <?php
			            $payment_status=['1'=>'pending','2'=>'paid'];
            //echo $this->Form->input('paymentStatus');
            echo $this->Form->input('paymentStatus',['options'=>$payment_status,'empty'=>'select status']);
            //echo $this->Form->input('status');
            $status=['1'=>'pending','2'=>'supplier informed','3'=>'products ready','4'=>'delivery tookover','5'=>'delivered','6'=>'completed'];
            echo $this->Form->input('status',['options'=>$status,'empty'=>'select status']);
			echo $this->Form->input('callcenterId',['empty'=>'select callcenter','options'=>$callcenters,'disabled' => true,'default' =>$callcenterId,'name'=>'callcenterIdDisables','id'=>'callcenterIdDisables']);
			echo $this->Form->input('callcenterId',['empty'=>'select callcenter','options'=>$callcenters,'disabled' => false,'type'=>'hidden','default' =>$callcenterId]);
			echo $this->Form->input('deliveryId',['empty'=>'select deliver','options'=>$deliveries]);
			?>
			
</div>

<div class="orders view large-4 medium-4 columns content div-top-pad-0 div-right-pad-0">
     
        <?php       	
        	echo $this->Form->input('editorder',['disabled'=>false,'type'=>'hidden','id'=>'edit-order-suppliers','default'=>0]);
            echo $this->Form->input('customerId',['value'=>$clientid,'disabled'=>'true']);
            echo $this->Form->input('customerId',['value'=>$clientid,'disabled' => false,'type'=>'hidden']);
            echo $this->Form->input('address',['value'=>$client_data['address']]);
            echo $this->Form->input('city',['options'=>$cities,'empty'=>'select city','default'=>$client_data['city']]);
            echo $this->Form->input('latitude');
            echo $this->Form->input('longitude');
            //echo $this->Form->input('callcenterId');
            //echo $this->Form->input('deliveryId');			

			?>

</div>






</div>       
			
			<!--dinamic fields-->
<?php /* ?>			
<div class="large-12 medium-12 columns" style="padding-left: 0px;padding-right: 0px;">			
	<div id="example-6" class="">
	
		<button type="button" id="btnAdd-6" class="btn btn-primary">Add Product</button>
	
		<div class="group large-12 medium-12 columns prod" id="x-1">
			<div class="large-3 medium-3 columns prod-left">
					
					<?php echo $this->Form->input('Orders.products_id',['empty'=>'select product','options'=>$products,'name'=>'product_name[]','required'=>true]);?>
					
			</div>			
			<div class="large-1 medium-1 columns">			
					<!--<label>Quantity<input type="text" name="product_quantity[]" class="product-quantity"></label>-->
					<?php echo $this->Form->input('Qty',['class'=>'product-quantity','name'=>'product_quantity[]', 'id'=>'','required'=>true]);?>
					
			</div>
			<div class="large-2 medium-2 columns">
			<?php echo $this->Form->input('Package',['disabled'=>true, 'class'=>'packagetype', 'id'=>'']);?>	
			</div>
			
			<div class="large-2 medium-2 columns">
			<?php echo $this->Form->input('Ammount',['disabled'=>true, 'class'=>'product-ammount', 'id'=>'']);?>	
			<?php echo $this->Form->input('Ammount',['disabled'=>true, 'class'=>'product-ammount-hidden', 'id'=>'','type'=>'hidden','name'=>'product_price[]','default'=>0]);?>
			</div>
			<!--<select id="DLState">-->
			<div class="large-3 medium-3 columns sup-right">	
			
			<?php
			$sup=[];
			 echo $this->Form->input('Orders.suppliers_id',['empty'=>'select supplier','options'=>$sup,'name'=>'product_supplier[]','class'=>'sup-select','required'=>true]);?>		
					
			</div>

			<div class="large-1 medium-1 columns">
				<button type="button" class="btn btn-danger btnRemove">X</button>
			</div>
		</div>
	</div>
</div>

<?php */?>
<!--/..-->
<div class="large-12 medium-12 columns" style="padding-left: 0px;padding-right: 0px;">
<div class="orders view large-4 medium-4 columns content div-top-pad-0 div-left-pad-0"><input type="date" name="del-date"></div>		
<div class="orders view large-4 medium-4 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0"><input type="text" name="del-time"></div>
<div class="orders view large-4 medium-4 columns content div-top-pad-0 div-right-pad-0"><textarea name="del-note">he</textarea></div>

<div>
       
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>







<!-- jQuery -->
<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- jQuery Multifield -->

  <?= $this->Html->script('jQueryMultifield/jquery.multifield') ?>
<script>
	$('#example-6').multifield({
		section: '.group',
		btnAdd:'#btnAdd-6',
		btnRemove:'.btnRemove'
	});
	
	
  $('select').select2();
 /* 
  $(function () {
  $('#product-list').on('change', function(e) {
    var cacheEle = $('.dynamic-fields-product-list');
    
    $(this).find('option').each(function(index, element) {
      if (element.selected) {
        if (cacheEle.find('input[name="product_name\\[' + element.value + '\\]"]').length == 0) {
        
       // alert(element.value);
          var row='<div class="group large-12 medium-12 columns prod" id="x-'+element.value+'">'+
          			'<div class="large-3 medium-3 columns prod-left">'+
          				'<input type="text" name="product_name[' + element.value + ']" value="' + element.text + '" disabled>'+
          				'<select name="product_name[]" hidden><option value="'+element.value+'" selected>'+element.text+'</option></select>'+
          			'</div>'+
          			'<div class="large-2 medium-2 columns">'+
          				'<input name="product_quantity[]" class="product-quantity" required="required" type="text">'+
          			'</div>'+
          			'<div class="large-2 medium-2 columns">'+
          				'<input name="Package" disabled="disabled" class="packagetype" id="" type="text">'+
          			'</div>'+
          			'<div class="large-2 medium-2 columns">'+
          				'<input name="Ammount" disabled="disabled" class="product-ammount" id="" type="text">'+
          			'</div>'+
          			'<div class="large-3 medium-3 columns sup-right">'+
          				'<input type="text" name="product_supplier[]">'+
          			'</div>'+
          		   '</div>';
          cacheEle.append(row)
          //cacheEle.append('<select name="product_name[]"><option value="'+element.value+'">element.text</option></select>')
        }
      }  else {
      
      //alert(element.value+"-fuck");
        var x=cacheEle.find('input[name="product_name\\[' + element.value + '\\]"]');
        x.parent().parent().remove();
        
      }
    });
  });
});
*/

</script>

<!-- Place this tag right after the last button or just before your close body tag. -->
<script async defer id="github-bjs" src="https://buttons.github.io/buttons.js"></script>
