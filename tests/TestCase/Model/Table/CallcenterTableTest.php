<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CallcenterTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CallcenterTable Test Case
 */
class CallcenterTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CallcenterTable
     */
    public $Callcenter;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.callcenter',
        'app.users',
        'app.delivery',
        'app.suppliers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Callcenter') ? [] : ['className' => 'App\Model\Table\CallcenterTable'];
        $this->Callcenter = TableRegistry::get('Callcenter', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Callcenter);

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
