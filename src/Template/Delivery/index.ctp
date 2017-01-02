<?php
$status = ['0'=>'Desabled','1'=>'Active'];
?>

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= __('Delivery') ?> <small><?= __('delivery staff list') ?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><?= $this->Html->link(__('Add New Delivery Staff'), ['controller' => 'Delivery', 'action' => 'add']) ?></li>
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
  			  		<table class="table table-hover">
                      <thead>
                        <tr>
                         <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('firstName') ?></th>
                <th><?= $this->Paginator->sort('lastName') ?></th>
                <!--<th><?= $this->Paginator->sort('email') ?></th>-->
                <th><?= $this->Paginator->sort('address') ?></th>
                <th><?= $this->Paginator->sort('city') ?></th>
                <!--<th><?= $this->Paginator->sort('latitude') ?></th>
                <th><?= $this->Paginator->sort('longitude') ?></th>-->
                <th><?= $this->Paginator->sort('mobileNo') ?></th>
                <!--<th><?= $this->Paginator->sort('vehicleNo') ?></th>-->
                <th><?= $this->Paginator->sort('companyName') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($delivery as $delivery): ?>
            <tr>
                <td><?= $this->Number->format($delivery->id) ?></td>
                <td><?= $delivery->has('user') ? $this->Html->link($delivery->user->username, ['controller' => 'Users', 'action' => 'view', $delivery->user->id]) : '' ?></td>
                <td><?= h($delivery->firstName) ?></td>
                <td><?= h($delivery->lastName) ?></td>
                <!--<td><?= h($delivery->email) ?></td>-->
                <td><?= h($delivery->address) ?></td>
                <td><?= h($delivery->cid->cname) ?></td>
                <!--<td><?= h($delivery->latitude) ?></td>
                <td><?= h($delivery->longitude) ?></td>-->
                <td><?= h($delivery->mobileNo) ?></td>
                <!--<td><?= h($delivery->vehicleNo) ?></td>-->
                <td><?= h($delivery->companyName) ?></td>
                <td><?= h($status[$delivery->status]) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $delivery->id],['class'=>'x-btn x-btn-primary btn btn-info btn-xs']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $delivery->id],['class'=>'x-btn x-btn-warning btn btn-warning btn-xs']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $delivery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $delivery->id),'class'=>'x-btn x-btn-danger btn btn-danger btn-xs']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
                      </tbody>
                    </table>
                    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
                  </div>
                </div>
</div>
