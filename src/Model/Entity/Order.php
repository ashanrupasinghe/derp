<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\I18n\Time;
use Cake\I18n\Date;

/**
 * Order Entity
 *
 * @property int $id
 * @property int $customerId
 * @property string $address
 * @property int $city
 * @property string $latitude
 * @property string $longitude
 * @property int $callcenterId
 * @property int $deliveryId
 * @property float $subTotal
 * @property float $tax
 * @property float $discount
 * @property string $couponCode
 * @property float $total
 * @property string $paymentStatus
 * @property string $status
 * @property string $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\OrderProduct[] $order_products
 */
class Order extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
    
    protected $_virtual = ['row_color_delivery','row_color_supplier','delivery_date_time'];
    /**
     *use this column directly to change color of rows delivery time within 60 mins 
     */
    protected function _getRowColorDelivery()
    {
    	 $current__date_time=Time::now();//now
    	$current__date=$current__date_time->format('Y-m-d');
    	$current__time=$current__date_time->format('H:i:s'); 
    	
    	$order_deliver_date=$this->_properties['deliveryDate'];    	
    	$oddate= new Date($order_deliver_date);
    	//$oddate=$oddate->format('Y-m-d');
    	
    	$order_deliver_time=$this->_properties['deliveryTime'];    	
    	$odtime = new Time($order_deliver_time);
    	//$odtime=$odtime->modify('+60 mins')->format('H:i:s');//if current time equal this return red
    	
    	
    	if ($oddate->isToday() && $odtime->isWithinNext('60 mins') && ($this->_properties['status']<4 || $this->_properties['status']==7) ){
    		    		
    		return '#F00000';//within 60 mins
    	}
    	elseif ($oddate->isToday() && $odtime->wasWithinLast('1440 mins') && ($this->_properties['status']<4 || $this->_properties['status']==7)){
    		return '#992E2E;';//late
    	}
    	elseif($oddate<$current__date_time && ($this->_properties['status']<4 || $this->_properties['status']==7)){
    		return '#992E2E;';//late
    	}
    	return '#73879C';//more than 60 mins; 
    	
    	
    	
    	
    }
    
    protected function _getDeliveryDateTime()
    {
    	$time=$this->_properties['deliveryTime'];
    	$time=new Time($time);
    	$time=$time->format('H:i:s');
    	$date=$this->_properties['deliveryDate'];
    	
    	$date_time=$date.' '.$time;
    	//$new_date_time=sortotime($date_time);
    	
    	//$time=new Time($time);
    	//$time=$time->format('g:i A');
    	
    	//$st=date('g:i A',$time);
    	//return $date.', '.$time;
    	return new Time($date_time);
    	
    }
    
    /**
     * use this function to check order is whether deliver within 90 mins, use with supplier notification status, status add to check this[05-jan-2017]
     * @return string
     */
    
    protected function _getRowColorSupplier()
    {
    	
    	$current__date_time=Time::now();//now
    	$current__date=$current__date_time->format('Y-m-d');
    	$current__time=$current__date_time->format('H:i:s');
    	 
    	$order_deliver_date=$this->_properties['deliveryDate'];
    	$oddate= new Date($order_deliver_date);
    	//$oddate=$oddate->format('Y-m-d');
    	 
    	$order_deliver_time=$this->_properties['deliveryTime'];
    	$odtime = new Time($order_deliver_time);
    	//$odtime=$odtime->modify('+60 mins')->format('H:i:s');//if current time equal this return red
    	
    	
    	if ($oddate->isToday() && $odtime->isWithinNext('90 mins') && $this->_properties['status']<4 ){
    	
    		return '#F00000';//within 90 min;
    	}
    	elseif ($oddate->isToday() && $odtime->wasWithinLast('1440 mins') && $this->_properties['status']<4){
    		return '#992E2E;';//late
    	}
    	elseif($oddate<$current__date_time && $this->_properties['status']<4){
    		return '#992E2E;';//late
    	}
    	return '#73879C';//more than 90 min
    	 
    	 
    	
    }
}
