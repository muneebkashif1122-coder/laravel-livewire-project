<div class="form-panel" style="max-width: 600px; margin: 0 auto;">
    <div class="form-header mb-4">
        <h2>Edit Category</h2>
        <p class="text-muted">Modify the field below to update this category name.</p>
    </div>

    <div id="response-msg" class="mt-2"></div>

    <!-- FIXED: Changed submit.pervent to wire:submit.prevent -->
    <form wire:submit.prevent="updateCategory">
        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" wire:model="name">

        <div class="d-flex justify-content-end gap-3">
        <!-- Navigates back instantly without reloading -->
        <a href="{{ route('categories') }}" wire:navigate class="btn btn-success w-30">Cancel</a>
        <button type="submit" class="btn btn-success w-100">Update Category</button>
        </div>
    </form>
</div>

