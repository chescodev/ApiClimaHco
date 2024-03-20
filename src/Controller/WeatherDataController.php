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
                ->order(['time' => 'DESC']) // Opcional: ordena los resultados por fecha y hora descendente
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
    
        $this->set(compact('startDate', 'endDate', 'lightLabels', 'lightValues', 'uviLabels', 'uviValues', 'outTempLabels', 'outTempValues'));
    }
    
    
    


    
    
    


    /*
    public function lightChartData()
    {
        $lightData = $this->WeatherData->find()
            ->select(['time', 'light'])
            ->toArray();

        $dailyLight = [];
        foreach ($lightData as $data) {
            $date = $data->time->format('Y-m-d');
            $dailyLight[$date][] = $data->light;
        }

        $averageLight = [];
        foreach ($dailyLight as $date => $lightValues) {
            $averageLight[$date] = array_sum($lightValues) / count($lightValues);
        }

        $labels = array_keys($averageLight);
        $data = array_values($averageLight);

        $this->set(compact('labels', 'data'));
    }*/


}


/* 
    *** TODO ***
    * Arreglar etilos en todas las paginas
    * Definir que paginas se usaran y no ir inventando en el camino
    * Ver tema de graficos
    * Agregar un segundo filtro por fechas
    * Agregar login y register
    * Ver si se puede reutilizar codigo con componentes
    

*/





