@extends("Admin.layouts.master");


@section("content")

<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <form action="{{route('Admin.Products.storeAttribiute' , $product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf

           <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="inputname4">نام ویژگی</label>
                    <input name="Attr_name1" type="text" class="form-control" id="inputname4" placeholder="نام ویژگی">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputprice4">مقدار ویژگی </label>
                    <input name="Attr_value1" type="text" class="form-control" id="inputcolor4" placeholder="مقدار ویژگی">
                </div>
            </div>

            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="inputname4"></label>
                    <input name="Attr_name2" type="text" class="form-control" id="inputname4" placeholder="نام ویژگی" >
                </div>
                <div class="form-group col-md-6">
                    <label for="inputprice4"></label>
                    <input name="Attr_value2" type="text" class="form-control" id="inputcolor4" placeholder="مقدار ویژگی" >
                </div>
            </div>

            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="inputname4"></label>
                    <input name="Attr_name3" type="text" class="form-control" id="inputname4" placeholder="نام ویژگی">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputprice4"></label>
                    <input name="Attr_value3" type="text" class="form-control" id="inputcolor4" placeholder="مقدار ویژگی">
                </div>
            </div>

            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="inputname4"></label>
                    <input name="Attr_name4" type="text" class="form-control" id="inputname4" placeholder="نام ویژگی">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputprice4"></label>
                    <input name="Attr_value4" type="text" class="form-control" id="inputcolor4" placeholder="مقدار ویژگی">
                </div>
            </div>

            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="inputname4"></label>
                    <input name="Attr_name5" type="text" class="form-control" id="inputname4" placeholder="نام ویژگی">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputprice4"></label>
                    <input name="Attr_value5" type="text" class="form-control" id="inputcolor4" placeholder="مقدار ویژگی">
                </div>
            </div>
            <input type="submit" name="sub" class="btn btn-primary" value="اصافه کردن ویژگی">
        </form>
    </div>
</div>

@endsection



