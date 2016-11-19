<div class="products form large-10 medium-10 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Edit Product') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('price');
            echo $this->Form->input('package',['empty'=>'select package','options'=>$packages]);
            echo $this->Form->input('availability');
            echo $this->Form->input('image');
            //echo $this->Form->input('supplierId');
            echo $this->Form->input('supplierId',['empty'=>'select supplier','options'=>$suppliers]);
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
