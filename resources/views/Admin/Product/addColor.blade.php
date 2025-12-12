@extends("Admin.layouts.master");


@section("content")

<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <form action="{{route('Admin.Products.storeColor',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf

           <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="inputname4">نام رنگ</label>
                    <input name="color_name" type="text" class="form-control" id="inputname4" placeholder="نام رنگ">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputprice4">قیمت محصول </label>
                    <input name="color_code" type="color" class="form-control" id="inputcolor4" placeholder="قیمت محصول ">
                </div>
            </div>
            <input type="submit" name="sub" class="btn btn-primary" value="اصافه کردن رنگ">
        </form>
    </div>
</div>

@endsection



