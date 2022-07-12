<?php
    namespace application\controllers;
    use application\libs\Application;

    class TodoController extends Controller {
        public function main() {
            return "index.html";
        }
        
        public function index() {
            switch(getMethod()) {
                case _GET:
                    return $this->model->selTodoList();
                
                case _POST:
                    $json = getJson();
                    return [ "result" => $this->model->insTodo($json)];

                case _DELETE:
                    $urlPaths = getUrlPaths();
                    $param = [
                        "itodo" => 0
                    ];

                    if(isset($urlPaths[2])) {
                        $param["itodo"] = intval($urlPaths[2]);
                    }
                    return [ "result" => $this->model->delTodo($param)];
            }
        }
    }