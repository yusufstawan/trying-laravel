<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- from @include('layouts.navigation') --}}
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    @include('layouts.navigation')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-error">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('post.create') }}" class="btn btn-md btn-success mb-3 float-right">New
                            Post</a>

                        <table class="table table-bordered mt-1">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Create At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->status == 0 ? 'Draft' : 'Publish' }}</td>
                                        <td>{{ $post->created_at->format('d-m-Y') }}</td>

                                        {{-- Button Action --}}
                                        <td class="text-center d-flex">
                                            @can('edit posts', Post::class)
                                                <a href="{{ route('post.edit', $post->id) }}"
                                                    class="btn btn-sm btn-primary mr-2">EDIT</a>
                                            @endcan

                                            @can('delete posts', Post::class)
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('post.destroy', $post->id) }}" method="POST">

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger mr-2">HAPUS</button>
                                                </form>
                                            @endcan

                                            @can('publish posts', Post::class)
                                                <form onsubmit="return confirm('Publish post ini?');"
                                                    action="{{ route('post.publish', $post->id) }}" method="POST">

                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm btn-info mr-2">Publish</button>
                                                </form>
                                            @endcan

                                            @can('unpublish posts', Post::class)
                                                <form onsubmit="return confirm('Unpublish post ini?');"
                                                    action="{{ route('post.unpublish', $post->id) }}" method="POST">

                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-info mr-2">Unpublish</button>
                                                </form>
                                            @endcan
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center text-mute" colspan="4">Data post tidak tersedia
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        {{-- testing component --}}
        <x-alert message="test message" name="test name" number="1" />
        <x-forms.input input="halo" />
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
