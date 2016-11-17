<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Watchdog'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="watchdog form large-9 medium-8 columns content">
    <?= $this->Form->create($watchdog) ?>
    <fieldset>
        <legend><?= __('Add Watchdog') ?></legend>
        <?php
            echo $this->Form->input('userId');
            echo $this->Form->input('loggedIn');
            echo $this->Form->input('loggedOut');
            echo $this->Form->input('ip');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
