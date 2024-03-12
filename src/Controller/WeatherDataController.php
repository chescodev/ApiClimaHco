<?php
declare(strict_types=1);

namespace App\Controller;

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
        $weatherData = $this->paginate($this->WeatherData);

        $this->paginate = [
            'limit' => 10, // Número de registros por página
            'order' => ['time' => 'desc'] // Ordenar por fecha y hora descendente
        ];
    
        // Obtener los datos meteorológicos paginados
        $weatherData = $this->paginate($this->WeatherData);
        
        // Pasar los datos paginados a la vista
        //$this->set(compact('weatherData'));



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
        $weatherData = $this->WeatherData->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('weatherData'));
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
}
