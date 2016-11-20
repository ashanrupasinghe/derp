<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductSuppliersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductSuppliersTable Test Case
 */
class ProductSuppliersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductSuppliersTable
     */
    public $ProductSuppliers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_suppliers',
        'app.products',
        'app.order_products',
        'app.orders',
        'app.supplier_notifications',
        'app.suppliers',
        'app.users',
        'app.callcenter',
        'app.city',
        'app.delivery',
        'app.delivery_notifications',
        'app.callcenter',
        'app.delivery',
        'app.suppliers',
        'app.package_type'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductSuppliers') ? [] : ['className' => 'App\Model\Table\ProductSuppliersTable'];
        $this->ProductSuppliers = TableRegistry::get('ProductSuppliers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductSuppliers);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
