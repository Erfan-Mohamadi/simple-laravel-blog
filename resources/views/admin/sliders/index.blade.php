@extends('layouts.master')

@section('title', 'لیست اسلایدرها')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">لیست اسلایدرها</h3>
                    <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary float-end">ایجاد اسلایدر جدید</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered text-center align-middle">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>تصویر</th>
                            <th>عنوان</th>
                            <th>توضیحات</th>
                            <th>وضعیت</th>
                            <th>تاریخ ثبت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slider)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ asset('storage/' . $slider->image) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $slider->image) }}" class="img img-thumbnail" style="width: 90px; height: 75px">
                                    </a>
                                </td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($slider->subtitle, 50) }}</td>
                                <td>
                                    @if($slider->status)
                                        <span class="badge bg-success">فعال</span>
                                    @else
                                        <span class="badge bg-danger">غیرفعال</span>
                                    @endif
                                </td>
                                <td>{{ verta($slider->created_at)->format('Y/m/d H:i') }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.sliders.show', $slider->id) }}" role="button">
                                        نمایش
                                    </a>
                                    <a class="btn btn-warning btn-sm" href="{{ route('admin.sliders.edit', $slider->id) }}">
                                        ویرایش
                                    </a>
                                    <button class="btn btn-danger btn-sm" type="button" onclick="confirmDelete('delete-{{ $slider->id }}')">
                                        حذف
                                    </button>
                                    <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" id="delete-{{ $slider->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $sliders->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
