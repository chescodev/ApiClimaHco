
<?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>




    <?= $this->Form->create(null, ['url' => ['action' => 'search'], 'class' => 'date-picker']) ?>
        <div class="form-group">
            <label for="startDateTable">Fecha de Inicio:</label>
            <?= $this->Form->input('start_date_table', ['type' => 'date', 'class' => 'form-control']) ?>
        </div>
        <div class="form-group">
            <label for="endDateTable">Fecha de Fin:</label>
            <?= $this->Form->input('end_date_table', ['type' => 'date', 'class' => 'form-control']) ?>
        </div>
        <?= $this->Form->submit('Buscar', ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>



<?= $this->Form->create(null, ['url' => ['action' => 'search'], 'class' => 'flex items-center']) ?>
    <div class="relative">
        <?= $this->Form->input('start_date_table', ['type' => 'date', 'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5', 'placeholder' => 'Seleccionar Fecha Inicial']) ?>
    </div>
    <span class="mx-4 text-gray-500">hasta</span>
    <div class="relative">
        <?= $this->Form->input('end_date_table', ['type' => 'date', 'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
             focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5', 'placeholder' => 'Seleccionar Fecha final']) ?>
    </div>
    <?= $this->Form->submit('Buscar', ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>


<?= $this->Form->create(null, ['url' => ['action' => 'search'], 'class' => '']) ?>
    <div date-rangepicker class="flex items-center">
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                </svg>
            </div>
            <?= $this->Form->input('start_date_table', ['type' => 'date', 'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5', 'placeholder' => 'Seleccionar Fecha Inicial']) ?>
        </div>
        <span class="mx-4 text-gray-500">to</span>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                </svg>
            </div>
            <?= $this->Form->input('end_date_table', ['type' => 'date', 'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
             focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5', 'placeholder' => 'Seleccionar Fecha final']) ?>
        </div>
        <div>
            <?= $this->Form->submit('Buscar', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>