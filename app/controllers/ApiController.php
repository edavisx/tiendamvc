<?php
namespace Formacom\controllers;
use Formacom\Core\Controller;
use Formacom\Models\Customer;
use Formacom\Models\Address;
use Formacom\Models\Category;
use Formacom\Models\Provider;
use Formacom\Models\Product;

class ApiController extends Controller
{
    public function index(...$params)
    {

    }

    public function categories()
    {   //obtiene todas las categorias desde la base de datos
        $categories = Category::all(); 
        //convierte el array de categorias a un json
        $json = json_encode($categories);
        //envia el json como respuesta
        header('Content-Type: application/json');
        echo $json;
        exit();
    }
    public function providers()
    {   //obtiene todos los proveedores desde la base de datos
        $providers = Provider::all();
        //convierte el array de proveedores a un json
        $json = json_encode($providers);
        //envia el json como respuesta
        header('Content-Type: application/json');
        echo $json;
        exit();
    }
    public function newproduct()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $product = new Product();
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->category_id = $data['category_id'];
        $product->provider_id = $data['provider_id'];
        $product->stock = $data['stock'];
        $product->price = $data['price'];
        $product->save();
        //$products=Product::all();
        //quiero devolver los productos y su categoria y proveedor
        $products = Product::with(['category', 'provider'])
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

        $json = json_encode($products);
        header('Content-Type: application/json');
        echo $json;
        exit();
    }
    public function products()
    {
        //ordenados por mas recientes

        $products = Product::with(['category', 'provider'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        $json = json_encode($products);
        header('Content-Type: application/json');
        echo $json;
        exit();
    }
    public function deleteproduct(...$params)
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $product = Product::find($data['product_id']);
        $product->delete();
        $products = Product::with(['category', 'provider'])->get();
        $json = json_encode($products);
        header('Content-Type: application/json');
        echo $json;
        exit();
    }

}
?>