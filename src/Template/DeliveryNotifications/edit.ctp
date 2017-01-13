<?php
//$status=['0'=>'pending', '1'=>'took all', '2'=>'delevered'];
 $status=['1'=>'pending','2'=>'supplier informed','3'=>'products ready','4'=>'delivery tookover','5'=>'delivered','6'=>'completed',7=>'driver informed','9'=>'canceled'];
$status_sup=['0'=>'pending', '1'=>'available', '2'=>'not available', '3'=>'ready', '4'=>'hand overed','9'=>'canceled'];
$status_del=['0'=>'pending','1'=>'took over'];

//butons activate or disabled

if($customer['order']['status']==5||$customer['order']['status']==6||$customer['order']['status']==9){
$toggle_activity="disabled";
$submit_activity=true;
}
else{
$toggle_activity="";
$submit_activity=false;
}
?>
<?= $this->Form->create($deliveryNotification,['class'=>'form-horizontal form-label-left']) ?>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= __('Notification ID: '.$deliveryNotification->id) ?> <small><?= __('order details') ?></small></h2>
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
                  
                                                                               <div class="form-group">
                                                                  <label class="control-label col-md-5 col-sm-5 col-xs-12" for="deliveryId">Delivery Id<span class="required">*</span></label>                        
						<div class="col-md-7 col-sm-7 col-xs-12">                          
                          <?php echo $this->Form->input('deliveryId',['label' => false,'class'=>'form-control col-md-7 col-xs-12','disabled'=>true]);?>                          
                        </div>
                      </div> 
                      
                                                                                                     <div class="form-group">
                                                                  <label class="control-label col-md-5 col-sm-5 col-xs-12" for="notificationText">Notification Text<span class="required">*</span></label>                        
						<div class="col-md-7 col-sm-7 col-xs-12">                          
                          <?php echo $this->Form->input('notificationText',['label' => false,'class'=>'form-control col-md-7 col-xs-12','disabled'=>true,'rows'=>2]);?>                          
                        </div>
                      </div> 
                      
                                                                                                     <div class="form-group">
                                                                  <label class="control-label col-md-5 col-sm-5 col-xs-12" for="sentFrom">Sent From <span class="required">*</span></label>                        
						<div class="col-md-7 col-sm-7 col-xs-12">                          
                          <?php echo $this->Form->input('sentFrom',['label' => false,'class'=>'form-control col-md-7 col-xs-12','disabled'=>true]);?>                          
                        </div>
                      </div> 
                      
                                                                                                     <div class="form-group">
                                                                  <label class="control-label col-md-5 col-sm-5 col-xs-12" for="orderId">Order Id<span class="required">*</span></label>                        
						<div class="col-md-7 col-sm-7 col-xs-12">                          
                          <?php echo $this->Form->input('orderId',['label' => false,'class'=>'form-control col-md-7 col-xs-12','disabled'=>true]);?>                          
                        </div>
                      </div> 
                      
                      <div class="form-group">
                                                                  <label class="control-label col-md-5 col-sm-5 col-xs-12" for="orderId">Delivery Date</span></label>                        
						<div class="col-md-7 col-sm-7 col-xs-12">                          
                          <?php echo $this->Form->input('deliveryDate',['label' => false,'class'=>'form-control col-md-7 col-xs-12','disabled'=>true,'value'=>$deliveryNotification['order']->delivery_date_time]);?>                          
                        </div>
                      </div> 
                      
                      <div class="form-group">
                                                                  <label class="control-label col-md-5 col-sm-5 col-xs-12" for="orderId"><?= __('Total') ?> <small>&#40;<?= __('available products') ?>&#41;</small></label>                        
						<div class="col-md-7 col-sm-7 col-xs-12">
						<?php $totl=$this->Number->currency($total_pdf['available'],'LKR');?>                          
                          <?php echo $this->Form->input('total',['label' => false,'class'=>'form-control col-md-7 col-xs-12','disabled'=>true,'value'=>$totl]);?>                          
                        </div>
                      </div>                  
                  

            <?php echo $this->Form->input('orderId',['type'=>'hidden']); ?>
            
            
            
            
                                                                                                             <div class="form-group">
                                                                  <label class="control-label col-md-5 col-sm-5 col-xs-12" for="Order_Status">Order Status<span class="required">*</span></label>                        
						<div class="col-md-7 col-sm-7 col-xs-12">                          
                          <?php //echo $this->Form->input('Order_Status',['label' => false,'options'=>$status,'default'=>0,'value'=>$customer['order']['status'],'class'=>'form-control col-md-7 col-xs-12']);?>
                          
                          <input <?= $toggle_activity ?> class="tog del" data-on="Collected" data-off="Delivered" data-size="small" <?php if(!($customer['order']['status']==5||$customer['order']['status']==6)){echo "checked";} ?> data-toggle="toggle" data-onstyle="info" data-offstyle="warning" type="checkbox" name='order_Status_toggle' id='' class="order_Status_toggle">
							<input value="<?php if(!($customer['order']['status']==5||$customer['order']['status']==6)){echo 4;}else{ echo 5;} ?>" type="hidden" name='Order_Status' id='Order_Status'>
                                                    
                        </div>
                      </div> 
                  
                  
                  
  			  		
                  </div>
                </div>
</div>

</div>

<div class="col-md-6 col-sm-6 col-xs-12">


<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= __('Notification ID: '.$deliveryNotification->id) ?> <small><?= __('customer details') ?></small></h2>
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
                  
                  
                  
                  
                  <?php 
            $name=$customer['order']['customer']['firstName']." ".$customer['order']['customer']['lastName'];
            $phone=$customer['order']['customer']['mobileNo'];
            $address=$customer['order']['address'];
            $city=$customer['order']['cid']['cname'];
            $email=$customer['order']['customer']['email'];
            ?>
            
                                                                     <div class="form-group">
                                                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="CustomerName">Name<span class="required">*</span></label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">                          
                          <?php echo $this->Form->input('CustomerName',['value'=>$name,'label' => false,'class'=>'form-control col-md-7 col-xs-12','disabled'=>true]);?>                          
                        </div>
                      </div> 
                      
                                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="CustomerAddress">Address<span class="required">*</span></label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">                          
                          <?php echo $this->Form->input('CustomerAddress',['value'=>$address,'label' => false,'class'=>'form-control col-md-7 col-xs-12','disabled'=>true]);?>                          
                        </div>
                      </div> 
                      
                      <div class="form-group">
                                                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">City<span class="required">*</span></label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">                          
                          <?php echo $this->Form->input('city',['value'=>$city,'label' => false,'class'=>'form-control col-md-7 col-xs-12','disabled'=>true]);?>                          
                        </div>
                      </div> 
                      
                                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="CustomerPhoneNumber">Phone<span class="required">*</span></label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">                          
                          <?php echo $this->Form->input('CustomerPhoneNumber',['value'=>$phone,'label' => false,'class'=>'form-control col-md-7 col-xs-12','disabled'=>true]);?>                          
                        </div>
                      </div> 
                      
                                                                               <div class="form-group">
                                                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="required">*</span></label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">                          
                          <?php echo $this->Form->input('email',['value'=>$email,'label' => false,'class'=>'form-control col-md-7 col-xs-12','disabled'=>true]);?>                          
                        </div>
                      </div> 
                      <hr>
                      <div class="form-group">
                                                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Delivery Note</label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">                          
                                                   <span class=""><?= $deliveryNotification['order']->note ?></span> 
                        </div>
                      </div>
                      
                      

            
        
                  
                  
  			  		
                  </div>
                </div>
</div>


</div>
</div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= __('Notification ID: '.$deliveryNotification->id) ?> <small><?= __('Supplier details for EDIT') ?></small></h2>
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
  			  		<table class="table table-hover">
                      <thead>
                        <tr>
                          <th><?= __('Supplier name') ?></th>
                <th><?= __('Address') ?></th>
                <!--<th><?= __('City') ?></th>-->
                <th><?= __('Phone') ?></th>
                <th><?= __('product name') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Package')?></th>
                <?php /*?>
                <th><?= __('Supplier status') ?></th>
                <th><?= __('My Status') ?></th>
                */ ?>
                
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($suppliers['order']['order_products'] as $supplier): 
           
            ?>                       
            <tr>
                <td><?php echo $supplier['supplier']['firstName']." ".$supplier['supplier']['lastName'];?></td>
                <td><?php echo $supplier['supplier']['address']."<br><br>".$supplier['supplier']['cid']['cname']; ?></td>
                <!--<td><?php echo $supplier['supplier']['cid']['cname']; ?></td>-->
                <td><?php echo $supplier['supplier']['mobileNo']."<br>".$supplier['supplier']['contactNo'];?></td>
                <td><?php echo $supplier['product']['name']; ?><br>
                <?php if($supplier['product']['name_si']!=null){ echo $supplier['product']['name_si'];} ?><br>
                <?php if($supplier['product']['name_ta']!=null){echo $supplier['product']['name_ta'];} ?></td>
                <td><?php echo $supplier['product_quantity']; ?></td>
                <td><?php echo $supplier['product']['package_type']['type']; ?></td>
                <?php echo $this->Form->input('supid',['value'=>$supplier['product']['id'],'name'=>'productid[]','type'=>'hidden']);?>
                <?php /*?>
                <td><?php echo $this->Form->input('suplier status',['label' => false,'options'=>$status_sup,'default'=>$supplier['status_s'],'disabled'=>true]);?></td>                
                <td><?php echo $this->Form->input('my status',['label' => false,'options'=>$status_del,'default'=>$supplier['status_d'],'name'=>'mystatus[]']);?>                
                </td>
                <?php */?>             
            </tr>
            
            <?php endforeach; ?>
                      </tbody>
                    </table>
                    
                    <div class="ln_solid"></div>
    				  <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                          
                             <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success','disabled'=>$submit_activity]) ?>
                        </div>                        
                      </div>
                  </div>
                </div>
</div>

</div>
</div>


    <?= $this->Form->end() ?>

