<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projects Model
 *
 * @property \App\Model\Table\CvlistTable&\Cake\ORM\Association\BelongsTo $Cvlist
 *
 * @method \App\Model\Entity\Project newEmptyEntity()
 * @method \App\Model\Entity\Project newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Project> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Project get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Project findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Project patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Project> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Project|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Project saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Project>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Project>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Project>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Project> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Project>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Project>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Project>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Project> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProjectsTable extends Table
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

        $this->setTable('projects');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Cvlist', [
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
            ->integer('cvlist_id')
            ->allowEmptyString('cvlist_id');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
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
        $rules->add($rules->existsIn(['cvlist_id'], 'Cvlist'), ['errorField' => 'cvlist_id']);

        return $rules;
    }
}
