<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bilka Model
 *
 * @method \App\Model\Entity\Bilka newEmptyEntity()
 * @method \App\Model\Entity\Bilka newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Bilka> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bilka get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Bilka findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Bilka patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Bilka> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bilka|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Bilka saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Bilka>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Bilka>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Bilka>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Bilka> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Bilka>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Bilka>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Bilka>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Bilka> deleteManyOrFail(iterable $entities, array $options = [])
 */
class BilkaTable extends Table
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

        $this->setTable('bilka');
        $this->setDisplayField('yas');
        $this->setPrimaryKey('yas');
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
            ->scalar('ad')
            ->requirePresence('ad', 'create')
            ->notEmptyString('ad');

        $validator
            ->scalar('soyad')
            ->requirePresence('soyad', 'create')
            ->notEmptyString('soyad');

        $validator
            ->integer('boy')
            ->requirePresence('boy', 'create')
            ->notEmptyString('boy');

        return $validator;
    }
}
