<div class="position-relative" style="width: 100%; max-width: 300px;">
    <div class="input-group">
        <input type="text" wire:model.live.debounce.300ms="query" class="form-control" placeholder="Keyword">
        <div class="input-group-append">
            <span class="input-group-text text-secondary"><i class="fa fa-search"></i></span>
        </div>
    </div>

    @if(strlen($query) >= 2)
        <div class="bg-white border position-absolute w-100" style="z-index: 999; top: 100%;">
            @forelse($results as $post)
                <a href="{{ url('/post/' . $post->id) }}" class="d-block p-2 text-secondary text-decoration-none border-bottom">
                    {{ $post->title }}
                </a>
            @empty
                <p class="p-2 m-0 text-muted">No results found.</p>
            @endforelse
        </div>
    @endif
</div>
