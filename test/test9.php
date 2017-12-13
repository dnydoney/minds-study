<?php
class A
{
        private $private = 1;
        public $public = 1;

        function get()
        {
           return "A: $this->private , $this->public\n";
        }

}

class B extends A
{

        function __construct()
        {
                $this->private = 2;
                $this->public = 2;
        }

        function set()
        {
                $this->private = 3;
                $this->public = 3;
        }

        function get()
        {
           return parent::get() . "B: $this->private , $this->public\n";
        }

}

$B = new B;

echo $B->get();
//echo $B->set();
//echo $B->get();
