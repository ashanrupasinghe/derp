<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CartProductsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CartProductsController Test Case
 */
class CartProductsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cart_products',
        'app.carts',
        'app.products',
        'app.order_products',
        'app.orders',
        'app.supplier_notifications',
        'app.suppliers',
        'app.product_suppliers',
        'app.users',
        'app.callcenter',
        'app.city',
        'app.delivery',
        'app.delivery_notifications',
        'app.user_notifications',
        'app.callcenter',
        'app.delivery',
        'app.customers',
        'app.package_type',
        'app.products',
        'app.categories'
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
