<?php
$status = ['0'=>'Desabled','1'=>'Active'];
?>
<div class="delivery index large-10 medium-10 columns content">
    <div class="pull-right" style="float: right;">
        <?= $this->Html->link(__('Add New Delivery Staff'), ['controller' => 'Delivery', 'action' => 'add','class'=>'btn btn-default']) ?>
    </div>
    <h3><?= __('Delivery') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('firstName') ?></th>
                <th><?= $this->Paginator->sort('lastName') ?></th>
                <!--<th><?= $this->Paginator->sort('email') ?></th>-->
                <th><?= $this->Paginator->sort('address') ?></th>
                <th><?= $this->Paginator->sort('city') ?></th>
                <!--<th><?= $this->Paginator->sort('latitude') ?></th>
                <th><?= $this->Paginator->sort('longitude') ?></th>-->
                <th><?= $this->Paginator->sort('mobileNo') ?></th>
                <!--<th><?= $this->Paginator->sort('vehicleNo') ?></th>-->
                <th><?= $this->Paginator->sort('companyName') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($delivery as $delivery): ?>
            <tr>
                <td><?= $this->Number->format($delivery->id) ?></td>
                <td><?= $delivery->has('user') ? $this->Html->link($delivery->user->username, ['controller' => 'Users', 'action' => 'view', $delivery->user->id]) : '' ?></td>
                <td><?= h($delivery->firstName) ?></td>
                <td><?= h($delivery->lastName) ?></td>
                <!--<td><?= h($delivery->email) ?></td>-->
                <td><?= h($delivery->address) ?></td>
                <td><?= h($delivery->cid->cname) ?></td>
                <!--<td><?= h($delivery->latitude) ?></td>
                <td><?= h($delivery->longitude) ?></td>-->
                <td><?= h($delivery->mobileNo) ?></td>
                <!--<td><?= h($delivery->vehicleNo) ?></td>-->
                <td><?= h($delivery->companyName) ?></td>
                <td><?= h($status[$delivery->status]) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $delivery->id],['class'=>'x-btn x-btn-primary']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $delivery->id],['class'=>'x-btn x-btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $delivery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $delivery->id),'class'=>'x-btn x-btn-danger']) ?>
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
