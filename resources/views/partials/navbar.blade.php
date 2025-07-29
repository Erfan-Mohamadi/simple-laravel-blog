<header
    class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom"
>
    <a
        href="/"
        class="fs-4 fw-medium link-body-emphasis text-decoration-none"
    >
        shetabamooz
    </a>

    <nav class="d-inline-flex mt-2 mt-md-0 me-md-auto">
        @foreach($categories as $category)
        <a
            class="me-3 py-2 link-body-emphasis text-decoration-none"
            href="{{ route('posts.categories', $category->id) }}"
        >{{ $category->name }}</a>
        @endforeach
    </nav>
</header>
