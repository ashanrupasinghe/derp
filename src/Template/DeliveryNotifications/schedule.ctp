
<?php
//$status=['0'=>'pending', '1'=>'took all', '2'=>'delevered','9'=>'canceled'];
//$status=['1'=>'pending','2'=>'supplier informed','3'=>'products ready','4'=>'delivery tookover','5'=>'delivered','6'=>'completed'];
$status=['1'=>'pending','2'=>'supplier informed','3'=>'products ready','4'=>'delivery tookover','5'=>'delivered','6'=>'completed', '9'=>'canceled'];

?>

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= __('Delivery Notifications') ?> <small><?= __('delivery notification list &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#91;Now: '.$dateNow.' '.$timeNow.'&#93;') ?></small></h2>
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
                <!--<th><?= $this->Paginator->sort('deliveryId') ?></th>-->
                <th><?= $this->Paginator->sort('sentFrom') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('Orders.delivery_date_time','Delivery Date') ?></th>     
                <th><?= $this->Paginator->sort('orderId') ?></th>
                <!--<th><?= $this->Paginator->sort('deliveryDate') ?></th>
                <th><?= $this->Paginator->sort('deliveryTime') ?></th>-->
                <!--<th><?= __('Ready') ?></th>-->
                <th><?= $this->Paginator->sort('Orders.status','Order Status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php foreach ($deliveryNotifications as $deliveryNotification): 
            
            ?>
            <tr style="color:<?=$deliveryNotification['order']->row_color_delivery?>">
                <td><?= $this->Number->format($deliveryNotification->id) ?></td>
                <!--<td><?= $this->Number->format($deliveryNotification->deliveryId) ?></td>-->
                <td><?php if($deliveryNotification->sentFrom==1):?><?= h('System') ?><?php endif;?></td>
                <td><?= h($deliveryNotification->created) ?></td>
                <td><?= $this->Time->format($deliveryNotification['order']->delivery_date_time) ?></td>
                <td><?= $this->Number->format($deliveryNotification->orderId) ?></td>
                <?php /*?> <td><?= $this->Time->format($deliveryNotification['order']->deliveryDate,'yyyy-MM-dd') ?></td><?php ?>
                <?php ?> <td><?= $this->Time->format($deliveryNotification['order']->deliveryTime,'HH:mm:ss') ?></td><?php */?>
                <!--<td><?= h($counted_data[$deliveryNotification->orderId]['ready']."/".$counted_data[$deliveryNotification->orderId]['noOfProduct']) ?></td>-->
                <?php ?> <td><?= h($status[$deliveryNotification['order']->status]) ?></td><?php ?>
                
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $deliveryNotification->id],['class'=>'x-btn x-btn-primary btn btn-info btn-xs']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deliveryNotification->id],['class'=>'x-btn x-btn-warning btn btn-warning btn-xs']) ?>
                   
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

