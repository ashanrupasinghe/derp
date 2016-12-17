<?php
$status = ['0'=>'Desabled','1'=>'Active'];
?>
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= __('Callcenter') ?> <small>callcenter staff</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><?= $this->Html->link(__('Add New Callcentre Staff'), ['controller' => 'Callcenter', 'action' => 'add']) ?></li>
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
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('city') ?></th>
                <th><?= $this->Paginator->sort('mobileNo') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($callcenter as $callcenter): ?>
            <tr>
                <td><?= $this->Number->format($callcenter->id) ?></td>
                <td><?= $callcenter->has('user') ? $this->Html->link($callcenter->user->username, ['controller' => 'Users', 'action' => 'view', $callcenter->user->id]) : '' ?></td>
                <td><?= h($callcenter->firstName) ?></td>
                <td><?= h($callcenter->lastName) ?></td>
                <td><?= h($callcenter->email) ?></td>
                <td><?= h($callcenter->cid->cname) ?></td>
                <td><?= h($callcenter->mobileNo) ?></td>
                <td><?= h($status[$callcenter->status]) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $callcenter->id],['class'=>'x-btn x-btn-primary']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $callcenter->id],['class'=>'x-btn x-btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $callcenter->id],['confirm' => __('Are you sure you want to delete # {0}?', $callcenter->id),'class'=>'x-btn x-btn-danger']) ?>
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
              
              
