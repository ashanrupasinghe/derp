<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Watchdog'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="watchdog index large-9 medium-8 columns content">
    <h3><?= __('Watchdog') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('userId') ?></th>
                <th><?= $this->Paginator->sort('loggedIn') ?></th>
                <th><?= $this->Paginator->sort('loggedOut') ?></th>
                <th><?= $this->Paginator->sort('ip') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($watchdog as $watchdog): ?>
            <tr>
                <td><?= $this->Number->format($watchdog->id) ?></td>
                <td><?= $this->Number->format($watchdog->userId) ?></td>
                <td><?= h($watchdog->loggedIn) ?></td>
                <td><?= h($watchdog->loggedOut) ?></td>
                <td><?= h($watchdog->ip) ?></td>
                <td><?= h($watchdog->created) ?></td>
                <td><?= h($watchdog->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $watchdog->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $watchdog->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $watchdog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $watchdog->id)]) ?>
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
