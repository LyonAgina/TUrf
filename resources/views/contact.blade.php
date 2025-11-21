{{-- resources/views/contact.blade.php --}}
@extends('layouts.app')
@section('title', 'Contact')

@section('content')
<div class="container mx-auto px-4 py-8">

  {{-- Scrolling info (marquee) --}}
  <div class="overflow-hidden mb-8" style="white-space: nowrap;">
    <div
      id="info-marquee"
      style="
        display: inline-flex;
        align-items: center;
        gap: 6rem;
        animation: marqueeScroll 20s linear infinite; /* faster */
      "
    >
      <div style="display: inline-block;">Connect With Us</div>
      <div style="display: inline-block;">Business Hours: Mon–Sat 8:00am – 6:00pm</div>
      <div style="display: inline-block;">
        Phone: <a href="tel:+254712345678" style="text-decoration: underline; color: #155d27;">+254 712 345 678</a>
      </div>
      <div style="display: inline-block;">
        Email: <a href="mailto:info@turf.com" style="text-decoration: underline; color: #155d27;">info@turf.com</a>
      </div>

      {{-- FAQ items --}}
      <div style="display: inline-block; cursor: pointer;" onclick="toggleMarqueeFaq(this, event)">
        How do I book a turf?
        <div class="marquee-faq-answer" style="display: none; background: #f3f3f3; padding: 6px 8px; border-radius: 6px; margin-top: 4px;">
          Go to the turfs page, select your preferred turf, and click 'Book Now'.
        </div>
      </div>

      <div style="display: inline-block; cursor: pointer;" onclick="toggleMarqueeFaq(this, event)">
        Can I cancel or reschedule my booking?
        <div class="marquee-faq-answer" style="display: none; background: #f3f3f3; padding: 6px 8px; border-radius: 6px; margin-top: 4px;">
          Yes, you can cancel or reschedule from your bookings page before the booking time.
        </div>
      </div>

      <div style="display: inline-block; cursor: pointer;" onclick="toggleMarqueeFaq(this, event)">
        How do I contact support?
        <div class="marquee-faq-answer" style="display: none; background: #f3f3f3; padding: 6px 8px; border-radius: 6px; margin-top: 4px;">
          You can use the contact form or WhatsApp for quick support.
        </div>
      </div>
    </div>
  </div>

  {{-- Contact Form & Map --}}
  <div class="flex flex-col lg:flex-row gap-8">
    <div class="flex-1">
      <h3 class="text-xl font-semibold mb-4">Send Us a Message</h3>
      <form id="contact-form" method="POST" action="#">
        @csrf
        <div class="card shadow-lg p-6" style="border-radius:22px; background: #fff;">
          <div id="form-alert" class="alert d-none" role="alert"></div>
          <div class="mb-4">
            <input type="text" class="form-control w-full" id="name" name="name" placeholder="Your Name" required style="border-radius:14px;">
          </div>
          <div class="mb-4">
            <input type="email" class="form-control w-full" id="email" name="email" placeholder="Your Email" required style="border-radius:14px;">
          </div>
          <div class="mb-4">
            <textarea class="form-control w-full" id="message" name="message" rows="4" placeholder="Your Message" required style="border-radius:14px;"></textarea>
          </div>
          <button type="submit" class="btn btn-primary w-full" style="border-radius:22px;">Send Message</button>
        </div>
      </form>
    </div>

    <div class="flex-1 flex flex-col">
      <h3 class="text-xl font-semibold mb-4">Our Location</h3>
      <div class="flex-1 min-h-96 rounded-lg overflow-hidden shadow-lg border border-gray-300">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.123456789!2d36.812345!3d-1.312345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1a123456789%3A0x123456789abcdef!2sOle%20Sangale%20Rd%2C%20Strathmore%20University!5e0!3m2!1sen!2ske!4v1633021234567!5m2!1sen!2ske"
          class="w-full h-full"
          style="border:0;"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </div>
</div>

{{-- JS --}}
<script>
  const marquee = document.getElementById('info-marquee');

  function toggleMarqueeFaq(element, event) {
    event.stopPropagation();

    // pause marquee
    marquee.style.animationPlayState = "paused";

    // toggle this answer
    const answer = element.querySelector('.marquee-faq-answer');
    const isVisible = answer.style.display === 'block';

    // hide all answers first
    document.querySelectorAll('.marquee-faq-answer').forEach(a => a.style.display = 'none');

    // show this answer if it was hidden
    if (!isVisible) {
      answer.style.display = 'block';
    } else {
      // resume marquee if same FAQ clicked again
      marquee.style.animationPlayState = "running";
    }
  }

  // clicking outside resumes marquee and hides answers
  document.addEventListener('click', function(e) {
    if (!e.target.closest('#info-marquee')) {
      document.querySelectorAll('.marquee-faq-answer').forEach(a => a.style.display = 'none');
      marquee.style.animationPlayState = "running";
    }
  });

  // contact form popup
  const form = document.getElementById('contact-form');
  const popup = document.getElementById('success-popup');
  const closeBtn = document.getElementById('close-popup');

  form.addEventListener('submit', function(event) {
    event.preventDefault();
    setTimeout(() => {
      popup.classList.remove('hidden');
      form.reset();
    }, 500);
  });

  closeBtn.addEventListener('click', () => {
    popup.classList.add('hidden');
  });
</script>

{{-- CSS --}}
<style>
@keyframes marqueeScroll {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

#info-marquee.paused {
  animation-play-state: paused;
}

iframe { height: 100% !important; }
</style>
@endsection
