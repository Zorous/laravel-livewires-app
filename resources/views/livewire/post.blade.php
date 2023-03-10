@if ($test)
    @include('livewire.test')
@endif


<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Laravel 10 Livewire CRUD</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="container">

            <div class="co-md-12 mb-2">
                <div class="card">
                    <div class="card-body">

                        {{-- Success case --}}
                        @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        {{-- Error case --}}
                        @if (session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session()->get('error') }}
                            </div>
                        @endif

                        @if ($updatePost)
                            @include('livewire.update')
                        @else
                            @include('livewire.create')
                        @endif
                    </div>
                </div>
            </div>

            <button wire:click="test()">Test</button>


            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($posts) > 0)
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->description }}</td>
                                <td>
                                    <button wire:click="edit({{ $post->id }})"
                                        class="btn btn-warning btn-sm">Edit</button>
                                    <button onclick="deletePost({{ $post->id }})"
                                        class="btn btn-danger btn-sm">Delte</button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                        <tr colspan="3">
                            No Post Found
                        </tr>
                        </tr>
                    @endif

                </tbody>
            </table>

            <script>
                function deletePost(id) {
                    if (confirm("are you sure you want to delete this field?")) {
                        window.livewire.emit('deletePost', id)
                    }
                }
            </script>
        </div>


    </div>
</div>
