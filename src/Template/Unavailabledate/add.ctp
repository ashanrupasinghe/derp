<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Unavailabledate'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="unavailabledate form large-9 medium-8 columns content">
    <?= $this->Form->create($unavailabledate) ?>
    <fieldset>
        <legend><?= __('Add Unavailabledate') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('created_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
