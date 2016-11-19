<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Package Type'), ['action' => 'edit', $packageType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Package Type'), ['action' => 'delete', $packageType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $packageType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Package Type'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Package Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="packageType view large-9 medium-8 columns content">
    <h3><?= h($packageType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= h($packageType->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($packageType->id) ?></td>
        </tr>
    </table>
</div>
