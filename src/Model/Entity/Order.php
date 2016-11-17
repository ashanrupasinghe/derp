<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

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
}
