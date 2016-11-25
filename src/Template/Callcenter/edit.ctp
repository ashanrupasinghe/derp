<?php
$status = ['0'=>'Desabled','1'=>'Active'];
?>
<div class="callcenter form large-10 medium-10 columns content">
    <?= $this->Form->create($callcenter) ?>
    <fieldset>
        <legend><?= __('Edit Callcenter') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users,'empty'=>'select user']);
            echo $this->Form->input('firstName');
            echo $this->Form->input('lastName');
            echo $this->Form->input('email');
            echo $this->Form->input('address');
           // echo $this->Form->input('city');
            echo $this->Form->input('city',['options'=>$cities,'empty'=>'select city']);
            echo $this->Form->input('mobileNo');
            //$status=['1'=>'Active','0'=>'Inactive'];
            echo $this->Form->input('status',['options'=>$status,'empty'=>'select status']);

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
