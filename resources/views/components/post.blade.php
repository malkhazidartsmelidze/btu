<div class="col-md-4">
    <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="{{ $post->getImageUrl() }}" alt="Card image cap">
        <div class="card-body">
            <p class="card-text font-weight-bold">{{ $post->title }}</p>
            <p class="card-text">{{ substr($post->text, 0, 150) }}...</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{ route('front.post', ['slug' => $post->slug]) }}"
                        class="btn btn-sm btn-outline-secondary">View</a>

                    <a href="{{ $post->category ? route('front.category', ['slug' => $post->category->slug]) : '#' }}"
                        class="btn btn-sm btn-outline-secondary">
                        {{ optional($post->category)->name ?? 'No Cateogry' }}
                    </a>
                </div>
                <small class="text-muted">{{ $post->created_at->diffInMinutes(now()) }} min</small>
            </div>
        </div>
    </div>
</div>
