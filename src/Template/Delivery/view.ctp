<?php
$status = ['0'=>'Desabled','1'=>'Active'];
?>
<div class="delivery view large-10 medium-10 columns content">
<div class="orders view large-12 medium-12 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0 ">
    <h4><?= __('Delivery ID: '.$delivery->id) ?></h4>
<div class="orders view large-6 medium-6 columns content div-top-pad-0 div-left-pad-0">      
    <table class="vertical-table">
  
        <tr>
            <th><?= __('User Name') ?></th>
            <td><?= $delivery->has('user') ? $this->Html->link($delivery->user->username, ['controller' => 'Users', 'action' => 'view', $delivery->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($delivery->firstName) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($delivery->lastName) ?></td>
        </tr>
        
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($delivery->address) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($delivery->cid->cname) ?></td>
        </tr>  
        </table>
              </div>
<div class="orders view large-6 medium-6 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0">   
<table class="vertical-table">              
       <!-- <tr>
            <th><?= __('Latitude') ?></th>
            <td><?= h($delivery->latitude) ?></td>
        </tr>
        <tr>
            <th><?= __('Longitude') ?></th>
            <td><?= h($delivery->longitude) ?></td>
        </tr>-->
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($delivery->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Mobile No') ?></th>
            <td><?= h($delivery->mobileNo) ?></td>
        </tr>
        <tr>
            <th><?= __('Vehicle No') ?></th>
            <td><?= h($delivery->vehicleNo) ?></td>
        </tr>
        <tr>
            <th><?= __('Company Name') ?></th>
            <td><?= h($delivery->companyName) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($status[$delivery->status]) ?></td>
        </tr>


    </table>
    </div>
</div>
</div>
