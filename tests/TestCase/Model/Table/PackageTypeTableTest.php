<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PackageTypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PackageTypeTable Test Case
 */
class PackageTypeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PackageTypeTable
     */
    public $PackageType;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.package_type'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PackageType') ? [] : ['className' => 'App\Model\Table\PackageTypeTable'];
        $this->PackageType = TableRegistry::get('PackageType', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PackageType);

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
