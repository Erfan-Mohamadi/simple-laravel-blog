@extends('layouts.home')

@section('title', 'php tutorial || blog project || shetabamooz')

@section('content')
    <section>
        <div id="carousel" class="carousel slide">
            <div class="carousel-indicators">
                <button
                    type="button"
                    data-bs-target="#carousel"
                    data-bs-slide-to="0"
                    class="active"
                ></button>
                <button
                    type="button"
                    data-bs-target="#carousel"
                    data-bs-slide-to="1"
                ></button>
                <button
                    type="button"
                    data-bs-target="#carousel"
                    data-bs-slide-to="2"
                ></button>
            </div>
            <div class="carousel-inner rounded">
                @foreach($sliders as $key => $slider)
                <div class="carousel-item carousel-height overlay  {{ $key == 0 ? 'active' : '' }}">
                    <img
                        src="{{ asset('storage/' . $slider->image) }}"
                        class="d-block w-100"
                        alt="{{ $slider->title }}"
                    />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $slider->title }}</h5>
                        <p>
                            {{ $slider->subtitle }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
            <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carousel"
                data-bs-slide="prev"
            >
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carousel"
                data-bs-slide="next"
            >
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Content Section -->
    <section class="mt-4">
        <div class="row">
            <!-- Posts Content -->
            <div class="col-lg-8">
                <div class="row g-3">
                    @foreach($posts as $post)
                        <div class="col-sm-6">
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
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Sidebar Section -->
            @include('partials.sidebar')
        </div>
    </section>

@endsection
