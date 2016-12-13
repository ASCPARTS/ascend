<?php

class clsCustomer
{
    private $customerId;

    function __construct(){

    }
    
    function __destruct(){

    }

    public function formatMoney($amount, $colored = false)
    {
        $openTag = '';
        $closeTag = '';
        if($colored)
        {
            if($amount > 0)
            {
                $openTag = '<span style="color: #55B844">';
            }

            if($amount < 0)
            {
                $openTag = '<span style="color: #ff3754">';
            }

            $closeTag = "</span>";
        }
        return $openTag . "$ " . number_format($amount, 2, ".", ",") . $closeTag;
    }

}


?>