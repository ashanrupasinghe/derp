<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserNotifications Model
 *
 * @method \App\Model\Entity\UserNotification get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserNotification newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserNotification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserNotification|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserNotification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserNotification[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserNotification findOrCreate($search, callable $callback = null)
 */
class UserNotificationsTable extends Table
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

        $this->table('user_notifications');
        $this->displayField('id');
        $this->primaryKey('id');
        
        $this->addBehavior('Timestamp');
        //relation with, usertable
        $this->belongsTo('Users', [
        		'foreignKey' => 'userId',
        		'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Orders', [
        		'foreignKey' => 'orderId',
        		'joinType' => 'INNER'
        ]);
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
            ->integer('orderId')
            ->requirePresence('orderId', 'create')
            ->notEmpty('orderId');

        $validator
            ->integer('userId')
            ->requirePresence('userId', 'create')
            ->notEmpty('userId');

        $validator
            ->requirePresence('notification', 'create')
            ->notEmpty('notification');

        $validator
            ->integer('type')
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->integer('seen')
            ->requirePresence('seen', 'create')
            ->notEmpty('seen');

        return $validator;
    }
}
