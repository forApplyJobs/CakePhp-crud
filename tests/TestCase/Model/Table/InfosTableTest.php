<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InfosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InfosTable Test Case
 */
class InfosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InfosTable
     */
    protected $Infos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Infos',
        'app.Cvlist',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Infos') ? [] : ['className' => InfosTable::class];
        $this->Infos = $this->getTableLocator()->get('Infos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Infos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\InfosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
