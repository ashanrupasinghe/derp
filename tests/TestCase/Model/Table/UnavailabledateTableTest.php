<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UnavailabledateTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UnavailabledateTable Test Case
 */
class UnavailabledateTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UnavailabledateTable
     */
    public $Unavailabledate;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.unavailabledate'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Unavailabledate') ? [] : ['className' => 'App\Model\Table\UnavailabledateTable'];
        $this->Unavailabledate = TableRegistry::get('Unavailabledate', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Unavailabledate);

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
