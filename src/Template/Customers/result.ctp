	<div class="customers index large-10 medium-10 columns content">

<div class="form-x">
   <?= $this->Form->create(null, ['url' => ['action' => 'result']]) ?>
   <div class="large-12 medium-12 columns content">
    <fieldset>
        <legend><?= __('Search Customer') ?></legend>
        <?php
            echo $this->Form->input('Phone/ Name',['name'=>'s','id'=>'s','style'=>'float: left;max-width: 80%;height: 100px;font-size: 50pt;']);            
        ?>
        <?= $this->Form->button(__('Search'),['style'=>'float:right;float: right;height: 100px;font-size: 30px;']) ?>
    </fieldset>
    </div>
    
    <?= $this->Form->end() ?>
</div> 
   
<div class="table">
<div class="large-12 medium-12 columns content">
    <div class="pull-right" style="float: right;">
        <?= $this->Html->link(__('Add New Customer'), ['controller' => 'Customers', 'action' => 'add','class'=>'btn btn-default']) ?>
    </div>
    <h3><?= __('Search Result for: '.$s) ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('firstName') ?></th>
                <th><?= $this->Paginator->sort('lastName') ?></th>
                <th><?= $this->Paginator->sort('address') ?></th>
                <th><?= $this->Paginator->sort('city') ?></th>
               <!-- <th><?= $this->Paginator->sort('latitude') ?></th>
                <th><?= $this->Paginator->sort('longitude') ?></th>-->
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('mobileNo') ?></th>
               <!-- <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>-->
                <th><?= $this->Paginator->sort('status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= $this->Number->format($customer->id) ?></td>
                <td><?= h($customer->firstName) ?></td>
                <td><?= h($customer->lastName) ?></td>
                <td><?= h($customer->address) ?></td>
                <td><?= $this->Number->format($customer->city) ?></td>
                <!--<td><?= h($customer->latitude) ?></td>
                <td><?= h($customer->longitude) ?></td>-->
                <td><?= h($customer->email) ?></td>
                <td><?= h($customer->mobileNo) ?></td>
               <!-- <td><?= h($customer->created) ?></td>
                <td><?= h($customer->modified) ?></td>-->
                <td><?= h($customer->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customer->id]) ?>               
                    
                    <?= $this->Form->postLink(__('Proceed order'), ['action' => 'check', $customer->id], ['confirm' => __('Are you sure you want to proceed an order for {0} {1}?', $customer->firstName,$customer->lastName)]) ?>
                    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
    </div>
</div>    
</div>
