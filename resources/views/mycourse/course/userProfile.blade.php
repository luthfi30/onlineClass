@extends('frontpanel.layout')
@section('content')

<section class="user-dashboard-area">
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
                                <li class="active">
                                    <a href="{{route('profile')}}">Profile</a>
                                </li>
                                <li>
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
                    
                        <form action="{{ route('update.user',$user->id) }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                           
                          <div class="content-box">
                              <div class="email-group">
                                  <div class="form-group">
                                      <label for="text">Name:</label>
                                      <input type="text" class="form-control" name="name" id="name"
                                             placeholder="name"
                                             value="{{$user->name}}">
                                  </div>
                              </div>
                              <div class="email-group">
                                <div class="form-group">
                                    <label for="text">Profession:</label>
                                    <input type="text" class="form-control" name="profession" id="text"
                                           placeholder="profession"
                                           value="{{$user->profession}}">
                                </div>
                            </div>
                            <div class="email-group">
                                <div class="form-group">
                                    <label for="text">Email:</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="email"
                                           value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="email-group" hidden>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="role" id="email"
                                           placeholder="role"
                                           value="{{$user->role}}" hidden >
                                </div>
                            </div>

                            <div class="email-group">
                                <div class="form-group">
                                    <label for="validationServer02">Avatar</label>
                                    <input type="file" class="form-control" id="validationServer02" placeholder="" name="avatar" value="{{$user->avatar}}" >
                                </div>
                            </div>
                          </div>
                          <div class="content-update-box">
                              <button type="submit" class="btn">Save</button>
                          </div>
                      </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>


@stop