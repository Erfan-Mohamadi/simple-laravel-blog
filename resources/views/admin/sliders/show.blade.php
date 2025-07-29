@extends('layouts.master')

@section('title', 'نمایش اسلایدر')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">لیست اسلایدرها</a></li>
    <li class="breadcrumb-item active">نمایش اسلایدر</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">نمایش اسلایدر</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">عنوان: <strong>{{ $slider->title }}</strong></li>
                                <li class="list-group-item">توضیحات: <strong>{{ $slider->subtitle ?? '---' }}</strong></li>
                                <li class="list-group-item">وضعیت:
                                    @if($slider->status)
                                        <span class="badge bg-success">فعال</span>
                                    @else
                                        <span class="badge bg-danger">غیرفعال</span>
                                    @endif
                                </li>
                                <li class="list-group-item">تاریخ ثبت: <strong>{{ verta($slider->created_at)->format('Y/m/d H:i') }}</strong></li>
                            </ul>
                        </div>

                        <div class="col-md-6">
                            تصویر اسلایدر: <br>
                            <a href="{{ asset('storage/' . $slider->image) }}" target="_blank">
                                <img src="{{ asset('storage/' . $slider->image) }}" alt="تصویر اسلایدر" class="img img-thumbnail" style="width: 100%; max-width: 300px;">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
