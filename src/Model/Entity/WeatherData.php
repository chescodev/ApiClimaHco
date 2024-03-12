<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WeatherData Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime|null $time
 * @property int|null $intervalo
 * @property float|null $indoor_temp
 * @property int|null $indoor_hum
 * @property float|null $outdoor_temp
 * @property int|null $outdoor_hum
 * @property float|null $rel_pres
 * @property float|null $abs_pres
 * @property float|null $wind_speed
 * @property float|null $gust
 * @property string|null $wind_dir
 * @property float|null $dew_point
 * @property float|null $wind_chill
 * @property float|null $hour_rain
 * @property float|null $day_rain
 * @property float|null $week_rain
 * @property float|null $month_rain
 * @property float|null $light
 * @property int|null $uvi
 */
class WeatherData extends Entity
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
        'time' => true,
        'intervalo' => true,
        'indoor_temp' => true,
        'indoor_hum' => true,
        'outdoor_temp' => true,
        'outdoor_hum' => true,
        'rel_pres' => true,
        'abs_pres' => true,
        'wind_speed' => true,
        'gust' => true,
        'wind_dir' => true,
        'dew_point' => true,
        'wind_chill' => true,
        'hour_rain' => true,
        'day_rain' => true,
        'week_rain' => true,
        'month_rain' => true,
        'light' => true,
        'uvi' => true,
    ];
}
