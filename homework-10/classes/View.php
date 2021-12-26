<?php

abstract class View
{
	protected $layout;
	abstract public function render();
}