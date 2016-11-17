<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SupplierNotificationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SupplierNotificationsTable Test Case
 */
class SupplierNotificationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SupplierNotificationsTable
     */
    public $SupplierNotifications;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.supplier_notifications'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SupplierNotifications') ? [] : ['className' => 'App\Model\Table\SupplierNotificationsTable'];
        $this->SupplierNotifications = TableRegistry::get('SupplierNotifications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SupplierNotifications);

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
}
