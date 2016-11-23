<?php
$status=['0'=>'pending','1'=>'available','2'=>'not available','3'=>'ready','4'=>'handed over'];

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
            echo $this->Form->input('notificationText',['disabled'=>true]);
            echo $this->Form->input('sentFrom',['disabled'=>true]);
            echo $this->Form->input('orderId',['disabled'=>true]);
            echo $this->Form->input('status_s',['options'=>$status]);
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
