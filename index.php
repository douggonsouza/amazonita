<?php
session_start();

/**
 * DISCOVERY
 * Framework PHP de propósito genérico
 * 
 * @version 01.00000.00000
 */
use douggonsouza\request\usages;
use douggonsouza\request\routings;
use douggonsouza\request\dicionary;
use douggonsouza\request\requested;

define('BASE_DIR', __DIR__);

/*
 * CARREGAR DADOS GLOBAIS DE ACESSO
 * 
 * Nuclear Framework - PHP
 * @author Douglas GonÃ§alves de Souza
 * 
 * Configura INI para apresentaÃ§Ã£o dos erros
 * E_ERROR
 * E_WARNING
 * E_PARSE
 * E_NOTICE
 * E_CORE_ERROR
 * E_CORE_WARNING
 * E_COMPILE_ERROR
 * E_COMPILE_WARNING
 * E_USER_ERROR
 * E_USER_WARNING
 * E_USER_NOTICE
 * E_ALL
 * E_STRICT
 * E_RECOVERABLE_ERROR
 */
error_reporting(1);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);

// configs
include_once __DIR__ . '/vendor/autoload.php';
include_once __DIR__. '/src/init.php';

die();
?>