<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Watchdog'), ['action' => 'edit', $watchdog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Watchdog'), ['action' => 'delete', $watchdog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $watchdog->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Watchdog'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Watchdog'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="watchdog view large-9 medium-8 columns content">
    <h3><?= h($watchdog->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('LoggedIn') ?></th>
            <td><?= h($watchdog->loggedIn) ?></td>
        </tr>
        <tr>
            <th><?= __('LoggedOut') ?></th>
            <td><?= h($watchdog->loggedOut) ?></td>
        </tr>
        <tr>
            <th><?= __('Ip') ?></th>
            <td><?= h($watchdog->ip) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($watchdog->id) ?></td>
        </tr>
        <tr>
            <th><?= __('UserId') ?></th>
            <td><?= $this->Number->format($watchdog->userId) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($watchdog->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($watchdog->modified) ?></td>
        </tr>
    </table>
</div>
