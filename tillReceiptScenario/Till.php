<?php
require_once('TillItem.php');

class Till {
    private $items;
    private $subtotal;


    function __construct()
    {
        $this->items = array();
        $this->subtotal = 0;
        $this->discount = 0;
    }


    public function addItem($item) {
        if ( !($item instanceof TillItem) ) {
            throw new Exception('Price has to be numeric .');
        }
        
        $this->items[] = $item;
        $this->subtotal += $item->getPrice();
        $this->calculateDiscount();
    }

    private function calculateDiscount() {
        $this->discount = 0.05 * $this->subtotal;
    }

    /**
     * @return int
     */
    public function getDiscount()
    {
        return number_format($this->discount, 2);
    }



    /**
     * @param mixed $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function getGrandTotal() {
        $grandTotal =  $this->subtotal - $this->discount;

        return number_format($grandTotal, 2);
    }

    public function printTill() {
        $output = '-----------------------------------' . PHP_EOL;

        $output .= 'ITEM, PRICE: ' .PHP_EOL;

        foreach ($this->items as $item) {
            $output .= $item->getName() . ', £' . $item->getPrice() . PHP_EOL;
        }

        $output .= PHP_EOL  . 'Sub-Total, £' . $this->subtotal . PHP_EOL;
        $output .= 'Discounts, £' . $this->getDiscount() . PHP_EOL;

        $output .= PHP_EOL  . 'Grand Total, £' . $this->getGrandTotal() . PHP_EOL;

        echo $output;
    }
}