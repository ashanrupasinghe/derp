<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Watchdog Model
 *
 * @method \App\Model\Entity\Watchdog get($primaryKey, $options = [])
 * @method \App\Model\Entity\Watchdog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Watchdog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Watchdog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Watchdog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Watchdog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Watchdog findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WatchdogTable extends Table
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

        $this->table('watchdog');
        $this->displayField('id');
        $this->primaryKey('id');

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
            ->integer('userId')
            ->requirePresence('userId', 'create')
            ->notEmpty('userId');

        $validator
            ->requirePresence('loggedIn', 'create')
            ->notEmpty('loggedIn');

        $validator
            ->requirePresence('loggedOut', 'create')
            ->notEmpty('loggedOut');

        $validator
            ->requirePresence('ip', 'create')
            ->notEmpty('ip');

        return $validator;
    }
}
