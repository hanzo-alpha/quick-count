<section id="weather-card">
  <div class="row">
  @foreach($data as $value)
    {{--        @dd($value)--}}
    <!-- User widget Card & Whether Card Starts -->
      <div class="col-xl-6 col-md-12 whether-card">
        <div class="row">
          <!-- User Widget Starts -->
          <div class="col-xl-12 col-md-6 col-12 user-profile-card">
            <div class="card">
              <div class="card-header mx-auto pt-3">
                <div class="avatar bg-rgba-primary p-50">
                  <img class="img-fluid" src="{{ asset('images/profile/user-uploads/social-2.jpg') }}" alt="img placeholder" height="134"
                       width="134">
                </div>
              </div>
              <div class="card-content">
                <div class="card-body text-center">
                  <h4>{{ $value['paslon'] }}</h4>
                  <p>Calon Bupati / Wakil Bupati Kabupaten Soppeng</p>
                  <!-- <p class="px-1">Jelly beans halvah cake chocolate gummies.</p> -->
                  <div class="d-flex justify-content-around mb-1">
                    {{--                    <div class="card-icons d-flex flex-column">--}}
                    {{--                      <i class='bx bx-camera font-medium-5 font-weight-bold'></i>--}}
                    {{--                      <p>5693</p>--}}
                    {{--                    </div>--}}
                    <div class="card-icons d-flex flex-column">
                      {{--                      <i class='bx bx-heart font-medium-5 font-weight-bold'></i>--}}
                      <h3>{{ $value['suara'] }}</h3>
                      <p>Jumlah Suara</p>
                    </div>
                    <div class="card-icons d-flex flex-column">
                      {{--                      <i class='bx bx-user font-medium-5 font-weight-bold'></i>--}}
                      <h3>40%</h3>
                      <p>Persentase Suara</p>
                    </div>
                  </div>
                  {{--                  <button type="button" class="btn btn-primary glow px-4">Follow</button>--}}
                </div>
              </div>
            </div>
          </div>
          <!-- User Widget Ends -->
        </div>
      </div>
    @endforeach
  </div>
</section>
