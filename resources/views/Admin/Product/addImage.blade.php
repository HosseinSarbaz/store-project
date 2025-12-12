@extends("Admin.layouts.master");


@section("content")

<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <form action="{{route('Admin.Products.StoreImage',$product->id )}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mb-4">

                <div class="col">
                    <label for="image_id" class="d-block">بارگذاری تصویر    </label>

                    <input name="image[]" type="file" class="form-control" id="image_id" placeholder="" multiple>
                </div>
            </div>
            <input type="submit" name="sub" class="btn btn-primary" value="اصافه کردن عکس">
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
{!! JsValidator::formRequest('App\Http\Requests\Admin\CategoryRequest', '#createCategory-form'); !!}
@endsection

