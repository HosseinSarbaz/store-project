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

                                        <th class="text-center"> نام رنگ</th>
                                        <th>رنگ</th>
                                        <th>عملیات</th>


                                    </tr>
                                </thead>

                                <tbody>

                                    @php
                                        $colors = $product->colors ?? [];
                                    @endphp

                                    @foreach ($colors as $name => $code )
                                        <tr>
                                            <td class="text-center">{{ $name }}</td>

                                            <td class="align-center">
                                                <div style="height: 40px; width:40px; border-radius:5px; background:{{$code}} "></div>
                                            </td>



                                                    {{-- دکمه حذف --}}
                                                    <td>
                                                    <li>
                                                        <form action="{{ route('Admin.Products.deleteColor', [$product->id , $name] ) }}"
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
                                                    </td>

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
