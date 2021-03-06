<?php

namespace clagiordano\weblibs\mvc;

/**
 * The templates themselves are basically HTML files with a little PHP embedded.
 * Do not let the separation Nazi's try to tell you that you need to have full
 * seperation of HTML and PHP.
 * Remember, PHP is an embeddable scripting language.
 * This is the sort of task it is designed for and makes an efficient
 * templating language. The template files belong in the views directory.
 *
 * @author Claudio Giordano <claudio.giordano@autistici.org>
 */
class Template
{
    /** @var Application $application */
    protected $application;

    /**
     * @property array variables
     * @access private
     */
    private $vars = [];

    /**
     * Constructor
     * @return void
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * @set undefined vars
     *
     * @param string $index
     * @param mixed $value
     * @return void
     */
    public function __set($index, $value)
    {
        $this->vars[$index] = $value;
    }

    /**
     *
     * @param string $viewName
     * @return
     */
    public function show($viewName)
    {
        $path = $this->application->getRouter()->getControllersPath()
            . '/../views' . '/' . $viewName . '.php';

        if (file_exists($path) === false) {
            throw new \InvalidArgumentException(
                __METHOD__ . ": Template not found in '{$path}'"
            );
        }

        // Load variables
        foreach ($this->vars as $key => $value) {
            $key = $value;
        }

        require_once $path;
    }
}
