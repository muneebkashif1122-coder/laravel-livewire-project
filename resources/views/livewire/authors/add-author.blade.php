<div class="flex-grow-1 p-5">
    <div class="form-panel">
        <div class="form-header">
            <h2>Create Author Profile</h2>
            <p>Fill out the database fields below to register.</p>
        </div>
        @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="dismiss" aria-label="Close"></button>
    </div>
@endif

<!-- 2. Red Error Alert (Triggers if anything fails to save) -->
@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="dismiss" aria-label="Close"></button>
    </div>
@endif
        <form wire:submit.prevent="saveAuthor">
            <div class="mb-3">
                <label>Author Name</label>
                <input type="text" wire:model="author" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Biography</label>
                <textarea wire:model="bio" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" type="file" id="formFile" wire:model="image">
            </div>
            <button type="submit" class="btn btn-primary">Complete Registration</button>
        </form>
    </div>
</div>

