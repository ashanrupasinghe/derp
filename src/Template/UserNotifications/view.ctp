<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Notification'), ['action' => 'edit', $userNotification->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Notification'), ['action' => 'delete', $userNotification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userNotification->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Notifications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Notification'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userNotifications view large-9 medium-8 columns content">
    <h3><?= h($userNotification->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Notification') ?></th>
            <td><?= h($userNotification->notification) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($userNotification->id) ?></td>
        </tr>
        <tr>
            <th><?= __('OrderId') ?></th>
            <td><?= $this->Number->format($userNotification->orderId) ?></td>
        </tr>
        <tr>
            <th><?= __('UserId') ?></th>
            <td><?= $this->Number->format($userNotification->userId) ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= $this->Number->format($userNotification->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Seen') ?></th>
            <td><?= $this->Number->format($userNotification->seen) ?></td>
        </tr>
    </table>
</div>
