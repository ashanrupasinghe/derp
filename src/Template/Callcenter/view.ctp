<?php
$status = ['0'=>'Desabled','1'=>'Active'];
?>
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= __('CallCenter Staff ID: '.$callcenter->id) ?> <small>staff details</small></h2>
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
               			  
<div class="row">
    
    <div class="orders col-lg-6 col-md-6 columns content div-top-pad-0 div-left-pad-0"> 
    <table class="table table-hover">
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
       <div class="orders col-lg-6 col-md-6 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0">   
<table class="table table-hover">  
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
                </div>
              </div>
              
              
