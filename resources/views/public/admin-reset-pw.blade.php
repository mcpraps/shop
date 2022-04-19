@extends('public.layout.lock-screen')

@section('content')
    <div class="page-single">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-8 col-xs-10 card-sigin-main py-45 justify-content-center mx-auto">
                    <div class="card-sigin mt-5 mt-md-0">
                        <div class="main-card-signin d-md-flex">
                            <div class="wd-100p">
                                <div class="d-flex mb-3"><a href="/"><img src="{{ asset('assets/img/brand/favicon.png') }}" class="sign-favicon ht-40" alt="logo"></a></div>
                                <div class="mb-1">
                                    <div class="main-signin-header">
                                        <div class="">
                                            <h2>{{ __('Üdv újra itt!') }}</h2>
                                            <h4 class="text-start">{{ __('Add meg az új jelszavad') }}</h4>

                                            @if($errors->any())
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <strong>Hiba történt!</strong> {!! implode('', $errors->all('<div>:message</div>')) !!} <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>
                                                </div>
                                            @endif
                                            @if (session('status'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    {{ session('status') }} <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>
                                                </div>
                                            @endif

                                            <form method="post" action="{{ route('password.update') }}">
                                                @csrf

                                                <input type="hidden" name="token" value="{{ $token }}">

                                                <div class="form-group text-start">
                                                    <label>{{ __('Email') }}</label>
                                                    <input class="form-control" placeholder="{{ __('Add meg az email címed') }}" value="{{ $email ?? old('email') }}" required autocomplete="email" type="email" name="email">
                                                </div>
                                                <div class="form-group text-start">
                                                    <label>{{ __('Új jelszó') }}</label>
                                                    <input class="form-control" placeholder="{{ __('Add meg az új jelszavad') }}" required type="password" autofocus autocomplete="new-password" name="password">
                                                </div>
                                                <div class="form-group text-start">
                                                    <label>{{ __('Új jelszó mégegyszer') }}</label>
                                                    <input class="form-control" placeholder="{{ __('Add meg az új jelszavad újra') }}" type="password" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block">{{ __('Új jelszó beállítása') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="main-signup-footer mg-t-20 text-center">
                                        <p><a href="{{ route('login') }}">{{ __('Vissza a bejelentkezéshez.') }}</a></p>
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
