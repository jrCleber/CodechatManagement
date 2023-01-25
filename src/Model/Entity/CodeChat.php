<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CodeChat Entity
 *
 * @property int $id
 * @property string $numero
 * @property string $user_id
 * @property int $server_id
 * @property string $api
 * @property string $api_key
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \CakeDC\Users\Model\Entity\User $user
 * @property \App\Model\Entity\Server $server
 * @property \App\Model\Entity\Chatwoot[] $chatwoots
 */
class CodeChat extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'numero' => true,
        'user_id' => true,
        'server_id' => true,
        'api' => true,
        'api_key' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'server' => true,
        'chatwoots' => true,
    ];
}
