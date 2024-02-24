@extends('frontpanel.layout')
@section('content')
@if (Session::has('success'))
<div class="alert alert-highlighted alert-success" role="alert">
    {{ Session('success') }}
</div>
@endif
@if (Session::has('status'))
<div class="alert alert-highlighted alert-danger" role="alert">
    {{ Session('status') }}
</div>
@endif

<section class="user-dashboard-area ">
    <div class="container mt-lg-5 mt-md-5 mt-sm-5">
        <div class="row mt-lg-5">
            <div class="col">
                <div class="user-dashboard-box">
                    <div class="user-dashboard-sidebar">
                        <div class="user-box">
                            <img src="{{ url('/data_file/'.$user->avatar) }}" alt="" class="img-fluid">
                            <div class="name">
                                <div class="name">{{$user->name}}</div>
                            </div>
                        </div>
                        <div class="user-dashboard-menu">
                            <ul>
                                <li >
                                    <a href="{{route('profile')}}">Profile</a>
                                </li >
                                <li class="active">
                                    <a href="{{route('user.account')}}">Account</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="user-dashboard-content">
                      <div class="content-title-box">
                          <div class="title">Account</div>
                          <div class="subtitle">Edit your account settings.</div>
                      </div>
                      <div class="card-body">
                        <form method="POST" action="{{ route('account.update',$user->id) }}">
                            @csrf
                           
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="form-group ro">
                                <div class="content-update-box" >
                                    <button type="submit" class="btn">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>


@stop