<?php

class Logger
{
    protected $rows = array();

    public function __destruct()
    {
        $this->save();
    }

    public function log($row)
    {
        $this->rows[] = $row;
    }

    public function save()
    {
        echo '<ul>';
        foreach ($this->rows as $row)
        {
            echo '<li>', $row, '</li>';
        }
        echo '</ul>';
    }
}

$logger = new Logger;
$logger->log('Before');
$logger->log('After');


if($logger) {
	var_dump("it is ");
}
