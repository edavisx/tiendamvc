<?php
namespace Formacom\controllers;
use Formacom\Core\Controller;
use Formacom\Models\Customer;
use Formacom\Models\Address;

class UserController extends Controller{
    public function index(...$params){
        $customers=Customer::all();
        //$data = ['mensaje' => '¡Bienvenido a la página de inicio!'];
        $this->view('home', $customers);
    }
    public function show(...$params)  {
        if(isset($params[0])){
            $customer=Customer::find($params[0]);
            if($customer){
                $this->view('detail',$customer);
                exit();
            }
        }

        header("Location: ".base_url()."customer");
        
    }
   
}
?>