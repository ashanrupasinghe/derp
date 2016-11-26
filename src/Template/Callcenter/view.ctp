<?php
$status = ['0'=>'Desabled','1'=>'Active'];
?>
<div class="callcenter view large-10 medium-10 columns content">
<div class="orders view large-12 medium-12 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0 ">
    <h4><?= __('CallCenter Staff ID: '.$callcenter->id) ?></h4>
    <div class="orders view large-6 medium-6 columns content div-top-pad-0 div-left-pad-0"> 
    <table class="vertical-table">
        <tr>
            <th><?= __('User Name') ?></th>
            <td><?= $callcenter->has('user') ? $this->Html->link($callcenter->user->username, ['controller' => 'Users', 'action' => 'view', $callcenter->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($callcenter->firstName) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($callcenter->lastName) ?></td>
        </tr>
                <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($callcenter->address) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($callcenter->cid->cname) ?></td>
        </tr>
        </table>
       </div>
       <div class="orders view large-6 medium-6 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0">   
<table class="vertical-table">  
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($callcenter->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Mobile No') ?></th>
            <td><?= h($callcenter->mobileNo) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($status[$callcenter->status]) ?></td>
        </tr>

    </table>
    </div>
</div>    
</div>
