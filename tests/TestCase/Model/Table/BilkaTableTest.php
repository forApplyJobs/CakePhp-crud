<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BilkaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BilkaTable Test Case
 */
class BilkaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BilkaTable
     */
    protected $Bilka;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Bilka',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Bilka') ? [] : ['className' => BilkaTable::class];
        $this->Bilka = $this->getTableLocator()->get('Bilka', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Bilka);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BilkaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
