@extends('layouts.master')

@section('title', 'ویرایش اسلایدر')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">لیست اسلایدرها</a></li>
    <li class="breadcrumb-item active">ویرایش اسلایدر</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">ویرایش اسلایدر</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="title">عنوان</label>
                                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $slider->title) }}" required autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="subtitle">توضیحات</label>
                                    <textarea name="subtitle" id="subtitle" class="form-control" rows="5">{{ old('subtitle', $slider->subtitle) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="image">تصویر جدید (در صورت نیاز)</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <label>تصویر فعلی:</label><br>
                                <img src="{{ asset('storage/' . $slider->image) }}" alt="تصویر فعلی" class="img-thumbnail" width="120">
                            </div>
                            <div class="col-3">
                                <div class="form-check pt-4">
                                    <input class="form-check-input" name="status" type="checkbox" value="1" id="status"
                                        {{ old('status', $slider->status) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">
                                        فعال
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-warning">ویرایش اسلایدر</button>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
