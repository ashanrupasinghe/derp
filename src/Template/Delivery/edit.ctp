<div class="delivery form large-10 medium-10 columns content">
    <?= $this->Form->create($delivery) ?>
    <fieldset>
        <legend><?= __('Edit Delivery') ?></legend>
        <?php
            //echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('user_id', ['options' => $users,'empty'=>'select user']);
            echo $this->Form->input('firstName');
            echo $this->Form->input('lastName');
            echo $this->Form->input('email');
            echo $this->Form->input('address');
            //echo $this->Form->input('city');
            echo $this->Form->input('city',['options'=>$cities,'empty'=>'select city']);
            echo $this->Form->input('latitude');
            echo $this->Form->input('longitude');
            echo $this->Form->input('mobileNo');
            echo $this->Form->input('vehicleNo');
            echo $this->Form->input('companyName');
            //echo $this->Form->input('status');
            $status=['1'=>'Active','0'=>'Inactive'];
            echo $this->Form->input('status',['options'=>$status,'empty'=>'select status']);
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
