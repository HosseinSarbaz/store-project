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

                                        <th>نام </th>
                                        <th>تاریخ ثبت </th>
                                        <th class="text-center">تصویر</th>
                                        <th class="text-center">تعداد محصولات</th>
                                        <th class="text-center">وضیعت</th>
                                        <th class="text-center">عمل</th>
                                    </tr>
                                </thead>
                                @foreach ($categories as $category)


                                <tbody>
                                    <tr>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->created_at}}</td>
                                        <td class="text-center">
                                            <span><img src="{{asset('storage/categories/'.$category->image ?? 'no-image.png' )}}" width="80px" height="80px"  class="profile-img" alt="avatar"></span>
                                        </td>
                                        <td class="text-center" >{{$category->products_Count }} </td>
                                        <td class="text-center"><span class="shadow-none badge badge-primary">تایید شده</span></td>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <li><a href="{{route('categories.edit',$category->id )}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="ویرایش"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                    <li>
                                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                                onclick="return confirm('مطمئنی میخوای حذف کنی؟')"
                                                                style="border:none; background:none; padding:0; margin:0;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
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
                            <div class="d-flex justify-content-center mt-4 mb-4 dark">
                                    {{$categories->links('pagination::bootstrap-5') }}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

