<div class="flex-grow-1 p-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Author Profiles</h2>
        <!-- Adjusted link for Livewire if you use routing, or button for actions -->
        <a href="{{route('author')}}" class="btn btn-success">Add New Author</a>
    </div>

    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Author</th>
                <th>Bio</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>
                        @if($author->image)
                            <img src="{{ asset('storage/' . $author->image) }}" alt="Author Image" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $author->author }}</td>
                    <td>{{ Str::limit($author->bio, 50) }}</td>
                    <td>{{ $author->created_at->format('Y-m-d') }}</td>
                    <td>{{ $author->updated_at->format('Y-m-d') }}</td>
                    <td>
                        <!-- Pass ID to your edit page or Livewire click event -->
                       <a href="{{ route('authors.edit', $author->id) }}" 
                        wire:navigate 
                        class="btn btn-outline-primary btn-sm" 
                        style="padding: 2px 8px; font-size: 0.75rem;">
                            <i class="fa fa-pencil"></i> Edit
                        </a>

                    </td>
                    <td>
                        <a href="#" class="btn btn-outline-primary btn-sm" style="padding: 2px 8px; font-size: 0.75rem;" wire:click="deleteAuthor({{ $author->id }})" wire:confirm="Are you sure you want to delete this author?">
                            <i class="fa fa-pencil"></i> delete
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-4 text-muted">No authors found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
