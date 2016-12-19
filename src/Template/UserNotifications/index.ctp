<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Notification'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userNotifications index large-9 medium-8 columns content">
    <h3><?= __('User Notifications') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('orderId') ?></th>
                <th><?= $this->Paginator->sort('userId') ?></th>
                <th><?= $this->Paginator->sort('notification') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th><?= $this->Paginator->sort('seen') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userNotifications as $userNotification): ?>
            <tr>
                <td><?= $this->Number->format($userNotification->id) ?></td>
                <td><?= $this->Number->format($userNotification->orderId) ?></td>
                <td><?= $this->Number->format($userNotification->userId) ?></td>
                <td><?= h($userNotification->notification) ?></td>
                <td><?= $this->Number->format($userNotification->type) ?></td>
                <td><?= $this->Number->format($userNotification->seen) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userNotification->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userNotification->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userNotification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userNotification->id)]) ?>
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
