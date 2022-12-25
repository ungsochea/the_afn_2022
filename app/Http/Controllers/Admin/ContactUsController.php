<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactus;
class ContactUsController extends Controller
{
    public function index(){
        return view('admins.contact_us.index');
    }
    public function getAjax(Request $request){
        if(!$request->ajax()) return abort(500);
        $contacts = ContactUs::latest()->paginate('7');
        $html = view('admins.contact_us.get_list',compact('contacts'))->render();
        return response()->json(compact('html'));
    }
    public function search(Request $request){
        if(!$request->ajax()) return abort(500);
        $s = $request->search;
        $contacts = ContactUs::when($s,function($query) use ($s){
            $query->where('name','LIKE','%'.$s.'%')->orWhere('email','LIKE','%'.$s.'%');
        })
        ->latest()
        ->paginate('7');
        $html = view('admins.contact_us.get_list',compact('contacts'))->render();
        return response()->json(compact('html'));
    }
    public function destroy(Request $request,ContactUs $contact_us){
        if(!$request->ajax()) return abort(500);
        if($contact_us->delete()){
            $count = ContactUs::count();
            $response['message'] = 'Deleted successfully.';
            return response()->json(compact('response','count'));
        }else{

        }

    }
}
