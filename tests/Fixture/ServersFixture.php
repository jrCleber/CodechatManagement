<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ServersFixture
 */
class ServersFixture extends TestFixture
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
                'id' => 1,
                'nome' => 'Lorem ipsum dolor sit amet',
                'url' => 'Lorem ipsum dolor sit amet',
                'api_geral' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-01-18 03:29:33',
                'modified' => '2023-01-18 03:29:33',
            ],
        ];
        parent::init();
    }
}
