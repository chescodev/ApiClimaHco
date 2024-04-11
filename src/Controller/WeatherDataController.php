<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenDate;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Date;
use Cake\Database\Expression\QueryExpression;

/**
 * WeatherData Controller
 *
 * @method \App\Model\Entity\WeatherData[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WeatherDataController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function index()
    {

        $this->paginate = [
            'limit' => 100, // Número de registros por página
            'order' => ['time' => 'desc'] // Ordenar por fecha y hora descendente
        ];
    
        // Obtener los datos meteorológicos paginados
        $weatherData = $this->paginate($this->WeatherData);
        

        $this->set(compact('weatherData'));
    }

    /**
     * View method
     *
     * @param string|null $id Weather Data id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        
        $weatherDataTable = $this->getTableLocator()->get('WeatherData');

        $weatherData = $this->WeatherData->get($id, [
            'contain' => [],
        ]);

        $data = $weatherDataTable->find('all')->limit(5000)->toArray();

        $this->set(compact('weatherData', 'data'));
        
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $weatherData = $this->WeatherData->newEmptyEntity();
        if ($this->request->is('post')) {
            $weatherData = $this->WeatherData->patchEntity($weatherData, $this->request->getData());
            if ($this->WeatherData->save($weatherData)) {
                $this->Flash->success(__('The weather data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The weather data could not be saved. Please, try again.'));
        }
        $this->set(compact('weatherData'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Weather Data id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $weatherData = $this->WeatherData->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $weatherData = $this->WeatherData->patchEntity($weatherData, $this->request->getData());
            if ($this->WeatherData->save($weatherData)) {
                $this->Flash->success(__('The weather data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The weather data could not be saved. Please, try again.'));
        }
        $this->set(compact('weatherData'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Weather Data id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $weatherData = $this->WeatherData->get($id);
        if ($this->WeatherData->delete($weatherData)) {
            $this->Flash->success(__('The weather data has been deleted.'));
        } else {
            $this->Flash->error(__('The weather data could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
 

    public function search()
    {

        $startDateTable = null;
        $endDateTable = null;
        $weatherData = [];

        if ($this->request->is('post')) {
            $startDateTable = $this->request->getData('start_date_table');
            $endDateTable = $this->request->getData('end_date_table');
            
            // Realiza la búsqueda filtrando por el intervalo de fechas seleccionado
            $weatherData = $this->WeatherData->find()
                ->where(function ($exp, $q) use ($startDateTable, $endDateTable) {
                    return $exp->between('time', $startDateTable, $endDateTable, 'date');
                })
                ->order(['time' => 'ASC']) // Opcional: ordena los resultados por fecha y hora descendente
                ->toArray();
        }

        $this->set(compact('startDateTable', 'endDateTable', 'weatherData'));

    }

    public function graphics()
    {
        $startDate = null;
        $endDate = null;
        $lightData = [];
        $uviData = [];
        $outTempData = [];
        $dewPointData = [];
        $windSpeedData = [];
        $windGustData = [];
        $windDirectionData = [];
        $absPresData = [];
        $dayRainData = [];

    
        if ($this->request->is('post')) {
            $startDate = $this->request->getData('start_date');
            $endDate = $this->request->getData('end_date');
            
            // Consultar los datos de luz filtrados por las fechas proporcionadas
            $lightData = $this->WeatherData->find()
                ->select(['time', 'light'])
                ->where(function ($exp, $q) use ($startDate, $endDate) {
                    return $exp->between('time', $startDate, $endDate, 'date');
                })
                ->order(['time' => 'ASC'])
                ->toArray();
    
            // Consultar los datos de UVI filtrados por las fechas proporcionadas
            $uviData = $this->WeatherData->find()
                ->select(['time', 'uvi'])
                ->where(function ($exp, $q) use ($startDate, $endDate) {
                    return $exp->between('time', $startDate, $endDate, 'date');
                })
                ->order(['time' => 'ASC'])
                ->toArray();

            $outTempData = $this->WeatherData->find()
            ->select(['time', 'outdoor_temp'])
            ->where(function ($exp, $q) use ($startDate, $endDate) {
                return $exp->between('time', $startDate, $endDate, 'date');
            })
            ->order(['time'=> 'ASC'])
            ->toArray();
            
            // Consultar los datos de punto de rocío filtrados por las fechas proporcionadas
            $dewPointData = $this->WeatherData->find()
            ->select(['time', 'dew_point'])
            ->where(function ($exp, $q) use ($startDate, $endDate) {
                return $exp->between('time', $startDate, $endDate, 'date');
            })
            ->order(['time'=> 'ASC'])
            ->toArray();

            // Consultar los datos de velocidad del viento filtrados por las fechas proporcionadas
            $windSpeedData = $this->WeatherData->find()
                ->select(['time', 'wind_speed'])
                ->where(function ($exp, $q) use ($startDate, $endDate) {
                    return $exp->between('time', $startDate, $endDate, 'date');
                })
                ->order(['time'=> 'ASC'])
                ->toArray();

            // Consultar los datos de ráfaga del viento filtrados por las fechas proporcionadas
            $windGustData = $this->WeatherData->find()
                ->select(['time', 'gust'])
                ->where(function ($exp, $q) use ($startDate, $endDate) {
                    return $exp->between('time', $startDate, $endDate, 'date');
                })
                ->order(['time'=> 'ASC'])
                ->toArray();

            // Consultar los datos de dirección del viento filtrados por las fechas proporcionadas
            $windDirectionData = $this->WeatherData->find()
                ->select(['time', 'wind_dir'])
                ->where(function ($exp, $q) use ($startDate, $endDate) {
                    return $exp->between('time', $startDate, $endDate, 'date');
                })
                ->order(['time'=> 'ASC'])
                ->toArray();

            $absPresData = $this->WeatherData->find()
            ->select(['time','abs_pres'])
            ->where(function ($exp, $q) use ($startDate, $endDate) {
                return $exp->between('time', $startDate, $endDate, 'date');
            })
            ->order(['time'=> 'ASC'])
            ->toArray();

            $dayRainData = $this->WeatherData->find()
            ->select(['time','hour_rain'])
            ->where(function ($exp, $q) use ($startDate, $endDate) {
                return $exp->between('time', $startDate, $endDate, 'date');
            })
            ->order(['time'=> 'ASC'])
            ->toArray();
        }
        
        // Procesar los datos de luz para el gráfico
        $lightLabels = [];
        $lightValues = [];
        foreach ($lightData as $data) {
            $lightLabels[] = $data->time->format('Y-m-d');
            $lightValues[] = $data->light;
        }
    
        // Procesar los datos de UVI para el gráfico
        $uviLabels = [];
        $uviValues = [];
        foreach ($uviData as $data) {
            $uviLabels[] = $data->time->format('Y-m-d');
            $uviValues[] = $data->uvi;
        }

        $outTempLabels = [];
        $outTempValues = [];
        foreach ($outTempData as $data) {
            $outTempLabels[] = $data->time->format('Y-m-d');
            $outTempValues[] = $data->outdoor_temp;
        }

        // Procesar los datos de punto de rocío para el gráfico
        $dewPointLabels = [];
        $dewPointValues = [];
        foreach ($dewPointData as $data) {
            $dewPointLabels[] = $data->time->format('Y-m-d');
            $dewPointValues[] = $data->dew_point;
        }

        // Procesar los datos de velocidad del viento para el gráfico
        $windSpeedLabels = [];
        $windSpeedValues = [];
        foreach ($windSpeedData as $data) {
            $windSpeedLabels[] = $data->time->format('Y-m-d');
            $windSpeedValues[] = $data->wind_speed;
        }

        // Procesar los datos de ráfaga del viento para el gráfico
        $windGustLabels = [];
        $windGustValues = [];
        foreach ($windGustData as $data) {
            $windGustLabels[] = $data->time->format('Y-m-d');
            $windGustValues[] = $data->gust;
        }

        // Procesar los datos de dirección del viento para el gráfico
        $windDirectionLabels = [];
        $windDirectionValues = [];
        foreach ($windDirectionData as $data) {
            $windDirectionLabels[] = $data->time->format('Y-m-d');
            $windDirectionValues[] = $data->wind_dir;
        }

        $absPresLabels = [];
        $absPresValues = [];
        foreach ($absPresData as $data) {
            $absPresLabels[] = $data->time->format('Y-m-d');
            $absPresValues[] = $data->abs_pres;
        }

        $dayRainLabels = [];
        $dayRainValues = [];
        foreach ($dayRainData as $data) {
            $dayRainLabels[] = $data->time->format('Y-m-d');
            $dayRainValues[] = $data->hour_rain;
        }
    
        $this->set(compact('startDate', 'endDate', 'lightLabels', 'lightValues', 'uviLabels', 'uviValues', 'outTempLabels', 'outTempValues', 'dewPointLabels', 'dewPointValues', 'windSpeedLabels', 'windSpeedValues', 'windGustLabels', 'windGustValues', 'windDirectionLabels', 'windDirectionValues', 'absPresLabels', 'absPresValues', 'dayRainLabels', 'dayRainValues')); 
    }
    

    public function light() {
        $startDateLight = null;
        $endDateLight = null;
        $lightData = [];
    
        if ($this->request->is('post')) {
            $startDateLight = $this->request->getData('start_date_light');
            $endDateLight = $this->request->getData('end_date_light');
            
            $lightData = $this->WeatherData->find() // Reemplaza "LightData" con el modelo correspondiente para tus datos de luz
                ->where(function ($exp, $q) use ($startDateLight, $endDateLight) {
                    return $exp->between('time', $startDateLight, $endDateLight, 'date');
                })
                ->order(['time' => 'ASC']) 
                ->toArray();
        }
    
        $lightLabels = [];
        $lightValues = [];
        foreach ($lightData as $data) {
            $lightLabels[] = $data->time->format('Y-m-d H:i:s');
            $lightValues[] = $data->light;
        }
    
        $this->set(compact('startDateLight', 'endDateLight', 'lightLabels', 'lightValues', 'lightData'));
    }

    public function display() {
        $startDate = null;
        $endDate = null;
        $selectedDataType = null;
        $data = [];
        $dataLabels = [];
        $dataValues = [];
    
        if ($this->request->is('post')) {
            $startDate = $this->request->getData('start_date');
            $endDate = $this->request->getData('end_date');
            $selectedDataType = $this->request->getData('data_type');
    
            $data = $this->WeatherData->find()
                ->where(function ($exp, $q) use ($startDate, $endDate) {
                    return $exp->between('time', $startDate, $endDate, 'date');
                })
                ->order(['time' => 'ASC'])
                ->toArray();
    
            foreach ($data as $item) {
                $dataLabels[] = $item->time->format('Y-m-d H:i:s');
                $dataValues[] = $item->$selectedDataType;
            }
        }
    
        // Obtener los nombres de los campos disponibles para el combo box
        $fields = $this->WeatherData->getSchema()->columns();

        // Eliminar los campos que no necesito
        $fieldsToRemove = ['id', 'intervalo', 'time', 'indoor_temp', 'indoor_hum', 'rel_pres', 'day_rain', 'week_rain', 'month_rain'];
        $fields = array_diff($fields, $fieldsToRemove);

        $labels = [
            'outdoor_temp' => 'Temperatura',
            'outdoor_hum' => 'Humedad',
            'abs_pres' => 'Presión Atmosférica',
            'wind_speed' => 'Velocidad del Viento',
            'gust' => 'Ráfaga de Viento',
            'wind_dir' => 'Dirección del Viento',
            'dew_point' => 'Punto de rocío',
            'wind_chill' => 'Sensación Térmica',
            'hour_rain' => 'Lluvia horaria',
            'light' => 'Energía Solar',
            'uvi' => 'Índice Ultravioleta',
        ];

        $dataTypes = [];
        foreach ($fields as $field) {
            $dataTypes[$field] = isset($labels[$field]) ? $labels[$field] : $field;
        }

        //$dataTypes = array_combine($fields, $fields);
    
        $this->set(compact('startDate', 'endDate', 'selectedDataType', 'dataLabels', 'dataValues', 'data', 'dataTypes'));
    }
    

    public function lastData() {
        $lastData = $this->WeatherData->find()
        ->order(['time' =>'desc'])
        ->first();

        $this->set(compact('lastData'));
    }
        
}






