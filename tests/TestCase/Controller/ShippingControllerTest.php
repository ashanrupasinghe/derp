<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ShippingController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ShippingController Test Case
 */
class ShippingControllerTest extends IntegrationTestCase
{

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
