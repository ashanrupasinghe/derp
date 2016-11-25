<?php
$availability=['0'=>'Not available','1'=>'Available'];
$status = ['0'=>'Desabled','1'=>'Active'];
?>
<div class="products form large-10 medium-10 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Edit Product') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('price');
            echo $this->Form->input('package',['empty'=>'select package','options'=>$packages]);
            echo $this->Form->input('availability',['options'=>$availability,'empty'=>'select availability']);
            echo $this->Form->input('image');
            //echo $this->Form->input('supplierId');
            echo $this->Form->input('supplierId',['empty'=>'select supplier','options'=>$suppliers,'multiple'=>'multiple','default'=>$current_suppliers]);
            echo $this->Form->input('status',['options'=>$status,'empty'=>'select status']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
