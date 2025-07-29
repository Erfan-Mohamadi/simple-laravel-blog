@extends('layouts.home')

@section('title', 'نتایج جستجو')

@section('content')
    <section class="mt-4">
        <div class="row gx-3">
            <!-- Main Content (8 columns) -->
            <div class="col-lg-8 order-lg-1 order-2">
                @if($posts->count())
                    <div class="alert alert-secondary mb-3">
                        پست های مرتبط با دسته بندی "{{ $category->name }}"
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 g-3">
                        @foreach($posts as $post)
                            <div class="col">
                                <div class="card h-100">
                                    <img src="{{ $post->getImage() }}"
                                         class="card-img-top"
                                         alt="{{ $post->title }}"
                                         style="height: 180px; object-fit: cover;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="card-title fw-bold">{{ $post->title }}</h5>
                                            <span class="badge bg-secondary">{{ $post->category->name }}</span>
                                        </div>
                                        <p class="card-text text-secondary mt-2">
                                            {{ Str::limit($post->body, 100) }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-dark">مشاهده</a>
                                            <small class="text-muted">نویسنده: {{ $post->user->name }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-3">
                        {{ $posts->links() }}
                    </div>
                @else
                    <div class="alert alert-danger">
                        مقاله مورد نظر پیدا نشد!
                    </div>
                @endif
            </div>

            <!-- Sidebar (4 columns) -->
            <div class="col-lg-4 order-lg-2 order-1 mb-4 mb-lg-0">
                @include('partials.sidebar')
            </div>
        </div>
    </section>
@endsection
