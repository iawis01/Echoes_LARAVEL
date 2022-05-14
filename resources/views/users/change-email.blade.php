@extends('layouts.app')

@section('content')
    <div class="container-login">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Change Email') }}</div>

                        <form action="{{ route('update-email') }}" method="POST">
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
                                    <label for="oldEmailInput" class="form-label">Old Email</label>
                                    <input name="old_email" type="text"
                                        class="form-control @error('old_email') is-invalid @enderror" id="oldEmailInput"
                                        placeholder="Old Email">
                                    @error('old_email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="newEmailInput" class="form-label">New Email</label>
                                    <input name="new_email" type="text"
                                        class="form-control @error('new_email') is-invalid @enderror" id="newEmailInput"
                                        placeholder="New Email">
                                    @error('new_email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="confirmNewEmailInput" class="form-label">Confirm New Email</label>
                                    <input name="new_email_confirmation" type="text" class="form-control"
                                        id="confirmNewEmailInput" placeholder="Confirm New Email">
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
    </div>
@endsection
