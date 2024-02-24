@extends('frontpanel.layout')

@section('content')

<section id="why-us" class="why-us">
</section><!-- End Why Us Section -->
<section id="contact" class="contact">
    <div data-aos="fade-up">
        
    </div>
 
    <div class="container" data-aos="fade-up">
    
      
        <h4>Please upload your project from any <span style="color: #5fcf80"> premium class to get the certificate</span> </h4>
      <div class="row mt-5">

      
        <div class="col-lg-12  mt-5 mt-lg-0">
          @if (Session::has('success'))
          <div class="alert alert-highlighted alert-success" role="alert">
              {{ Session('success') }}
          </div>
          @endif

          
         
          <form action="{{ route('store.certicifate') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row">
              <div class="col-md-6 form-group">
                  <label for="">Name :</label>
                <input type="text" name="username" value="{{$user->name}}" class="form-control" id="name" placeholder="Your Name" readonly>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <label for="">Email :</label>
                <input type="email" class="form-control" name="email" value="{{$user->email}}" id="email" placeholder="Your Email" readonly>
              </div>
            </div>
            <div class="form-group mt-3">
                <label for="">Select Class :</label>
                <select name="mycourse_id" class="form-select" >
                    @foreach ($data as $c)
                    <option value="{{$c->id}}">{{$c->course->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3 ">
                <label for="">Link Project :</label>
                <input type="text" class="form-control" name="link_project" value="" id="link" placeholder="Input Link Project" required >
            </div>

            <div class="form-group mt-3 ">
                <label for="">Description:</label>
                <textarea name="description" id="mytextarea" class="form-control" cols="30" rows="10"></textarea>
            </div>
            
            <div class="form-group mt-3">
              <label for="validationServer02">image</label>
              <input type="file" class="form-control" id="validationServer02" placeholder="" name="image1" >
          </div>
            {{-- <div class="form-group mt-3">
            <label> Tell Us About Your Project :</label>
              <textarea class="form-control" name="message" rows="5" placeholder="Message" ></textarea>
            </div> --}}
            <input type="submit" class="btn btn-primary">
          </form>

        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->





@stop



