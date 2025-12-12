<?php

namespace App\Http\Controllers\account;

use App\Helpers\uploadImageHelper;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Eloquent\CategoryRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    protected $Category;
    public function __construct(CategoryRepositoryInterface $CategoryRepo)
    {
        $this->Category = $CategoryRepo;
    }

    public function create(){
        return view("Admin.Category.createcategory");
    }

    public function store(CategoryRequest $request){

        $dataform=$request->validated();

        $dataform['productslug'] = str_replace(' ', '-', $request->name);
        if($request->hasFile('image')){
            $dataform['image'] = uploadImageHelper::uploadImage($request->file('image') ,'categories');
        }
        else{
            $dataform['image'] = null;
        }
        $dataform['status'] = 0;

        $this->Category->create($dataform);

        Alert::success('موفقیت', 'دسته بندی با موفقیت اضافه شد');
        return redirect()->route("categories.index");
    }

    public function index(){
        $categories = $this->Category->getAllWithProductCount(6);
        return view("Admin.Category.categories",compact("categories"));
    }

    public function edit($id) {
        $category = $this->Category->find($id);
        return view("Admin.Category.editcategory",compact("category"));
    }

    public function update(CategoryRequest $request,$id){
        $category= $this->Category->find($id);

        $dataform = $request->validated();

        if($request->hasFile('image'))
            {
            $newName=uploadImageHelper::uploadImage($request->file('image'),'categories',$category->image);
            $dataform['image'] = $newName;
            Storage::disk('public')->delete('categories/' . $category->image );
            }
            else
            {
            $dataform['image']=$category->image;
            }

        $dataform['status'] = 0;

        $category->update($dataform);


        Alert::success("ویرایش موفق","دسته بندی با موفقیت ویرایش شد");

        return redirect()->route("categories.index");


    }

    public function destroy($id){
        $category= $this->Category->find($id);

        Storage::disk('public')->delete('categories/' . $category->image );

        $category->delete();

        Alert::success(" حذف موفق","دسته بندی با موفقیت حذف شد");

        return redirect()->route("categories.index");

    }



    // public function uploadImage($file,$folder='categories',$existingFilename = null)
    // {
    //     try
    //     {
    //     $filename = time(). '_' . uniqid() . '.' . $file->getClientOriginalExtension();

    //     Storage::disk('public')->putFileAs($folder, $file, $filename);

    //     if($existingFilename && Storage::disk('public')->exists($folder . '/' . $existingFilename)){
    //         Storage::disk('public')->delete($folder . '/' . $existingFilename);
    //     }

    //     return $filename;
    //     }

    //     catch(\Throwable $e)
    //     {
    //         Log::error("Upload Image Failed".$e->getMessage());
    //         return $existingFilename ?? null;
    //     }
    // }



}
