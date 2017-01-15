<?php
$status=['0'=>'pending','1'=>'available','2'=>'not available','3'=>'ready','4'=>'handed over','9'=>'canceled',];
//butons activate or disabled
$submit_display='';
$toggle_activity="";
?>
<?= $this->Form->create($supplierNotification,['class'=>'form-horizontal form-label-left']) ?>
<div class="row">
	
	<!--<div class="col-md-7 col-sm-7 col-xs-12">-->
	<?php echo $this->Form->input('supplierId',['disabled'=>false,'type'=>'hidden']); ?>
<?php echo $this->Form->input('orderId',['disabled'=>false,'type'=>'hidden']); ?>
	<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= __('Notification ID: '.$supplierNotification->id) ?> <small><?= __('product details for EDIT') ?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				  
				  
                  <?= $this->Form->create($supplierNotification,['class'=>'form-horizontal form-label-left']) ?>

  			  		<table class="table table-hover">
                      <thead>
                        <tr>
                          <th><?= __('Product Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Quantity') ?></th>
                <!--<th><?= __('Package') ?></th>-->
                <th><?= __('My Status') ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
foreach($supplierNotification->supplier->order_products as $product){
?>
<tr><td><?= h($product['product']['id'])?></td>
<td><?= h($product['product']['name'])?><br>
<?php if($product['product']['name_si']!=null){?><?= h($product['product']['name_si'])?><?php } ?><br>
<?php if($product['product']['name_ta']!=null){?><?= h($product['product']['name_ta'])?><?php } ?></td>
<td><?= h($product['product_quantity'])?></td>
<!--<td><?= h($product['product']['package_type']->type)?></td>-->
<td>

<?php
/*set radio button value
0,1,3,4,9 status available
2 status not available
*/
?>

<?php // echo $this->Form->input('my status',['label' => false,'options'=>$status,'default'=>$product['status_s'],'name'=>'mystatus['.$product['product']['id'].']']);?>
<?php
if($product['status_s']>0){
$toggle_activity="disabled";
$submit_display='none;';
}
?>
<?php if($product['status_s']==0){?>
<input <?=$toggle_activity?> class="tog supp" data-on="Available" data-off="Not available" data-size="small" <?php if($product['status_s']!=2){echo "checked";} ?> data-toggle="toggle" data-onstyle="success" data-offstyle="danger" type="checkbox" name='mystatus_toggle[<?=$product['product']['id']?>]' id='mystatus_toggle[<?=$product['product']['id']?>]' class="tog-data">
<input value="<?php if($product['status_s']==2){ echo 2;}else{echo 1;} ?>" type="hidden" name='mystatus[<?=$product['product']['id']?>]' id='mystatus[<?=$product['product']['id']?>]'>

<?php }else{
 echo $status[$product['status_s']];
 }?>
</td>

</tr>

<?php }
?>
                      </tbody>
                    </table>
  			  		
  			  		
  			  		<div class="ln_solid"></div>
    				  <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                          
                             <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success', 'style'=>'display:'.$submit_display]) ?>
                        </div>
                      </div>
    
  			  		
                  </div>
                </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
						<div class="row">
						<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
						<?= h('Order Id: ') ?><?= h($supplierNotification->order->id) ?>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
						<?= h('Delivery Date: ') ?>	<?= h($supplierNotification->order->delivery_date_time) ?>
					</div>
						<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
						<?= h('Supplier Notes: ') ?><?= h($supplierNotification->order->supplier_note) ?>
						</div>
					
				  </div>
		
  			  		
                  </div>
                </div>
</div>
	
	<!--</div>-->
</div>

<?= $this->Form->end() ?>



