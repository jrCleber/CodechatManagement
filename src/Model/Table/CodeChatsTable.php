<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CodeChats Model
 *
 * @property \CakeDC\Users\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ServersTable&\Cake\ORM\Association\BelongsTo $Servers
 * @property \App\Model\Table\ChatwootsTable&\Cake\ORM\Association\HasMany $Chatwoots
 *
 * @method \App\Model\Entity\CodeChat newEmptyEntity()
 * @method \App\Model\Entity\CodeChat newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CodeChat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CodeChat get($primaryKey, $options = [])
 * @method \App\Model\Entity\CodeChat findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CodeChat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CodeChat[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CodeChat|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CodeChat saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CodeChat[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CodeChat[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CodeChat[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CodeChat[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CodeChatsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('code_chats');
        $this->setDisplayField('numero');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Servers', [
            'foreignKey' => 'server_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Chatwoots', [
            'foreignKey' => 'code_chat_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('numero')
            ->maxLength('numero', 30)
            ->requirePresence('numero', 'create')
            ->notEmptyString('numero');

        $validator
            ->uuid('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('server_id')
            ->notEmptyString('server_id');

        $validator
            ->scalar('api')
            ->requirePresence('api', 'create')
            ->notEmptyString('api');

        $validator
            ->scalar('api_key')
            ->maxLength('api_key', 255)
            ->requirePresence('api_key', 'create')
            ->notEmptyString('api_key');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('server_id', 'Servers'), ['errorField' => 'server_id']);

        return $rules;
    }
}
