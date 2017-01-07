<?php
$status=['0'=>'pending', '1'=>'took all', '2'=>'delevered'];
$status_sup=['0'=>'pending', '1'=>'available', '2'=>'not available', '3'=>'ready', '4'=>'hand overed','9'=>'canceled'];
$status_del=['0'=>'pending','1'=>'took over'];
?>

<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= __('Notification ID: '.$deliveryNotification->id) ?> <small><?= __('order details') ?></small></h2>
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
            <td><?= $this->Number->format($deliveryNotification->orderId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SentFrom') ?></th>
            <td><?= h($deliveryNotification->sentFrom) ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($deliveryNotification->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Notification DeliveryId') ?></th>
            <td><?= $this->Number->format($deliveryNotification->deliveryId) ?></td>
        </tr>-->

        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($deliveryNotification->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($deliveryNotification->modified) ?></td>
        </tr>
        <tr>
        <th scope="row"	><?= __('NotificationText') ?></th>
        <td><?= h($deliveryNotification->notificationText); ?></td>
        </tr>
                      </tbody>
                    </table>

                  
  			  		
                  </div>
                </div>
</div>

</div>

<div class="col-md-6 col-sm-6 col-xs-12">


<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= __('Notification ID: '.$deliveryNotification->id) ?> <small><?= __('customer details') ?></small></h2>
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
                      <?php
    $name=$customer['order']['customer']['firstName']." ".$customer['order']['customer']['lastName'];
            $phone=$customer['order']['customer']['mobileNo'];
            $address=$customer['order']['address'];
            $city=$customer['order']['cid']['cname'];
            $email=$customer['order']['customer']['email'];
            
    ?>
                      <tbody>
                        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($name) ?></td>
        </tr>
     <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($email) ?></td>
        </tr>   
                      </tbody>
                    </table>
  			  		
                  </div>
                </div>
</div>


</div>
</div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= __('Notification ID: '.$deliveryNotification->id) ?> <small><?= __('Supplier details') ?></small></h2>
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
                          <th><?= __('Supplier name') ?></th>
                <th><?= __('Address') ?></th>
                <!--<th><?= __('City') ?></th>-->
                <th><?= __('Phone') ?></th>
                <th><?= __('product name') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Package')?></th>
                <th><?= __('Supplier status') ?></th>
                <th><?= __('My Status') ?></th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($suppliers['order']['order_products'] as $supplier): 
           
            ?>                       
            <tr>
                <td><?php echo $supplier['supplier']['firstName']." ".$supplier['supplier']['lastName'];?></td>
                <td><?php echo $supplier['supplier']['address']."<br><br>".$supplier['supplier']['cid']['cname']; ?></td>
                <!--<td><?php echo $supplier['supplier']['cid']['cname']; ?></td>-->
                <td><?php echo $supplier['supplier']['mobileNo']."<br>".$supplier['supplier']['contactNo'];?></td>
                <td>
                <?php echo $supplier['product']['name']; ?><br>
                <?php if($supplier['product']['name_si']!=null){ echo $supplier['product']['name_si'];} ?><br>
                <?php if($supplier['product']['name_ta']!=null){echo $supplier['product']['name_ta'];} ?>                
                </td>
                <td><?php echo $supplier['product_quantity']; ?></td>
                <td><?php echo $supplier['product']['package_type']['type']; ?></td>
                <td><?php echo $this->Form->input('suplier status',['label'=>false,'options'=>$status_sup,'default'=>$supplier['status_s'],'disabled'=>true,'disabled'=>true]);?></td>                
                <td><?php echo $this->Form->input('my status',['label'=>false,'options'=>$status_del,'default'=>$supplier['status_d'],'name'=>'mystatus[]','disabled'=>true]);?>
                
                </td>             
            </tr>
            
            <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
</div>

</div>
</div>

