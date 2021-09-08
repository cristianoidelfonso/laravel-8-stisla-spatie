@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Blogs</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @can('criar-blog')
                                <a href="{{ route('blogs.create') }}" class="btn btn-warning">Add new blog</a>
                            @endcan

                            @can('ver-blog', App\Models\Blog::class)
                            <table class="table table-striped mt-2">
                                <thead class="thead-light" style="background-color: #6777ef">
                                    <tr>
                                        <th class="text-white">#</th>
                                        <th class="text-white">Title</th>
                                        <th class="text-white">Content</th>
                                        <th class="text-white text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($blogs as $blog)
                                        <tr>
                                            <td>{{ $blog->id }}</td>
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ Str::limit($blog->content, 40) }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    @can('editar-blog')
                                                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-info">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    @endcan
                                                    @can('deletar-blog')
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['blogs.destroy', $blog->id], 'style' => 'display-inline']) !!}
                                                    {!! Form::submit('Apagar', ['class' => 'btn btn-danger ml-1']) !!}
                                                    {!! Form::close() !!}
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>{{'Nenhum dado foi encontrado'}}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @endcan
                            <div class="pagination justify-content-center">
                                {{ $blogs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
