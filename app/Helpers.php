<?php

if (! function_exists('helpController')) {
  //devuelve el controlador de la ruta
    function helpController()
    {
      if (app('request')->route() != null ) {
        $routeArray = app('request')->route()->getAction();
        if (isset($routeArray)) {
          $controllerAction = class_basename($routeArray['controller']);
          list($controller, $action) = explode('@', $controllerAction);
          $controller1 = str_replace("Controller", "", $controller);
          return $controller1;
        }
      }
    }
}
if (! function_exists('helpAction')) {
  //devuelve el action de la ruta
    function helpAction()
    {
      if (app('request')->route() != null ) {
        $routeArray = app('request')->route()->getAction();
        if (isset($routeArray)) {
          $controllerAction = class_basename($routeArray['controller']);
          list($controller, $action) = explode('@', $controllerAction);
            return $action;
        }
      }
    }
}
function convertAccentedCharacters($str)
{
    return strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}

function urlTitle($str, $separator = '-', $lowercase = false)
{
    if ($separator === 'dash') {
        $separator = '-';
    } elseif ($separator === 'underscore') {
        $separator = '_';
    }

    $q_separator = preg_quote($separator, '#');

    $trans = array(
        '&.+?;' => '',
        '[^\w\d _-]' => '',
        '\s+' => $separator,
        '(' . $q_separator . ')+' => $separator,
    );

    $str = strip_tags($str);
    foreach ($trans as $key => $val) {
        $str = preg_replace('#' . $key . '#iu', $val, $str);
    }

    if ($lowercase === true) {
        $str = strtolower($str);
    }

    return trim(trim($str, $separator));
}
