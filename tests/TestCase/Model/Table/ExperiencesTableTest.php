<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExperiencesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExperiencesTable Test Case
 */
class ExperiencesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExperiencesTable
     */
    protected $Experiences;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Experiences',
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
        $config = $this->getTableLocator()->exists('Experiences') ? [] : ['className' => ExperiencesTable::class];
        $this->Experiences = $this->getTableLocator()->get('Experiences', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Experiences);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ExperiencesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ExperiencesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
