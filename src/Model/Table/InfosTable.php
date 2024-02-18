<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Infos Model
 *
 * @property \App\Model\Table\CvlistTable&\Cake\ORM\Association\HasMany $Cvlist
 *
 * @method \App\Model\Entity\Info newEmptyEntity()
 * @method \App\Model\Entity\Info newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Info> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Info get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Info findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Info patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Info> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Info|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Info saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Info>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Info>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Info>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Info> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Info>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Info>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Info>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Info> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InfosTable extends Table
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

        $this->setTable('infos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Cvlist', [
            'foreignKey' => 'info_id',
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
            ->scalar('first_name')
            ->maxLength('first_name', 50)
            ->allowEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 50)
            ->allowEmptyString('last_name');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 20)
            ->allowEmptyString('phone');

        return $validator;
    }
}
