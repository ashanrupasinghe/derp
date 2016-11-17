<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Delivery Notifications'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="deliveryNotifications form large-10 medium-10 columns content">
    <?= $this->Form->create($deliveryNotification) ?>
    <fieldset>
        <legend><?= __('Add Delivery Notification') ?></legend>
        <?php
            echo $this->Form->input('deliveryId');
            echo $this->Form->input('notificationText');
            echo $this->Form->input('sentFrom');
            echo $this->Form->input('orderId');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
