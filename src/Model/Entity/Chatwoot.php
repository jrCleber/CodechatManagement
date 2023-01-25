<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chatwoot Entity
 *
 * @property int $code_chat_id
 * @property int $inbox
 * @property string $user_api
 * @property int $account_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $id
 *
 * @property \App\Model\Entity\CodeChat $code_chat
 */
class Chatwoot extends Entity
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
        'code_chat_id' => true,
        'inbox' => true,
        'user_api' => true,
        'account_id' => true,
        'created' => true,
        'modified' => true,
        'code_chat' => true,
    ];
}
