<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request1;
use App\Http\Requests\Request2;
use App\Http\Requests\Request3;
use App\Models\msk;
use App\Models\Person;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ForAdminController extends Controller
{
    //For Dashboard

    public function send(){
        $ordercount=DB::table('orders')->where('looking',false)->count();
        $messagecount=DB::table('messages')->where('looking',false)->count();
        return view('adminpannel.index',[
            'count'=>$ordercount,
            'messagecount'=>$messagecount,
        ]);
    }
    public function home()
    {
        $ordercount=DB::table('orders')->where('looking',false)->count();
        $messagecount=DB::table('messages')->where('looking',false)->count();
        $img=DB::table('products')->select('image')->get();
        $msk=DB::table('msks')->get();
        return view('adminpannel.home',[
            'count'=>$ordercount,
            'messagecount'=>$messagecount,
            'img'=>$img,
            'msk'=>$msk,
        ]);
    }
    public function product()
    {
        $ordercount=DB::table('orders')->where('looking',false)->count();
        $messagecount=DB::table('messages')->where('looking',false)->count();
        $kitcehn=DB::table('msks')->get();
        $products=Product::select(  "products.id",
                                    "products.product_name",
                                    "products.price",
                                    "msks.kitchen_name as kitchens")->
                            leftJoin('msks','msks.id','=','products.kitchen')->
                            get();
        return view('adminpannel.product',[
            'kitchen'=>$kitcehn,
            'product'=>$products,
            'count'=>$ordercount,
            'messagecount'=>$messagecount
        ]);
    }
    public function person()
    {
        $ordercount=DB::table('orders')->where('looking',false)->count();
        $messagecount=DB::table('messages')->where('looking',false)->count();
        $people=DB::table('people')->select('id','person_name','person_surname','person_email')->get();
        return view('adminpannel.person',[
            'people'=>$people,
            'count'=>$ordercount,
            'messagecount'=>$messagecount
        ]);
    }
    public function order()
    {
        $ordercount=DB::table('orders')->where('looking',false)->count();
        $messagecount=DB::table('messages')->where('looking',false)->count();
        $order=DB::table('orders')->where('looking',false)->get();
        return view('adminpannel.order',[
            'count'=>$ordercount,
            'messagecount'=>$messagecount,
            'order'=>$order
        ]);
    }
    public function seenorder(Request $request){
        $id=$request->id;
        DB::table('orders')->where('id',$id)->update(['looking'=>true]);
        return response()->json(['status'=>'success','message'=>'Oxundu']);
    }
    public function message()
    {
        $message=DB::table('messages')->where('looking',false)->get();
        $ordercount=DB::table('orders')->where('looking',false)->count();
        $messagecount=DB::table('messages')->where('looking',false)->count();
        return view('adminpannel.message',[
            'count'=>$ordercount,
            'messagecount'=>$messagecount,
            'message'=>$message
        ]);
    }
    public function seenmessage(Request $request){
        $id=$request->id;
        DB::table('messages')->where('id',$id)->update(['looking'=>true]);
        return response()->json(['status'=>'success','message'=>'Oxundu']);
    }
    public function msk()
    {
        $ordercount=DB::table('orders')->where('looking',false)->count();
        $messagecount=DB::table('messages')->where('looking',false)->count();
        $kitchens=DB::table('msks')->get();
        $len=DB::table('msks')->count();
        return view('adminpannel.msk',[
            'kitchen'=>$kitchens,
            'count'=>$ordercount,
            'messagecount'=>$messagecount,
            'len'=>$len
        ]);
    }


    public function allProducts(){
        $msk=DB::table('msks')->get();
        return $msk;
    }

    //CRUDs
    public function addproduct(Request1 $request){
        $name=$request->productname;
        $content=$request->productcontent;
        $kitchen=$request->kitchen;
        $price=$request->price;
        $branch=$request->branch;
        $image=$request->file('image')->getClientOriginalExtension();
        $img_name=time().'.'.$image;
        $request->file('image')->move('productimage',$img_name);
        $insert=new Product();
        $insert->product_name=$name;
        $insert->product_content=$content;
        $insert->kitchen=$kitchen;
        $insert->price=$price;
        $insert->branch=$branch;
        $insert->image=$img_name;
        $insert->save();

        return response()->json(['status'=>'success','message'=>'elave edildi']);
    }
    public function productupdate(Request $request){
        $name=$request->name;
        $kitchen=$request->kitchen;
        $price=$request->price;
        $id=$request->id;
        $kitchen_id=DB::table('msks')->select('id')->where('kitchen_name',$kitchen)->get();
        DB::table('products')->where('id',$id)->
        update(['product_name'=>$name,'kitchen'=>$kitchen_id,'price'=>$price]);
        return response()->json(['status'=>'success','message'=>'Mehsul melumatlari yenilendi']);
    }
    public function productdelete(Request $request){
        $id=$request->id;
        DB::table('products')->where('id',$id)->delete();
        return response()->json(['status'=>'success','message'=>'Mehsul bazadan silindi']);
    }

    public function addkitchen(Request2 $request){
        $kitchenname=$request->kitchenname;
        $insert=new msk();
        $insert->kitchen_name=$kitchenname;
        $insert->save();
        $kitchens=DB::table('msks')->get();
        return response()->json(['status'=>'success','message'=>'Bazaya elave edldi','data'=>$kitchens]);
    }
    public function kitchendelete(Request $request){
        $kichen_id=$request->id;
        DB::table('msks')->where('id',$kichen_id)->delete();
        return response()->json(['status'=>'success','message'=>'Bazadan silindi']);
    }
    public function updatekitchen(Request $request)
    {
        $kitchen=$request->kitchen;
        $id=$request->id;
        DB::table('msks')->where('id',$id)->update(['kitchen_name'=>$kitchen]);
        return response()->json(['status'=>'success','message'=>'Upadet olundu']);
    }
    public function addperson(Request3 $request3){
        $name=$request3->name;
        $surname=$request3->surname;
        $age=$request3->age;
        $number=$request3->number;
        $email=$request3->email;
        $address=$request3->address;
        $insert=new Person();
        $insert->person_name=$name;
        $insert->person_surname=$surname;
        $insert->age=$age;
        $insert->number=$number;
        $insert->person_email=$email;
        $insert->address=$address;
        $insert->save();
        return response()->json(['status'=>'success','message'=>'Isci elave edildi',]);
    }
    public function updateperson(Request $request){
        $name=$request->name;
        $surname=$request->surname;
        $email=$request->email;
        $id=$request->id;
        DB::table('people')->where('id',$id)->
        update(['person_name'=>$name,'person_surname'=>$surname,'person_email'=>$email]);
        return response()->json(['status'=>'success','message'=>'Iscinin melumatlari yenilendi']);
    }
    public function persondelete(Request $request){
        $id=$request->id;
        DB::table('people')->where('id',$id)->delete();
        return response()->json(['status'=>'success','message'=>'Iscinin verilenleri silindi']);
    }
}
