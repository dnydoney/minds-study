<?php
interface Subject{
 	function Attach();
 	function Detach();
 	function Notify();
 	public $SubjectState; 
}