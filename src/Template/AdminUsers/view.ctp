<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Admin User'), ['action' => 'edit', $adminUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Admin User'), ['action' => 'delete', $adminUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adminUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Admin Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adminUsers view large-10 medium-10 columns content">
    <h3><?= h($adminUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($adminUser->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($adminUser->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($adminUser->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($adminUser->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($adminUser->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($adminUser->modified) ?></td>
        </tr>
    </table>
</div>
