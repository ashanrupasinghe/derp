<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \Cake\ORM\Association\HasMany $OrderProducts
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTable extends Table
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

        $this->table('products');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('OrderProducts', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('productSuppliers', [
        		'foreignKey' => 'product_id'
        ]);
		
		//$this->belongsTo('suppliers',['foreignKey'=>'supplierId']);
		$this->belongsTo('packageType',['foreignKey'=>'package']);
		$this->belongsTo('categories',['foreignKey'=>'category_id']);
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('description');

        $validator
            ->numeric('price')
            ->requirePresence('price', 'create')
            ->notEmpty('price');
        $validator
        ->numeric('package')
        ->requirePresence('package', 'create')
        ->notEmpty('package');

        $validator
            ->requirePresence('availability', 'create')
            ->notEmpty('availability');

        $validator
            ->allowEmpty('image');

        /* $validator
            ->array('supplierId')
            ->requirePresence('supplierId', 'create')
            ->notEmpty('supplierId'); */

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
