<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShippingTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShippingTable Test Case
 */
class ShippingTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ShippingTable
     */
    public $Shipping;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shipping',
        'app.carts',
        'app.orders',
        'app.order_products',
        'app.products',
        'app.product_suppliers',
        'app.suppliers',
        'app.users',
        'app.callcenter',
        'app.city',
        'app.delivery',
        'app.delivery_notifications',
        'app.user_notifications',
        'app.cart',
        'app.cart_products',
        'app.package_type',
        'app.products',
        'app.categories',
        'app.supplier_notifications',
        'app.callcenter',
        'app.delivery',
        'app.customers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Shipping') ? [] : ['className' => 'App\Model\Table\ShippingTable'];
        $this->Shipping = TableRegistry::get('Shipping', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Shipping);

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
