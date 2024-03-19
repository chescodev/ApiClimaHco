/* FUNCIONA SOLO FILTRANDO POR UNA FECHA */

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
                ->order(['time' => 'ASC']) // Opcional: ordena los resultados por fecha y hora descendente
                ->toArray();
        }

        $this->set(compact('selectedDate', 'weatherData'));

    }




<?= $this->Form->create(null, ['url' => ['action' => 'search'], 'class' => 'date-picker']) ?>
<?= $this->Form->input('selected_date', ['type' => 'date', 'class' => 'form-control']) ?>
<?= $this->Form->submit('Buscar') ?>
<?= $this->Form->end() ?>