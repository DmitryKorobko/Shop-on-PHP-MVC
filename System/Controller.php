<?php
abstract class System_Controller
{
    /**
     *
     * @var System_View $view 
     */
    public $view;
    
    /**
     *
     * @var int 
     */
    protected $_userId;
    
    /**
     *
     * @var array 
     */
    public $args;
    
    /**
     * 
     * @param array $args
     */
    public function setArgs($args)
    {
        $this->args = $args;
    }
    
    /**
     * 
     * @return array
     */
    public function getArgs()
    {
        //$this->args = array_combine([0,1], $this->args);
        
        $count = count($this->args);
        $arguments = [];
        
        for($i = 0; $i < $count - 1; $i += 2) {
            $arguments[$this->args[$i]] = $this->args[$i + 1];
        }
        
        return $arguments;
    }
    
    public function __construct()
    {
        session_start();
//        if( isset($_COOKIE[session_name()]) && $this->_getSessParam('is_save') == 'true') {
//            setcookie(session_name(), session_id(), time() + Model_User::LIFETIME_USER_COOKIE, '/');
//        }
        
        $this->view = new System_View();
        $this->_userId = $this->_getSessParam('currentUser');
    }
    
    /**
     * 
     * @return array
     */
    public function getParams()
    {
        return $_REQUEST;
    }
    
    /**
     * Save session's data 
     * 
     * @param string $key
     * @param mixed $value
     */
    protected function _setSessParam($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    
    /**
     * Retrieve data from session
     * 
     * @param string $key
     * @return mixed
     */
    protected function _getSessParam($key)
    {   
        if(!empty($_SESSION)) {
            return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : NULL;
        }
        return NULL;
    }
    
    /**
     * 
     * @return int
     */
    public function getUserId()
    {
        return $this->_userId;
    }

    /**
     *
     * @param type $key
     * @return mixed
     */
    public function getParamByKey($key)
    {
        return !empty($_REQUEST[$key]) ? $_REQUEST[$key] : NULL;
    }
}