<section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
          <h1>{!! nl2br(e($site->header_title))!!}</h1>
          
          <h2>{!! nl2br(e($site->header_description))!!}</h2>
        
      <a href="{{ route('register') }}" class="btn-get-started">Get Started</a>
    </div>
  </section>