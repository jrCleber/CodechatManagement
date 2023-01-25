<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CodeChatsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CodeChatsTable Test Case
 */
class CodeChatsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CodeChatsTable
     */
    protected $CodeChats;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CodeChats',
        'app.Users',
        'app.Servers',
        'app.Chatwoots',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CodeChats') ? [] : ['className' => CodeChatsTable::class];
        $this->CodeChats = $this->getTableLocator()->get('CodeChats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CodeChats);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CodeChatsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CodeChatsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
