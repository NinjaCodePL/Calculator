<?php

/**
 * @author Wojciech Dasiukiewicz <wojciech.dasiukiewicz@gmail.com> www.ninjacode.pl
 */
class Calculator {

    private $data;
    private $string;

    /**
     * That function will take request from users
     * 
     * @param string $request Operating as a string ex (1 + 2 * 5)
     */
    
    public function calculate($request) {
        $this->data = preg_split('/ /', $request);
        $this->string = preg_replace('/\s+/', '', $request);
        //operations of subtraction and addition
        $this->substractionAndAddition();
        //operations of multiplication and division
        $this->multiplicationAndDivision();
        return $this->data[0];
    }

    private function substractionAndAddition() {
        preg_match_all('/(\*|\/)/', $this->string, $matches, PREG_OFFSET_CAPTURE);
        for ($i = 0; $i < count($matches[0]); $i++) {
            foreach ($this->data as $key => $char) {
                if ($char == "*") {
                    if (isset($this->data[($key)]) && isset($this->data[($key + 1)])) {
                        $this->data[($key - 1)] = $this->data[($key - 1)] * $this->data[($key + 1)];
                        unset($this->data[($key)]);
                        unset($this->data[($key + 1)]);
                        $this->data = array_values($this->data);
                        break;
                    }
                }
                if ($char == "/") {
                    if (isset($this->data[($key)]) && isset($this->data[($key + 1)])) {
                        $this->data[($key - 1)] = $this->data[($key - 1)] / $this->data[($key + 1)];
                        unset($this->data[($key)]);
                        unset($this->data[($key + 1)]);
                        $this->data = array_values($this->data);
                        break;
                    }
                }
            }
        }
    }

    private function multiplicationAndDivision() {
        preg_match_all('/(\+|\-)/', $this->string, $matches, PREG_OFFSET_CAPTURE);
        for ($i = 0; $i < count($matches[0]); $i++) {
            foreach ($this->data as $key => $char) {
                if ($char == "+") {
                    if (isset($this->data[($key)]) && isset($this->data[($key + 1)])) {
                        $this->data[($key - 1)] = $this->data[($key - 1)] + $this->data[($key + 1)];
                        unset($this->data[($key)]);
                        unset($this->data[($key + 1)]);
                        $this->data = array_values($this->data);
                        break;
                    }
                }
                if ($char == "-") {
                    if (isset($this->data[($key)]) && isset($this->data[($key + 1)])) {
                        $this->data[($key - 1)] = $this->data[($key - 1)] - $this->data[($key + 1)];
                        unset($this->data[($key)]);
                        unset($this->data[($key + 1)]);
                        $this->data = array_values($this->data);
                        break;
                    }
                }
            }
        }
    }

}

?>