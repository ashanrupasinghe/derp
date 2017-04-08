<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Unavailabledate'), ['action' => 'edit', $unavailabledate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Unavailabledate'), ['action' => 'delete', $unavailabledate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $unavailabledate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Unavailabledate'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unavailabledate'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="unavailabledate view large-9 medium-8 columns content">
    <h3><?= h($unavailabledate->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($unavailabledate->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($unavailabledate->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($unavailabledate->created_at) ?></td>
        </tr>
    </table>
</div>
