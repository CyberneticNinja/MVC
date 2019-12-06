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

        //TODO Why do we need to explode currentRoute
        $currentRouteX = $currentRoute;
        $currentRoute = explode("/",$currentRoute);


//        dump($currentRouteX);
//        dump($this->getRouteList());

        echo '<br/>'.'Routes in Route list'.'<br/>';

        $count =1;
        foreach ($this->getRouteList() as $route)
        {
            if($route[1] == '')
            {
                $aRoute = '/'.PAGE_START.'/';
            }
            else
            {
                $aRoute = '/'.PAGE_START.'/'.$route[1];
            }
//            $route[1];
            if(preg_match('/'.$route[1].'/', $currentRouteX))
            {
                echo $currentRouteX.' is the current route '.$count.'</p>';
                $controller = 'Controller\\'.$route[2];
                dump($controller);
                if(class_exists($controller))
                {
                    $args = array();
                    $controller = new $controller();
                    $controller->run($args);
                }

            }
            else
            {
                echo $currentRouteX.' is not the current route '.$count.'</p>';
            }

//            if((count($r)) == (count($currentRoute)))
//            {
////                echo '<br/>'.count($r).' is the number of array elements<br/> ';
//                for($i=0;$i<count($r);$i++)
//                {
//                    if($r[$i] == $currentRoute[$i])
//                    {
//                        echo $r[$i].' --- '.$currentRoute[$i].'<br/>';
//                    }
//
//                }
//            }
        }

//        echo '<br/>'.$this->getRouteList()[1][1].'<br/>';
//        foreach ($this->getRouteList() as $route)
//        {
//            if(('/'.PAGE_START.$route[1]) == ($currentRouteX))
//            {
//                $controller = 'Controller\\'.$route[2];
//
//                if(class_exists($controller))
//                {
//                    $controller = new $controller();
//                    $args = array();
//                    if($_POST)
//                    {
//                        $args = $_POST;
//                    }
////                    dump(explode("/",'/'.PAGE_START.$route[1]));
//                    echo 'we are @'.$currentRouteX.', '.$route[0].'<br/>';
//                    $controller->run($args);
//                }
//                else
//                {
//                    throw new \Exception('Route could not be found');
//                }
//            }
////            if(($route[0] == $this->getRequestMethod()) && ($route[1] == '/'.$currentRoute[2]))
////            {
////                $controller = 'Controller\\'.$route[2];
////
////                if(class_exists($controller))
////                {
////                    $controller = new $controller();
////                    $args = array();
////                    if($_POST)
////                    {
////                        $args = $_POST;
////                    }
////                    $controller->run($args);
////                }
////                else
////                {
////                    throw new \Exception('Route could not be found');
////                }
////            }
//        }
//        throw new \Exception('Route is missing');
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