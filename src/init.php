<?php

use douggonsouza\request\routings;
use douggonsouza\gentelela\identify;
use douggonsouza\routes\router;
use douggonsouza\request\requested;
use douggonsouza\routes\dicionary;
use douggonsouza\mvc\model\connection\conn;
use douggonsouza\gentelela\benchmarck;
use douggonsouza\language\language;
use douggonsouza\request\usages;
use douggonsouza\mvc\model\configs;

// conexão com o banco
conn::connection('localhost','douggonsouza','Ds@468677','discovery');
// conn::connection('sql204.epizy.com','epiz_33497254','VKbVYbrgDkJ','epiz_33497254_discovery');

// constantes globais
define('DEFAULT_TEMPLATES_BENCHMARCK',BASE_DIR . '/vendor/douggonsouza/gentelela/src/templates.php');

// include templates
include(configs::get('DEFAULT_TEMPLATE'));

// Adiciona routings
routings::add('default', configs::get('routings'));
routings::add('/admin/',__DIR__ . '/routing.php');
routings::add('/api/'  ,__DIR__ . '/routing.php');

// adiciona configurações blocos benchmarck
$benchmarck = new benchmarck(new language(array('pt-br' => configs::get('DEFAULT_LANGUAGE'))));
$benchmarck::setIdentify(new identify(configs::get('DEFAULT_CONFIGS_BENCHMARCK')));

// route
router::dicionary(new dicionary());
router::benchmarck($benchmarck);
requested::routing(router::usages(requested::usages(new usages(new dicionary()))));
?>
