<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Package Type'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="packageType index large-9 medium-8 columns content">
    <h3><?= __('Package Type') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($packageType as $packageType): ?>
            <tr>
                <td><?= $this->Number->format($packageType->id) ?></td>
                <td><?= h($packageType->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $packageType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $packageType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $packageType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $packageType->id)]) ?>
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
