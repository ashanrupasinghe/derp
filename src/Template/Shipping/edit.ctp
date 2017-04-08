<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $shipping->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $shipping->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Shipping'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="shipping form large-9 medium-8 columns content">
    <?= $this->Form->create($shipping) ?>
    <fieldset>
        <legend><?= __('Edit Shipping') ?></legend>
        <?php
            echo $this->Form->control('cart_id');
            echo $this->Form->control('order_id', ['options' => $orders, 'empty' => true]);
            echo $this->Form->control('address');
            echo $this->Form->control('phone');
            echo $this->Form->control('delivery_time');
            echo $this->Form->control('delivery_date');
            echo $this->Form->control('delivery_date_time');
            echo $this->Form->control('note');
            echo $this->Form->control('created_at');
            echo $this->Form->control('modified_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
