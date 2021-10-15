<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request4;
use App\Models\Message;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PieworldController extends Controller
{
    public function sendproject(){
        $product=DB::table('products')->select('product_name','price','image')->limit(8)->get();
        return view('project.pieworld',[
            'product'=>$product
        ]);
    }
    public function insertmessage(Request $request){
        $this->validate($request,[
           'visitor_name'=>'required',
           'visitor_email'=>'required|email',
            'text'=>'required'
        ]);

        Message::create($request->all());
        return redirect()->back();
    }
    public function orderpage(Request $request){
        return view('project.orderpage');
    }
    public function src(Request $request){
        $txt=$request->txt;
        $vr=DB::table('products')->select('product_name')->
        where('product_content','LIKE','%'.$txt.'%')->get();
        return response()->json(['status'=>'success','message'=>'VAr','data'=>$vr]);
    }
    public function insertorder(Request4 $request4){
        $name=$request4->name;
        $number=$request4->number;
        $email=$request4->email;
        $ordername=$request4->ordername;
        $aboutorder=$request4->aboutorder;
        $date=$request4->date;
        $insert=new Order();
        $insert->client_name=$name;
        $insert->client_phone=$number;
        $insert->client_email=$email;
        $insert->order_name=$ordername;
        $insert->about_order=$aboutorder;
        $insert->deadline=$date;
        $insert->looking=false;
        $insert->save();
        return response()->json(['sttaus'=>'success','message'=>'Sifaris elave olundu']);
    }
    public function productlist(){
        $product=DB::table('products')->get();
        return view('project.productlist',[
            'product'=>$product
        ]);

    }
}
