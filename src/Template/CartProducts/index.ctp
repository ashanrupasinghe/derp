<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cart Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cartProducts index large-9 medium-8 columns content">
    <h3><?= __('Cart Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cart_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('qty') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cartProducts as $cartProduct): ?>
            <tr>
                <td><?= $this->Number->format($cartProduct->id) ?></td>
                <td><?= $this->Number->format($cartProduct->cart_id) ?></td>
                <td><?= $cartProduct->has('product') ? $this->Html->link($cartProduct->product->name, ['controller' => 'Products', 'action' => 'view', $cartProduct->product->id]) : '' ?></td>
                <td><?= $this->Number->format($cartProduct->qty) ?></td>
                <td><?= $this->Number->format($cartProduct->type) ?></td>
                <td><?= h($cartProduct->created) ?></td>
                <td><?= h($cartProduct->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cartProduct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cartProduct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cartProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cartProduct->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
