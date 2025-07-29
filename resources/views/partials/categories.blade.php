<!-- resources/views/partials/categories.blade.php -->
<div class="card mt-4">
    <div class="fw-bold fs-6 card-header">دسته بندی ها</div>
    <ul class="list-group list-group-flush p-0">
        @forelse($categories as $category)
            <li class="list-group-item">
                <a href="{{ route('categories.show', $category) }}"
                   class="link-body-emphasis text-decoration-none">
                    {{ $category->name }}
                    @if(isset($category->posts_count))
                        <span class="badge bg-secondary ms-2">{{ $category->posts_count }}</span>
                    @endif
                </a>
            </li>
        @empty
            <li class="list-group-item text-muted">هیچ دسته‌ای یافت نشد</li>
        @endforelse
    </ul>
</div>
