<div class="users form large-10 medium-10 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
        echo $this->Form->input('username');
        echo $this->Form->input('user_type', ['options' => [1=>'Admin',2=>'Callcenter','Supplier','Delivery']]);
        echo $this->Form->input('password');
        //echo $this->Form->input('remember_token');
        echo $this->Form->select('status', [
            // options with values 1 and 3 will be selected as default
            ['1'=>'Enabled','2'=>'Disabled']
        ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
