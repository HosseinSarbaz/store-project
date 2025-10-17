@extends("Admin.layouts.master");


@section("content")

<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <form action="{{route('categories.update',$category->id)}}" method="POST" enctype="multipart/form-data" id="editCategory-form">
            @csrf
            @method('PUT')
            <div class="row mb-4">
                <div class="col">
                    <label for="name_id" class="d-block">نام دسته بندی </label>
                    <input value="{{$category->name }}" name="name" id="name_id" type="text" class="form-control" placeholder="نام دسته بندی ">
                </div>
                <div class="col">
                    <label for="image_id" class="d-block">بارگذاری تصویر    </label>

                    <input  name="image" type="file" class="form-control" id="image_id" placeholder="">
                    <span><br><img src="{{asset('AdminAssets/Category-image/' .$category->image )}}" height="100px" width="100px" alt=""></span>
                </div>
            </div>
            <input type="submit" name="sub" class="btn btn-primary" value="ویرایش دسته بندی">
        </form>
    </div>
</div>

@endsection

@section('jsValidation')
<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Admin\CategoryRequest', '#editCategory-form'); !!}
@endsection

