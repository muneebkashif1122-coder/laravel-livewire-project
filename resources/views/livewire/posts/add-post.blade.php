<div class="flex-grow-1 p-5">
        <div class="form-header mb-4">
            <h2>Write a Post</h2>
            <p class="text-muted">Fill out the database fields below to publish.</p>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="dismiss" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="dismiss" aria-label="Close"></button>
            </div>
        @endif

        <form wire:submit.prevent="save">
            
            <div class="mb-3">
                <label class="form-label font-weight-bold">Title</label>
                <input type="text" wire:model.live="title" class="form-control">
                @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-muted">URL Slug (Auto-Generated)</label>
                <input type="text" wire:model="slug" class="form-control bg-light" readonly>
                @error('slug') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label font-weight-bold">Description</label>
                <textarea wire:model="description" class="form-control" rows="4"></textarea>
                @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="category_select" class="form-label font-weight-bold">Category</label>
                <select wire:model="category_id" id="category_select" class="form-select">
                    <option value="">Select a Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label font-weight-bold">Post Feature Image</label>
                <input class="form-control" type="file" id="formFile" wire:model="image">
                @error('image') <span class="text-danger small">{{ $message }}</span> @enderror
                
                @if ($image) 
                    <div class="mt-2">
                        <img src="{{ $image->temporaryUrl() }}" width="120" class="img-thumbnail rounded">
                    </div>
                @endif
            </div>

            <div class="mb-4">
                <label for="author_select" class="form-label font-weight-bold">Author Profile</label>
                <select wire:model="author_id" id="author_select" class="form-select">
                    <option value="">Select an Author</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->author }}</option>
                    @endforeach
                </select>
                @error('author_id') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary px-4">
                Publish Post
            </button>
        </form>
</div>
