<?php

use function src\slimConfiguration;
use function src\jwtAuth;
use App\Controllers\AlunosController;
use App\Controllers\PlanejamentoController;
use App\Controllers\TreinoController;
use App\Controllers\ExportarController;
use App\Controllers\AuthController;

$app = new \Slim\App(slimConfiguration());


$app->post('/login', AuthController::class . ':login');

$app->get('/exportar-relatorio', ExportarController::class . ':gerarRelatorio');

$app->get('/alunos', AlunosController::class . ':getTodosAlunos');
$app->put('/alunos', AlunosController::class . ':editAluno');
$app->post('/alunos', AlunosController::class . ':insertAluno');

$app->get('/planejamento', PlanejamentoController::class . ':getPlanejamento');

$app->get('/treino', TreinoController::class . ':getTreino');


$app->run();