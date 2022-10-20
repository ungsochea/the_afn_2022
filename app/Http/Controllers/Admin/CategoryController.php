<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        return view('admins.categories.index');
    }
    public function create(Request $request){
        $category = new Category();
        $html = view('admins.categories.form',compact('category'))->render();
        return response()->json(compact('html'));
    }
    public function getAjax(Request $request){
        if(!$request->ajax()) return abort(500);
        $categories = Category::latest()->paginate('7');
        $html = view('admins.categories.get_list',compact('categories'))->render();
        return response()->json(compact('html'));
    }
    public function store(Request $request){
        if(!$request->ajax()) return abort(500);
        $request->validate([
            'title' => 'required|min:1',
            'slug'  => 'required|min:1|unique:categories',
        ]);
        $category = new Category();
        $category = $category->create($request->all());
        $html = view('admins.categories.get_item',compact('category'))->render();
        $response['message'] = 'Added successfully.';
        return response()->json(compact('response','html'));
    }
    public function edit(Request $request,Category $category){
        if(!$request->ajax()) return abort(500);
        $html = view('admins.categories.form',compact('category'))->render();
        return response()->json(compact('html'));
    }
    public function update(Request $request,Category $category){
        if(!$request->ajax()) return abort(500);
        $request->validate([
            'title' => 'required|min:1',
            'slug'  => 'required|min:1|unique:categories,slug,'.$category->id,
        ]);
        $category->update($request->all());
        $html = view('admins.categories.get_item',compact('category'))->render();
        $response['message'] = 'Updated successfully.';
        return response()->json(compact('response','html'));
    }
    public function destroy(Request $request,Category $category){
        if(!$request->ajax()) return abort(500);
        if($category->delete()){
            $category_count = Category::count();
            $response['message'] = 'Deleted successfully.';
            return response()->json(compact('response','category_count'));
        }else{

        }

    }
    public function search(Request $request){
        if(!$request->ajax()) return abort(500);
        $s = $request->search;
        $categories = Category::when($s,function($query) use ($s){
            $query->where('title','LIKE','%'.$s.'%');
        })
        ->latest()
        ->paginate('7');
        $html = view('admins.categories.get_list',compact('categories'))->render();
        return response()->json(compact('html'));
    }
}
