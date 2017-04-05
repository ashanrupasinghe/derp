<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CartController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CartController Test Case
 */
class CartControllerTest extends IntegrationTestCase
{

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
        'app.cart_products',
        'app.supplier_notifications',
        'app.user_notifications',
        'app.callcenter',
        'app.delivery',
        'app.customers',
        'app.sessions'
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
