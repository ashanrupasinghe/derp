<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Callcenter
 * @property \Cake\ORM\Association\HasMany $Delivery
 * @property \Cake\ORM\Association\HasMany $Suppliers
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Callcenter', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Delivery', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Suppliers', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserNotifications', [
        		'foreignKey' => 'userId'
        ]);
        $this->hasOne('Cart', [
        		'foreignKey' => 'user_id'
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
            ->requirePresence('username', 'create')
            ->notEmpty('username')
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('user_type', 'create')
            ->notEmpty('user_type');

        $validator
            //->requirePresence('password', 'create')
            ->allowEmpty('password');

        $validator
            ->allowEmpty('remember_token');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');
        //confirm pw
        $validator->add('password', 'passwordsEqual', [
        		'rule' => function ($value, $context) {
        			
        			if (isset($context['data']['formType']) && $context['data']['formType'] === 'login-customer') {
        				return isset($context['data']['confirm_password']) && $context['data']['confirm_password'] === $value;
        			}
        			return false;
        		}
        ]);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
     public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));

        return $rules;
    }
}
