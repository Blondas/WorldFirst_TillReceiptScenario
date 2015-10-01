<?php
namespace tillReceiptScenario;

class TillItem {
    private $name;
    private $price;

    function __construct($name, $price)
    {
        $this->setName($name);
        $this->setPrice($price);
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param int|string $price
     */
    public function setPrice($price)
    {
        if ( !is_numeric($price) ) {
            throw new \InvalidArgumentException('Price has to be numeric .');
        }
        if ( $price <= 0 ) {
            throw new \InvalidArgumentException('Price has to bo positive .');
        }
    }



    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }
}