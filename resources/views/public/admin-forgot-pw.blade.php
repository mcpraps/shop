@extends('public.layout.lock-screen')

@section('content')
    <div class="page-single">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-8 col-xs-10 card-sigin-main py-45 justify-content-center mx-auto">
                    <div class="card-sigin mt-5 mt-md-0">
                        <div class="main-card-signin d-md-flex">
                            <div class="wd-100p">
                                <div class="mb-3 d-flex"> <a href="/"><img src="{{ asset('assets/img/brand/favicon.png') }}" class="sign-favicon ht-40" alt="logo"></a>
                                </div>
                                <div class="main-card-signin d-md-flex bg-white">
                                    <div class="wd-100p">
                                        <div class="main-signin-header">
                                            <h2>{{ __('Elfelejtett jelszó') }}</h2>
                                            <h4>{{ __('Add meg az email címed') }}</h4>

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

                                            <form method="post" action="{{ route('password.email') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>{{ __('Email') }}</label> <input required autocomplete="email" autofocus class="form-control" placeholder="{{ __('Add meg az email címed') }}" type="email" name="email" value="{{ old('email') }}">
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block">{{ __('Küldés') }}</button>
                                            </form>
                                        </div>
                                        <div class="main-signup-footer mg-t-20 text-center">
                                            <p>{{ __('Eszembe jutott') }}, <a href="{{ route('login') }}">{{ __('vissza a bejelentkezéshez.') }}</a></p>
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
