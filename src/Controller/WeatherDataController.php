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
        $selectedDate = null;
        $weatherData = [];

        if ($this->request->is('post')) {
            $selectedDate = $this->request->getData('selected_date');
            // Realiza la búsqueda filtrando por la fecha seleccionada
            $weatherData = $this->WeatherData->find()
                ->where([
                    'DATE(time)' => $selectedDate // Filtra por la fecha sin tener en cuenta la hora
                ])
                ->order(['time' => 'DESC']) // Opcional: ordena los resultados por fecha y hora descendente
                ->toArray();
        }

        $this->set(compact('selectedDate', 'weatherData'));
    }

    public function temperatureChartData()
{
    $temperatureData = $this->WeatherData->find()
        ->select(['time', 'outdoor_temp'])
        ->toArray();

    $dailyTemperatures = [];
    foreach ($temperatureData as $data) {
        $date = $data->time->format('Y-m-d');
        $dailyTemperatures[$date][] = $data->outdoor_temp;
    }

    $averageTemperatures = [];
    foreach ($dailyTemperatures as $date => $temperatures) {
        $averageTemperatures[$date] = array_sum($temperatures) / count($temperatures);
    }

    $labels = array_keys($averageTemperatures);
    $data = array_values($averageTemperatures);

    $this->set(compact('labels', 'data'));
}


}
