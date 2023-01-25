<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chatwoots Model
 *
 * @property \App\Model\Table\CodeChatsTable&\Cake\ORM\Association\BelongsTo $CodeChats
 *
 * @method \App\Model\Entity\Chatwoot newEmptyEntity()
 * @method \App\Model\Entity\Chatwoot newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Chatwoot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Chatwoot get($primaryKey, $options = [])
 * @method \App\Model\Entity\Chatwoot findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Chatwoot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Chatwoot[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Chatwoot|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chatwoot saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chatwoot[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Chatwoot[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Chatwoot[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Chatwoot[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ChatwootsTable extends Table
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

        $this->setTable('chatwoots');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CodeChats', [
            'foreignKey' => 'code_chat_id',
            'joinType' => 'INNER',
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
            ->integer('code_chat_id')
            ->notEmptyString('code_chat_id');

        $validator
            ->integer('inbox')
            ->requirePresence('inbox', 'create')
            ->notEmptyString('inbox');

        $validator
            ->scalar('user_api')
            ->maxLength('user_api', 255)
            ->requirePresence('user_api', 'create')
            ->notEmptyString('user_api');

        $validator
            ->integer('account_id')
            ->requirePresence('account_id', 'create')
            ->notEmptyString('account_id');

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
        $rules->add($rules->existsIn('code_chat_id', 'CodeChats'), ['errorField' => 'code_chat_id']);

        return $rules;
    }
}
