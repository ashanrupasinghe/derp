<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Supplier Notification'), ['action' => 'edit', $supplierNotification->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Supplier Notification'), ['action' => 'delete', $supplierNotification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplierNotification->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Supplier Notifications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier Notification'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="supplierNotifications view large-10 medium-10 columns content">
    <h3><?= h($supplierNotification->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('SentFrom') ?></th>
            <td><?= h($supplierNotification->sentFrom) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($supplierNotification->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($supplierNotification->id) ?></td>
        </tr>
        <tr>
            <th><?= __('SupplierId') ?></th>
            <td><?= $this->Number->format($supplierNotification->supplierId) ?></td>
        </tr>
        <tr>
            <th><?= __('OrderId') ?></th>
            <td><?= $this->Number->format($supplierNotification->orderId) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($supplierNotification->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('NotificationText') ?></h4>
        <?= $this->Text->autoParagraph(h($supplierNotification->notificationText)); ?>
    </div>
</div>
