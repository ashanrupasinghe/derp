<!-- File: src/Template/Users/login.ctp -->
<div class="large-4 medium-4 columns">
&nbsp;
</div>
<div class="large-4 medium-4 columns">

<div class="users form" style="margin-top:150px;">
<?= $this->Flash->render('auth') ?>
<?php echo $this->Form->create('User'); ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
        <?= $this->Form->button(__('Login'),['style'=>'width:100%']); ?>
    </fieldset>

<?= $this->Form->end() ?>
</div>
</div>

<div class="large-2 medium-2 columns">
</div>


