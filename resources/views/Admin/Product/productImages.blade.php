@extends("Admin.layouts.master");


@section("content")

<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="row layout-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>سبک 3</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive mb-4">

                            <table id="style-3" class="table style-3  table-hover">
                                <thead>
                                    <tr>


                                        <th class="text-center">عکس</th>

                                        <th class="text-center">عمل</th>
                                    </tr>
                                </thead>



                                <tbody>
                                         @foreach ($product->images as $index => $image)
    @php
        // اگر آیتم خودش آرایه بود (مثلاً ["0" => "file.png"]) فقط مقدارشو بگیر
        // $imgPath = is_array($image) ? $image[0] : $image;
    @endphp

    <tr>
        <td class="text-center">
            <img src="{{ asset('storage/products/' . $image )}}"
                 width="80px" height="80px" class="profile-img" alt="product-image">
        </td>

        {{-- <td class="text-center">
            <img src="{{ asset('storage/products/' . ($imgPath ?? 'no-image.png')) }}"
                 width="80px" height="80px" class="profile-img" alt="product-image">
        </td> --}}
        <td class="text-center">
            <ul class="table-controls">
                <li>
                    <form action="{{route('Admin.Products.deleteImage',[$product->id, $index ] )}}"
                          method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('مطمئنی میخوای حذف کنی؟')"
                                style="border:none; background:none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                 viewBox="0 0 24 24" fill="none" stroke="#830100"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-trash-2 p-1 br-6 mb-1">
                                 <polyline points="3 6 5 6 21 6"></polyline>
                                 <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6
                                          m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg>
                        </button>
                    </form>
                </li>
            </ul>
        </td>
    </tr>
@endforeach

                                </tbody>
                            </table>



                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

