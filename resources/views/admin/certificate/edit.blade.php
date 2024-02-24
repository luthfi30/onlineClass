@extends('admin.layout')
@section('sub-judul','Form Update Certificate')
@section('content')

    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
        <div class="alert alert-highlighted alert-danger" role="alert">
            {{ $error }}
        </div>
        @endforeach
    @endif
    @if(Session::has('success'))
        <div class="alert alert-highlighted alert-success" role="alert">
            {{ Session('success') }}
        </div>
    @endif
    <form action="{{ route('certificate.update',$data->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-6 form-group">
              <label for="">Name :</label>
            <input type="text" name="username" value="{{$data->username}}" class="form-control" id="name" placeholder="Your Name" readonly>
          </div>
          <div class="col-md-6 form-group mt-3 mt-md-0">
            <label for="">Email :</label>
            <input type="email" class="form-control" name="email" value="{{$data->email}}" id="email" placeholder="Your Email" readonly>
          </div>
        </div>
        <div class="form-group mt-3">
            <label for="">Select Class :</label>
            <select name="mycourse_id" class="form-select" readonly>
                @foreach ($course as $c)
                <option value="{{$c->mycourse_id}}" readonly>{{$c->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-3 ">
            <label for="">Link Project :</label>
            <input type="text" class="form-control" name="link_project" value="{{$c->link_project}}" id="link" placeholder="Input Link Project" readonly>
        </div>

        <div class="form-group mt-3">
            <label for="type">Status </label>
            <select class="form-select" aria-label="Default select example" name="status">
                <option>Pilih Level</option>
                <option value="pending"  {{ $c->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="success" {{ $c->status == 'success' ? 'selected' : '' }}>Success</option>
            </select>
        </div>

        <div class="form-group mt-3 ">
          <label for="">Description:</label>
          <textarea id="mytextarea" name="description" id="" class="form-control" cols="30" rows="10" readonly>{{$c->description}}</textarea>
      </div>
        <div class="form-group mt-3">
            <label>Image 1 :</label>
            <input type="file" class="form-control" id="validationServer02" placeholder="" name="image1" readonly>
        </div>
        <div class="form-group mt-3">
                <img width="150px" src="{{ url('/data_file/'.$c->image1) }}">
        </div>
        {{-- <div class="form-group mt-3">
        <label> Tell Us About Your Project :</label>
          <textarea class="form-control" name="message" rows="5" placeholder="Message" ></textarea>
        </div> --}}
        <input type="submit" class="btn btn-primary">
      </form>
    


    
@endsection