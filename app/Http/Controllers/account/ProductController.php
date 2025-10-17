<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ProductRepository;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    protected $products;

    public function __construct(ProductRepositoryInterface $products)
    {
        $this->products = $products;
    }


    public function create(){
        $categories=Category::all();
        return view("Admin.Product.createProduct",compact("categories"));
    }

    public function store(ProductRequest $request){
        $dataform = $request->validated();

        if($request->hasFile('images')){
            $dataform['images'] = $this->uploadImage($request->file('images'),'products');
        }
        else{
            $dataform['image'] = null;
        }
            $dataform['status'] = 0;

            $this->products->create($dataform);

            Alert::success('موفقیت', 'محصول  با موفقیت اضافه شد');

            return redirect()->route('products.index');
        }


    public function index(){
        $categories = Category::all();
        $products = $this->products->paginate(3);

        return view("Admin.Product.products",compact("categories","products"));
    }


    public function edit($id){
        $categories = Category::all();
        $product = $this->products->find($id);
        return view("Admin.Product.editProduct",compact("categories","product"));
    }

    public function update(ProductRequest $request,$id){
        $product = $this->products->find($id);

        $dataform = $request->validated();

        if($request->hasFile('images')){
            $newName = $this->uploadImage($request->file('images'),'products',$product->images);
            $dataform['images'] = $newName;
            $dataform['status'] = 0;
        }
        else{
            $dataform['images']= $product->images;
        }


            $product->update($dataform);

            Alert::success('ویرایش موفق', 'محصول  با موفقیت ویرایش شد');

            return redirect()->route('products.index');
        }

        public function destroy($id){
            $product = Product::findOrfail($id);

            if($product->images){
            Storage::disk('public')->delete('products/'.$product->images );
            }

            $product->delete();


             Alert::success('حذف موفق', 'محصول  با موفقیت حذف شد');
              return redirect()->route('products.index');
        }



        public function uploadImage($file,$folder='products',$existingFilename=null){

            $fileName=time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            Storage::disk('public')->putFileAs($folder,$file,$fileName);

            if($existingFilename && storage::disk('public')->exists($folder . '/' . $existingFilename)){
                storage::disk('public')->delete($folder . '/' . $existingFilename );
            }

            return $fileName;

        }

}



