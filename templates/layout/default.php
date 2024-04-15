<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('script') ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.1/tailwind.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
</head>

<body>
<header class="flex items-center justify-between w-full mb-2 px-4 md:px-6 h-16 border-b bg-blue-950">
        <a class="flex items-center" href="#">
            <img src="<?= $this->Url->webroot('img/senati.svg') ?>" alt="Logo de Senati" class="h-8">
            <span class="sr-only">Senati</span>
        </a>
        <nav class="flex items-center space-x-4">
            <a href="#">
                <?= $this->Html->link('Hoy', ['controller' => 'WeatherData', 'action' => 'last_data'], ['class' => 'text-white']) ?>
            </a>
            <a href="#">
                <?= $this->Html->link('Buscar Datos', ['controller' => 'WeatherData', 'action' => 'search'], ['class' => 'text-white']) ?>
            </a>
            <a href="#">
                <?= $this->Html->link('Gráficos', ['controller' => 'WeatherData', 'action' => 'graphics'], ['class' => 'text-white']) ?>
            </a>
            <a href="#">
                <?= $this->Html->link('Filtro', ['controller' => 'WeatherData', 'action' => 'display'], ['class' => 'text-white']) ?>
            </a>
        </nav>
    </header>

    <main>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>

</body>

</html>

<style>
    a {
        text-decoration: none;
    }

</style>