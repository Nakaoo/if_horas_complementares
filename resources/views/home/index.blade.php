@extends('layouts.home')

@section('content')
  <!-- ======= Hero ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Portal dedicado ao cadastro e visualização das horas complementares</h1>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{ asset('/img/if.png') }}" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section><!-- Fim Hero -->
@endsection
