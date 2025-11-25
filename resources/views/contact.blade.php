@extends('layouts.main')

@section('title', 'Contact')

@section('body-class', 'contact-page')

@section('content')
<!-- Page Title -->
<div class="page-title">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1 class="heading-title">Contact</h1>
          <p class="mb-0">
            Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo
            odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum
            debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat
            ipsum dolorem.
          </p>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="current">Contact</li>
      </ol>
    </div>
  </nav>
</div><!-- End Page Title -->

<!-- Contact Section -->
<section id="contact" class="contact section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-5">
      <div class="col-lg-5">
        <div class="contact-info-wrapper">
          <div class="contact-info-item" data-aos="fade-up" data-aos-delay="100">
            <div class="info-icon">
              <i class="bi bi-geo-alt"></i>
            </div>
            <div class="info-content">
              <h3>Our Address</h3>
              <p>JL. PERCOBAAN KM. 17 NO. 65 CILEUNYI4</p>
            </div>
          </div>

          <div class="contact-info-item" data-aos="fade-up" data-aos-delay="200">
            <div class="info-icon">
              <i class="bi bi-envelope"></i>
            </div>
            <div class="info-content">
              <h3>Email Address</h3>
              <p>baknus@smkbn666.sch.id</p>
            </div>
          </div>

          <div class="contact-info-item" data-aos="fade-up" data-aos-delay="300">
            <div class="info-icon">
              <i class="bi bi-headset"></i>
            </div>
            <div class="info-content">
              <h3>Hours of Operation</h3>
              <p>Senin 06:30–16:00</p>
              <p>Selasa	07:00–16:00</p>
              <p>Rabu-Jumat 07:00–16:00</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-7">
        <div class="contact-form-card" data-aos="fade-up" data-aos-delay="200">
          <h2>Send us a Message</h2>
          <p class="mb-4">Have questions or want to learn more? Reach out to us and our team will get back to you shortly.</p>

          <form action="forms/contact.php" method="post" class="php-email-form">
            <div class="row g-4">
              <div class="col-md-6">
                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required="">
              </div>

              <div class="col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
              </div>

              <div class="col-12">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="">
              </div>

              <div class="col-12">
                <textarea class="form-control" name="message" id="message" placeholder="Your Message" rows="6" required=""></textarea>
              </div>

              <div class="col-12">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-submit">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid map-container" data-aos="fade-up" data-aos-delay="200">
    <div class="map-overlay"></div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.0346!2d107.7729!3d-6.9389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c2e0c8b8b8b8%3A0x1234567890abcdef!2sJL.%20PERCOBAAN%20KM.%2017%20NO.%2065%20CILEUNYI!5e0!3m2!1sen!2sid!4v1676961268712!5m2!1sen!2sid" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>

</section><!-- /Contact Section -->
@endsection
