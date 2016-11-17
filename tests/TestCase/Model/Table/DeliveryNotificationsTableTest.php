<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeliveryNotificationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeliveryNotificationsTable Test Case
 */
class DeliveryNotificationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DeliveryNotificationsTable
     */
    public $DeliveryNotifications;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.delivery_notifications'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DeliveryNotifications') ? [] : ['className' => 'App\Model\Table\DeliveryNotificationsTable'];
        $this->DeliveryNotifications = TableRegistry::get('DeliveryNotifications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DeliveryNotifications);

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
