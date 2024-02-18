<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CvlistTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CvlistTable Test Case
 */
class CvlistTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CvlistTable
     */
    protected $Cvlist;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Cvlist',
        'app.Infos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Cvlist') ? [] : ['className' => CvlistTable::class];
        $this->Cvlist = $this->getTableLocator()->get('Cvlist', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Cvlist);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CvlistTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CvlistTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
