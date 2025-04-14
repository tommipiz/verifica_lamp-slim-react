<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/AlunniController.php';
require __DIR__ . '/controllers/ClassiController.php';
require __DIR__ . '/includes/Db.php';


$app = AppFactory::create();

//Classi


/*
curl http://localhost:8080/classi
Richiesta:
GET    /classi             
Risposta
Status code: 200   
[{"id": 1, "sezione":"5A", "anno": 2024},  {"id": 2 , "sezione":"5B", "anno": 2024}]
*/
$app->get('/classi', "ClassiController:index");




/*
curl http://localhost:8080/classi/2
Richiesta:
GET    /classi/2            
Risposta
Status code: 200   
[{"id": 2 , "sezione":"5B", "anno": 2024}]
*/

$app->get('/classi/{id}', "ClassiController:show");




/*
curl -X POST http://locahost:8080/classi -H "Content-Type: application/json" -d '{"sezione": "5C", "anno": 2025}
Richiesta:
POST    /classi             
Risposta
Status code: 201   
{"msg": "creato"}
*/
$app->post('/classi', "ClassiController:create");





/*
curl -X PUT http://localhost:8080/classi/2 -H "Contenct-Type: application/json" -d '{"id":"3","sezione":"5C","anno":"2024"}'
Richiesta:
POST    /classi/2             
Risposta
Status code: 201   
{"msg": "aggiornato"}

*/
$app->put('/classi/{id}', "ClassiController:update");





/*
curl -X DELETE http://localhost:8080/classi/2
Richiesta:
POST    /classi/2             
Risposta
Status code: 201   
{"msg": "eliminato"}
*/
$app->delete('/classi/{id}', "ClassiController:destroy");

//-----------------------------------------------------------------------------------------
//Alunni



/*
curl http://localhost:8080/classi/1/alunni
Richiesta:
GET    /classi/1/alunni    
Risposta
Status code: 200   
[{"id": 1, "nome":"Claudio", "Cognome": "Benvenuti"},  {"id": 1 , "nome":"Ivan", "cognome": "Bruno"}]
*/
$app->get('/classi/{id}/alunni', "AlunniController:index");





/*
curl  http://localhost:8080/alunni/1
Richiesta:
GET    /classi/1   
Risposta
Status code: 200   
[{"id": 1, "nome":"Claudio", "Cognome": "Benvenuti"},  {"id": 1 , "nome":"Ivan", "cognome": "Bruno"}]
*/
$app->get('/alunni/{id}', "AlunniController:show");




/*
curl -X POST http://localhost:8080/classi/1/alunni -H "Contenct-Type: application/json" -d '{"id":"1","nome":"Ivan","cognome":"Bruno","classe_id":"2"}'
Richiesta:
POST    /classi/1/alunni           
Risposta
Status code: 201   
{"msg": "creato"}
*/
$app->post('/classi/{id}/alunni', "AlunniController:create");





/*
curl -X PUT http://localhost:8080/alunni/1 -H "Contenct-Type: application/json" -d '{"id":"1","nome":"Ivan","cognome":"Bruno","classe_id":"2"}' 
Richiesta:
POST    /alunni/1            
Risposta
Status code: 201   
{"msg": "aggiornato"}
*/
$app->put('/alunni/{id}', "AlunniController:update");





/*
curl -X DELETE http://localhost:8080/alunni/1
Richiesta:
POST    /classi/1            
Risposta
Status code: 201   
{"msg": "eliminato"}
*/
$app->delete('/alunni/{id}', "AlunniController:destroy");





$app->run();
