<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChatwootsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChatwootsTable Test Case
 */
class ChatwootsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChatwootsTable
     */
    protected $Chatwoots;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Chatwoots',
        'app.CodeChats',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Chatwoots') ? [] : ['className' => ChatwootsTable::class];
        $this->Chatwoots = $this->getTableLocator()->get('Chatwoots', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Chatwoots);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ChatwootsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ChatwootsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
