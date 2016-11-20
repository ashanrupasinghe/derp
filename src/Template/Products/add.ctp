<div class="products form large-10 medium-10 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Add Product') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('price');
            echo $this->Form->input('package',['empty'=>'select package','options'=>$packages]);
            echo $this->Form->input('availability');
            echo $this->Form->input('image');
			//echo $suppliers;
            echo $this->Form->input('supplierId',['empty'=>'select supplier','options'=>$suppliers,'multiple'=>'multiple']);
            echo $this->Form->input('status');
			
			
			//http://stackoverflow.com/questions/32999490/how-do-i-create-a-keyvalue-pair-by-combining-having-two-fields-in-cakephp-3
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
