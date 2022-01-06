@extends('layouts.master')

@section('content')
<body>
    <div class="homepage">
        <h5 id="aboutus" class="d-block p-2 bg-dark text-white"><b>About Us</b></h5>
        <br>
        <h6><b>Our Logo</b></h6>
        <img src="{{asset('assets/BERANG_BARANG_LOGO Black.png')}}" alt="Berang-Barang" style="width:250px">

        <div class="aboutus">
            <p><b>Berang-Barang</b> is an application developed with a purpose to provide a service that helps people to move their items from one place to another.
                <br><br>
                Users are going to be given package options, depending on the dimension of the pickup box. Upon the order, the system will process the order, and send a pickup truck equivalent to the package chosen. Payment options are available with m-banking, and other third-party applications such as DANA, GO-PAY, and OVO.
                </p>
        </div>
        <br>
        <h5 id="benefits" class="d-block p-2 bg-dark text-white"><b>Benefits</b></h5>
        <div class="benefits">
            <br>
            <div class="container">
                <div class="row">
                  <div class="col border">
                      <br>
                    <h6><b>Hastle-Free</b></h6>
                    <img src="https://img.icons8.com/ios-filled/50/000000/easy.png"/>
                    <p></p>

                  </div>
                  <div class="col border">
                      <br>
                    <h6><b>Affordable</b></h6>
                    <img src="https://img.icons8.com/ios-filled/50/000000/low-price.png"/>
                  </div>
                  <div class="col border">
                      <br>
                    <h6><b>Secure</b></h6>
                    <img src="https://img.icons8.com/ios-filled/50/000000/private2.png"/>
                  </div>
                </div>
              </div>

        </div>
        <br>

    </div>

</body>

@endsection
