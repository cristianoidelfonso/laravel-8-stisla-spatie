@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @can('criar-role')
                                <a href="{{ route('roles.create') }}" class="btn btn-warning">Add new role</a>
                            @endcan

                            <table class="table table-striped mt-2">
                                <thead class="thead-light" style="background-color: #6777ef">
                                    <tr>
                                        <th class="text-white">#</th>
                                        <th class="text-white">Role</th>
                                        <th class="text-white">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    @can('editar-role')
                                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endcan
                                                    @can('deletar-role')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display-inline']) !!}
                                                            {!! Form::submit('Apagar', ['class' => 'btn btn-danger ml-1']) !!}
                                                        {!! Form::close() !!}
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>{{ 'Nenhum dado foi encontrado' }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="pagination justify-content-center">
                                {{ $roles->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
