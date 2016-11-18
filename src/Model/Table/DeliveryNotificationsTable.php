<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DeliveryNotifications Model
 *
 * @method \App\Model\Entity\DeliveryNotification get($primaryKey, $options = [])
 * @method \App\Model\Entity\DeliveryNotification newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DeliveryNotification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DeliveryNotification|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DeliveryNotification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DeliveryNotification[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DeliveryNotification findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DeliveryNotificationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('delivery_notifications');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Orders', [
        		'foreignKey' => 'orderId'
        ]);
        $this->belongsTo('Delivery', [
        		'foreignKey' => 'deliveryId'
        ]);
        

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('deliveryId')
            ->requirePresence('deliveryId', 'create')
            ->notEmpty('deliveryId');

        $validator
            ->requirePresence('notificationText', 'create')
            ->notEmpty('notificationText');

        $validator
            ->requirePresence('sentFrom', 'create')
            ->notEmpty('sentFrom');

        $validator
            ->integer('orderId')
            ->requirePresence('orderId', 'create')
            ->notEmpty('orderId');

        return $validator;
    }
}
