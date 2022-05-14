@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Change Username') }}</div>

                    <form action="{{ route('update-username') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="oldUsernameInput" class="form-label">Old Username</label>
                                <input name="old_username" type="text"
                                    class="form-control @error('old_username') is-invalid @enderror" id="oldUsernameInput"
                                    placeholder="Old Username">
                                @error('old_username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newUsernameInput" class="form-label">New Username</label>
                                <input name="new_username" type="text"
                                    class="form-control @error('new_username') is-invalid @enderror" id="newUsernameInput"
                                    placeholder="New Username">
                                @error('new_username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewUsernameInput" class="form-label">Confirm New Username</label>
                                <input name="new_username_confirmation" type="text" class="form-control"
                                    id="confirmNewUsernameInput" placeholder="Confirm New Username">
                            </div>

                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">Submit</button>
                        </div>



                    </form>
                </div>

                <div class="container-login">
                    <div class="wrapper-login">

                        <button class='btn'>
                            <a href="/users/index">Volver</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
