@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="d-flex flex-column w-100">

  {{-- ==========================================
       SECTION 1: HERO (Orbits & Balls)
       ========================================== --}}
  <div class="position-relative w-100 overflow-hidden hero-section" 
       style="height: 100vh; background-color: #ffffff; margin-top: -24px;">

    {{-- 1. ORBITS BACKGROUND --}}
    <div class="orbit-background" aria-hidden="true">
      <svg class="orbit-svg" viewBox="0 0 1200 1200" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <style>
            .orbit-line { 
                fill: none; 
                stroke: #333333; 
                stroke-width: 1.5; 
                stroke-dasharray: 4 6; 
                stroke-linecap: round; 
            }
          </style>
        </defs>
        <circle class="orbit-line" cx="600" cy="600" r="150" />
        <circle class="orbit-line" cx="600" cy="600" r="250" />
        <circle class="orbit-line" cx="600" cy="600" r="350" />
        <circle class="orbit-line" cx="600" cy="600" r="450" />
        <circle class="orbit-line" cx="600" cy="600" r="550" />
      </svg>
    </div>

    {{-- 2. BALLS CONTAINER --}}
    <div id="ball-arena" class="position-absolute inset-0 w-100 h-100 overflow-hidden pointer-events-none" style="z-index: 5;"></div>

    {{-- 3. HERO CONTENT (Text + Buttons) --}}
    <div class="position-absolute top-50 start-50 translate-middle text-center z-20" 
         style="width: 100%; max-width: 900px; pointer-events: none;">
        
        <div class="text-halo pe-auto" style="pointer-events: auto;">
            <h1 class="fw-bold mb-3 display-4">Welcome to Our Platform</h1>
            <p class="fs-5 text-secondary mb-5">
                Discover, book, and manage sports venues easily.<br>
                <span class="fw-bold" style="color: #157347;">Everything you need in one place.</span>
            </p>

            {{-- ACTION ROW: Buttons Side by Side --}}
            <div class="d-flex flex-wrap justify-content-center align-items-center gap-4">
                
              {{-- BUTTON 1: THE LAUNCHPAD (New Design) --}}
<a href="{{ url('/turfs') }}" class="btn-launchpad text-decoration-none">
    {{-- Background animated slashes --}}
    <div class="btn-bg-anim">
        <span></span><span></span><span></span>
    </div>
    
    {{-- Main Text --}}
    <span class="btn-text">Get Started Now</span>

    {{-- Icon Container --}}
    <div class="btn-icon-circle">
        <svg class="icon-arrow-right" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="5" y1="12" x2="19" y2="12"></line>
            <polyline points="12 5 19 12 12 19"></polyline>
        </svg>
    </div>
</a>

                {{-- BUTTON 2: TICKET STUB (NOW SOLID BORDER) --}}
                <a href="{{ url('/bookings') }}" class="ticket-stub text-decoration-none">
                    {{-- Pulsing Live Dot --}}
                    <div class="live-indicator">
                        <span class="blink"></span>
                    </div>
                    {{-- Text Content --}}
                    <div class="ticket-info">
                        <span class="ticket-label">ALREADY BOOKED?</span>
                        <span class="ticket-action">Check Your Turf</span>
                    </div>
                    {{-- Decorative Barcode --}}
                    <div class="ticket-barcode">
                        <span></span><span></span><span></span>
                    </div>
                </a>

            </div>
        </div>
    </div>

  </div>


  {{-- ==========================================
       SECTION 2: THE LIVING PITCH
       ========================================== --}}
  <section class="py-5 position-relative w-100 overflow-hidden" style="background-color: #f0fdf4;">
    
    {{-- ANIMATED PITCH LINES --}}
    <div class="pitch-ants-bg" aria-hidden="true">
        <svg class="ants-svg" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <rect x="1%" y="2" width="98%" height="99%" rx="20" class="ants-line" />
            <line x1="50%" y1="2" x2="50%" y2="100%" class="ants-line" />
            <circle cx="50%" cy="50%" r="100" class="ants-line" />
            <rect x="1%" y="30%" width="10%" height="40%" class="ants-line" />
            <rect x="89%" y="30%" width="10%" height="40%" class="ants-line" />
        </svg>
    </div>

    {{-- SECTION CONTENT --}}
    <div class="container py-5 position-relative z-10">
        <div class="text-center mb-5">
            <div class="text-halo d-inline-block">
                <h2 class="display-5 fw-bold mb-3" style="color: #052e16;">
                    Simply The <span class="text-decoration-underline decoration-wave" style="color: #15803d;">Baddest</span> in Town.
                </h2>
                <p class="text-secondary fs-5" style="max-width: 650px; margin: 0 auto;">
                    We don't just list turfs. We curate arenas where legends are made.
                </p>
            </div>
        </div>

        <div class="row g-4">
            {{-- Card 1 --}}
            <div class="col-md-4">
                <div class="p-5 rounded-4 h-100 outline-card">
                    <div class="icon-circle pulse mb-4 d-inline-flex align-items-center justify-content-center rounded-circle">
                        <svg width="30" height="30" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h4 class="fw-bold mb-3">Lightning Fast</h4>
                    <p>Book your spot in seconds. Instant confirmation, zero hassle.</p>
                </div>
            </div>
            {{-- Card 2 --}}
            <div class="col-md-4">
                <div class="p-5 rounded-4 h-100 outline-card">
                    <div class="icon-circle pulse mb-4 d-inline-flex align-items-center justify-content-center rounded-circle">
                        <svg width="30" height="30" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h4 class="fw-bold mb-3">Elite Quality Only</h4>
                    <p>Every turf is vetted for excellence. Play only on the best surfaces.</p>
                </div>
            </div>
            {{-- Card 3 --}}
            <div class="col-md-4">
                <div class="p-5 rounded-4 h-100 outline-card">
                    <div class="icon-circle pulse mb-4 d-inline-flex align-items-center justify-content-center rounded-circle">
                        <svg width="30" height="30" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/></svg>
                    </div>
                    <h4 class="fw-bold mb-3">The Community</h4>
                    <p>Connect with thousands of players. Rate venues and dominate.</p>
                </div>
            </div>
        </div>
    </div>
  </section>

</div>

<style>
/* =========================================
   1. ORBIT BACKGROUND
   ========================================= */
.hero-section { position: relative; }
.orbit-background {
    position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
    width: 1200px; height: 1200px; z-index: 0; pointer-events: none;
    animation: slow-bg-spin 40s linear infinite;
}
.orbit-svg { width: 100%; height: 100%; }
@keyframes slow-bg-spin { from { transform: translate(-50%, -50%) rotate(0deg); } to { transform: translate(-50%, -50%) rotate(360deg); } }

/* =========================================
   2. BOUNCING BALLS
   ========================================= */
.bouncing-ball { position: absolute; width: 60px; height: 60px; will-change: transform; }
.ball-inner {
    width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;
    animation: slow-spin 8s linear infinite;
}
.ball-inner img { width: 100%; height: 100%; object-fit: contain; }
@keyframes slow-spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }

/* =========================================
   3. TEXT HALO
   ========================================= */
.text-halo { position: relative; }
.text-halo h1, .text-halo h2, .text-halo p { position: relative; z-index: 10; color: #0d3818; }
.text-halo::before {
    content: ''; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
    width: 600px; height: 400px; border-radius: 50%;
    background: rgba(255,255,255,0.85); filter: blur(40px); z-index: -1;
}

/* =========================================
   4. NEW BUTTONS (Side by Side)
   ========================================= */

/* =========================================
   4. NEW BUTTONS (Side by Side)
   ========================================= */

/* ---------- BUTTON 1: THE LAUNCHPAD (New) ---------- */
.btn-launchpad {
    position: relative;
    display: flex; align-items: center; justify-content: space-between;
    gap: 20px;
    padding: 8px 8px 8px 24px; /* Less padding on right for the icon circle */
    
    /* Dynamic Gradient Background */
    background: linear-gradient(135deg, #15803d, #059669);
    color: #ffffff;
    border-radius: 50px; /* Pill shape */
    height: 54px; /* Matches Ticket Stub height exactly */
    
    overflow: hidden; /* Contains the internal animation */
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 10px 25px rgba(21, 128, 61, 0.4);
    flex-shrink: 0; /* Prevents squishing */
}

/* Hover Effects */
.btn-launchpad:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(21, 128, 61, 0.6);
    /* Slightly brighten gradient on hover */
    background: linear-gradient(135deg, #166534, #047857);
}

/* The Text */
.btn-launchpad .btn-text {
    font-weight: 700; font-size: 1.05rem;
    position: relative; z-index: 2; /* Sits above animation */
}

/* The Icon Circle container */
.btn-icon-circle {
    width: 38px; height: 38px;
    background: rgba(255,255,255,0.2); /* Semi-transparent white */
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    transition: all 0.3s ease;
    position: relative; z-index: 2;
}

/* Icon Circle Hover state */
.btn-launchpad:hover .btn-icon-circle {
    background: #ffffff; /* Turns solid white */
    color: #15803d; /* Icon turns green */
    transform: rotate(-45deg); /* Cool rotation effect */
}

/* Background Animation (Moving Slashes) */
.btn-bg-anim {
    position: absolute; top: 0; left: 0; width: 100%; height: 100%;
    pointer-events: none; z-index: 1;
}
.btn-bg-anim span {
    position: absolute; top: -50%; width: 20px; height: 200%;
    background: rgba(255,255,255,0.1); /* Subtle white flashes */
    transform: rotate(25deg);
    animation: launch-slide 4s infinite linear;
}
/* Spacing the flashes */
.btn-bg-anim span:nth-child(1) { left: -30%; animation-delay: 0s; }
.btn-bg-anim span:nth-child(2) { left: 20%; animation-delay: 1.5s; }
.btn-bg-anim span:nth-child(3) { left: 70%; animation-delay: 3s; }

@keyframes launch-slide {
    from { transform: translateX(-150%) rotate(25deg); }
    to { transform: translateX(350%) rotate(25deg); }
}


/* ---------- BUTTON 2: TICKET STUB (Existing - Slight Tweak) ---------- */
.ticket-stub {
    display: flex; align-items: center; gap: 15px;
    background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(8px);
    padding: 10px 25px; border-radius: 50px;
    border: 2px solid #333333; color: #333333;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative; overflow: hidden;
    height: 54px; 
    flex-shrink: 0; /* ADDED: Prevents squishing on small screens */
}
/* ... rest of ticket stub CSS remains the same ... */
.ticket-stub:hover {
    background: #15803d; border-color: #15803d;
    color: white; transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(21, 128, 61, 0.3);
}
.ticket-info { display: flex; flex-direction: column; text-align: left; line-height: 1.1; }
.ticket-label { font-size: 0.6rem; font-weight: 800; opacity: 0.6; }
.ticket-stub:hover .ticket-label { opacity: 0.9; color: #dcfce7; }
.ticket-action { font-size: 0.9rem; font-weight: 700; }
.live-indicator { position: relative; width: 10px; height: 10px; background: #22c55e; border-radius: 50%; }
.live-indicator .blink { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border-radius: 50%; background: #22c55e; animation: pulse-green 2s infinite; }
@keyframes pulse-green { 0% { transform: scale(1); opacity: 0.8; } 70% { transform: scale(2.5); opacity: 0; } 100% { transform: scale(1); opacity: 0; } }
.ticket-barcode { display: flex; gap: 3px; height: 18px; opacity: 0.3; margin-left: auto; }
.ticket-barcode span { width: 2px; background: currentColor; border-radius: 2px; }
.ticket-barcode span:nth-child(1) { height: 100%; }
.ticket-barcode span:nth-child(2) { height: 60%; align-self: center; }
.ticket-barcode span:nth-child(3) { height: 80%; align-self: flex-end; }

/* Button 2: Ticket Stub */
.ticket-stub {
    display: flex; align-items: center; gap: 15px;
    background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(8px);
    padding: 10px 25px; border-radius: 50px;
    
    /* CHANGED: Solid Border instead of dashed */
    border: 2px solid #333333; 
    color: #333333;
    
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative; overflow: hidden;
    height: 54px; 
}
.ticket-stub:hover {
    background: #15803d; border-color: #15803d;
    color: white; transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(21, 128, 61, 0.3);
}
.ticket-info { display: flex; flex-direction: column; text-align: left; line-height: 1.1; }
.ticket-label { font-size: 0.6rem; font-weight: 800; opacity: 0.6; }
.ticket-stub:hover .ticket-label { opacity: 0.9; color: #dcfce7; }
.ticket-action { font-size: 0.9rem; font-weight: 700; }

/* Live Indicator */
.live-indicator {
    position: relative; width: 10px; height: 10px;
    background: #22c55e; border-radius: 50%;
}
.live-indicator .blink {
    position: absolute; top: 0; left: 0; width: 100%; height: 100%;
    border-radius: 50%; background: #22c55e;
    animation: pulse-green 2s infinite;
}
@keyframes pulse-green {
    0% { transform: scale(1); opacity: 0.8; }
    70% { transform: scale(2.5); opacity: 0; }
    100% { transform: scale(1); opacity: 0; }
}
/* Barcode decoration */
.ticket-barcode { display: flex; gap: 3px; height: 18px; opacity: 0.3; margin-left: auto; }
.ticket-barcode span { width: 2px; background: currentColor; border-radius: 2px; }
.ticket-barcode span:nth-child(1) { height: 100%; }
.ticket-barcode span:nth-child(2) { height: 60%; align-self: center; }
.ticket-barcode span:nth-child(3) { height: 80%; align-self: flex-end; }


/* =========================================
   5. PITCH BACKGROUND & CARDS
   ========================================= */
.pitch-ants-bg {
    position: absolute; top: 0; left: 0; width: 100%; height: 100%;
    z-index: 0; pointer-events: none; opacity: 1;
}
.ants-line {
    fill: none;
    stroke: #333333; 
    stroke-width: 1.5;         
    stroke-dasharray: 4 6;  
    stroke-linecap: round;   
    animation: marching-ants 1s linear infinite;
}
@keyframes marching-ants { to { stroke-dashoffset: -20; } }

/* Cards */
.outline-card {
    background: transparent;
    border: 1px solid rgba(22, 101, 52, 0.15);
    color: #1f2937; transition: all 0.4s ease;
}
.outline-card .icon-circle {
    background: #dcfce7; color: #166534; width: 70px; height: 70px; transition: all 0.4s ease;
}
.outline-card:hover {
    background: #ffffff; border-color: #ffffff; transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.08);
}
.outline-card:hover .icon-circle { transform: scale(1.1); background: #166534; color: #ffffff; }

/* UTILITIES */
.z-20 { z-index: 20; }
.z-10 { z-index: 10; }
.hover-lift:hover { transform: translateY(-3px); }
</style>

<script>
/* JS FOR BOUNCING BALLS */
(function() {
    const arena = document.getElementById('ball-arena');
    const ballCount = 6; 
    const balls = [];
    const images = ['{{ asset("images/football.png") }}', '{{ asset("images/basketball.png") }}', '{{ asset("images/volleyball.png") }}'];

    for (let i = 0; i < ballCount; i++) {
        const el = document.createElement('div'); el.className = 'bouncing-ball';
        const inner = document.createElement('div'); inner.className = 'ball-inner';
        const img = document.createElement('img'); img.src = images[i % images.length]; img.onerror = function(){ this.style.display='none'; };
        inner.appendChild(img); el.appendChild(inner); arena.appendChild(el);

        let x = Math.random() * (window.innerWidth - 60);
        let y = Math.random() * (window.innerHeight - 60);
        let vx = (Math.random() - 0.5) * 3; 
        let vy = (Math.random() - 0.5) * 3;
        if (Math.abs(vx) < 0.5) vx = 0.5; if (Math.abs(vy) < 0.5) vy = 0.5;
        balls.push({ el, x, y, vx, vy, size: 60 });
    }

    function animate() {
        const width = arena.clientWidth; const height = arena.clientHeight;
        balls.forEach(ball => {
            ball.x += ball.vx; ball.y += ball.vy;
            if (ball.x + ball.size > width) { ball.x = width - ball.size; ball.vx *= -1; } else if (ball.x < 0) { ball.x = 0; ball.vx *= -1; }
            if (ball.y + ball.size > height) { ball.y = height - ball.size; ball.vy *= -1; } else if (ball.y < 0) { ball.y = 0; ball.vy *= -1; }
            ball.el.style.transform = `translate3d(${ball.x}px, ${ball.y}px, 0)`;
        });
        requestAnimationFrame(animate);
    }
    animate();
    window.addEventListener('resize', () => {
        const w = arena.clientWidth; const h = arena.clientHeight;
        balls.forEach(ball => { if(ball.x > w) ball.x = w - 60; if(ball.y > h) ball.y = h - 60; });
    });
})();
</script>
@endsection