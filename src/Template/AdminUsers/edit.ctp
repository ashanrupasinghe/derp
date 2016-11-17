<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $adminUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $adminUser->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Admin Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="adminUsers form large-10 medium-10 columns content">
    <?= $this->Form->create($adminUser) ?>
    <fieldset>
        <legend><?= __('Edit Admin User') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
