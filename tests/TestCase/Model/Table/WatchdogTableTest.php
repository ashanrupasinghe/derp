<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WatchdogTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WatchdogTable Test Case
 */
class WatchdogTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WatchdogTable
     */
    public $Watchdog;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.watchdog'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Watchdog') ? [] : ['className' => 'App\Model\Table\WatchdogTable'];
        $this->Watchdog = TableRegistry::get('Watchdog', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Watchdog);

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
