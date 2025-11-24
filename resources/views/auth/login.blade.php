@extends('layouts.app')

@section('content')
<style>
    .login-card {
        border-radius: 1.5rem;
        box-shadow: 0 8px 32px 0 rgba(34,197,94,0.18), 0 1.5px 8px 0 rgba(16,185,129,0.10);
        background: rgba(255,255,255,0.97);
        padding: 2rem 1.5rem 1.5rem 1.5rem;
        max-width: 400px;
        margin: 0 auto;
        position: relative;
        overflow: hidden;
        border: 1.5px solid #e5e7eb;
    }
    .logo-orbit-container {
        position: relative;
        width: 80px;
        height: 80px;
        margin: 0 auto 0.5rem auto;
    }
    .logo-orbit {
        position: absolute;
        left: 50%;
        bottom: 0;
        width: 56px;
        height: 56px;
        transform: translateX(-50%);
        animation: logo-horizontal-orbit 2s ease-in-out infinite alternate;
    }
    @keyframes logo-horizontal-orbit {
        0% {
            transform: translateX(-50%) translateX(-40px);
        }
        100% {
            transform: translateX(-50%) translateX(40px);
        }
    }
    .login-card h1 {
        font-family: 'Russo One', sans-serif;
        letter-spacing: 1px;
    }
</style>
<div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-emerald-50 via-white to-emerald-100 py-8">
    <div class="login-card">
        <div class="logo-orbit-container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-orbit">
        </div>
        <div class="flex flex-col items-center mb-6">
            <h1 class="text-2xl font-extrabold mb-1" style="
                font-family: 'Russo One', sans-serif;
                background: linear-gradient(135deg, #022c22 0%, #15803d 50%, #16a34a 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                animation: text-pulse-glow 3s infinite ease-in-out;
                letter-spacing: 0.5px;">
                Turf Bila Worry
            </h1>
        </div>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Russo+One&display=swap');
        @keyframes text-pulse-glow {
            0%, 100% { filter: drop-shadow(0 2px 2px rgba(0,0,0,0.1)); }
            50% { filter: drop-shadow(0 0 12px rgba(34, 197, 94, 0.7)); }
        }
        </style>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-emerald-500 focus:border-emerald-500">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input id="password" type="password" name="password" required class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-emerald-500 focus:border-emerald-500">
            </div>
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-gray-700">Remember me</label>
            </div>
            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 rounded-xl transition">Login</button>
        </form>
        <div class="mt-4 text-center">
            <a href="{{ route('register') }}" class="text-emerald-700 hover:underline">Don't have an account? Register</a>
        </div>
    </div>
</div>
@endsection