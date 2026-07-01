<div class="flex-grow-1 p-5">
    <div class="form-panel">
        <div class="form-header">
            <h2>Edit Post</h2>
            <p>Modify the fields below to update this post record.</p>
        </div>
        
        <div id="response-msg" class="mt-3">
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
        </div>

        <form wire:submit.prevent="updatePost" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label>Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" wire:model="title">
                @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" rows="4" wire:model="description"></textarea>
                @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="category_select" class="form-label">Categories</label>
                <select id="category_select" class="form-select @error('category_id') is-invalid @enderror" wire:model="category_id">
                    <option value="">Select a Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Cover Image</label>
                <!-- 🚀 FIXED: Added .live modifier so Livewire uploads the file and creates the preview instantly -->
                <input class="form-control @error('new_image') is-invalid @enderror" type="file" id="formFile" wire:model.live="new_image">
                @error('new_image') <span class="text-danger small">{{ $message }}</span> @enderror
                
                <div class="mt-2" wire:key="image-preview-container">
                    <small class="text-muted d-block">Current Cover:</small>
                    
                    @if ($new_image)
                        <!-- 🚀 FIXED: Added wire:ignore.self to prevent asset flashing during upload states -->
                        <img src="{{ $new_image->temporaryUrl() }}" 
                            style="max-height: 100px;" 
                            class="rounded border p-1 mt-1" 
                            alt="New Preview" 
                            wire:ignore.self
                            onerror="this.onerror=null; this.src='{{ URL::to('/') }}/storage/livewire-tmp/{{ $new_image->getFilename() }}'">
                    @elseif ($old_image)
                        <!-- 🚀 FIXED: Sanitized asset path to safely fallback to public disk paths -->
                        <img src="{{ asset('storage/' . str_replace(['storage/', 'public/', 'storage\\', 'public\\'], '', $old_image)) }}" 
                             style="max-height: 100px;" 
                             class="rounded border p-1 mt-1" 
                             alt="Current Cover">
                    @endif
                </div>
            </div>

            <div class="mb-3">
                <label for="author_select" class="form-label">Author</label>
                <select id="author_select" class="form-select @error('author_id') is-invalid @enderror" wire:model="author_id">
                    <option value="">Select an Author</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->author }}</option>
                    @endforeach
                </select>
                @error('author_id') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-success">
                <!-- 🚀 OPTIONAL ADDITION: Shows loading state on save -->
                <span wire:loading wire:target="updatePost" class="spinner-border spinner-border-sm me-1" role="status"></span>
                Update Post
            </button>
        </form>
    </div>
</div>

