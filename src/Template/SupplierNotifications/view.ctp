<?php
$status=['0'=>'pending', '1'=>'took all', '2'=>'delevered'];
$status_sup=['0'=>'pending', '1'=>'available', '2'=>'not available', '3'=>'ready', '4'=>'hand overed','9'=>'canceled'];
$status_del=['0'=>'pending','1'=>'took over'];
?>

<div class="row">
<div class="col-md-5 col-sm-5 col-xs-12">
		<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= __('Notification ID: '.$supplierNotification->id) ?> <small><?= __('order details') ?></small></h2>
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
                     
                      <tbody>
                        <tr>
            <th scope="row"><?= __('OrderId') ?></th>
            <td><?= $this->Number->format($supplierNotification->orderId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SentFrom') ?></th>
            <td><?= h($supplierNotification->sentFrom) ?></td>
        </tr>
        
<!--        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($supplierNotification->id) ?></td>
        </tr>-->
<!--        <tr>
            <th scope="row"><?= __('SupplierId') ?></th>
            <td><?= $this->Number->format($supplierNotification->supplierId) ?></td>
        </tr>-->

        <tr>
            <th scope="row"><?= __('NotificationText') ?></th>
            <td><?= h($supplierNotification->notificationText); ?></td>
        </tr>
                <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($supplierNotification->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($supplierNotification->modified) ?></td>
        </tr>
                      </tbody>
                    </table>
  			  		
                  </div>
                </div>
</div>
</div>
<div class="col-md-7 col-sm-7 col-xs-12">
		<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= __('Notification ID: '.$supplierNotification->id) ?> <small><?= __('product details') ?></small></h2>
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
                        <th><?= __('ID') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Package') ?></th>
                <th><?= __('MyStatus') ?></th>
                <th><?= __('DelStatus') ?></th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php        
//print '<pre>';
//print_r($supplierNotification->supplier->order_products[0]->supplier->order_products);
foreach($supplierNotification->supplier->order_products as $product){

?>


<tr><td><?= h($product['product']['id'])?></td>
<td><?= h($product['product']['name'])?></td>
<td><?= h($product['product_quantity'])?></td>
<td><?= h($product['product']['package_type']->type)?></td>
<td><?= h($status_sup[$product['status_s']])?></td>
<td><?= h($status_del[$product['status_d']])?></td></tr>

<?php }
?>
                      </tbody>
                    </table>
  			  		
                  </div>
                </div>
</div>
</div>
</div>


