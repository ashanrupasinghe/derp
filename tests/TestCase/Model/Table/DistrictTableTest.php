<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DistrictTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DistrictTable Test Case
 */
class DistrictTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DistrictTable
     */
    public $District;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.district'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('District') ? [] : ['className' => 'App\Model\Table\DistrictTable'];
        $this->District = TableRegistry::get('District', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->District);

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
