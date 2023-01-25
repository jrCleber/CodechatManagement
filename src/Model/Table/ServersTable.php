<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Servers Model
 *
 * @property \App\Model\Table\CodeChatsTable&\Cake\ORM\Association\HasMany $CodeChats
 *
 * @method \App\Model\Entity\Server newEmptyEntity()
 * @method \App\Model\Entity\Server newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Server[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Server get($primaryKey, $options = [])
 * @method \App\Model\Entity\Server findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Server patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Server[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Server|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Server saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Server[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Server[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Server[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Server[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ServersTable extends Table
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

        $this->setTable('servers');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('CodeChats', [
            'foreignKey' => 'server_id',
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
            ->scalar('nome')
            ->maxLength('nome', 30)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('url')
            ->maxLength('url', 255)
            ->requirePresence('url', 'create')
            ->notEmptyString('url');

        $validator
            ->scalar('api_geral')
            ->maxLength('api_geral', 255)
            ->requirePresence('api_geral', 'create')
            ->notEmptyString('api_geral');

        return $validator;
    }
}
