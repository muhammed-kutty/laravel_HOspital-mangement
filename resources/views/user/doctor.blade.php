<div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp bg-light" style="border-radius: 25px;font-size: 45px;font-weight:bolder;">Our Doctors</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
        
      @foreach ($docters as $docter)
          
      
      <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="docterimage/{{$docter->image}}" alt="">
              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">{{$docter->doct_name}}</p>
              <span class="text-sm text-grey">{{$docter->speciality}}  Specialist</span>
            </div>
          </div>
        </div>
        
        @endforeach  
      
      </div>
    </div>
  </div>