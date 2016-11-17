<div class="customers form large-10 medium-10 columns content">
    <?= $this->Form->create(null, ['url' => ['action' => 'result']]) ?>
    
    <fieldset>
        <legend><?= __('Search Customer') ?></legend>
        <div class="large-10 medium-10 columns content">
        <?php
            echo $this->Form->input('Phone/ Name',['name'=>'s','id'=>'s','class'=>'big-search','style'=>'height: 100px;font-size: 80pt;']);            
        ?>
         </div>
        <div class="large-2 medium-2 columns content">
    <?= $this->Form->button(__('Search'),['style'=>'margin-top: 20px;height: 100px;padding-left: 45px;padding-right: 45px;']) ?>
   </div>
    
    </fieldset>
    
    
    <?= $this->Form->end() ?>
</div>
