@extends('layouts.app')
@section('title','Detail Home Page')
@section('content')
<div class="page-content page-details">
    <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/index.html">Home</a>
                </li>
                <li class="breadcrumb-item">Products Details</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>

    <section class="store-gallery" id="gallery">
      <div class="container">
        <div class="row">
          <div class="col-lg-8" data-aos="zoom-in">
            <transition name="slide-fade" mode="out-in">
              <img :src="photos[activePhoto].url" :key="photos[activePhoto].url" alt="" class="w-100 main-image">
            </transition>
          </div>
          <div class="col-lg-2">
            <div class="row">
              <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(photo, index) in photos" :key="photo.id" data-aos="zoom-in" data-aos-delay="100">
                <a href="#" @click="changeActive(index)">
                  <img :src="photo.url" class="w-100 thumbnail-image" :class="{active: index == activePhoto}" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="store-details-container" data-aos="fade-up">
      <section class="store-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <h1>Sofa Ternyaman</h1>
              <div class="owner">M. Rizky Ramadhani</div>
              <div class="price">$1,000</div>
            </div>
            <div class="col-lg-2" data-aos="zoom-in">
              <a href="/cart.html" class="btn btn-success px-4 text-white btn-block mb-3">Add to Cart</a>
            </div>
          </div>
        </div>

      </section>
      <section class="store-description">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-8">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, quam.</p>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus neque voluptatem expedita ipsa temporibus blanditiis inventore eius repellendus. Deserunt, laboriosam ipsa perferendis illo dicta nesciunt?</p>
            </div>
          </div>
        </div> 
      </section>

      <section class="store-review">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-8 mt-3 mb-3">
              <h5>Customer Review (3)</h5>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-8">
              <ul class="list-unstyled">
                <li class="media">
                  <img src="images/icon-testimonial-1.png" alt="" class="mr-3 rounded-circle">
                  <div class="media-body">
                    <h5 class="mt-2 mb-1">Hazza Risky</h5>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, inventore.
                  </div>
                </li>
                <li class="media">
                  <img src="images/icon-testimonial-2.png" alt="" class="mr-3 rounded-circle">
                  <div class="media-body">
                    <h5 class="mt-2 mb-1">Hazza Risky</h5>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, inventore.
                  </div>
                </li>
                <li class="media">
                  <img src="images/icon-testimonial-3.png" alt="" class="mr-3 rounded-circle">
                  <div class="media-body">
                    <h5 class="mt-2 mb-1">Hazza Risky</h5>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, inventore.
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section> 
    </div>
</div>
@endsection