<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $deliveryNotification->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryNotification->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Delivery Notifications'), ['action' => 'index']) ?></li>
    </ul>
</nav>-->
<?php
$status=['0'=>'pending', '1'=>'took all', '2'=>'delevered'];
$status_sup=['0'=>'pending', '1'=>'available', '2'=>'not available', '3'=>'ready', '4'=>'hand overed','9'=>'canceled'];
$status_del=['0'=>'pending','1'=>'took over'];
?>
<div class="deliveryNotifications form large-10 medium-10 columns content">
    <?= $this->Form->create($deliveryNotification) ?>
    <fieldset>
        <legend><?= __('Edit Delivery Notification') ?></legend>
        <?php
            echo $this->Form->input('deliveryId',['disabled'=>true]);
            echo $this->Form->input('notificationText',['disabled'=>true]);
            echo $this->Form->input('sentFrom',['disabled'=>true]);
            echo $this->Form->input('orderId',['disabled'=>true]);
            echo $this->Form->input('orderId',['type'=>'hidden']);
            echo $this->Form->input('status',['options'=>$status,'default'=>0]);
            echo "<hr>";
            ?>
            <legend><?= __('Custommer Details') ?></legend>
            <?php 
            $name=$customer['order']['customer']['firstName']." ".$customer['order']['customer']['lastName'];
            $phone=$customer['order']['customer']['mobileNo'];
            $address=$customer['order']['address'];
            
            echo $this->Form->input('CustomerName',['value'=>$name,'disabled'=>true]);
            echo $this->Form->input('CustomerAddress',['value'=>$address,'disabled'=>true]);
            echo $this->Form->input('CustomerPhoneNumber',['value'=>$phone,'disabled'=>true]);
            echo "<hr>";
        ?>
        
   
        <legend><?= __('Supplier Details') ?></legend>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= __('Supplier name') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('City') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('product name') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Supplier status') ?></th>
                <th><?= __('My Status') ?></th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($suppliers['order']['supplier_notifications'] as $supplier): 
           
            ?>                       
            <tr>
                <td><?php echo $supplier['supplier']['firstName']." ".$supplier['supplier']['lastName'];?></td>
                <td><?php echo $supplier['supplier']['address']; ?></td>
                <td><?php echo $supplier['supplier']['cid']['cname']; ?></td>
                <td><?php echo $supplier['supplier']['mobileNo']."<br>".$supplier['supplier']['contactNo'];?></td>
                
                
                <td>-</td>
                <td>-</td>
                <td><?php echo $this->Form->input('suplier status',['options'=>$status_sup,'default'=>$supplier['status_s'],'disabled'=>true]);?></td>                
                <td><?php echo $this->Form->input('my status',['options'=>$status_del,'default'=>$supplier['status_d'],'name'=>'mystatus[]']);?>
                <?php echo $this->Form->input('supid',['value'=>$supplier['id'],'default'=>$supplier['status_d'],'name'=>'supid[]','type'=>'hidden']);?>
                </td>             
            </tr>
            
            <?php endforeach; ?>
        </tbody>
    </table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
