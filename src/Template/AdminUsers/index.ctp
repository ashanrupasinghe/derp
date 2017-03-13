<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Admin User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adminUsers index large-10 medium-10 columns content">
    <h3><?= __('Admin Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('username') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('password') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adminUsers as $adminUser): ?>
            <tr>
                <td><?= $this->Number->format($adminUser->id) ?></td>
                <td><?= h($adminUser->username) ?></td>
                <td><?= h($adminUser->email) ?></td>
                <td><?= h($adminUser->password) ?></td>
                <td><?= h($adminUser->created) ?></td>
                <td><?= h($adminUser->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $adminUser->id],['class'=>'x-btn x-btn-primary']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adminUser->id],['class'=>'x-btn x-btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adminUser->id],['class'=>'x-btn x-btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $adminUser->id)]) ?>
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
