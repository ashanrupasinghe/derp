<?php
$status = ['0'=>'Desabled','1'=>'Active'];
?>
<div class="customers view large-10 medium-10 columns content">
    <h3><?= h($customer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('FirstName') ?></th>
            <td><?= h($customer->firstName) ?></td>
        </tr>
        <tr>
            <th><?= __('LastName') ?></th>
            <td><?= h($customer->lastName) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($customer->address) ?></td>
        </tr>
<!--        <tr>
            <th><?= __('Latitude') ?></th>
            <td><?= h($customer->latitude) ?></td>
        </tr>
        <tr>
            <th><?= __('Longitude') ?></th>
            <td><?= h($customer->longitude) ?></td>
        </tr>-->
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($customer->email) ?></td>
        </tr>
        <tr>
            <th><?= __('MobileNo') ?></th>
            <td><?= h($customer->mobileNo) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($customer->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($customer->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($status[$customer->status]) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($customer->cid->cname) ?></td>
        </tr>
        <?php
        
        ?>
    </table>
</div>
