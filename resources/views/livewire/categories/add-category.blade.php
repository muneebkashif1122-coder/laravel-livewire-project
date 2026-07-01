<div> <!-- Single parent root wrapper -->
    <div class="flex-grow-1 p-5">            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Add Category</h2>
            </div>

            <!-- Success Notification Alert -->
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Livewire Form Submission -->
            <form wire:submit.prevent="saveCategory">
                <div class="mb-3">
                    <label class="form-label font-weight-bold">Category Name</label>
                    <input type="text" wire:model="name" class="form-control" placeholder="e.g. Technology, Health">
                    @error('name') <span class="text-danger small d-block mt-1">{{ $message }}</span> @enderror
                </div>
                
                <button type="submit" class="btn btn-primary px-4">Save Category</button>
            </form>

        </div>
</div>
