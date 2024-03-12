<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WeatherDataFixture
 */
class WeatherDataFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'clima';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'time' => '2024-03-12 16:40:18',
                'intervalo' => 1,
                'indoor_temp' => 1,
                'indoor_hum' => 1,
                'outdoor_temp' => 1,
                'outdoor_hum' => 1,
                'rel_pres' => 1,
                'abs_pres' => 1,
                'wind_speed' => 1,
                'gust' => 1,
                'wind_dir' => 'Lo',
                'dew_point' => 1,
                'wind_chill' => 1,
                'hour_rain' => 1,
                'day_rain' => 1,
                'week_rain' => 1,
                'month_rain' => 1,
                'light' => 1,
                'uvi' => 1,
            ],
        ];
        parent::init();
    }
}
