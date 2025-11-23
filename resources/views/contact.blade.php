{{-- resources/views/contact.blade.php --}}
@extends('layouts.app')
@section('title', 'Contact')

@section('content')
<div class="container mx-auto px-4 py-8">
    
    {{-- Cool Notification Popup (Hidden by default) --}}
    <div id="success-notification" class="fixed inset-x-0 top-0 z-50 p-4 transition-all duration-500 transform -translate-y-full opacity-0">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-2xl overflow-hidden border-t-4 border-green-500">
            <div class="p-4 flex items-center">
                <div class="flex-shrink-0">
                    {{-- Checkmark Icon --}}
                    <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-3 w-0 flex-1 pt-0.5">
                    <p class="text-sm font-medium text-gray-900" id="notification-title">
                        Message Sent Successfully!
                    </p>
                    <p class="mt-1 text-sm text-gray-500" id="notification-body">
                        Thank you for your feedback. We'll be in touch soon.
                    </p>
                </div>
                <div class="ml-4 flex-shrink-0 flex">
                    <button id="close-notification" class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <span class="sr-only">Close</span>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="overflow-hidden mb-8" style="white-space: nowrap;">
        <div
            id="info-marquee"
            style="
                display: inline-flex;
                align-items: center;
                gap: 6rem;
                animation: marqueeScroll 20s linear infinite;
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
            {{-- Action should point to your Laravel route for handling feedback --}}
            <form id="contact-form" method="POST" action="{{ route('feedback.store') ?? '/feedback' }}"> 
                @csrf
                <div class="card shadow-lg p-6" style="border-radius:22px; background: #fff;">
                    <div id="form-alert" class="alert d-none mb-4 text-sm text-red-600" role="alert"></div>
                    <div class="mb-4">
                        <input type="text" class="form-control w-full p-3 border border-gray-300" id="name" name="name" placeholder="Your Name" required style="border-radius:14px;">
                    </div>
                    <div class="mb-4">
                        <input type="email" class="form-control w-full p-3 border border-gray-300" id="email" name="email" placeholder="Your Email" required style="border-radius:14px;">
                    </div>
                    <div class="mb-4">
                        <textarea class="form-control w-full p-3 border border-gray-300" id="message" name="message" rows="4" placeholder="Your Message" required style="border-radius:14px;"></textarea>
                    </div>
                    <button type="submit" id="submit-button" class="btn btn-primary w-full p-3 text-white font-semibold bg-green-600 hover:bg-green-700 transition-colors" style="border-radius:22px;">
                        Send Message
                    </button>
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

{{-- JS for Marquee and AJAX Submission --}}
<script>
    const marquee = document.getElementById('info-marquee');
    const form = document.getElementById('contact-form');
    const formAlert = document.getElementById('form-alert');
    const submitButton = document.getElementById('submit-button');
    const notification = document.getElementById('success-notification');
    const closeNotificationBtn = document.getElementById('close-notification');
    const notificationTitle = document.getElementById('notification-title');
    const notificationBody = document.getElementById('notification-body');

    // --- 1. Marquee Logic (Keep original functions) ---
    function toggleMarqueeFaq(element, event) {
        event.stopPropagation();
        marquee.style.animationPlayState = "paused";
        const answer = element.querySelector('.marquee-faq-answer');
        const isVisible = answer.style.display === 'block';
        document.querySelectorAll('.marquee-faq-answer').forEach(a => a.style.display = 'none');
        if (!isVisible) {
            answer.style.display = 'block';
        } else {
            marquee.style.animationPlayState = "running";
        }
    }

    document.addEventListener('click', function(e) {
        if (!e.target.closest('#info-marquee')) {
            document.querySelectorAll('.marquee-faq-answer').forEach(a => a.style.display = 'none');
            marquee.style.animationPlayState = "running";
        }
    });

    // --- 2. Notification Logic ---
    function showNotification(title, body, isSuccess = true) {
        notificationTitle.textContent = title;
        notificationBody.textContent = body;
        
        // Update styling based on success/error (optional, requires additional styling)
        
        // Show the notification with animation
        notification.classList.remove('opacity-0', '-translate-y-full');
        notification.classList.add('opacity-100', 'translate-y-0');

        // Auto-hide after 5 seconds
        setTimeout(() => {
            hideNotification();
        }, 5000);
    }

    function hideNotification() {
        notification.classList.remove('opacity-100', 'translate-y-0');
        notification.classList.add('opacity-0', '-translate-y-full');
    }

    closeNotificationBtn.addEventListener('click', hideNotification);

    // --- 3. AJAX Submission Logic ---
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        // Clear previous alerts
        formAlert.textContent = '';
        formAlert.style.display = 'none';

        // Disable button and show loading state
        submitButton.disabled = true;
        submitButton.textContent = 'Sending...';

        const formData = new FormData(form);
        const url = form.getAttribute('action');
        const token = formData.get('_token');

        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'X-Requested-With': 'XMLHttpRequest', // Important for Laravel validation handling
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => {
            // Re-enable button
            submitButton.disabled = false;
            submitButton.textContent = 'Send Message';

            if (response.ok) {
                // Success: Show the cool notification and reset the form
                showNotification('Message Sent Successfully!', 'Thank you for reaching out. We appreciate your feedback.');
                form.reset();
            } else if (response.status === 422) {
                // Validation Error
                return response.json().then(data => {
                    let errorMessage = 'Please correct the following errors:';
                    for (const field in data.errors) {
                        errorMessage += `\n- ${data.errors[field][0]}`;
                    }
                    formAlert.textContent = errorMessage;
                    formAlert.style.display = 'block';
                    showNotification('Validation Error', 'There was an issue with your input.', false);
                });
            } else {
                // Other HTTP Error (e.g., 500 server error)
                showNotification('Submission Failed', 'A server error occurred. Please try again later.', false);
            }
        })
        .catch(error => {
            // Network Error
            submitButton.disabled = false;
            submitButton.textContent = 'Send Message';
            showNotification('Network Error', 'Could not connect to the server.', false);
            console.error('Fetch error:', error);
        });
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

/* Simple styling for the form alert to make it visible */
#form-alert {
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
    background-color: #fcebeb; /* Light red */
    color: #c53030; /* Darker red text */
    white-space: pre-wrap; /* Preserve new lines for error list */
}
</style>
@endsection