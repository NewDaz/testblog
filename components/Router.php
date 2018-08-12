<?php
/**
 * Класс Router
 * Компонент для работы с маршрутами
 */
class Router
{

	private $routes;

	public function __construct()
	{
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
	}

    // Возвращаем строку запроса

	private function getURI()
	{
		if (!empty($_SERVER['REQUEST_URI'])) {
		return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	// Метод для обработки запроса

	public function run()
	{
        // Получаем строку запроса
		$uri = $this->getURI();

        // Проверяем наличие такого запроса в массиве маршрутов (routes.php)
		foreach ($this->routes as $uriPattern => $path) {

            // Сравниваем $uriPattern и $uri
			if(preg_match("~$uriPattern~", $uri)) {

/*				echo "<br>Где ищем (запрос, который набрал пользователь): ".$uri;
				echo "<br>Что ищем (совпадение из правила): ".$uriPattern;
				echo "<br>Кто обрабатывает: ".$path; */

				// Получаем внутренний путь из внешнего согласно правилу.

				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);

/*				echo '<br>Нужно сформулировать: '.$internalRoute.'<br>'; */

				$segments = explode('/', $internalRoute);

				$controllerName = array_shift($segments).'Controller';
				$controllerName = ucfirst($controllerName);


				$actionName = 'action'.ucfirst(array_shift($segments));

				$parameters = $segments;

                // Подключить файл класса-контроллера

				$controllerFile = ROOT . '/controllers/' .$controllerName. '.php';
				if (file_exists($controllerFile)) {
					include_once($controllerFile);
				}

                // Создать объект, вызвать метод (т.е. action)

				$controllerObject = new $controllerName;

                /* Вызываем необходимый метод ($actionName) у определенного
                                * класса ($controllerObject) с заданными ($parameters) параметрами
                                */
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                // Если метод контроллера успешно вызван, завершаем работу роутера
				if ($result != null) {
					break;
				}
			}

		}
	}
}