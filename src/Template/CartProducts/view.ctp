<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cart Product'), ['action' => 'edit', $cartProduct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cart Product'), ['action' => 'delete', $cartProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cartProduct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cart Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cart Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cartProducts view large-9 medium-8 columns content">
    <h3><?= h($cartProduct->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $cartProduct->has('product') ? $this->Html->link($cartProduct->product->name, ['controller' => 'Products', 'action' => 'view', $cartProduct->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cartProduct->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cart Id') ?></th>
            <td><?= $this->Number->format($cartProduct->cart_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Qty') ?></th>
            <td><?= $this->Number->format($cartProduct->qty) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $this->Number->format($cartProduct->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cartProduct->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($cartProduct->modified) ?></td>
        </tr>
    </table>
</div>
