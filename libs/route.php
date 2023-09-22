<?php

function route($path, $httpMethod){
    try {
        list($controller, $method) = explode('/', $path);
        $case = [$method, $httpMethod];
        
        // var_dump($controller);
        // var_dump($method);
        // var_dump($httpMethod);

        switch ($controller) {
            case 'home':
                $controllerName = 'HomeController';
                
                switch ($case) {
                    case ['index', 'get']:
                        $methodName = 'index';
                      
                        break;
                    default:
                        $controllerName = '';
                        $methodName = '';
                }
                break;

            case 'user':
                $controllerName = 'UserController';
                
                switch ($case) {
                    case ['log-in', 'get']:
                        $methodName = 'logIn';
                        break;
                    case ['sign-up', 'get']:
                        $methodName ='signUp';
                        break;
                    case ['log-out', 'get']:
                        $methodName = 'logOut';
                        break;
                    case ['certification', 'post']:
                        $methodName = 'certification';
                        break;
                    case ['my-page', 'get']:
                        $methodName ='myPage';
                        break;
                    case ['edit', 'get']:
                        $methodName = 'edit';
                        break;
                    case ['update', 'post']:
                        $methodName = 'update';
                        break;
                    case ['delete', 'get']:
                        $methodName = 'delete';
                        break;
                    case ['create', 'post']:
                        $methodName = 'create';
                        break;
                    case ['contactform','get'];
                        $methodName = 'contactform';
                        break;                
                }
                break;

                case 'contacts':
                    $controllerName = 'ContactController';
                    
                    switch ($case) {
                        case ['contactform','get'];
                            $methodName = 'contactform';
                            break;
                        case ['contact-confirmation', 'get']:
                            $methodName = 'confirmation';  
                            break;
                        case ['contact-complete','post'];
                            $methodName = 'Complete';
                            break;
                        default:
                            $controllerName = '';
                            $methodName = '';
                    }
                break;
                

            default:
                
                $controllerName = '';
                $methodName = '';
        }
        
        // var_dump($controllerName);
        // var_dump($methodName);
        // var_dump($controller);
        // var_dump($method);
        // var_dump($httpMethod);

        require_once (ROOT_PATH."Controllers/{$controllerName}.php");

        $obj = new $controllerName();
        $obj->$methodName();
        

    } catch (Throwable $e) {
        "<pre>";
        print_r($e);
        "</pre>";
        error_log($e->getMessage());
        header("HTTP/1.0 404 Not Found");
    }
}