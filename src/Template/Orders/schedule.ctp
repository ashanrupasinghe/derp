<?php
//$availability=['0'=>'Not available','1'=>'Available'];
//$status = ['0'=>'Desabled','1'=>'Active'];
//$paymnet_status=[];

$payment_status=['1'=>'pending','2'=>'paid'];
$status=['1'=>'pending','2'=>'supplier informed','3'=>'products ready','4'=>'delivery tookover','5'=>'delivered','6'=>'completed','9'=>'canceled'];   
?>
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= __('Orders') ?><small><?= __('Orders') ?></small></h2>
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
                <th><?= $this->Paginator->sort('deliveryDate') ?></th>
                <th><?= $this->Paginator->sort('deliveryTime') ?></th>
                <th><?= $this->Paginator->sort('customerId') ?></th>
                <!--<th><?= $this->Paginator->sort('address') ?></th>-->
                <th><?= $this->Paginator->sort('city') ?></th>
                <!--<th><?= $this->Paginator->sort('latitude') ?></th>
                <th><?= $this->Paginator->sort('longitude') ?></th>-->
                <th><?= $this->Paginator->sort('callcenter') ?></th>
                <th><?= $this->Paginator->sort('delivery staff') ?></th>
                <!--<th><?= $this->Paginator->sort('subTotal') ?></th>
                <th><?= $this->Paginator->sort('tax') ?></th>
                <th><?= $this->Paginator->sort('discount') ?></th>
                <th><?= $this->Paginator->sort('couponCode') ?></th>-->
                
                
                <th><?= $this->Paginator->sort('status') ?></th>
                <!--<th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>-->
                <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                      </thead>
                      <tbody>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $this->Number->format($order->id) ?></td>
                <td><?= $this->Time->format($order->deliveryDate,'yyyy-MM-dd') ?></td>
                <td><?= $this->Time->format($order->deliveryTime,'HH:mm:ss') ?></td>                
                <td><?= $this->Html->link($order->customer['firstName'].' '.$order->customer['lastName'], ['controller' => 'Customers', 'action' => 'view', $order->customerId])?></td>
                <!--<td><?= h($order->address) ?></td>-->
                <td><?= h($cities[$order->city]) ?></td>
                <!--<td><?= h($order->latitude) ?></td>
                <td><?= h($order->longitude) ?></td>-->
                <td><?= $this->Html->link($callcenters[$order->callcenterId], ['controller' => 'Callcenter', 'action' => 'view', $order->callcenterId])?></td>
                
                <td><?= $this->Html->link($deliveries[$order->deliveryId], ['controller' => 'Delivery', 'action' => 'view', $order->deliveryId])?></td>
                <!--<td><?= $this->Number->format($order->subTotal) ?></td>
                <td><?= $this->Number->format($order->tax) ?></td>
                <td><?= $this->Number->format($order->discount) ?></td>
                <td><?= h($order->couponCode) ?></td>-->
                
                
                <td><?= h($status[$order->status]) ?></td>
               <!-- <td><?= h($order->created) ?></td>
                <td><?= h($order->modified) ?></td>-->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $order->id],['class'=>'x-btn x-btn-primary']) ?>                    
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