<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Delivery Notification'), ['action' => 'edit', $deliveryNotification->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Delivery Notification'), ['action' => 'delete', $deliveryNotification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryNotification->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Delivery Notifications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Delivery Notification'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="deliveryNotifications view large-10 medium-10 columns content">
    <h3><?= h($deliveryNotification->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('SentFrom') ?></th>
            <td><?= h($deliveryNotification->sentFrom) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($deliveryNotification->id) ?></td>
        </tr>
        <tr>
            <th><?= __('DeliveryId') ?></th>
            <td><?= $this->Number->format($deliveryNotification->deliveryId) ?></td>
        </tr>
        <tr>
            <th><?= __('OrderId') ?></th>
            <td><?= $this->Number->format($deliveryNotification->orderId) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($deliveryNotification->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($deliveryNotification->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('NotificationText') ?></h4>
        <?= $this->Text->autoParagraph(h($deliveryNotification->notificationText)); ?>
    </div>
</div>
