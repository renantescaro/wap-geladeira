<?PHP

class Rota{

  private static $routes = Array();
  private static $pathNotFound = null;
  private static $methodNotAllowed = null;

  public static function add($expression, $function, $method = 'get'){
  
    array_push(self::$routes,Array(
      'expression' => $expression,
      'function' => $function,
      'method' => $method
    ));
  }

  public static function pathNotFound($function){

    self::$pathNotFound = $function;
  }

  public static function methodNotAllowed($function){
    
    self::$methodNotAllowed = $function;
  }

  public static function run($basepath = '/', $case_matters = false, $trailing_slash_matters = false){

    $parsed_url = parse_url($_SERVER['REQUEST_URI']);

    if(isset($parsed_url['path']) && $parsed_url['path'] != '/'){

      if($trailing_slash_matters){

        $path = $parsed_url['path'];
      }else{

        $path = rtrim($parsed_url['path'], '/');
      }
    }else{
      
      $path = '/';
    }

    $method = $_SERVER['REQUEST_METHOD'];

    $path_match_found = false;

    $route_match_found = false;

    foreach(self::$routes as $route){

      if($basepath !='' && $basepath != '/'){
        
        // expression = (/url/recebida)/url/do/array
        $route['expression'] = '('.$basepath.')'.$route['expression'];
      }

      // expression = ^(/url/recebida)/url/do/array
      $route['expression'] = '^'.$route['expression'];

      // expression = ^(/url/recebida)/url/do/array$
      $route['expression'] = $route['expression'].'$';

      // expression (Array) = #^(/url/recebida)/url/do/array$#i
      // path (requisição)  = /url/recebida
      if(preg_match('#'.$route['expression'].'#'.($case_matters ? '':'i'), $path, $matches)){

        $path_match_found = true;

        // loop verificando metodo recebido com metodos do array
        foreach ((array)$route['method'] as $allowedMethod){

          if(strtolower($method) == strtolower($allowedMethod)){

            // remove 1° posição do array
            array_shift($matches);

            if($basepath != '' && $basepath != '/'){

              array_shift($matches);
            }

            call_user_func_array($route['function'], $matches);

            $route_match_found = true;

            break;
          }
        }
      }
    }

    if(!$route_match_found){

      if($path_match_found){

        header("HTTP/1.0 405 Método não permitido");

        if(self::$methodNotAllowed){

          call_user_func_array(self::$methodNotAllowed, Array($path,$method));
        }
      }else{

        header("HTTP/1.0 404 Não encontrado");

        if(self::$pathNotFound){

          call_user_func_array(self::$pathNotFound, Array($path));
        }
      }
    }
  }
}
