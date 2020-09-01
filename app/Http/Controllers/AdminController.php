<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;
use App\ImagePosition;
use App\Design;
use App\ColorDesign;

class AdminController extends Controller
{
 public function showDashboard() {

        $api = HelperController::config();

        $results = $api->rest('GET', '/admin/products/count.json', null, [],true);

        $prod_count = $results['body']['container']['count'];


        $results = $api->rest('GET', '/admin/customers/count.json', null, [],true);


        $customer_count = $results['body']['container']['count'];

        $design_count = Design::count();



        return view('dashboard')->with('product_count', $prod_count)->with('customer_count', $customer_count)->with('design_count', $design_count);

    }
    public function getCustomers() {

        $api = HelperController::config();

        $results = $api->rest('GET', '/admin/customers.json', null, [],true);

        $customers = $results['body']['container']['customers'];

        return view('customers')->with('customers', $customers);

    }


    public function getColorDesignForCustomer($id) {


        $designs = ColorDesign::where('shopify_user_id', $id)->get();

        return response()->json(['data'=> $designs]);

    }

    public function getOrders() {

        $api = HelperController::config();


        $results = $api->rest('GET', '/admin/orders.json', null, [],true);



        $orders = $results['body']['container']['orders'];



        return view('orders')->with('orders', $orders);

    }

    public function getProducts() {

        $api = HelperController::config();

        $results = $api->rest('GET', '/admin/products.json', null, [],true);

        $products = ($results['body']['container']['products']);

        return view('products')->with('products', $products);

    }

    public function getSingleProduct($id) {

        $api = HelperController::config();

        $results = $api->rest('GET', '/admin/products/'.$id.'.json', null, [],true);

	

        $product = $results['body']['container']['product'];


        
        $position = ImagePosition::where('product_id', $product['id'])->latest('created_at')->first();


        return view('product')->with('product', $product)->with('position', $position);

    }

    public function uploadCrop(Request $request, $id) {


        if($request->top == 0) {
            Session::flash('error', 'Please select an area to proceed!');

            return redirect()->back();
        }
        
        ImagePosition::create([
            'product_id' => $id,
            'top_left_x' => $request->top,
            'top_left_y' => $request->left,
            'bottom_right_x' => $request->bottom,
            'bottom_right_y' => $request->right,
            'crop_width' => $request->crop_width,
            'crop_height' => $request->crop_height,
            'img_width' => $request->img_width,
            'img_height' => $request->img_height,
        ]);

        $metafield_array_to_be_passed = [
            "metafield"=> [
                "namespace" => "inventory",
                "key"=> "dimensions",
                "value"=> $request->top."_".$request->left."_".$request->bottom."_".$request->right."_".$request->img_width."_".$request->img_height."_".$request->crop_width."_".$request->crop_height,
                "value_type"=> "string"
            ]  
        ];

        $api = HelperController::config();

        $results = $api->rest('POST', '/admin/products/'.$id.'/metafields.json', $metafield_array_to_be_passed, [],true);

       
        return redirect()->back()->with('success', 'Cropped image position saved successfully!');


    }



}