<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrderProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrderProductsTable Test Case
 */
class OrderProductsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OrderProductsTable
     */
    public $OrderProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.order_products',
        'app.orders',
        'app.products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OrderProducts') ? [] : ['className' => 'App\Model\Table\OrderProductsTable'];
        $this->OrderProducts = TableRegistry::get('OrderProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrderProducts);

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
