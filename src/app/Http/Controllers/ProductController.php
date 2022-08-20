<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function toggleTrending(Request $request) {

        return Product::where('id', '=', $request->post('id'))->update([
            'trending' => $request->post('trending'),
        ]);

    }

    public function new(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'price' => 'required|int',
            'desc' => 'required|string',
            'images.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            Session::flash('error', 'Error when validating form, make sure send the right data!');
            return redirect('/admin/products/new', );
        }

        $product = new Product();
        $product->title = $request->title;
        $product->price = $request->price;
        $product->desc = $request->desc;
        $product->trending = 0;

        $saved = $product->save();

        if($saved) {

            $category = new CategoryProduct();

            $category->category_id = $request->category;
            $category->product_id = $product->id;

            if(!$category->save()){
                Session::flash('error', 'Error when setting category!');
            }

            /* Check so images exists */
            if($request->images) {
                foreach($request->images as $index=>$image) {
                    $filename = sprintf('%s%s.%s', bin2hex(random_bytes(6)), time(), $image->extension());
                    $image->move(public_path() . '/products/', $filename);
                    $productImage = new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->image_path = $filename;

                    if($request->thumbnail === $image->getClientOriginalName()) {
                        $productImage->thumbnail = 1;
                    }
                    $image_saved = $productImage->save();
                    if(!$image_saved) {
                        Session::flash('error', "Error saving images");
                    }
                }
            }
        }

        if($saved && $image_saved){
            Session::flash('message', 'Productad added!');
        }

        return redirect('/admin/products');
    }

    public function delete(int $id) {
        $product = Product::find($id);
        return $product->delete();
    }
}
