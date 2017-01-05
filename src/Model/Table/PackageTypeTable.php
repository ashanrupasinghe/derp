<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PackageType Model
 *
 * @method \App\Model\Entity\PackageType get($primaryKey, $options = [])
 * @method \App\Model\Entity\PackageType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PackageType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PackageType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PackageType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PackageType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PackageType findOrCreate($search, callable $callback = null)
 */
class PackageTypeTable extends Table
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

        $this->table('package_type');
        $this->displayField('id');
        $this->primaryKey('id');
        
        $this->hasMany('products', [
        		'foreignKey' => 'package'
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
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        return $validator;
    }
}
