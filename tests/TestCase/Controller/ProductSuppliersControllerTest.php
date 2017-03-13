<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ProductSuppliersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ProductSuppliersController Test Case
 */
class ProductSuppliersControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
