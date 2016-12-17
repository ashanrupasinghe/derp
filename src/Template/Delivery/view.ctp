<?php
$status = ['0'=>'Desabled','1'=>'Active'];
?>
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= __('Delivery ID: '.$delivery->id) ?> <small><?= __('delivery staff details') ?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div class="col-md-6 col-sm-6 col-xs-12">
  			  		<table class="table table-hover">
                      
                      <tbody>
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
                      </tbody>
                      </table>
                    
                  </div>  
                  <div class="col-md-6 col-sm-6 col-xs-12">
  			  		<table class="table table-hover">
                      
                      <tbody>
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
                        
                      </tbody>
                    </table>
                  </div>                   
                    
                    
                  </div>
                </div>
</div>






