<div class="customers form large-10 medium-10 columns content">
    <?= $this->Form->create($customer) ?>
    <fieldset>
        <legend><?= __('Add Customer') ?></legend>
        <?php
            echo $this->Form->input('firstName');
            echo $this->Form->input('lastName');
            echo $this->Form->input('address');
            //echo $this->Form->input('city');
            //echo $this->Form->input('cityId',['options'=>$cities,'empty'=>'select city']);
			echo $this->Form->input('city',['options'=>$cities,'empty'=>'select city']);
            echo $this->Form->input('latitude');
            echo $this->Form->input('longitude');
            echo $this->Form->input('email');
            echo $this->Form->input('mobileNo');
            //echo $this->Form->input('status');
            $status=['1'=>'Active','0'=>'Inactive'];
            echo $this->Form->input('status',['options'=>$status,'empty'=>'select status']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
