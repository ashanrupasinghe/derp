<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrderProduct Entity
 *
 * @property int $order_id
 * @property int $product_id
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Product $product
 */
class OrderProduct extends Entity
{
	//public  $virtualFields = ['total' => 'SUM(OrderProduct.product_price * OrderProduct.product_quantity)'];
	
	
}
