<?php

namespace App\Http\Controllers;

use Auth;

use App\Order;
use App\Mail\MyMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function __construct()
    {

        $this->middleware('role:admin', ['except' => ['store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.order.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request){
            $cartArr = json_decode($request->data);
            // return 'Success';

            // insert orders
            $order = new Order;
            $order->order_date = date('Y-m-d');
            $order->voucher_no = time();
            $order->total = $request->total;
            $order->note = '';
            $order->status = 0;
            $order->user_id = Auth::id();
            $order->save();

            // insert item_order
            foreach($cartArr as $item){
                $order->items()->attach($item->id, ['qty' => $item->qty]);
            }
        });

        // $notification = array(
        //         'message' => 'Successfully Send Mail :)!',
        //         'alert-type' => 'success'
        //     );

        // //dd($notification);
        // return redirect()->route('frontend.home')->with($notification);
    }

    // public function success(){

    //     return response()->json([
    //         'success' => $success,
    //         'message' => "Your Order successfully!!",
    //     ]);
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.order.detail',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        // redirect
        return redirect()->route('orders.index');
    }
    public function order_confirm(Request $request, Order $order)
    {
        $order->status = 1;
        $order->save();

        $details = [
                'title' => 'Order Confirmed',
                'customer_name' => $order->user->name,
                'customer_address' => $order->user->address,
                'voucher_no' => $order->voucher_no,
                'order_date' => $order->order_date,
                'total' => $order->total,
                'items' => $order->items
                ];
        //dd($details);
        $receiver_email = $order->user->email;
        \Mail::to($receiver_email)->send(new \App\Mail\MyMail($details));


        // redirect
        return redirect()->route('orders.index');
    }
    public function order_cancel(Request $request, Order $order)
    {
        $order->status = 2;
        $order->save();

        $details = [
                'title' => 'Order Cancelled',
                'customer_name' => $order->user->name
                ];
        $receiver_email = $order->user->email;
        \Mail::to($receiver_email)->send(new \App\Mail\MyMail($details));

        // redirect
        return redirect()->route('orders.index');
    }

    
}
