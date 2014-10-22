<?php

namespace webmvc\application;

/**
 * The templates themselves are basically HTML files with a little PHP embedded. 
 * Do not let the separation Nazi's try to tell you that you need to have full 
 * seperation of HTML and PHP.
 * Remember, PHP is an embeddable scripting language. 
 * This is the sort of task it is designed for and makes an efficient 
 * templating language. The template files belong in the views directory.
 *
 * @author claudio
 */
class Template {
    /*
     * @the registry
     * @access private
     */

    private $registry;

    /*
     * @Variables array
     * @access private
     */
    private $vars = array();

    /**
     *
     * @constructor
     * @access public
     * @return void
     */
    function __construct($registry) {
        $this->registry = $registry;
    }

    /**
     * @set undefined vars
     *
     * @param string $index
     * @param mixed $value
     * @return void
     */
    public function __set($index, $value) {
        $this->vars[$index] = $value;
    }

    function show($name) {
        $path = __SITE_PATH . '/views' . '/' . $name . '.php';

        if (file_exists($path) == false) {
            throw new Exception('Template not found in ' . $path);
            return false;
        }

        // Load variables
        foreach ($this->vars as $key => $value) {
            $key = $value;
        }

        include ($path);
    }

}