

<?php

class checkOutController extends Controller
{
    public function index()
    {
        $this->view('checkOut/index');
    }


    public function  checkOutPage()
    {
        $this->view('Buyer/Purchases/buyer_CheckOutPage');
    } 
}


?>