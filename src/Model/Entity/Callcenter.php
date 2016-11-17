<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Callcenter Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $firstName
 * @property string $lastName
 * @property string $email
 * @property string $address
 * @property int $cityId
 * @property string $mobileNo
 * @property string $status
 *
 * @property \App\Model\Entity\User $user
 */
class Callcenter extends Entity
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
