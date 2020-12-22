<div class="col-md-4">
    <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="{{ url($post->image) }}" alt="Card image cap">
        <div class="card-body">
            <p class="card-text font-weight-bold">{{ $post->title }}</p>
            <p class="card-text">{{ Str::limit($post->text, 200, '...') }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{ route('front.single-post', ['slug' => $post->slug]) }}"
                        class="btn btn-sm btn-outline-secondary">View</a>

                    <a href="{{ route('front.category', ['slug' => $post->category ? $post->category->slug : 'nocat']) }}"
                        class="btn btn-sm btn-outline-secondary">{{ $post->category ? $post->category->name : 'No <Caategory></Caategory>' }}</a>
                </div>
                <small class="text-muted">9 mins</small>
            </div>
        </div>
    </div>
</div>
