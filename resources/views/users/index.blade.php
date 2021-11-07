@extends('layouts.app', ['pageSlug' => 'users'])
@section('content')
@include('alerts.success', ['key' => 'status'])
{{--
<div class="modal" tabindex="-1" role="dialog" id="deleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Delete User') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('Are you sure?') }}</p>
            </div>
            <div class="modal-footer" style="justify-content: right;">
                <div>
                    <button type="button" class="btn btn-primary" id="deleteButton">{{ __('Yes') }}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('No') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
--}}
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">{{ __('Users') }}</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Add User') }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr><th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Email') }}</th>
                            <th scope="col">{{ __('Creation Date') }}</th>
                            <th scope="col"></th>
                        </tr></thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                </td>
                                <td>{{ $user->created_at }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('user.edit', $user) }}">{{ __('Edit') }}</a>
                                            <form method="POST" action="{{ route('user.destroy', $user) }}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="dropdown-item" value="{{ __('Delete user') }}">
                                            </form>
                                            {{-- <a class="dropdown-item" data-toggle="modal" data-target="#deleteModal" id="deleteModalButton">{{ __('Delete') }}</a> --}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

