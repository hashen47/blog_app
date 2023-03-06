<?php 


namespace Core;


use Respect\Validation\Validator as v;


class Validate {

    public function title($title)
    {
        $min = 10;
        $max = 255;

        if ( !v::intVal()->between($min, $max)->validate(strlen($title)) )
            return $this->response("error", "title is shorter than {$min} or longer than {$max} characters");
        
        return $this->response("success", $title);
    } 


    public function content($content)
    {
        $min = 20;
        $max = 600;

        if ( !v::intVal()->between($min, $max)->validate(strlen($content)) )
            return $this->response("error", " is shorter than {$min} or longer than {$max} characters");

        return $this->response("success", $content);
    } 


    private function response($type, $output)
    {
        return ["status" => $type, "output" => $output];
    }
}

