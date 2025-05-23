<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class AdminController extends Controller
{
    public function view_category(){
        $data = category::all();

        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request){
        $data = new category;
        $data-> category_name = $request->category;
        $data-> save();
        return redirect()->back()->with('message', 'Category added succesfully');
    }

    public function delete_category($id){
        $data = category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category deleted succesfully');
    }

    public function view_product(){
        $category = category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request) {
        $product = new product;
        $product-> product_name = $request->product_name;
        $product-> price = $request->price;
        $product-> description = $request->description;
        $product-> category = $request->category;
        $product-> discounted_price = $request->discounted_price;

        $image = $request->image;
        $imagename = time(). '.' .$image-> getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product-> image = $imagename;

        $product-> save();
        return redirect()->back()->with('message', 'Product added succesfully');
    }

    public function manage_product() {
        $product = product::all();
        return view('admin.manageproduct', compact('product'));
    }

    public function delete_product($id){
        $product = product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Product deleted succesfully');
    }

    public function update_product($id){
        $product = product::find($id);
        $category = category::all();

        // Check if the product's category exists in the category list
        $categoryExists = false;
        if ($product && $product->category) {
            $categoryExists = $category->contains('id', $product->category);
        }

        return view('admin.updateproduct', compact('product', 'category', 'categoryExists'));
    }

    public function update_product_confirm($id, Request $request) {
        $product = product::find($id);
        $product-> product_name = $request->product_name;
        $product-> price = $request->price;
        $product-> description = $request->description;
        $product-> category = $request->category;
        $product-> discounted_price = $request->discounted_price;
        $image = $request->image;

        if($image){
            $imagename = time(). '.' .$image-> getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product-> image = $imagename;
        }

        $product-> save();
        return redirect()->back()->with('message', 'Product updated succesfully');
    }
}
