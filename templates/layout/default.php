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
    
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="flex justify-between items-center py-5 mx-8">
        <div class="tflex items-center gap-x-10 ocpacity-80">
            <a href="http://localhost:8765/WeatherData/" target="_self" rel="noopener">
                <img class="img-senati" alt="Senati" src="<?= $this->Url->webroot('img/senati.svg') ?>" width="150" />
            </a>
        </div>
        <div class="top-nav-links">
            <a target="_blank" rel="noopener" href="https://book.cakephp.org/4/">Login</a>
            <a target="_blank" rel="noopener" href="https://api.cakephp.org/">Register</a>
        </div>
    </nav>
    <main class="main">
        <!-- Navigation Bar -->
        <!--nav class="navbar navbar-expand-lg navbar-dark bg-dark"-->
    <!--div class="container-fluid justify-content-center"> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?= $this->Html->link('Buscar Datos', ['controller' => 'WeatherData', 'action' => 'search'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Gráficos', ['controller' => 'WeatherData', 'action' => 'graphics'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Filtro', ['controller' => 'WeatherData', 'action' => 'display'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Hoy', ['controller' => 'WeatherData', 'action' => 'last_data'], ['class' => 'nav-link']) ?>
                </li>
            </ul>
        </div>
    </div-->
    <nav class="links flex flex-col items-center justify-center w-full text-center gap-x-5 md:flex-row">
        <a class="links-item">
            <?= $this->Html->link('Buscar Datos', ['controller' => 'WeatherData', 'action' => 'search'], ['class' => 'nav-link']) ?>
        </a>
        <a class="links-item">
            <?= $this->Html->link('Gráficos', ['controller' => 'WeatherData', 'action' => 'graphics'], ['class' => 'nav-link']) ?>
        </li>
        <a class="links-item">
            <?= $this->Html->link('Filtro', ['controller' => 'WeatherData', 'action' => 'display'], ['class' => 'nav-link']) ?>
        </a>
        <a class="links-item text-red">
            <?= $this->Html->link('Hoy', ['controller' => 'WeatherData', 'action' => 'last_data'], ['class' => 'nav-link']) ?>
        </a>
    </nav>
<!--/nav-->
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
<script src="https://cdn.tailwindcss.com"></script>


<style>
    .links {
        display: flex;
        flex-direction: row;
        text-align: center;
        width: 100%;
        align-items: center;
        background-color: white;
    }

    .links-item {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }


</style>