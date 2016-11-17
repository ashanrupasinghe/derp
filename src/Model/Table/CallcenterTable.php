<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Callcenter Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Callcenter get($primaryKey, $options = [])
 * @method \App\Model\Entity\Callcenter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Callcenter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Callcenter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Callcenter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Callcenter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Callcenter findOrCreate($search, callable $callback = null)
 */
class CallcenterTable extends Table
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

        $this->table('callcenter');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('city',['foreignKey'=>'city','propertyName'=>'cid']);
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
            ->requirePresence('firstName', 'create')
            ->notEmpty('firstName');

        $validator
            ->allowEmpty('lastName');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->integer('city')
            ->requirePresence('city', 'create')
            ->notEmpty('city');

        $validator
            ->requirePresence('mobileNo', 'create')
            ->notEmpty('mobileNo');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
    public function getcallcenterid($userid){    	
    	$query=$this->find ( 'all', ['conditions' => ['user_id =' => $userid]] )
    	->select ( ['id'] );
    	$query_result=$query->toArray();
    	$callcenterId=$query_result[0]->id;
    	return $callcenterId;
    }
}
