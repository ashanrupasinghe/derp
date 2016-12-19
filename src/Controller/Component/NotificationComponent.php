<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class NotificationComponent extends Component
{
	public function doComplexOperation($amount1, $amount2)
	{
		return $amount1 + $amount2;
	}
	//$type=1,$orderId=174
	/*
	 * $order_status: when change throug OrderController=>add,cancel,compleat
	 * 1-pending/add order, 4-delivery_tookover,5-delivered,6-completed, 9-cancelled
	 * 
	 * $sup_status: when change throug SupplierNotificationsController
	 *  1-available, 2-not available, 3-ready, 4-delivery handed over
	 *  
	 * $del_status: when change throug DeliveryNotificationsController
	 * 1-took over
	 * 
	 * $orderId: orderId
	 * $prod_id: when change throug SupplierNotificationsController
	 * $supplier_user_id: when change throug SupplierNotificationsController, user ID of the supplier
	 * $del_id: when change throug DeliveryNotificationsController
	 * */
	public function setNotification($order_status="",$sup_status="",$del_status="",$orderId=174,$prod_id="",$supplier_user_id="",$del_id=""){
		//load models
		$orderModel  = TableRegistry::get('Orders');
		$orderProdctsModel  = TableRegistry::get('OrderProducts');
		$userModel=TableRegistry::get('Users');
		$userNotificationModel=TableRegistry::get('UserNotifications');
		$productsModel=TableRegistry::get('Products');
		$suppliersModel=TableRegistry::get('Suppliers');
		$deliveryModel=TableRegistry::get('Delivery');
		$type="";//notification type
		//identify type
		if ($order_status!=""){
			switch ($order_status){
				case 1:
					$type=1;
					break;
				case 4:
					$type=7;
					break;					
				case 5:
					$type=8;
					break;					
				case 6:
					$type=10;
					break;					
				case 9:
					$type=9;
					break;					
			}
		}elseif ($sup_status!=""){
			switch ($sup_status){
				case 1:
					$type=2;
					break;
				case 2:
					$type=3;
					break;
				case 3:
					$type=4;
					break;
				case 4:
					$type=5;
					break;
				
			}
			
		}elseif ($del_status!=""){
			switch ($del_status){
				case 1:
					$type=6;
					break;
			
			}
		}
		
		
		$adminQuery=$userModel->find('all',['fields'=>['id'],'conditions'=>['user_type'=>1]])->toArray();
		$admin_users=[];//contain admin ids
		foreach ($adminQuery as $admin){
			$admin_users[]=$admin['id'];
		}
		/*  print '<pre>';
		print_r($admin_users); */
		
		
		$callcenterQuery=$userModel->find('all',['fields'=>['id'],'conditions'=>['user_type'=>2]])->toArray();
		$callcenter_users=[];//contain callcenter staff ids
		foreach ($callcenterQuery as $callcenter){
			$callcenter_users[]=$callcenter['id'];
		}
		/*  print '<pre>';*/
		 //print_r($callcenter_users);  
		//http://book.cakephp.org/3.0/en/orm.html#quick-example
		$order_id=$orderId;
		
		$product_id=$prod_id;
		$product_name="";
		if ($prod_id!=""){		
		$product_name_q=$productsModel->get($product_id,['fields'=>['name']])->toArray();
		
		$product_name=$product_name_q['name'];
		}	
		$sup_id=$suppliersModel->find('all',['conditions'=>['user_id'=>$supplier_user_id],'fields'=>['id']])->first();//find supplier id
		$supplier_id=$sup_id['id'];
		$supplier_name="";
		if ($supplier_id!=""){
		$supplier_name_q=$suppliersModel->get($supplier_id,['fields'=>['firstName','lastName']])->toArray();
		$supplier_name=$supplier_name_q['firstName'].' '.$supplier_name_q['lastName'];
		}
		
		$delivery_id=$del_id;
		$delivery_name="";
		/* if ($delivery_id!=""){
		$delivery_name_q=$deliveryModel->get($delivery_id,['fields'=>['firstName','lastName']])->toArray();
		$delivery_name=$delivery_name_q['firstName'].' '.$delivery_name_q['lastName'];
		} */
		
		$client_name_q=$orderModel->get($order_id,['contain'=>['customers']]);		
		$client_name=$client_name_q->customer->firstName.' '.$client_name_q->customer->lastName;
		
		$user_list=[];
		
		$del=$orderModel->get($order_id,['contain'=>['delivery.Users']]);		
		$deliveryStaff=[$del->delivery->user->id];//contain delivery staff id
		$delivery_name=$del->delivery->firstName.' '.$del->delivery->lastName;//contain delivery staff id
		
		
		//$msg1_add_order="New order request, Order ID: ".$order_id;
		//$msg2_product_available=$product_name." is available for order ".$order_id." from ".$supplier_name;
		//$msg3_product_not_available=$product_name." is not available for order ".$order_id." from ".$supplier_name;
		//$msg4_product_ready=$product_name." is ready for order ".$order_id." from ".$supplier_name;
		//$msg5_product_handover=$product_name." is handed over by ".$supplier_name." for order ".$order_id." to ".$delivery_name;
		//$msg6_product_took_over=$product_name." is took over by ".$delivery_name." for order ".$order_id." from ".$supplier_name;
		//$msg7_order_took_over="products for order ".$order_id." are took over by ".$delivery_name;
		//$msg8_order_delevered="order ".$order_id." is delevered by ".$delivery_name." to ".$client_name;
		//$msg9_order_canceled="order ".$order_id."is canceled";
		//$msg10_order_compleated="order ".$order_id." is compleated";
		$message="";//final message
		
		if($type==1 || $type==9){
			//echo 'ashan';
			$suppliers=[];//supplier array
			
			
			/* $sups=$orderProdctsModel->find('all',['fields'=>['Users.id','supplier_id','Suppliers.firstName','Suppliers.lastName'],'conditions'=>['order_id'=>$order_id]])->distinct('supplier_id')->contain('Suppliers.Users')->toArray();
			for ($i=0;$i<sizeof($sups);$i++){
				$suppliers[$i]['user_id']=$sups[$i]['supplier_id'];
				$suppliers[$i]['supplier_id']=$sups[$i]['supplier']->user->id;
				$suppliers[$i]['name']=$sups[$i]['supplier']->firstName.' '.$sups[$i]['supplier']->lastName;
			} */
			//$del=$orderModel->get($order_id,['contain'=>['OrderProducts','customers','delivery','OrderProducts.Suppliers']]);
			/* $del=$orderModel->get($order_id,['contain'=>['delivery','delivery.Users']]);
			$deliveryStaff[0]['user_id']=$del['deliveryId'];
			$deliveryStaff[0]['delivery_id']=$del['delivery']->user->id;
			$deliveryStaff[0]['name']=$del['delivery']->firstName.' '.$del['delivery']->lastName; */
			
			
			
			$sups=$orderProdctsModel->find('all',['fields'=>['Users.id'],'conditions'=>['order_id'=>$order_id]])->distinct('supplier_id')->contain('Suppliers.Users')->toArray();
			for ($i=0;$i<sizeof($sups);$i++){				
				$suppliers[$i]=$sups[$i]['Users']->id;				
			}
			$user_list=array_merge($admin_users,$callcenter_users,$suppliers,$deliveryStaff);//admin.calls.dels.sups
			if ($type==1){
				$message="New order request, Order ID: ".$order_id;
			}else{
				$message="order ID: ".$order_id." is canceled";
			}
			
			
			
		}
		elseif ($type<=5){
			//$status_s="";//1-available, 2-not available, 3-ready, 4-delivery handed over
			$user_list=array_merge($admin_users,$callcenter_users,$deliveryStaff);
			
			if ($type==2){
				$message=$product_name." is available for order ID: ".$order_id." from ".$supplier_name;
			}
			elseif ($type==3){
				$message=$product_name." is not available for order ID: ".$order_id." from ".$supplier_name;
			}
			elseif ($type==4){
				$message=$product_name." is ready for order ID: ".$order_id." from ".$supplier_name;
			}
			else {
				$message=$product_name." is handed over by ".$supplier_name." for order ID: ".$order_id." to ".$delivery_name;;
			}
		}
		elseif ($type<=8){
			//$status_d="";
			
			$user_list=array_merge($admin_users,$callcenter_users);
			if ($type==6){
				$message=$product_name." is took over by ".$delivery_name." for order ID: ".$order_id." from ".$supplier_name;
			}
			elseif ($type==7){
				$message="products for order ID: ".$order_id." are took over by ".$delivery_name;
			}else {
				$message="order ID: ".$order_id." is delevered by ".$delivery_name." to ".$client_name;
			}
		}
		elseif($type==10){
			$user_list=$admin_users;
			$message="order ID: ".$order_id." is compleated";
		}
		/* $data=[$order_id,];
		$userNotificationEntity = $userNotificationModel->newEntity ();
		$userNotification = $userNotificationModel->patchEntity ( $userNotificationEntity, $data );
		$saving=$userNotificationModel->save ( $userNotification ); */
		/* print '<pre>';
		print_r($user_list);
		echo $message; */
		$rows=[];//data to save
		for ($i=0;$i<sizeof($user_list);$i++){
			$rows[$i]=['orderId'=>$order_id,'userId'=>$user_list[$i],'notification'=>$message,'type'=>$type,'seen'=>0];
		}
		$notification_entities=$userNotificationModel->newEntities($rows);
		$notifications_save_result=$userNotificationModel->saveMany($notification_entities);
		
		
	}
	
	public function getNotificationCount($user_id){		
		$userNotificationModel=TableRegistry::get('UserNotifications');
		// In a controller or table method.
		$query = $userNotificationModel->find('all', ['conditions' => ['userId'=>$user_id,'seen'=>0]]);
		$number = $query->count();
		return $number;
	
	}
	
	public function getLatestNotifications($user_id){
		$userNotificationModel=TableRegistry::get('UserNotifications');
		$query = $userNotificationModel->find('all', ['fields'=>['id','orderId','notification','type','created'],'conditions' => ['userId'=>$user_id,'seen'=>0]])->order(['created' => 'DESC'])->limit(5)->toArray();
		return $query;
		/* print '<pre>';
		print_r($query);
		die(); */
	}
}