<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserNotificationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserNotificationsTable Test Case
 */
class UserNotificationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserNotificationsTable
     */
    public $UserNotifications;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_notifications'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserNotifications') ? [] : ['className' => 'App\Model\Table\UserNotificationsTable'];
        $this->UserNotifications = TableRegistry::get('UserNotifications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserNotifications);

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
