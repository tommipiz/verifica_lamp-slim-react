<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ClassiController {
    public function index(Request $request, Response $response, $args) {
        $result = Db::select("classi");

        $response->getBody()->write(json_encode($result));
        return $response->withHeader("Content-type", "application/json")->withStatus(200);
    }

    public function show(Request $request, Response $response, $args) {
        $result = Db::selectId("classi", $args["id"]);

        $response->getBody()->write(json_encode($result));
        return $response->withHeader("Content-type", "application/json")->withStatus(200);
    }

    public function create(Request $request, Response $response, $args) {
        $body = json_decode($request->getBody()->getContents(), true);
        $msg = Db::create("classi", $body);

        $response->getBody()->write(json_encode(["message" => $msg]));
        return $response->withHeader("Content-type", "application/json")->withStatus(201);
    }

    public function update(Request $request, Response $response, $args) {
        $body = json_decode($request->getBody()->getContents(), true);
        $msg = Db::update("classi", $body, $args["id"]);

        $response->getBody()->write(json_encode(["message" => $msg]));
        return $response->withHeader("Content-type", "application/json")->withStatus(200);
    }

    public function destroy(Request $request, Response $response, $args) {
        $msg = Db::destroy("classi", $args["id"]);
        
        $response->getBody()->write(json_encode(["message" => $msg]));
        return $response->withHeader("Content-type", "application/json")->withStatus(200);
    }
}
