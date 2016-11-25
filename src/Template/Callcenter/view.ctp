<?php
$status = ['0'=>'Desabled','1'=>'Active'];
?>
<div class="callcenter view large-10 medium-10 columns content">
    <h3><?= h($callcenter->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $callcenter->has('user') ? $this->Html->link($callcenter->user->username, ['controller' => 'Users', 'action' => 'view', $callcenter->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('FirstName') ?></th>
            <td><?= h($callcenter->firstName) ?></td>
        </tr>
        <tr>
            <th><?= __('LastName') ?></th>
            <td><?= h($callcenter->lastName) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($callcenter->email) ?></td>
        </tr>
        <tr>
            <th><?= __('MobileNo') ?></th>
            <td><?= h($callcenter->mobileNo) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($status[$callcenter->status]) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($callcenter->id) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($callcenter->cid->cname) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($callcenter->address)); ?>
    </div>
</div>
