<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Suppliers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Supplier get($primaryKey, $options = [])
 * @method \App\Model\Entity\Supplier newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Supplier[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Supplier|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Supplier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Supplier[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Supplier findOrCreate($search, callable $callback = null)
 */
class SuppliersTable extends Table
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

        $this->table('suppliers');
        $this->displayField('id');
        $this->primaryKey('id');
        
        $this->hasMany('productSuppliers', [
        		'foreignKey' => 'supplier_id'
        ]);
        $this->hasMany('OrderProducts', [
        		'foreignKey' => 'supplier_id'
        ]);

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
            ->allowEmpty('latitude');

        $validator
            ->allowEmpty('longitude');

        $validator
            ->allowEmpty('contactNo');

        $validator
            ->requirePresence('mobileNo', 'create')
            ->notEmpty('mobileNo');

        $validator
            ->allowEmpty('faxNo');

        $validator
            ->allowEmpty('companyName');

        $validator
            ->allowEmpty('regNo');

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
        //$rules->add($rules->isUnique(['email']));
        //$rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
