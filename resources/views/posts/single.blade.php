@extends('layouts.home')

@section('title', $post->title)

@section('content')
    <section class="mt-4">
        <div class="row gx-3">
            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="row justify-content-center">
                    <div class="col">

                <article class="card">
                    <img src="{{ $post->getImage() }}"
                         class="card-img-top"
                         alt="{{ $post->title }}"
                         style="max-height: 400px; object-fit: cover;">

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h1 class="card-title fw-bold">{{ $post->title }}</h1>
                            <span class="badge bg-secondary">{{ $post->category->name }}</span>
                        </div>

                        <div class="d-flex justify-content-between text-muted mb-4">
                            <span>نویسنده: {{ $post->user->name }}</span>
                            <span>تاریخ انتشار: {{  verta($post->created_at)->format('Y/m/d H:i') }}</span>
                        </div>

                        <div class="card-text">
                            {!! nl2br(e($post->body)) !!}
                        </div>
                    </div>
                </article>
                </div>
                    <hr class="mt-4" />
                    <!-- Comment Section -->
                    <div class="col">
                        <!-- Comment Form -->
                        <div class="card">
                            <div class="card-body">
                                <p class="fw-bold fs-5">
                                    ارسال کامنت
                                </p>

                                <form>
                                    <div class="mb-3">
                                        <label class="form-label"
                                        >نام</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                        >متن کامنت</label
                                        >
                                        <textarea
                                            class="form-control"
                                            rows="3"
                                        ></textarea>
                                    </div>
                                    <button
                                        type="submit"
                                        class="btn btn-dark"
                                    >
                                        ارسال
                                    </button>
                                </form>
                            </div>
                        </div>
                        <hr class="mt-4" />

                        <!-- Comment Content -->
                        <p class="fw-bold fs-6">تعداد کامنت : 3</p>

                        <div class="card bg-light-subtle mb-3">
                            <div class="card-body">
                                <div
                                    class="d-flex align-items-center"
                                >
                                    <img
                                        src="./assets/images/profile.png"
                                        width="45"
                                        height="45"
                                        alt="user-profle"
                                    />

                                    <h5
                                        class="card-title me-2 mb-0"
                                    >
                                        محمد صالحی
                                    </h5>
                                </div>
                                <p class="card-text pt-3 pr-3">
                                    لورم ایپسوم متن ساختگی با تولید
                                    سادگی نامفهوم از صنعت چاپ و با
                                    استفاده از طراحان گرافیک است.
                                </p>
                            </div>
                        </div>
                        <div class="card bg-light-subtle mb-3">
                            <div class="card-body">
                                <div
                                    class="d-flex align-items-center"
                                >
                                    <img
                                        src="./assets/images/profile.png"
                                        width="45"
                                        height="45"
                                        alt="user-profle"
                                    />

                                    <h5
                                        class="card-title me-2 mb-0"
                                    >
                                        متین سیدی
                                    </h5>
                                </div>

                                <p class="card-text pt-3 pr-3">
                                    لورم ایپسوم متن ساختگی با تولید
                                    سادگی نامفهوم از صنعت چاپ
                                </p>
                            </div>
                        </div>

                        <div class="card bg-light-subtle mb-3">
                            <div class="card-body">
                                <div
                                    class="d-flex align-items-center"
                                >
                                    <img
                                        src="./assets/images/profile.png"
                                        width="45"
                                        height="45"
                                        alt="user-profle"
                                    />

                                    <h5
                                        class="card-title me-2 mb-0"
                                    >
                                        زهرا عزیزی
                                    </h5>
                                </div>

                                <p class="card-text pt-3 pr-3">
                                    لورم ایپسوم متن ساختگی با تولید
                                    سادگی
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar -->
            <div class="col-lg-4">
                @include('partials.sidebar')
            </div>
        </div>
    </section>
@endsection
