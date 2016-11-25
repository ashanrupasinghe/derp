<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Delivery Notification'), ['action' => 'add']) ?></li>
    </ul>
</nav>-->
<?php
$status=['0'=>'pending', '1'=>'took all', '2'=>'delevered','9'=>'canceled'];

?>
<div class="deliveryNotifications index large-10 medium-10 columns content">
    <h3><?= __('Delivery Notifications') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('deliveryId') ?></th>
                <th><?= $this->Paginator->sort('sentFrom') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('orderId') ?></th>
                <th><?= __('Ready') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deliveryNotifications as $deliveryNotification): ?>
            <tr>
                <td><?= $this->Number->format($deliveryNotification->id) ?></td>
                <td><?= $this->Number->format($deliveryNotification->deliveryId) ?></td>
                <td><?= h($deliveryNotification->sentFrom) ?></td>
                <td><?= h($deliveryNotification->created) ?></td>
                <td><?= h($deliveryNotification->modified) ?></td>
                <td><?= $this->Number->format($deliveryNotification->orderId) ?></td>
                <td><?= h($counted_data[$deliveryNotification->orderId]['ready']."/".$counted_data[$deliveryNotification->orderId]['noOfProduct']) ?></td>
                <td><?= h($status[$deliveryNotification->status]) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $deliveryNotification->id],['class'=>'x-btn x-btn-primary']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deliveryNotification->id],['class'=>'x-btn x-btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deliveryNotification->id],['confirm' => __('Are you sure you want to delete # {0}?', $deliveryNotification->id),'class'=>'x-btn x-btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
