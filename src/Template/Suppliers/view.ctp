<?php
$status = ['0'=>'Desabled','1'=>'Active'];
?>
<div class="suppliers view large-10 medium-10 columns content">
<div class="orders view large-12 medium-12 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0 ">
    <h4><?= __($supplier->id) ?></h4>
<div class="orders view large-6 medium-6 columns content div-top-pad-0 div-left-pad-0">    
    <table class="vertical-table">
        <tr>
            <th><?= __('User Name') ?></th>
            <td><?= $supplier->has('user') ? $this->Html->link($supplier->user->username, ['controller' => 'Users', 'action' => 'view', $supplier->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($supplier->firstName) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($supplier->lastName) ?></td>
        </tr>
        
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($supplier->address) ?></td>
        </tr>
        
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($supplier->cid->cname) ?></td>
        </tr>
         <tr>
            <th><?= __('Company Name') ?></th>
            <td><?= h($supplier->companyName) ?></td>
        </tr>
        <tr>
            <th><?= __('RegNo') ?></th>
            <td><?= h($supplier->regNo) ?></td>
        </tr>
        </table>
</div>
<div class="orders view large-6 medium-6 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0">   
<table class="vertical-table">         
       <!-- <tr>
            <th><?= __('Latitude') ?></th>
            <td><?= h($supplier->latitude) ?></td>
        </tr>
        <tr>
            <th><?= __('Longitude') ?></th>
            <td><?= h($supplier->longitude) ?></td>
        </tr>-->
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($supplier->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact No') ?></th>
            <td><?= h($supplier->contactNo) ?></td>
        </tr>
        <tr>
            <th><?= __('Mobile No') ?></th>
            <td><?= h($supplier->mobileNo) ?></td>
        </tr>
        <tr>
            <th><?= __('Fax No') ?></th>
            <td><?= h($supplier->faxNo) ?></td>
        </tr>
       
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($status[$supplier->status]) ?></td>
        </tr>

    </table>
    </div>
</div>
</div>