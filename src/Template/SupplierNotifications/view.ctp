<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Supplier Notification'), ['action' => 'edit', $supplierNotification->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Supplier Notification'), ['action' => 'delete', $supplierNotification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplierNotification->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Supplier Notifications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier Notification'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
-->
<?php
$status=['0'=>'pending', '1'=>'took all', '2'=>'delevered'];
$status_sup=['0'=>'pending', '1'=>'available', '2'=>'not available', '3'=>'ready', '4'=>'hand overed','9'=>'canceled'];
$status_del=['0'=>'pending','1'=>'took over'];
?>
<div class="supplierNotifications view large-10 medium-10 columns content">
<div class="orders view large-12 medium-12 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0 ">
    
<div class="orders view large-4 medium-4 columns content div-top-pad-0 div-left-pad-0">
<h4><?= __('Notification ID: '.$supplierNotification->id) ?></h4>     
    <table class="vertical-table">
   		<tr>
            <th><?= __('OrderId') ?></th>
            <td><?= $this->Number->format($supplierNotification->orderId) ?></td>
        </tr>
        <tr>
            <th><?= __('SentFrom') ?></th>
            <td><?= h($supplierNotification->sentFrom) ?></td>
        </tr>
        
<!--        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($supplierNotification->id) ?></td>
        </tr>-->
<!--        <tr>
            <th><?= __('SupplierId') ?></th>
            <td><?= $this->Number->format($supplierNotification->supplierId) ?></td>
        </tr>-->

        <tr>
            <th><?= __('NotificationText') ?></th>
            <td><?= h($supplierNotification->notificationText); ?></td>
        </tr>
                <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($supplierNotification->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($supplierNotification->modified) ?></td>
        </tr>
    </table>
</div>  
<div class="orders view large-8 medium-8 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0">   
<h4><?= __('Product Details') ?></h4>     
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= __('ID') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Package') ?></th>
                <th><?= __('MyStatus') ?></th>
                <th><?= __('DelStatus') ?></th>
            </tr>
        </thead>
        <tbody>
<?php        
//print '<pre>';
//print_r($supplierNotification->supplier->order_products[0]->supplier->order_products);
foreach($supplierNotification->supplier->order_products[0]->supplier->order_products as $product){

?>


<tr><td><?= h($product['product']['id'])?></td>
<td><?= h($product['product']['name'])?></td>
<td><?= h($product['product_quantity'])?></td>
<td><?= h($product['product']['package_type']->type)?></td>
<td><?= h($status_sup[$product['status_s']])?></td>
<td><?= h($status_del[$product['status_d']])?></td></tr>

<?php }
?>


        </tbody>
    </table>
</div>  
<!--    <div class="row">
        <h4><?= __('NotificationText') ?></h4>
        <?= $this->Text->autoParagraph(h($supplierNotification->notificationText)); ?>
    </div> -->
</div>
</div>