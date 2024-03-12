<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WeatherData Model
 *
 * @method \App\Model\Entity\WeatherData newEmptyEntity()
 * @method \App\Model\Entity\WeatherData newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\WeatherData[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WeatherData get($primaryKey, $options = [])
 * @method \App\Model\Entity\WeatherData findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\WeatherData patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WeatherData[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\WeatherData|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WeatherData saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WeatherData[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\WeatherData[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\WeatherData[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\WeatherData[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class WeatherDataTable extends Table
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

        $this->setTable('clima');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->dateTime('time')
            ->allowEmptyDateTime('time');

        $validator
            ->integer('intervalo')
            ->allowEmptyString('intervalo');

        $validator
            ->numeric('indoor_temp')
            ->allowEmptyString('indoor_temp');

        $validator
            ->integer('indoor_hum')
            ->allowEmptyString('indoor_hum');

        $validator
            ->numeric('outdoor_temp')
            ->allowEmptyString('outdoor_temp');

        $validator
            ->integer('outdoor_hum')
            ->allowEmptyString('outdoor_hum');

        $validator
            ->numeric('rel_pres')
            ->allowEmptyString('rel_pres');

        $validator
            ->numeric('abs_pres')
            ->allowEmptyString('abs_pres');

        $validator
            ->numeric('wind_speed')
            ->allowEmptyString('wind_speed');

        $validator
            ->numeric('gust')
            ->allowEmptyString('gust');

        $validator
            ->scalar('wind_dir')
            ->maxLength('wind_dir', 4)
            ->allowEmptyString('wind_dir');

        $validator
            ->numeric('dew_point')
            ->allowEmptyString('dew_point');

        $validator
            ->numeric('wind_chill')
            ->allowEmptyString('wind_chill');

        $validator
            ->numeric('hour_rain')
            ->allowEmptyString('hour_rain');

        $validator
            ->numeric('day_rain')
            ->allowEmptyString('day_rain');

        $validator
            ->numeric('week_rain')
            ->allowEmptyString('week_rain');

        $validator
            ->numeric('month_rain')
            ->allowEmptyString('month_rain');

        $validator
            ->numeric('light')
            ->allowEmptyString('light');

        $validator
            ->integer('uvi')
            ->allowEmptyString('uvi');

        return $validator;
    }
}
