<?php
 $status=['1'=>'pending','2'=>'supplier informed','3'=>'products ready','4'=>'delivery tookover','5'=>'delivered','6'=>'completed','9'=>'canceled'];
$payment_status=['1'=>'pending','2'=>'paid'];
?>
<div class="orders view large-10 medium-10 columns content ">
<div class="orders view large-12 medium-12 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0 ">

<h4><?= __('Order ID: '.$order->id) ?></h4>
<div class="orders view large-6 medium-6 columns content div-top-pad-0 div-left-pad-0">    
    <table class="vertical-table">
      
        
        <tr>
            <th class="td-40"><?= __('Customer Name') ?></th>
            <td><?= $this->Html->link($order->customer->firstName.' '.$order->customer->lastName, ['controller' => 'Customers', 'action' => 'view', $order->customerId])?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($order->address) ?></td>
        </tr>
  <!--      <tr>
            <th><?= __('Latitude') ?></th>
            <td><?= h($order->latitude) ?></td>
        </tr>
        <tr>
            <th><?= __('Longitude') ?></th>
            <td><?= h($order->longitude) ?></td>
        </tr>-->
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($order->cid->cname) ?></td>
        </tr>
        <tr>
            <th><?= __('Callcenter Name') ?></th>
            <?php $call_name=$order->callcenter->firstName.' '.$order->callcenter->lastName;?>
            <td><?= $this->Html->link($call_name, ['controller' => 'Callcenter', 'action' => 'view', $order->callcenterId])?></td>

        </tr>
        <tr>
            <th><?= __('Delivery name') ?></th>
            <?php $delivery_name=$order->delivery->firstName.' '.$order->delivery->lastName; ?>
            <td><?= $this->Html->link($delivery_name, ['controller' => 'Delivery', 'action' => 'view', $order->deliveryId])?></td>
        </tr>
                <tr>
            <th>&nbsp;</th>
            <td></td>
        </tr>
          <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($order->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($order->modified) ?></td>
        </tr>
        


    </table>
    </div>
    <div class="orders view large-6 medium-6 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0">
    
    <table class="vertical-table">
             
        <tr>
            <th><?= __('SubTotal') ?></th>
            <td><?= $this->Number->format($order->subTotal) ?></td>
        </tr>
        <tr>
            <th><?= __('Tax') ?></th>
            <td><?= $this->Number->format($order->tax) ?></td>
        </tr>
        <tr>
            <th><?= __('Discount') ?></th>
            <td><?= $this->Number->format($order->discount) ?></td>
        </tr>
        <tr>
            <th><?= __('CouponCode') ?></th>
            <td><?= h($order->couponCode) ?></td>
        </tr>
        <tr>
            <th><?= __('Total') ?></th>
            <td><?= $this->Number->format($order->total) ?></td>
        </tr>
         </tr>
                <tr>
            <th>&nbsp;</th>
            <td></td>
        </tr>
        <tr>
            <th ><?= __('Order Status') ?></th>
            <td><?= h($status[$order->status]) ?></td>
        </tr>
        <tr>
            <th><?= __('PaymentStatus') ?></th>
            <td><?= h($payment_status[$order->paymentStatus]) ?></td>
        </tr>
        

    </table>
    </div>
    </div>
    <div class="orders view large-12 medium-12 columns content div-left-pad-0 div-right-pad-0 div-top-pad-0">
    <h4><?= __('Products Details') ?></h4>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= __('Name') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Package') ?></th>
                <th><?= __('Supplier') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('phone') ?></th>
<!--                <th><?= __('status') ?></th>-->


            </tr>
        </thead>
        <tbody>
            <?php foreach($order->order_products as $product): 
           
            ?>                       
            <tr>
                <td><?php echo $product['product']->name;?></td>
                <td><?php echo $product['product_quantity']; ?></td>                
                <td><?php echo $product['product']->package_type->type; ?></td>
				
				<td><?php echo $this->Html->link($product['supplier']->firstName.' '.$product['supplier']->lastName, ['controller' => 'Suppliers', 'action' => 'view', $product['supplier']->id])?></td>
				<td><?php echo $product['supplier']->address.'<br><br>'.$product['supplier']->cid->cname; ?></td>
				<td><?php echo $product['supplier']->contactNo.'<br>'.$product['supplier']->mobileNo; ?></td>
                            
            </tr>
            
            <?php endforeach; ?>
        </tbody>
    <!--<div class="related">
        <h4><?= __('Related Order Products') ?></h4>
        <?php if (!empty($order->order_products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Order Id') ?></th>
                <th><?= __('Product Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($order->order_products as $orderProducts): ?>
            <tr>
                <td><?= h($orderProducts->order_id) ?></td>
                <td><?= h($orderProducts->product_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OrderProducts', 'action' => 'view', $orderProducts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OrderProducts', 'action' => 'edit', $orderProducts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderProducts', 'action' => 'delete', $orderProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderProducts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        </div>
        <?php endif; ?>
    </div>-->
</div>
