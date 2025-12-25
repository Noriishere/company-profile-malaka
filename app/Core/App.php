<?php

namespace Malaka\CompanyProfile\Core;

class App
{
    protected $folder = '';
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        // if (!empty($url[0]) && strtolower($url[0]) === 'admin') {
        //     $this->folder = 'Admin';
        //     unset($url[0]);
        //     $url = array_values($url);
        // } elseif (!empty($url[0]) && strtolower($url[0]) === 'user') {
        //     $this->folder = 'User';
        //     unset($url[0]);
        //     $url = array_values($url);
        // }

        if (!empty($url[0])) {
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        }

        if (!empty($url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        $controllerClass = $this->folder
            ? "Malaka\\CompanyProfile\\Controllers\\{$this->folder}\\{$this->controller}"
            : "Malaka\\CompanyProfile\\Controllers\\{$this->controller}";

        if (!class_exists($controllerClass)) {
            $this->notFound();
        }



        $this->controller = new $controllerClass;
        $this->params = $url ? array_values($url) : [];

        if (!method_exists($this->controller, $this->method)) {
            $this->notFound();
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return [];
    }
    private function notFound()
    {
        http_response_code(404);
        require __DIR__ . '/../Views/app/forbidden.php';
        exit;
    }
}
