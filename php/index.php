<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/AlunniController.php';
require __DIR__ . '/controllers/ClassiController.php';
require __DIR__ . '/includes/Db.php';


$app = AppFactory::create();

//Classi

//curl http://localhost:8080/classi
$app->get('/classi', "ClassiController:index");

//curl http://localhost:8080/classi/2
$app->get('/classi/{id}', "ClassiController:show");

//curl -X POST http://localhost:8080/classi -H "Contenct-Type: application/json" -d '{"id":"1","sezione":"5A","anno":"2024"}'
$app->post('/classi', "ClassiController:create");

//curl -X PUT http://localhost:8080/classi/2 -H "Contenct-Type: application/json" -d '{"id":"1","sezione":"5A","anno":"2024"}'
$app->put('/classi/{id}', "ClassiController:update");

//curl -X DELETE http://localhost:8080/classi/2
$app->delete('/classi/{id}', "ClassiController:destroy");


//Alunni

//curl http://localhost:8080/classi/2/alunni
$app->get('/classi/{id}/alunni', "AlunniController:index");

//curl http://localhost:8080/alunni/2
$app->get('/alunni/{id}', "AlunniController:show");

//curl -X POST http://localhost:8080/classi/2/alunni -H "Contenct-Type: application/json" -d '{"id":"2","nome":"Ivan","cognome":"Bruno","classe_id":"1"}'
$app->post('/classi/{id}/alunni', "AlunniController:create");

//curl -X PUT http://localhost:8080/alunni/2 -H "Contenct-Type: application/json" -d '{"id":"2","nome":"Ivan","cognome":"Bruno","classe_id":"1"}' 
$app->put('/alunni/{id}', "AlunniController:update");

//curl -X DELETE http://localhost:8080/alunni/2
$app->delete('/alunni/{id}', "AlunniController:destroy");



$app->run();
