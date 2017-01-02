<?php
 $status=['1'=>'pending','2'=>'supplier informed','3'=>'products ready','4'=>'delivery tookover','5'=>'delivered','6'=>'completed','9'=>'canceled'];
$payment_status=['1'=>'pending','2'=>'paid'];
?>

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3><?= __('Order ID: '.$order->id) ?></h3>
                  </div>
                  <div class="x_content">
				<div class="row">  
  			  <div class="orders col-lg-12 col-md-12 col-sm-12 columns content div-top-pad-0 div-left-pad-0">
	<table class="table table-hover">
		<tr>
			<td style="border-top: 0px;border-bottom: 0px;">
			<table class="table table-hover">
        <tr>
            <th class="td-40" style="border-bottom:0px"><?= __('Customer Name') ?></th>
            <td style="border-bottom:0px"><?= $this->Html->link($order->customer->firstName.' '.$order->customer->lastName, ['controller' => 'Customers', 'action' => 'view', $order->customerId])?></td>
        </tr>
        <tr>
            <th style="border-bottom:0px"><?= __('Address') ?></th>
            <td style="border-bottom:0px"><?= h($order->address) ?></td>
        </tr>
        <tr>
            <th style="border-bottom:0px"><?= __('City') ?></th>
            <td style="border-bottom:0px"><?= h($order->cid->cname) ?></td>
        </tr>
        <tr>
            <th style="border-bottom:0px"><?= __('Callcenter Name') ?></th>
            <?php $call_name=$order->callcenter->firstName.' '.$order->callcenter->lastName;?>
            <td style="border-bottom:0px"><?= $this->Html->link($call_name, ['controller' => 'Callcenter', 'action' => 'view', $order->callcenterId])?></td>

        </tr>
        <tr>
            <th style="border-bottom:0px"><?= __('Delivery name') ?></th>
            <?php $delivery_name=$order->delivery->firstName.' '.$order->delivery->lastName; ?>
            <td style="border-bottom:0px"><?= $this->Html->link($delivery_name, ['controller' => 'Delivery', 'action' => 'view', $order->deliveryId])?></td>
        </tr>
          <tr>
            <th style="border-bottom:0px"><?= __('Created') ?></th>
            <td style="border-bottom:0px"><?= h($order->created) ?></td>
        </tr>
        <tr>
            <th style="border-bottom:0px"><?= __('Modified') ?></th>
            <td style="border-bottom:0px"><?= h($order->modified) ?></td>
        </tr>
        


    </table>
			</td>
			<td style="border-top: 0px;border-bottom: 0px;">
			<table class="table table-hover">
		<tr>
            <th style="border-bottom:0px"><?= __('SubTotal') ?></th>
            <td style="border-bottom:0px"><?= $this->Number->format($order->subTotal) ?></td>
        </tr>
        <tr>
            <th style="border-bottom:0px"><?= __('Tax') ?></th>
            <td style="border-bottom:0px"><?= $this->Number->format($order->tax) ?></td>
        </tr>
        <tr>
            <th style="border-bottom:0px"><?= __('Discount') ?></th>
            <td style="border-bottom:0px"><?= $this->Number->format($order->discount) ?></td>
        </tr>
        <tr>
            <th style="border-bottom:0px"><?= __('CouponCode') ?></th>
            <td style="border-bottom:0px"><?= h($order->couponCode) ?></td>
        </tr>
        <tr>
            <th style="border-bottom:0px"><?= __('Total') ?></th>
            <td style="border-bottom:0px"><?= $this->Number->format($order->total) ?></td>
        </tr>
                        
        <tr>
            <th style="border-bottom:0px"><?= __('Order Status') ?></th>
            <td style="border-bottom:0px"><?= h($status[$order->status]) ?></td>
        </tr>
        <tr>
            <th style="border-bottom:0px"><?= __('PaymentStatus') ?></th>
            <td style="border-bottom:0px"><?= h($payment_status[$order->paymentStatus]) ?></td>
        </tr>
		</table>
			</td>
		</tr>
		<tr><td style="border-top: 0px;border-bottom: 0px;"><h4><?= __('Product Details') ?></h4></td><td style="border-top: 0px;border-bottom: 0px;"></td></tr>
		<tr>
			<td colspan="2">
			<table class="table table-hover">
                      <thead>
                        <tr>
                          <th><?= __('Name') ?></th>
                <th style="border-bottom:0px"><?= __('Quantity') ?></th>
                <th style="border-bottom:0px"><?= __('Package') ?></th>
                <th style="border-bottom:0px"><?= __('Supplier') ?></th>
                <th style="border-bottom:0px"><?= __('Address') ?></th>
                <th style="border-bottom:0px"><?= __('phone') ?></th>
<!--                <th><?= __('status') ?></th>-->
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($order->order_products as $product): 
           
            ?>                       
            <tr>
                <td style="border-bottom:0px"><?php echo $product['product']->name;?></td>
                <td style="border-bottom:0px"><?php echo $product['product_quantity']; ?></td>                
                <td style="border-bottom:0px"><?php echo $product['product']->package_type->type; ?></td>
				
				<td style="border-bottom:0px"><?php echo $this->Html->link($product['supplier']->firstName.' '.$product['supplier']->lastName, ['controller' => 'Suppliers', 'action' => 'view', $product['supplier']->id])?></td>
				<td style="border-bottom:0px"><?php echo $product['supplier']->address.'<br><br>'.$product['supplier']->cid->cname; ?></td>
				<td style="border-bottom:0px"><?php echo $product['supplier']->contactNo.'<br>'.$product['supplier']->mobileNo; ?></td>
                            
            </tr>
            
            <?php endforeach; ?>
                      </tbody>
                    </table>
			</td>
		</tr>
	</table>
	</div>
	</div>
                </div>
 </div>
 </div>
 