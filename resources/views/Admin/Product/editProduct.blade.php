@extends("Admin.layouts.master");


@section("content")

<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <form action="{{route('products.update',$product->id )}}" method="POST" enctype="multipart/form-data" id="editProduct-form" >
            @csrf
            @method('PUT')

            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="inputname4">نام محصول</label>
                    <input value="{{$product->name }}" name="name" type="text" class="form-control" id="inputname4" placeholder="نام محصول">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputprice4">قیمت محصول </label>
                    <input value="{{$product->price }}" name="price" type="text" class="form-control" id="inputprice4" placeholder="قیمت محصول ">
                </div>
            </div>
            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="inventory"> تعداد موجودی</label>
                    <input value="{{$product->inventory }}" name="inventory" type="number" class="form-control" id="inventory" placeholder=" تعداد موجودی">
                </div>
                <div class="form-group col-md-6">
                    <label for="category">دسته بندی  محصولات </label>


                    <select  name="category_id" class="selectpicker form-control p-2" >
                        {{$product->category->name }}
                         @foreach ($categories as $category )
                        <option value="{{$category->id}}" >{{$product->category->name}}</option>
                         @endforeach
                    </select>



                </div>
            </div>


            <div class="form-row mb-4">
                    <label for="inputState">توضیحات محصول</label>

                <textarea   name="description" type="text" class="form-control" id="inputCity">{{$product->description }}</textarea>


            </div>

            <div class="form-row mb-4">
                <label for="image_id" class="d-block">بارگذاری تصویر    </label>

                <input name="images" name="image" type="file" class="form-control" id="image_id" placeholder="">
                <span><br><img src="{{asset('AdminAssets/Product-image/'.$product->images )}}" width="100px" height="100px" alt=""></span>
        </div>

          <button type="submit" class="btn btn-primary mt-3">ویرایش محصول</button>
        </form>
    </div>
</div>

@endsection


@section("srcjs")
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Admin\ProductRequest', '#editProduct-form') !!}

@endsection
