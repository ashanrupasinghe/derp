<?php
$status=['0'=>'Disabled','1'=>'Active'];
?>
<div class="customers index large-10 medium-10 columns content">
    <div class="pull-right" style="float: right;">
        <?= $this->Html->link(__('Add New Customer'), ['controller' => 'Customers', 'action' => 'add','class'=>'btn btn-default']) ?>
    </div>
    <h3><?= __('Customers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('firstName') ?></th>
                <th><?= $this->Paginator->sort('lastName') ?></th>
                <!--<th><?= $this->Paginator->sort('address') ?></th>-->
                <th><?= $this->Paginator->sort('city') ?></th>
                <!--<th><?= $this->Paginator->sort('latitude') ?></th>
                <th><?= $this->Paginator->sort('longitude') ?></th>-->
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('mobileNo') ?></th>
                <!--<th><?= $this->Paginator->sort('created') ?></th>
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
                <!--<td><?= h($customer->address) ?></td>-->
                <td><?= h($cities[$customer->city]) ?></td>
                <!--<td><?= h($customer->latitude) ?></td>
                <td><?= h($customer->longitude) ?></td>-->
                <td><?= h($customer->email) ?></td>
                <td><?= h($customer->mobileNo) ?></td>
                <!--<td><?= h($customer->created) ?></td>
                <td><?= h($customer->modified) ?></td>-->
                <td><?= h($status[$customer->status]) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customer->id],['class'=>'x-btn x-btn-primary']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id],['class'=>'x-btn x-btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id],['confirm' => __('Are you sure you want to delete # {0}?', $customer->id),'class'=>'x-btn x-btn-danger']) ?>
					<?php $cus_name=$customer->firstName.' '.$customer->lastName;?>                    
                    <?= $this->Form->postLink(__('Proceed order'), ['action' => 'check', $customer->id], ['confirm' => __('Are you sure you want to proceed an order for {0}?', $cus_name),'class'=>'x-btn x-btn-success']) ?>
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
