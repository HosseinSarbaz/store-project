@extends("Admin.layouts.master")

@section("content")
<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="row layout-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>لیست محصولات</h4>
                            </div>
                        </div>
                    </div>

                    <div class="widget-content widget-content-area">
                        <div class="table-responsive mb-4">
                            <table id="style-3" class="table style-3 table-hover">
                                <thead>
                                    <tr>
                                        <th>نام</th>
                                        <th>قیمت</th>
                                        <th>موجودی</th>
                                        <th class="text-center">دسته بندی</th>
                                        <th class="text-center">توضیح</th>
                                        <th class="text-center">عکس</th>
                                        <th class="text-center">وضعیت</th>
                                        <th class="text-center">عملیات</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ Str::limit($product->name, 40, '...')  }}</td>
                                            <td>{{ number_format($product->price) }} تومان</td>
                                            <td>{{ $product->inventory }}</td>
                                            <td>{{ $product->category->name ?? 'ندارد' }}</td>
                                            <td>{{ Str::limit($product->description, 40) }}</td>

                                            {{--  نمایش اولین عکس یا no-image --}}
                                            @php
                                                $firstImage = null;
                                                if (is_array($product->images) && count($product->images) > 0) {
                                                    $firstImage = is_array($product->images[0])
                                                        ? $product->images[0][0] // اگر خودش آرایه بود
                                                        : $product->images[0];
                                                }
                                            @endphp

                                            <td class="text-center">
                                                <img src="{{ asset('storage/products/' . ($firstImage ?? 'no-image.png')) }}"
                                                     width="80" height="80" class="profile-img" alt="product-image">
                                            </td>

                                            <td class="text-center">
                                                @if ($product->status == 1)
                                                    <span class="badge bg-success shadow-none">فعال</span>
                                                @else
                                                    <span class="badge bg-secondary shadow-none">غیرفعال</span>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                <ul class="table-controls d-flex justify-content-center" style="gap:8px;">

                                                    {{-- دکمه ویرایش --}}
                                                    <li>
                                                        <a href="{{ route('products.edit', $product->id) }}"
                                                           class="bs-tooltip" title="ویرایش">
                                                           ✏️
                                                        </a>
                                                    </li>

                                                    {{-- دکمه حذف --}}
                                                    <li>
                                                        <form action="{{ route('products.destroy', $product->id) }}"
                                                              method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"

                                                                    onclick="return confirm('مطمئنی میخوای حذفش کنی؟')"
                                                                    style="border:none; background:none; cursor:pointer;">
                                                                🗑️
                                                            </button>
                                                        </form>
                                                    </li>

                                                    {{-- دکمه افزودن عکس --}}
                                                    <li>
                                                        <a href="{{ route('Admin.Products.AddImage', $product->id) }}"
                                                           class="bs-tooltip" title="افزودن عکس">🖼️</a>
                                                    </li>

                                                    {{-- دکمه مشاهده گالری --}}
                                                    <li>
                                                        <a href="{{ route('Admin.Products.ProductImages', $product->id) }}"
                                                           class="bs-tooltip" title="مشاهده همه تصاویر">📸</a>
                                                    </li>

                                                    <li>
                                                        <a href="{{route('Admin.Products.AddColor',$product->id )}}"
                                                           class="bs-tooltip" title=" افزودن رنگ برای محصول ">🩸</a>
                                                    </li>

                                                    <li>
                                                        <a href="{{route('Admin.Products.productColors',$product->id )}}"
                                                           class="bs-tooltip" title="مشاهده همه رنگ ها">🎨</a>
                                                    </li>

                                                    <li>
                                                        <a href="{{route('Admin.Products.AddAttribiute', $product->id)}}"
                                                           class="bs-tooltip" title=" اضافه کردن ویژگی">+</a>
                                                    </li>

                                                    <li>
                                                        <a href="{{route('Admin.Product.Attribiutes', $product->id)}}"
                                                           class="bs-tooltip" title=" اضافه کردن ویژگی">=</a>
                                                    </li>


                                                    <li>
                                                        <a href="{{route('Home.showProduct', ['productslug' => $product->productslug])}}"
                                                           class="bs-tooltip" title="   ">0</a>
                                                    </li>


                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-center mt-4 mb-4">
                                {{ $products->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
