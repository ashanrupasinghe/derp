<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Delivery Notification'), ['action' => 'add']) ?></li>
    </ul>
</nav>
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
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $deliveryNotification->id,['class'=>'x-btn x-btn-primary btn btn-info btn-xs']]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deliveryNotification->id],['class'=>'x-btn x-btn-warning btn btn-warning btn-xs']) ?>
                    
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
