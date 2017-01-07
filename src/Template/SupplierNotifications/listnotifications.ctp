<?php 
//$status=['0'=>'pending','1'=>'available','2'=>'not available','3'=>'ready','4'=>'handed over','9'=>'canceled'];
$status=['1'=>'pending','2'=>'supplier informed','3'=>'products ready','4'=>'delivery tookover','5'=>'delivered','6'=>'completed',7=>'driver informed', '9'=>'canceled'];
$my_status=[0=>'pending',1=>'confirm'];
?>



<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= __('Supplier Notifications') ?> <small><?= __('order by date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#91;Now: '.$dateNow.' '.$timeNow.'&#93;') ?></small></h2>
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
  			  		<table class="table table-hover">
                      <thead>
                        <tr>
                          <th><?= $this->Paginator->sort('id') ?></th>
                <!--<th><?= $this->Paginator->sort('supplierId') ?></th>-->
                <th><?= $this->Paginator->sort('sentFrom') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('Orders.delivery_date_time','Delivery Date') ?></th>                
                <th><?= $this->Paginator->sort('orderId') ?></th>
                <th><?= $this->Paginator->sort('Order.status','Order Status') ?></th>
                <th><?= $this->Paginator->sort('status','My Status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($supplierNotifications as $supplierNotification): ?>
            <tr>
                <td><?= $this->Number->format($supplierNotification->id) ?></td>
                <!--<td><?= $this->Number->format($supplierNotification->supplierId) ?></td>-->
                <td><?php if($supplierNotification->sentFrom==1):?><?= h('System') ?><?php endif;?></td>
                
                <td><?= $this->time->format($supplierNotification->created) ?></td>
                <td><?= $this->Time->format($supplierNotification['order']->delivery_date_time) ?></td>
                
                <td><?= $this->Number->format($supplierNotification->orderId) ?></td>
                <?php ?><td><?= h($status[$supplierNotification['order']->status]) ?></td><?php ?>
                <?php ?><td><?= h($my_status[$supplierNotification->status]) ?></td><?php ?>
                
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $supplierNotification->id],['class'=>'x-btn x-btn-primary btn btn-info btn-xs']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $supplierNotification->id],['class'=>'x-btn x-btn-warning btn btn-warning btn-xs']) ?>
                    
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
