<?php

namespace webmvc\application;

/**
 * The Contoller is the C in MVC. 
 * The base controller is a simple abstract class that defines the
 * structure of all controllers. 
 * By including the registry here, the registry is available to all class
 * that extend from the base controller. An index() method has also been 
 * included in the base controller which means all controller classes that 
 * extend from it must have an index() method themselves.
 *
 * @author claudio
 */
abstract class Controller {
    /*
     * @registry object
     */

    protected $registry;

    function __construct($registry) {
        $this->registry = $registry;
    }

    /**
     * @all controllers must contain an index method
     */
    abstract function index();
}