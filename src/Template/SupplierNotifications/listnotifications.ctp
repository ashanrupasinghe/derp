<?php $status=['0'=>'pending','1'=>'available','2'=>'not available','3'=>'ready','4'=>'handed over'];?>
<div class="supplierNotifications index large-10 medium-10 columns content">
    <h3><?= __('Supplier Notifications') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('supplierId') ?></th>
                <th><?= $this->Paginator->sort('sentFrom') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('orderId') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($supplierNotifications as $supplierNotification): ?>
            <tr>
                <td><?= $this->Number->format($supplierNotification->id) ?></td>
                <td><?= $this->Number->format($supplierNotification->supplierId) ?></td>
                <td><?= h($supplierNotification->sentFrom) ?></td>
                <td><?= h($supplierNotification->created) ?></td>
                <td><?= h($supplierNotification->modified) ?></td>
                <td><?= $this->Number->format($supplierNotification->orderId) ?></td>
                <td><?= h($status[$supplierNotification->status_s]) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $supplierNotification->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $supplierNotification->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $supplierNotification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplierNotification->id)]) ?>
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
