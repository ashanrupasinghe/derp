<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Delivery Notification'), ['action' => 'edit', $deliveryNotification->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Delivery Notification'), ['action' => 'delete', $deliveryNotification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryNotification->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Delivery Notifications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Delivery Notification'), ['action' => 'add']) ?> </li>
    </ul>
</nav>-->
<?php
$status=['0'=>'pending', '1'=>'took all', '2'=>'delevered'];
$status_sup=['0'=>'pending', '1'=>'available', '2'=>'not available', '3'=>'ready', '4'=>'hand overed','9'=>'canceled'];
$status_del=['0'=>'pending','1'=>'took over'];
?>
<div class="deliveryNotifications view large-10 medium-10 columns content">
<div class="orders view large-12 medium-12 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0 ">
<div class="orders view large-6 medium-6 columns content div-top-pad-0 div-left-pad-0">  
    <h4><?= __('Delivery Notification ID: '.$deliveryNotification->id) ?></h4>
    <table class="vertical-table">
                <tr>
            <th><?= __('OrderId') ?></th>
            <td><?= $this->Number->format($deliveryNotification->orderId) ?></td>
        </tr>
        <tr>
            <th><?= __('SentFrom') ?></th>
            <td><?= h($deliveryNotification->sentFrom) ?></td>
        </tr>
        <!--<tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($deliveryNotification->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Notification DeliveryId') ?></th>
            <td><?= $this->Number->format($deliveryNotification->deliveryId) ?></td>
        </tr>-->

        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($deliveryNotification->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($deliveryNotification->modified) ?></td>
        </tr>
        <tr>
        <th><?= __('NotificationText') ?></th>
        <td><?= h($deliveryNotification->notificationText); ?></td>
        </tr>
    </table>
</div>    
<div class="orders view large-6 medium-6 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0">

    <h4><?= __('Customer Details') ?></h4>
    <table class="vertical-table">
    <?php
    $name=$customer['order']['customer']['firstName']." ".$customer['order']['customer']['lastName'];
            $phone=$customer['order']['customer']['mobileNo'];
            $address=$customer['order']['address'];
            $city=$customer['order']['cid']['cname'];
            $email=$customer['order']['customer']['email'];
            
    ?>
    <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($name) ?></td>
        </tr>
     <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($address) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($city) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($email) ?></td>
        </tr>   
    </table>
</div>
</div>
<div class="orders view large-12 medium-12 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0 ">
<h4><?= __('Supplier Details') ?></h4>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= __('Supplier name') ?></th>
                <th><?= __('Address') ?></th>
                <!--<th><?= __('City') ?></th>-->
                <th><?= __('Phone') ?></th>
                <th><?= __('product name') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Package')?></th>
                <th><?= __('Supplier status') ?></th>
                <th><?= __('My Status') ?></th>

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
                <td><?php echo $supplier['product']['name']; ?></td>
                <td><?php echo $supplier['product_quantity']; ?></td>
                <td><?php echo $supplier['product']['package_type']['type']; ?></td>
                <td><?php echo $this->Form->input('suplier status',['options'=>$status_sup,'default'=>$supplier['status_s'],'disabled'=>true,'disabled'=>true]);?></td>                
                <td><?php echo $this->Form->input('my status',['options'=>$status_del,'default'=>$supplier['status_d'],'name'=>'mystatus[]','disabled'=>true]);?>
                
                </td>             
            </tr>
            
            <?php endforeach; ?>
        </tbody>
    </table> 
    </div>   
</div>
