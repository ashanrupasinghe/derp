<?php
$status=['0'=>'pending','1'=>'available','2'=>'not available','3'=>'ready','4'=>'handed over','9'=>'canceled',];

?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $supplierNotification->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $supplierNotification->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Supplier Notifications'), ['action' => 'index']) ?></li>
    </ul>
</nav>
-->
<div class="supplierNotifications form large-10 medium-10 columns content">

    <?= $this->Form->create($supplierNotification) ?>
    <fieldset>
        <legend><?= __('Edit Supplier Notification') ?></legend>
        <?php
            echo $this->Form->input('supplierId',['disabled'=>true]);
            echo $this->Form->input('supplierId',['disabled'=>false,'type'=>'hidden']);
            echo $this->Form->input('notificationText',['disabled'=>true]);
            echo $this->Form->input('sentFrom',['disabled'=>true]);
            echo $this->Form->input('orderId',['disabled'=>true]);
            echo $this->Form->input('orderId',['disabled'=>false,'type'=>'hidden']);
            //echo $this->Form->input('status',['options'=>$status]);
            
        ?>
        <legend><?= __('Supplier Details') ?></legend>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= __('Product Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Package') ?></th>
                <th><?= __('My Status') ?></th>

            </tr>
        </thead>
        <tbody>
<?php foreach($supplierNotification->supplier->order_products[0]->supplier->order_products as $product){

?>
<tr><td><?= h($product['product']['id'])?></td>
<td><?= h($product['product']['name'])?></td>
<td><?= h($product['product_quantity'])?></td>
<td><?= h($product['product']['package_type']->type)?></td>
<td><?php echo $this->Form->input('my status',['options'=>$status,'default'=>$product['status_s'],'name'=>'mystatus['.$product['product']['id'].']']);?></td></tr>
<?php }
?>
        </tbody>
	</table>
    </fieldset>
    
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
   
</div>
