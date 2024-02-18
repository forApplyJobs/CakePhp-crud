<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cvlist Model
 *
 * @property \App\Model\Table\InfosTable&\Cake\ORM\Association\BelongsTo $Infos
 *
 * @method \App\Model\Entity\Cvlist newEmptyEntity()
 * @method \App\Model\Entity\Cvlist newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Cvlist> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cvlist get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Cvlist findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Cvlist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Cvlist> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cvlist|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Cvlist saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Cvlist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cvlist>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cvlist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cvlist> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cvlist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cvlist>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cvlist>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cvlist> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CvlistTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('cvlist');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Infos', [
            'foreignKey' => 'info_id',
        ]);
        $this->hasMany('Experiences', [
            'foreignKey' => 'cvlist_id',
        ]);
        $this->hasMany('Projects', [
            'foreignKey' => 'cvlist_id',
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
            ->integer('info_id')
            ->allowEmptyString('info_id');

        $validator
            ->scalar('title')
            ->maxLength('title', 100)
            ->allowEmptyString('title');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

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
        $rules->add($rules->existsIn(['info_id'], 'Infos'), ['errorField' => 'info_id']);

        return $rules;
    }
}
