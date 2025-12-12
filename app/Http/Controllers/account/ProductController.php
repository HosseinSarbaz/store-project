<?php

namespace App\Http\Controllers\account;

use App\Helpers\uploadImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductImageRequest;
use App\Http\Requests\Admin\ProductRequest;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Product;
use Hamcrest\Type\IsArray;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use MongoDB\Laravel\Eloquent\Casts\ObjectId as castdObjectId;
use MongoDB\BSON\ObjectId;
use ProductRepository;
use RealRashid\SweetAlert\Facades\Alert;

use function MongoDB\object;

class ProductController extends Controller
{
    protected $products;

    public function __construct(ProductRepositoryInterface $products)
    {
        $this->products = $products;
    }


    public function create(){
        $categories=Category::all();
        return view("Admin.Product.createProduct", compact("categories"));
    }

    public function store(ProductRequest $request){
        $dataform = $request->validated();

        $dataform['productslug'] = str_replace(' ', '-', $request->name);
        $dataform['status'] = 0;
        $dataform['images'] = [];

        if($request->hasFile('images')){

            $images = $request->file('images');
             $uploadImages = uploadImageHelper::uploadImages($images,'products');

            if( is_array($uploadImages)){
                $dataform['images'] = $uploadImages;
            }
        }

            $this->products->create($dataform);

            Alert::success('موفقیت', 'محصول  با موفقیت اضافه شد');
            return redirect()->route('products.index');
        }



        public function index() {
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
        $dataform['category_id'] = new ObjectId($dataform['category_id']);
        $dataform['productslug'] = str()->slug($request['name']);

            $product->update($dataform);
            Alert::success('ویرایش موفق', 'محصول  با موفقیت ویرایش شد');
            return redirect()->route('products.index');
            }







        public function destroy($id){
        $product = $this->products->find($id);

        if($product->images){

            foreach ($product->images as $img) {
                Storage::disk('public')->delete('products/'. $img );
            }
        }

        $product->delete();
        Alert::success('حذف موفق', 'محصول  با موفقیت حذف شد');
        return redirect()->route('products.index');
        }


        public function addImage($id){
            $product = $this->products->find($id);
            return view("Admin.Product.addImage",compact("product"));
        }

        public function storeImage(Request $request,$id){
            $products = $this->products->find($id);

            $request->validate([
                "image.*" => "nullable|image|mimes:png,jpg,jpeg|max:4096"
            ]);

            if($request->hasFile('image')){
                $images = $request->file('image');
                (array) $newImage = uploadImageHelper::uploadImages($images,'products',$products->images);
                $products->images = $newImage;
                $products->save();

                Alert::success(' success', 'عکس برای محصول اضافه شد');
            }

            return redirect()->route('Admin.Products.ProductImages',$products->id);
        }

        public function productImages($id){
            $product = $this->products->find($id);
            return view("Admin.Product.productImages",compact("product"));
        }


        public function deleteImage($id, $index)
{
    $product = $this->products->find($id);
    $images = $product->images ?? [];

    if(isset($images[$index])){
        Storage::disk('public')->delete('products/' . $images[$index]);
        unset($images[$index]);
        $product->images = array_values($images);
        $product->save();
    }

     return redirect()->route('products.index' );
}


    public function AddColor($id){
        $product = $this->products->find($id);
        return view('Admin.Product.addColor',compact("product"));
    }


    public function storeColor(Request $request,$id){
        $request->validate([
            'color_name' => 'required|string|max:50',
            'color_code' => 'required|string'
        ]);

        $product = $this->products->find($id);

        $colors = (array) ($product->colors ?? []);

        $colors[$request->color_name] = $request->color_code;
        $product->forceFill(['colors' => (object) $colors])->save();

        return redirect()->route('products.index');
    }

    public function productColors($id){
        $product = $this->products->find($id);
        return view("Admin.Product.productColors",compact("product"));

    }


    public function deleteColor($id,$name){

        $product = $this->products->find($id);

        $colors = (array) ($product->colors ?? []);

        if(isset($colors[$name])){
            unset($colors[$name]);
            $product->colors = (object) $colors;
            $product->save();
            }
            return back();
    }


    public function AddAttribiute($id){

        $product = $this->products->find($id);
        return view("Admin.Product.AddAttribiute",compact("product"));
    }


    public function storeAttribiute(Request $request,$id){

        $product = $this->products->find($id);
        $attribiutes = $product->attribiutes ?? [];

        for ( $i = 0; $i <=5 ; $i++ )
        {
            $name = $request->input("Attr_name$i");
            $value = $request->input("Attr_value$i");

            if(!empty($name) && !empty($value) ){
                $attribiutes[$name] = $value;
            }
        }

        $product->forceFill(['attribiutes' => (object) $attribiutes ])->save();
        return redirect()->route('products.index');
    }

        public function Attribiutes($id){
            $product= $this->products->find($id);
            return view("Admin.Product.Attribiutes",compact("product"));

        }

        public function deleteAttribiute($id,$name){
            $product= $this->products->find($id);

            $attribiutes = (array) $product->attribiutes ?? [];
            if(isset($attribiutes[$name])){
                unset($attribiutes[$name]);
                $product->attribiutes = (object) $attribiutes;
                $product->save();
            }
            return back();
        }





        // public function uploadImage(array $files,$folder='products',$existing=[]){

        //     $fileNames = $existing ?: [];

        //     foreach($files as $file)
        //     $name=time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        //     Storage::disk('public')->putFileAs($folder,$file,$name);
        //     $fileNames[] = $name;

        //     return $fileNames;


        //     // if($existingFilename && storage::disk('public')->exists($folder . '/' . $existingFilename)){
        //     //     storage::disk('public')->delete($folder . '/' . $existingFilename );
        //     // }
        // }

}




