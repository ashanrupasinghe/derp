<?php
//$availability=['0'=>'Not available','1'=>'Available'];
$user_role=[1=>'Admin',2=>'Callcenter','Supplier','Delivery'];
$status = ['0'=>'Desabled','1'=>'Active'];
?>
<div class="users form large-10 medium-10 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('user_type',['options' =>$user_role,'empty'=>'select user type']);
            echo $this->Form->input('password');
            //echo $this->Form->input('remember_token');
            echo $this->Form->input('status', ['options'=>$status,'empty'=>'select status']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
