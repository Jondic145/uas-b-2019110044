<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index',compact('orders'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        return view('order', compact('items'));
    }
    public function store(Request $request)
    {
        $rules = [
            'status' => 'required|not_in:none'
        ];
        $validated = $request->validate($rules);
        Order::create($validated);

        // $testing = $request['id'.$i];

        // for($i=0;$i<count($request)-1;$i++){

        // }

        $itemcount = Item::all()->count();
        $orderId = Order::all()->last()->id;
        for($i = 1; $i<=$itemcount; $i++){
            if($request['quantity'.$i]>0){
                DB::table('order_item')->insert([
                    'order_id' => $orderId,
                    'item_id' => $request['id'.$i],
                    'quantity' => $request['quantity'.$i],
                ]);
            }
        }
        $request->session()->flash('success',"Successfully added Order Number {$orderId}!");
        return redirect(route('main.index'));
    }
    public function show(Order $order)
    {
        $datas = DB::select('SELECT oi.item_id,i.nama,i.harga,oi.quantity,i.stok FROM order_item oi LEFT JOIN items i ON oi.item_id = i.id WHERE oi.order_id = ?',[$order->id]);

        $priceList = DB::select('SELECT oi.quantity*i.harga gross_price, i.stok FROM order_item oi JOIN items i ON oi.item_id = i.id WHERE oi.order_id = ?',[$order->id]);
        $price = 0;
        foreach($priceList as $pl){
            if($pl->rekomendasi){
                $price += round($pl->gross_price*0.9,2);
                // dump($price);
            }else{
                $price+=$pl->gross_price;
                // dump($price);
            }
        }
        $price = round($price*1.11,2);

        return view('orders.show', compact('order','datas','price'));
    }

}
