@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="w-100 d-flex align-items-center justify-content-center" style="min-height:60vh;">
    <form class="w-100" style="max-width:400px;" method="POST" action="#">
        <div class="card shadow-lg p-4" style="border-radius:22px;background:#fff;">
            <div class="mb-3 text-center">
                <h2 class="mb-2" style="color:#155d27;font-weight:700;">Contact Us</h2>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required style="border-radius:14px;">
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required style="border-radius:14px;">
            </div>
            <div class="mb-3">
                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Your Message" required style="border-radius:14px;"></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100" style="border-radius:22px;">Send Message</button>
        </div>
    </form>
</div>
@endsection
