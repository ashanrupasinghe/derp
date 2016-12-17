<?php
$status = ['0'=>'Desabled','1'=>'Active'];
?>



<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= __('Supplier ID: '.$supplier->id) ?> <small><?= __('supplier details') ?></small></h2>
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
            <th scope="row"><?= __('User Name') ?></th>
            <td><?= $supplier->has('user') ? $this->Html->link($supplier->user->username, ['controller' => 'Users', 'action' => 'view', $supplier->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($supplier->firstName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($supplier->lastName) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($supplier->address) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($supplier->cid->cname) ?></td>
        </tr>
         <tr>
            <th scope="row"><?= __('Company Name') ?></th>
            <td><?= h($supplier->companyName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RegNo') ?></th>
            <td><?= h($supplier->regNo) ?></td>
        </tr>
                      </tbody>
                      </table>
                    
                  </div>  
                  <div class="col-md-6 col-sm-6 col-xs-12">
  			  		<table class="table table-hover">
                      
                      <tbody>
                        <!-- <tr>
            <th scope="row"><?= __('Latitude') ?></th>
            <td><?= h($supplier->latitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Longitude') ?></th>
            <td><?= h($supplier->longitude) ?></td>
        </tr>-->
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($supplier->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact No') ?></th>
            <td><?= h($supplier->contactNo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile No') ?></th>
            <td><?= h($supplier->mobileNo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fax No') ?></th>
            <td><?= h($supplier->faxNo) ?></td>
        </tr>
       
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($status[$supplier->status]) ?></td>
        </tr>
                      </tbody>
                    </table>
                  </div>                   
                    
                    
                  </div>
                </div>
</div>

