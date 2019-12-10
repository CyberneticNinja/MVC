<?php
/**
 * Created by PhpStorm.
 * User: sjabrok
 * Date: 11/12/19
 * Time: 3:34 PM
 */

namespace Router;


class Router
{
    protected $requestMethod = NULL;
    protected $serverName = NULL;
    protected $requestURL = NULL;
    protected $routeList = array();

    /**
     * Router constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return null
     */
    public function getRequestMethod()
    {
        return $this->requestMethod;
    }

    /**
     * @param null $requestMethod
     */
    public function setRequestMethod($requestMethod)
    {
        $this->requestMethod = $requestMethod;
    }

    /**
     * @return null
     */
    public function getServerName()
    {
        return $this->serverName;
    }

    /**
     * @param null $serverName
     */
    public function setServerName($serverName)
    {
        $this->serverName = $serverName;
    }

    /**
     * @return null
     */
    public function getRequestURL()
    {
        return $this->requestURL;
    }

    /**
     * @param null $requestURL
     */
    public function setRequestURL($requestURL)
    {
        $this->requestURL = $requestURL;
    }

    /**
     * @return array
     */
    public function getRouteList(): array
    {
        return $this->routeList;
    }

    /**
     * @param array $routeList
     */
    public function setRouteList(array $routeList)
    {
        array_push($this->routeList, $routeList);
    }

    //adds a GET route
    public function get($route,$controller)
    {
        $this->setRouteList(array('GET',$route,$controller));
    }

    //adds a POST route
    public function post($route,$controller)
    {
        $this->setRouteList(array('POST',$route,$controller));
    }

    //adds a DELETE route
    public function delete($route,$controller)
    {
        $this->setRouteList(array('DELETE',$route,$controller));
    }

    //adds a PUT route
    public function put($route,$controller)
    {
        $this->setRouteList(array('PUT',$route,$controller));
    }

    //matchRoute($currentRoute) returns true if the current route is found, false if otherwise
    public function matchRoute($currentRoute)
    {

        $routeFound = false;
        $currentRouteX = $currentRoute;

        foreach ($this->getRouteList() as $route)
        {
            if(preg_match('/'.$route[1].'/', $currentRouteX))
            {
                $controller = 'Controller\\'.$route[2];
                if(class_exists($controller))
                {
                    $args = array();
                    $controller = new $controller();
                    $controller->run($args);
                    $routeFound = true;
                }
                throw new \Exception('Contoller could not be found for route');

            }
        }
        if(!$routeFound) {
            throw new \Exception('Route could not be found');
        }
    }

    public function run()
    {
        $this->setRequestMethod($_SERVER['REQUEST_METHOD']);
        $this->setRequestURL($_SERVER['REQUEST_URI']);
        $this->setServerName($_SERVER['SERVER_NAME']);

//       echo 'Request url : '.$this->getRequestURL().' Request method : '.$this->getRequestMethod().' Servername : '.$this->getServerName();
        try {
            $this->matchRoute($this->getRequestURL());
        } catch (\Exception $e) {
            echo $e;
        }
    }
}