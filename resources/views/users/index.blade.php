@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Users</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Users</h3>

                            <a href="{{ route('users.create') }}" class="btn btn-warning">Add new user</a>

                            <table class="table table-striped mt-2">
                                <thead class="thead-light" style="background-color: #6777ef">
                                    <tr>
                                        <th class="text-white">#</th>
                                        <th class="text-white">Name</th>
                                        <th class="text-white">Email</th>
                                        <th class="text-white">Roles</th>
                                        <th class="text-white">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if (!empty($user->getRoleNames()))
                                                    @foreach ($user->getRoleNames() as $roleName)
                                                        <h5><span class="badge badge-dark">{{ $roleName }}</span></h5>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display-inline']) !!}
                                                    {!! Form::submit('Apagar', ['class' => 'btn btn-danger ml-1']) !!}
                                                    {!! Form::close() !!}
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
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
