<?php

class ColorQueue extends SplQueue 
{
    public function putInQueue($color) {
        $this->enqueue($color);

    }

    public function getItem2Process() {
        try {
            return $this->bottom();
        }
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }
    
    public function firstInProcessed() {
        try {
            $this->dequeue();
        }
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }
    
    public function randomColor() {
            $r = rand(0, 255);
            $g = rand(0, 255);
            $b = rand(0, 255);
            $color = 'rgb'.'('.$r.' ,'.$g.', '.$b.')';
            return $color;
    }  
}


