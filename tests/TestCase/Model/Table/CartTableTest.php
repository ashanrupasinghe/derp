<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CartTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CartTable Test Case
 */
class CartTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CartTable
     */
    public $Cart;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cart',
        'app.users',
        'app.callcenter',
        'app.city',
        'app.delivery',
        'app.delivery_notifications',
        'app.orders',
        'app.order_products',
        'app.products',
        'app.product_suppliers',
        'app.suppliers',
        'app.package_type',
        'app.products',
        'app.categories',
        'app.supplier_notifications',
        'app.user_notifications',
        'app.callcenter',
        'app.delivery',
        'app.customers',
        'app.sessions',
        'app.cart_products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cart') ? [] : ['className' => 'App\Model\Table\CartTable'];
        $this->Cart = TableRegistry::get('Cart', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cart);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
