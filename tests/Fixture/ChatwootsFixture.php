<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ChatwootsFixture
 */
class ChatwootsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'code_chat_id' => 1,
                'inbox' => 1,
                'user_api' => 'Lorem ipsum dolor sit amet',
                'account_id' => 1,
                'created' => '2023-01-18 03:37:39',
                'modified' => '2023-01-18 03:37:39',
                'id' => 1,
            ],
        ];
        parent::init();
    }
}
