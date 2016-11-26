<?php
$availability=['0'=>'Not available','1'=>'Available'];
$status = ['0'=>'Desabled','1'=>'Active'];
?>
<div class="products view large-10 medium-10 columns content">
<div class="orders view large-12 medium-12 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0 ">
    <h4><?= __('Product Name: '.$product->name) ?></h4>
<div class="orders view large-2 medium-2 columns content div-top-pad-0 div-left-pad-0"> 
<img src="img.jpg" height="100%">
</div>    
<div class="orders view large-5 medium-5 columns content div-top-pad-0 div-left-pad-0">     
    <table class="vertical-table">
        <!--<tr>
            <th><?= __('Id') ?></th>
            <td><?= h($product->id) ?></td>
        </tr>-->
                <tr>
            <th><?= __('Price') ?></th>
            <td><?= $this->Number->format($product->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantity type') ?></th>
            <td><?= h($package_type[$product->package]) ?></td>
        </tr>
        <tr>
            <th><?= __('Availability') ?></th>
            <td><?= h($availability[$product->availability]) ?></td>
        </tr>
        </table>
</div>
       <div class="orders view large-5 medium-5 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0">   
<table class="vertical-table"> 
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($status[$product->status]) ?></td>
        </tr>
        <!--<tr>
            <th><?= __('Image') ?></th>
            <td><?= h($product->image) ?></td>
        </tr>-->
                <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($product->description) ?></td>
        </tr>
        
        
        
       <!-- <tr>
            <th><?= __('SupplierId') ?></th>
            <td><?= $this->Number->format($product->supplierId) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($product->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($product->modified) ?></td>
        </tr>-->
    </table>
</div>
</div>
<div class="orders view large-12 medium-12 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0 ">
    <h4><?= __('Suppliers') ?></h4>
    
<?php
$j=1;
$size=sizeof($suppliers);
foreach($suppliers as $supplier){
if($j==1){?>
<div class="orders view large-6 medium-6 columns content div-top-pad-0 div-left-pad-0">    
<table class="vertical-table"> 
<?php
}
if(($size/2)+1==$j){
?>
</table> 
</div>
<div class="orders view large-6 medium-6 columns content div-top-pad-0 div-left-pad-0 div-right-pad-0">  
<table class="vertical-table"> 
<?php

}
?>
<tr>

            <td class="td-align-left"><?php $name= $supplier->supp['firstName']." " .$supplier->supp['lastName']?>
            <?= $this->Html->link(__($name), ['controller'=>'suppliers','action' => 'index']) ?>
            </td>
        </tr>
<?php
if($size==$j){
?>
</table> 
</div>

<?php
}

$j++;

}


?>

</div>


    <!--<div class="related">
        <h4><?= __('Related Order Products') ?></h4>
        <?php if (!empty($product->order_products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Order Id') ?></th>
                <th><?= __('Product Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->order_products as $orderProducts): ?>
            <tr>
                <td><?= h($orderProducts->order_id) ?></td>
                <td><?= h($orderProducts->product_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OrderProducts', 'action' => 'view', $orderProducts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OrderProducts', 'action' => 'edit', $orderProducts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderProducts', 'action' => 'delete', $orderProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderProducts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>-->
</div>
