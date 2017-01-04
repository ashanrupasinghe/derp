<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;

class NotificationShell extends Shell {
	public function initialize()
	{
		parent::initialize();
		$this->loadTasks('Notification');
	
	}
	
	public function main()
	{
		$this->out('Hello world.');
		
	}
	
	public function heyThere($name = 'Anonymous')
	{
		
		$this->out('Hey there ' . $name);
	}
		
	public function sendNotifications(){
	
		$current__date_time=Time::now();//now
		$current__date=$current__date_time->format('Y-m-d');
		$current__time=$current__date_time->format('H:i:s');
		/* $notify_time_supp=$current__date_time->modify('+90 mins')->format('H:i:s');
			$notify_time_del=$current__date_time->modify('+60 mins')->format('H:i:s'); */
		$orderModel  = TableRegistry::get('Orders');
		$connection = ConnectionManager::get('default');
		$notifications=[];
		//check order- delivery status, if call center not sent notification to delivery staff, he do not know about the order, we chack whether notification is sent
		//$query_del="SELECT orders.id as orderId, delivery.user_id, orders.deliveryDate, orders.deliveryTime FROM orders JOIN user_notifications ON user_notifications.orderId=orders.id JOIN delivery ON delivery.id=orders.deliveryId WHERE orders.deliveryDate='".$current__date."' AND '".$current__time."' >=  SUBTIME(orders.deliveryTime, '01:00:00') AND type=12";
		$query_del=  "SELECT orders.id as orderId, delivery.user_id, orders.deliveryDate, orders.deliveryTime".
				" FROM orders".
				" JOIN user_notifications ON user_notifications.orderId=orders.id".
				" JOIN delivery ON delivery.id=orders.deliveryId".
				" JOIN order_products ON order_products.order_id=orders.id".
				" WHERE orders.deliveryDate='".$current__date."' AND '".$current__time."' >=  SUBTIME(orders.deliveryTime, '01:00:00') AND user_notifications.type=12".
				" AND order_products.status_d=0".
				" GROUP BY delivery.user_id";
		$orderes_noti_del = $connection->execute($query_del)->fetchAll('assoc');
	
		//check order- supplier status
		//$query_sup="SELECT orders.id as orderId,suppliers.user_id , orders.deliveryDate, orders.deliveryTime FROM orders JOIN supplier_notifications ON supplier_notifications.orderId=orders.id JOIN suppliers ON suppliers.id= supplier_notifications.supplierId WHERE deliveryDate='".$current__date."' AND '".$current__time."' >=  SUBTIME(deliveryTime, '01:30:00')";
		$query_sup= "SELECT orders.id as orderId,suppliers.user_id , orders.deliveryDate, orders.deliveryTime".
				" FROM orders ".
				" JOIN supplier_notifications ON supplier_notifications.orderId=orders.id".
				" JOIN suppliers ON suppliers.id= supplier_notifications.supplierId".
				" JOIN order_products ON order_products.order_id=orders.id".
				" WHERE deliveryDate='".$current__date."' AND '".$current__time."' >=  SUBTIME(orders.deliveryTime, '01:30:00')".
				" AND order_products.status_s=0".
				" GROUP BY order_products.supplier_id";
		$orderes_noti_sup = $connection->execute($query_sup)->fetchAll('assoc');
	
		//send to suppliers
		if(sizeof($orderes_noti_sup)>0){
			for($i=0;$i<sizeof($orderes_noti_sup);$i++){
				$message_supp="Order ID: ".$orderes_noti_sup[$i]['orderId']." will have been delivered at ".$orderes_noti_sup[$i]['deliveryTime'].", ".$orderes_noti_sup[$i]['deliveryDate'].". Please confirm your products availability";
				$notifications[$i]=['orderId'=>$orderes_noti_sup[$i]['orderId'],'userId'=>$orderes_noti_sup[$i]['user_id'],'notification'=>$message_supp,'type'=>222,'seen'=>0];
			}
		}
	
		//send to delivery starff
		if (sizeof($orderes_noti_del)>0){
			$supplier_size=sizeof($orderes_noti_sup);
			for($i=0;$i<sizeof($orderes_noti_del);$i++){
				$message_del="Order ID: ".$orderes_noti_del[$i]['orderId']." will have been delivered at ".$orderes_noti_del[$i]['deliveryTime'].", ".$orderes_noti_del[$i]['deliveryDate'].". Please Picke the products and deliver to the customer";
				$notifications[$i+$supplier_size]=['orderId'=>$orderes_noti_del[$i]['orderId'],'userId'=>$orderes_noti_del[$i]['user_id'],'notification'=>$message_del,'type'=>333,'seen'=>0];
	
			}
		}
		if (sizeof($notifications)>0){
			  /* print '<pre>';
				print_r($notifications);
				die(); */  
				
			$userNotificationModel=TableRegistry::get('UserNotifications');
			$notification_entities=$userNotificationModel->newEntities($notifications);
			$notifications_save_result=$userNotificationModel->saveMany($notification_entities);
			
			if ($notifications_save_result){
				$this->out('The notifications have been sent.');
			}else{
				$this->out('The notifications not have been sent.');
			}
		}else{
			$this->out('Nothing to notify.');
		}
	
	
	
	}
	//for shedule a cron job
	//http://stackoverflow.com/questions/15809368/how-to-call-controller-in-shell-file-in-cakephp
	//http://stackoverflow.com/questions/13949539/how-to-setup-cronjobs-in-cake-php
}