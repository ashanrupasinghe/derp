<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * SupplierNotifications Model
 *
 * @method \App\Model\Entity\SupplierNotification get($primaryKey, $options = [])
 * @method \App\Model\Entity\SupplierNotification newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SupplierNotification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SupplierNotification|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SupplierNotification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SupplierNotification[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SupplierNotification findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SupplierNotificationsTable extends Table
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

        $this->table('supplier_notifications');
        $this->displayField('id');
        $this->primaryKey('id');
        
        $this->belongsTo('Orders', [
        		'foreignKey' => 'orderId',
        		'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Suppliers', [
        		'foreignKey' => 'supplierId'
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
            ->integer('supplierId')
            ->requirePresence('supplierId', 'create')
            ->notEmpty('supplierId');

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
    public function isAssigned($supplierId){
    	return $this->exists(['supplierId'=>$supplierId]);
    }
    
}
