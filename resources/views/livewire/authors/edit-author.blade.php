<div class="flex-grow-1 p-5">
    <div class="form-panel" style="max-width: 600px; margin: 0 auto;">
        <div class="form-header mb-4">
            <h2>Edit Author</h2>
            <p class="text-muted">Modify the fields below to update this author's record profile.</p>
        </div>
        
        <div id="response-msg" class="mt-3">
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
        </div>

        <form wire:submit.prevent="updateAuthor" enctype="multipart/form-data">
            
            <!-- Author Name Field -->
            <div class="mb-3">
                <label class="form-label">Author Name</label>
                <!-- 🚀 FIXED: changed wire:model from name to author -->
                <input type="text" class="form-control @error('author') is-invalid @enderror" wire:model="author">
                @error('author') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <!-- 🚀 ADDED: Bio Field to match your Model columns layout -->
            <div class="mb-3">
                <label class="form-label">Biography</label>
                <textarea class="form-control @error('bio') is-invalid @enderror" rows="3" wire:model="bio"></textarea>
                @error('bio') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <!-- Profile Avatar Field -->
            <div class="mb-3">
                <label for="formFile" class="form-label">Profile Avatar Image</label>
                <input class="form-control @error('new_image') is-invalid @enderror" type="file" id="formFile" wire:model="new_image">
                @error('new_image') <span class="text-danger small">{{ $message }}</span> @enderror
                
                <div class="mt-2">
                    <small class="text-muted d-block">Current Profile Asset:</small>
                    @if ($new_image)
                        <img src="{{ $new_image->temporaryUrl() }}" style="max-height: 100px;" class="rounded border p-1 mt-1" alt="New Preview">
                    @elseif ($old_image)
                        <img src="{{ asset('storage/' . str_replace(['storage/', 'public/', 'storage\\', 'public\\'], '', $old_image)) }}?v={{ time() }}" 
                             style="max-height: 100px;" 
                             class="rounded border p-1 mt-1" 
                             alt="Current Avatar">
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-end gap-3 mt-4">
                <a href="{{ route('authors') }}" wire:navigate class="btn btn-secondary w-30">Cancel</a>
                <button type="submit" class="btn btn-success w-100">Update Author</button>
            </div>
        </form>
    </div>
</div>

