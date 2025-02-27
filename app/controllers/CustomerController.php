<?php
namespace Formacom\controllers;
use Formacom\Core\Controller;
use Formacom\Models\Customer;
use Formacom\Models\Address;
use Formacom\Models\Phone;

class CustomerController extends Controller{
    public function index(...$params){
        $customers=Customer::all();
        //$data = ['mensaje' => '¡Bienvenido a la página de inicio!'];
        $this->view('home', $customers);
    }

    public function prueba(...$params){
        $customers=[];
        $this->view('new', $customers);
    }
    public function prueba2(...$params){
        $customers=[];
        $this->view('zzz', $customers);
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
   
    // recibe los datos desde la VISTA newCustomer
    public function new(...$params){
        if(isset($_POST["nombre"]) && !($_POST["nombre"]=="")){
            
            $datos = [
                'name' => $_POST['nombre'] ?? null,
            ];
 
            $nuevoCliente = new Customer();
           
            $nuevoCliente->name = $datos['name'];
            
            $nuevoCliente->save();

            //obtener el id del nuevo cliente recien creado
            $IdNuevoCliente = $nuevoCliente->customer_id;
   
        }
        if(isset($IdNuevoCliente) && $_POST["telefono"]!="") {
   
                $datos = [
                    'numeroTlf' => $_POST['telefono'] ?? null,
                    'customer_id' => $IdNuevoCliente ?? null,
                ];
    
                $nuevoTelefono = new Phone();
                
                $nuevoTelefono->number = $datos['numeroTlf'];
                $nuevoTelefono->customer_id = $datos['customer_id'];
                
                $nuevoTelefono->save(); // Guardar el registro en la base de datos
                
            }
            if(($_POST["calle"]!="")){
                $datos = [
                    'dirCalle' => $_POST['calle'] ?? null,
                    'dirCodigoPostal' => $_POST['codigoPostal'] ?? null,
                    'dirCiudad' => $_POST['ciudad'] ?? null,
                    'dirPais' => $_POST['pais'] ?? null,
                    'customer_id' => $IdNuevoCliente ?? null,
                ];
    
                $nuevaDireccion = new Address();
                
                $nuevaDireccion->street = $datos['dirCalle'];
                $nuevaDireccion->zip_code = $datos['dirCodigoPostal'];
                $nuevaDireccion->city = $datos['dirCiudad'];
                $nuevaDireccion->country = $datos['dirPais'];
                
                $nuevaDireccion->customer_id = $datos['customer_id'];
                
                $nuevaDireccion->save(); 
               
        }
        else{
            $this->view('new');
        }
        $this->index();
        }

        //////////////////////////////////

        public function del($params){
            // Encontrar el registro por su ID
            $contacto = Customer::find($params);
            // Borrar el registro
            $contacto->delete();
    
            $this->index();   
        }
    
        public function edit($params){
            
            $cliente = Customer::find($params);
            var_dump($cliente);
            echo " ******* ";
            echo " ******* ";
            echo " ******* \n\n";
            //$direccioneSSS = Customer->addresses();
            var_dump($cliente->addresses());
            echo " ******* ";
            echo " ******* \n\n";

            //$telefonoSSS = Customer::phones();
            var_dump($cliente->phones());
            echo " ******* ";
            
            
            exit();


        }

    }



?>