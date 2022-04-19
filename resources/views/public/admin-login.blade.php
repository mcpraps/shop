@extends('public.layout.lock-screen')

@section('content')
    <div class="page-single">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-8 col-xs-10 card-sigin-main mx-auto my-auto py-45 justify-content-center">
                    <div class="card-sigin mt-5 mt-md-0">
                        <div class="main-card-signin d-md-flex">
                            <div class="wd-100p"><div class="d-flex mb-4"><a href="/"><img src="{{ asset('assets/img/brand/favicon.png') }}" class="sign-favicon ht-40" alt="logo"></a></div>
                                <div class="">
                                    <div class="main-signup-header">
                                        <h2>{{ __('Üdv újra itt!') }}</h2>
                                        <h6 class="font-weight-semibold mb-4">{{ __('Jelentkezz be a folytatáshoz.') }}</h6>
                                        <div class="panel panel-primary">

                                            @if($errors->any())
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Sikertelen bejelentkezés!</strong> {!! implode('', $errors->all('<div>:message</div>')) !!} <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>
                                            </div>
                                            @endif
                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                            @endif

                                            <form method="post" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>{{ __('Email') }}</label> <input autofocus required class="form-control" placeholder="{{ __('Add meg az email címed') }}" type="email" name="email" value="{{ old('email') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Jelszó') }}</label> <input required class="form-control" placeholder="{{ __('Add meg a jelszavad') }}" type="password" name="password">
                                                </div>
                                                <div class="custom-checkbox custom-control mb-3">
                                                    <input {{ old('remember') ? 'checked' : '' }} type="checkbox" name="remember" value="1" data-checkboxes="login" class="custom-control-input" id="checkbox-2"> <label for="checkbox-2" class="custom-control-label mt-1">{{ __('Belépve maradok') }}</label>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block">{{ __('Bejelentkezés') }}</button>
                                            </form>
                                        </div>
                                        <div class="main-signin-footer text-center mt-3">
                                            <p><a href="{{ route('password.request') }}" class="mb-3">Elfelejtetted a jelszavad?</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- generate-otp js -->
    <script src="{{ asset('assets/js/generate-otp.js') }}"></script>
@endsection