<?php
$status = ['0'=>'Desabled','1'=>'Active'];
?>


<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= __('Suppliers') ?> <small><?= __('add new suppliers') ?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><?= $this->Html->link(__('Add New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
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
                <th><?= $this->Paginator->sort('city') ?></th>
                <th><?= $this->Paginator->sort('mobileNo') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($suppliers as $supplier): ?>
                <tr>
                    <td><?= $this->Number->format($supplier->id) ?></td>
                    <td><?= $supplier->has('user') ? $this->Html->link($supplier->user->username, ['controller' => 'Users', 'action' => 'view', $supplier->user->id]) : '' ?></td>
                    <td><?= h($supplier->firstName) ?></td>
                    <td><?= h($supplier->cid->cname) ?></td>
                    <td><?= h($supplier->mobileNo) ?></td>
<!--                     <td><?= h(($supplier->status==1?'Enabled':'Disabled')) ?></td>-->
				<td><?= h(($supplier->status==1?'Active':'Disabled')) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $supplier->id],['class'=>'x-btn x-btn-primary btn btn-info btn-xs']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $supplier->id],['class'=>'x-btn x-btn-warning btn btn-warning btn-xs']) ?>
                       
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

