<section id="features" class="features " >
  <div class="container" data-aos="fade-up">
    <div class="section-title">
       
        <p>Categories</p>
      </div>
      
    <div class="row" data-aos="zoom-in" data-aos-delay="100">
      @foreach (\App\Models\Category::all() as $c)
      <div class="col-lg-3 col-md-4">
        <div class="icon-box">
        <a class="" href="">
          <i class="" ></i>
          <h3><a href="{{route('category', $c->id)}}">{{$c->name}}</a></h3>
        </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>