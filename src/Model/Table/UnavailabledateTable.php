<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Unavailabledate Model
 *
 * @method \App\Model\Entity\Unavailabledate get($primaryKey, $options = [])
 * @method \App\Model\Entity\Unavailabledate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Unavailabledate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Unavailabledate|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Unavailabledate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Unavailabledate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Unavailabledate findOrCreate($search, callable $callback = null, $options = [])
 */
class UnavailabledateTable extends Table
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

        $this->table('unavailabledate');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->dateTime('created_at')
            ->requirePresence('created_at', 'create')
            ->notEmpty('created_at');

        return $validator;
    }
}
