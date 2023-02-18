<?php

    class Vector
    {

        private $x;
        private $y;
        private $z;

        public function __construct(mixed $x = 0, mixed $y = 0, mixed $z = 0)
        {   
            try {

                if ((!is_int($x) and !is_float($x)) or (!is_int($y) and !is_float($y)) or (!is_int($z) and !is_float($z))) {
                  throw new \Exception("Введены не числа");
                } else {
                    $this->x = $x;
                    $this->y = $y; 
                    $this->z = $z;
                }

            } catch (\Exception $e) {
                echo $e->getMessage();
                die();
            }
        }

        public function __get($temp)
        {
            return $this->$temp;
        }

        public function __toString()
        {
            return "({$this->x}; {$this->y}; {$this->z})";
        }        

        public function add(Vector $vector)
        {
            $x = $this->x + $vector->x;
            $y = $this->y + $vector->y;
            $z = $this->z + $vector->z;

            return new Vector($x, $y, $z);
        }

        public function sub(Vector $vector)
        {
            $x = $this->x - $vector->x;
            $y = $this->y - $vector->y;
            $z = $this->z - $vector->z;

            return new Vector($x, $y, $z);
        }

        public function product(int $number)
        {
            $x = $this->x * $number;
            $y = $this->y * $number;
            $z = $this->z * $number;

            return new Vector($x, $y, $z);
        }

        public function scalarProduct(Vector $vector)
        {
            $scalarProduct = 0;
            
            foreach ($this as $key => $value) {
                $scalarProduct += $value * $vector->$key;
            }

            return $scalarProduct;
        }
        
        public function vectorProduct(Vector $vector)
        {
            $coordinates = array('x','y','z');
            $counter = 0;
            $result = array();

            foreach ($coordinates as $key => $value) {
                $temp = ($counter+1) % count($coordinates);
                $temp = $coordinates[$temp];
                $result[] = $this->$value * $vector->$temp -  $this->$temp * $vector->$value;
                $counter++;
            }

            return new Vector($result[1], $result[2], $result[0]);
        }
    }