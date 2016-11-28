<?php
$user_role=[1=>'Admin',2=>'Callcenter','Supplier','Delivery'];
$status = ['0'=>'Desabled','1'=>'Active'];
?>
<div class="users view large-10 medium-10 columns content">
<div class="orders view large-12 medium-12 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0 ">
    <h4><?= __('User ID: '.$user->id) ?></h4>
<div class="orders view large-6 medium-6 columns content div-top-pad-0 div-left-pad-0">     
    <table class="vertical-table">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th><?= __('User Type') ?></th>
            <td><?= h($user_role[$user->user_type]) ?></td>
        </tr>
        <!--<tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>-->
        <!--<tr>
            <th><?= __('Remember Token') ?></th>
            <td><?= h($user->remember_token) ?></td>
        </tr>-->
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($status[$user->status]) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
</div>    
<!--    <div class="related">
        <h4><?= __('Related Callcenter') ?></h4>
        <?php if (!empty($user->callcenter)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('FirstName') ?></th>
                <th><?= __('LastName') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('City') ?></th>
                <th><?= __('MobileNo') ?></th>
                <th><?= __('Status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->callcenter as $callcenter): ?>
            <tr>
                <td><?= h($callcenter->id) ?></td>
                <td><?= h($callcenter->user_id) ?></td>
                <td><?= h($callcenter->firstName) ?></td>
                <td><?= h($callcenter->lastName) ?></td>
                <td><?= h($callcenter->email) ?></td>
                <td><?= h($callcenter->address) ?></td>
                <td><?= h($callcenter->city) ?></td>
                <td><?= h($callcenter->mobileNo) ?></td>
                <td><?= h($callcenter->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Callcenter', 'action' => 'view', $callcenter->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Callcenter', 'action' => 'edit', $callcenter->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Callcenter', 'action' => 'delete', $callcenter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callcenter->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        </div>
    </div>
-->    
    <!--<div class="related">
        <h4><?= __('Related Delivery') ?></h4>
        <?php if (!empty($user->delivery)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('FirstName') ?></th>
                <th><?= __('LastName') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('City') ?></th>
                <th><?= __('Latitude') ?></th>
                <th><?= __('Longitude') ?></th>
                <th><?= __('MobileNo') ?></th>
                <th><?= __('VehicleNo') ?></th>
                <th><?= __('CompanyName') ?></th>
                <th><?= __('Status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->delivery as $delivery): ?>
            <tr>
                <td><?= h($delivery->id) ?></td>
                <td><?= h($delivery->user_id) ?></td>
                <td><?= h($delivery->firstName) ?></td>
                <td><?= h($delivery->lastName) ?></td>
                <td><?= h($delivery->email) ?></td>
                <td><?= h($delivery->address) ?></td>
                <td><?= h($delivery->city) ?></td>
                <td><?= h($delivery->latitude) ?></td>
                <td><?= h($delivery->longitude) ?></td>
                <td><?= h($delivery->mobileNo) ?></td>
                <td><?= h($delivery->vehicleNo) ?></td>
                <td><?= h($delivery->companyName) ?></td>
                <td><?= h($delivery->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Delivery', 'action' => 'view', $delivery->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Delivery', 'action' => 'edit', $delivery->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Delivery', 'action' => 'delete', $delivery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $delivery->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
-->    
    <!--<div class="related">
        <h4><?= __('Related Suppliers') ?></h4>
        <?php if (!empty($user->suppliers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('FirstName') ?></th>
                <th><?= __('LastName') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('City') ?></th>
                <th><?= __('Latitude') ?></th>
                <th><?= __('Longitude') ?></th>
                <th><?= __('ContactNo') ?></th>
                <th><?= __('MobileNo') ?></th>
                <th><?= __('FaxNo') ?></th>
                <th><?= __('CompanyName') ?></th>
                <th><?= __('RegNo') ?></th>
                <th><?= __('Status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->suppliers as $suppliers): ?>
            <tr>
                <td><?= h($suppliers->id) ?></td>
                <td><?= h($suppliers->user_id) ?></td>
                <td><?= h($suppliers->firstName) ?></td>
                <td><?= h($suppliers->lastName) ?></td>
                <td><?= h($suppliers->email) ?></td>
                <td><?= h($suppliers->address) ?></td>
                <td><?= h($suppliers->city) ?></td>
                <td><?= h($suppliers->latitude) ?></td>
                <td><?= h($suppliers->longitude) ?></td>
                <td><?= h($suppliers->contactNo) ?></td>
                <td><?= h($suppliers->mobileNo) ?></td>
                <td><?= h($suppliers->faxNo) ?></td>
                <td><?= h($suppliers->companyName) ?></td>
                <td><?= h($suppliers->regNo) ?></td>
                <td><?= h($suppliers->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Suppliers', 'action' => 'view', $suppliers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Suppliers', 'action' => 'edit', $suppliers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Suppliers', 'action' => 'delete', $suppliers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $suppliers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    -->
</div>
