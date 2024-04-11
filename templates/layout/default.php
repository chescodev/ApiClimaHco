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
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header class="flex items-center justify-between py-0 mx-8">
        <section class="flex items-center gap-x-10 opacity-80">
            <a href="/www.senati.pe">
                <img src="<?= $this->Url->webroot('img/senati.svg') ?>" alt="Logo de Senati" class="rounded-full w-20 h-20 cursor-pointer">
            </a>
        </section>

        <section class="flex flex-row justify-center content-between w-full text-center items-center">
            <a class="">
                <?= $this->Html->link('Hoy', ['controller' => 'WeatherData', 'action' => 'last_data'], ['class' => 'bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-black py-2 px-4 border border-blue-500 hover:border-transparent rounded']) ?>
            </a>
            <a class="">
                <?= $this->Html->link('Buscar Datos', ['controller' => 'WeatherData', 'action' => 'search'], ['class' => 'bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-black py-2 px-4 border border-blue-500 hover:border-transparent rounded']) ?>
            </a>
            <a class="">
                <?= $this->Html->link('Gráficos', ['controller' => 'WeatherData', 'action' => 'graphics'], ['class' => 'bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-black py-2 px-4 border border-blue-500 hover:border-transparent rounded']) ?>
            </a>
            <a class="">
                <?= $this->Html->link('Filtro', ['controller' => 'WeatherData', 'action' => 'display'], ['class' => 'bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-black py-2 px-4 border border-blue-500 hover:border-transparent rounded']) ?>
            </a>
        </section>

        <section class="flex flex-row justify-center gap-x-5 opacity-80">
            <a href="/" class="text-black cursor-pointer hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-[#1da1f2]/50 font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 mr-2 mb-2 hover:shadow-lg transition-all duration-200 ease-in-out hover:scale-70 scale-90 gap-x-2 opacity-90 hover:opacity-100">
                Login
            </a>
            <a href="/" class="text-black cursor-pointer hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-[#1da1f2]/50 font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 mr-2 mb-2 hover:shadow-lg transition-all duration-200 ease-in-out hover:scale-70 scale-90 gap-x-2 opacity-90 hover:opacity-100">
                Regístrate
            </a>
        </section>
    </header>

    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>

</body>

</html>

<style>
    a {
        text-decoration: none;
    }
</style>