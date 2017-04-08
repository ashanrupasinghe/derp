<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;
/**
 * CartProducts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Carts
 * @property \Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\CartProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\CartProduct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CartProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CartProduct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CartProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CartProduct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CartProduct findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CartProductsTable extends Table
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

        $this->table('cart_products');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Cart', [
            'foreignKey' => 'cart_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
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
            ->integer('qty')
            ->requirePresence('qty', 'create')
            ->notEmpty('qty');

        $validator
            ->integer('type')
            ->requirePresence('type', 'create')
            ->notEmpty('type');

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
        $rules->add($rules->existsIn(['cart_id'], 'Cart'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }
    
    public static function getCart($cartID,$type){
    	$connection = ConnectionManager::get('default');
    	$query="SELECT products.id,products.name,products.image,products.price,cart_products.qty as quantity, package_type.type as package,products.price*cart_products.qty as total FROM ".
    			"cart_products JOIN products ON products.id=cart_products.product_id JOIN package_type ON package_type.id=products.package WHERE cart_products.cart_id=".$cartID." AND cart_products.type=".$type." ORDER BY cart_products.modified";
    	$results = $connection->execute($query)->fetchAll('assoc');
    	return $results;
    }
}
