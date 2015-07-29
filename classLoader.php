<?php

class ClassLoader
{
    private $_fileExtension = '.php';
    private $_namespace ;
    private $_includePath;
    private $_name;
    private $_src;
    private $_rootDir = "exp";


    /**
     * Creates a new <tt>SplClassLoader</tt> that loads classes of the
     * specified namespace.
     * 
     * @param string $ns The namespace to use.
     */
    public function __construct($ns = "Prateek/FormBuilder",$includePath = null)
    {
        $this->_namespace = $ns;
        $this->_includePath = $includePath;
        $this->_src = dirname(__FILE__)."/src";
    }

    /**
     * Installs this class loader on the SPL autoload stack.
     */
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    /**
     * Uninstalls this class loader from the SPL autoloader stack.
     */
    public function unregister()
    {
        spl_autoload_unregister(array($this, 'loadClass'));
    }

    /**
     * Loads the given class or interface.
     *
     * @param string $className The name of the class to load.
     * @return void
     */
    public function loadClass($className)
    {

        $className = ltrim($className, '\\');
        $fileName  = '';
        $namespace = '';
        if ($lastNsPos = strripos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

        $fileNameArray = explode("/", $fileName);
        $fileNameArrayLC = array();
        foreach ($fileNameArray as $v) {
            $fileNameArrayLC[] = lcfirst($v);
        }
        $fileName = implode("/", $fileNameArrayLC);
        $fileName1 = str_ireplace("$this->_namespace","",$fileName);
        $fileName = $this->_src.$fileName1;
        if (file_exists($fileName)) {
            require_once($fileName);
        } else {
            throw new Exception("File not found", 500);
        }
    }

}
?>