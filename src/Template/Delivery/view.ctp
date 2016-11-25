<?php
$status = ['0'=>'Desabled','1'=>'Active'];
?>
<div class="delivery view large-10 medium-10 columns content">
    <h3><?= h($delivery->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $delivery->has('user') ? $this->Html->link($delivery->user->username, ['controller' => 'Users', 'action' => 'view', $delivery->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('FirstName') ?></th>
            <td><?= h($delivery->firstName) ?></td>
        </tr>
        <tr>
            <th><?= __('LastName') ?></th>
            <td><?= h($delivery->lastName) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($delivery->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($delivery->address) ?></td>
        </tr>
       <!-- <tr>
            <th><?= __('Latitude') ?></th>
            <td><?= h($delivery->latitude) ?></td>
        </tr>
        <tr>
            <th><?= __('Longitude') ?></th>
            <td><?= h($delivery->longitude) ?></td>
        </tr>-->
        <tr>
            <th><?= __('MobileNo') ?></th>
            <td><?= h($delivery->mobileNo) ?></td>
        </tr>
        <tr>
            <th><?= __('VehicleNo') ?></th>
            <td><?= h($delivery->vehicleNo) ?></td>
        </tr>
        <tr>
            <th><?= __('CompanyName') ?></th>
            <td><?= h($delivery->companyName) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($status[$delivery->status]) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($delivery->id) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($delivery->cid->cname) ?></td>
        </tr>
    </table>
</div>
