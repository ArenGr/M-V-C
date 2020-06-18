<?php
namespace system;

class Controller 
{
	protected $view;
	protected $helper;
	
    function __construct()
    {
		$this->view = new View();
		$this->helper = new Helper();
	}
}
