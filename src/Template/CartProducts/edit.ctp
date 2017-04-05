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
                ['action' => 'delete', $cartProduct->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cartProduct->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cart Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cartProducts form large-9 medium-8 columns content">
    <?= $this->Form->create($cartProduct) ?>
    <fieldset>
        <legend><?= __('Edit Cart Product') ?></legend>
        <?php
            echo $this->Form->control('cart_id');
            echo $this->Form->control('product_id', ['options' => $products]);
            echo $this->Form->control('qty');
            echo $this->Form->control('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>