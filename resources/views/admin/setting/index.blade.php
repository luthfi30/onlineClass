@extends('admin.layout')
@section('sub-judul','Setting Site')
@section('content')

   
<div class="row">
    <div class="col-lg-12">
		<div class="card card-default">
			<div class="card-header card-header-border-bottom">
				<h2>Site Setting</h2>
			</div>

        
            @if(Session::has('success'))
                <div class="alert alert-highlighted alert-success" role="alert">
                    {{ Session('success') }}
                </div>
            @endif

			<div class="card-body">
                <form action="{{ route('setting.update', $data->id) }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
					<div class="form-group">
						<label for="exampleFormControlInput1">Sitem Name</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" name="site_name"  placeholder="Site Name" value="{{ $data->site_name }}">
					</div>

                    <div class="form-group">
						<label for="exampleFormControlInput1">Email</label>
						<input type="email" class="form-control" id="exampleFormControlInput1" name="email"  placeholder="Email" value="{{ $data->email }}">
					</div>

                    <div class="form-group">
						<label for="exampleFormControlInput1">Phone</label>
						<input type="number" class="form-control" id="exampleFormControlInput1" name="phone"  placeholder="Phone Number" value="{{ $data->phone }}">
					</div>

                    <div class="form-group">
						<label for="exampleFormControlInput1">Address</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" name="address"  placeholder="Address" value="{{ $data->address }}" >
					</div>

                    <div class="form-group">
						<label for="exampleFormControlInput1">Header Title</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" name="header_title"  placeholder="Header Title" value="{{ $data->header_title }}">
					</div>

					<div class="form-group">
						<label for="exampleFormControlTextarea1">Header Description</label>
						<textarea class="form-control" id="mytextarea" rows="5" name="header_description" >{{ $data->header_description }}</textarea>
					</div>

					<div class="form-group">
						<label for="exampleFormControlFile1">Header Image</label>
						<input type="file" class="form-control-file" id="exampleFormControlFile1" name="header_image"  >
					</div>

                    <div class="form-group">
						<label for="exampleFormControlInput1">About Title</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" name="about_title"  placeholder="About Title" value="{{ $data->about_title }}">
					</div>

                    <div class="form-group">
						<label for="exampleFormControlTextarea1">About Description</label>
						<textarea class="form-control" id="mytextarea" rows="5" name="about_description" >{{ $data->about_description }}</textarea>
					</div>

					<div class="form-group">
						<label for="exampleFormControlFile1">About Image</label>
						<input type="file" class="form-control-file" id="exampleFormControlFile1" name="about_image" >
					</div>

					<div class="form-footer pt-4 pt-5 mt-4 border-top">
						<button type="submit" class="btn btn-primary btn-default">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

    
@endsection