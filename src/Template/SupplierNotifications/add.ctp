<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Supplier Notifications'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="supplierNotifications form large-10 medium-10 columns content">
    <?= $this->Form->create($supplierNotification) ?>
    <fieldset>
        <legend><?= __('Add Supplier Notification') ?></legend>
        <?php
            echo $this->Form->input('supplierId');
            echo $this->Form->input('notificationText');
            echo $this->Form->input('sentFrom');
            echo $this->Form->input('orderId');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
