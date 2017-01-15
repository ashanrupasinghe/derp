<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DeliveryNotification Entity
 *
 * @property int $id
 * @property int $deliveryId
 * @property string $notificationText
 * @property string $sentFrom
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $orderId
 */
class DeliveryNotification extends Entity
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
    
    
   /*  public function updateDeliver($orderId,$deliveryId){
    	$this->query()
    	->update()
    	->set(['deliveryId' => $deliveryId])
    	->where(['orderId' => $orderId])
    	->execute();
    } */
}
