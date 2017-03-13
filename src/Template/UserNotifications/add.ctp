<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User Notifications'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="userNotifications form large-9 medium-8 columns content">
    <?= $this->Form->create($userNotification) ?>
    <fieldset>
        <legend><?= __('Add User Notification') ?></legend>
        <?php
            echo $this->Form->input('orderId');
            echo $this->Form->input('userId');
            echo $this->Form->input('notification');
            echo $this->Form->input('type');
            echo $this->Form->input('seen');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
