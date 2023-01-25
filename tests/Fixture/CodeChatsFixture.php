<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CodeChatsFixture
 */
class CodeChatsFixture extends TestFixture
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
                'numero' => 'Lorem ipsum dolor sit amet',
                'user_id' => 'c0483d1b-ecdf-4b2b-a572-3e943dadfd91',
                'server_id' => 1,
                'api' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'api_key' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-01-18 21:14:35',
                'modified' => '2023-01-18 21:14:35',
            ],
        ];
        parent::init();
    }
}
