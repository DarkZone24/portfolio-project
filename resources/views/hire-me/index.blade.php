

@extends('layouts.app')

@section('title', 'Hire Me - Contact Form')

@section('content')
<div class="hire-form-page">
    <style>
        .hire-form-page {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .hire-form-container {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 16px;
            padding: 40px 30px;

            /* ✅ Ito ang fix */
            width: 100%;
            max-width: 480px;  /* lock sa maximum lapad */
            margin: 0 auto;    /* center align */
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
        }


        .form-header h1 {
            color: #fff;
            font-size: 2.0rem;
            font-weight: bold;
            margin-bottom: 10px;
            background: linear-gradient(45deg, #667eea 0%, #764ba2 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
        }

        .form-header p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1rem;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            color: #fff;
            font-weight: 400;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 15px 20px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            color: #fff;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
        }

        .btn-submit {
            width: 100%;
            padding: 15px;
            background: linear-gradient(45deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 50px;
            color: white;
            font-size: 1.2rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
        }

        .alert {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: rgba(46, 204, 113, 0.2);
            border: 1px solid #2ecc71;
            color: #2ecc71;
        }

        .alert-danger {
            background: rgba(231, 76, 60, 0.2);
            border: 1px solid #e74c3c;
            color: #e74c3c;
        }

        .invalid-feedback {
            color: #ff6b6b;
            font-size: 0.9rem;
            margin-top: 5px;
        }
    </style>

    <div class="hire-form-container">
        <div class="form-header">
            <h1>Hire Me</h1>
            <p>Let's work together and bring your ideas to life!</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('contact.send') }}" method="POST" id="hireForm">
            @csrf
            
            <div class="form-group">
                <label for="name">Full Name *</label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       class="form-control @error('name') is-invalid @enderror" 
                       placeholder="Enter your full name" 
                       value="{{ old('name') }}" 
                       required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       placeholder="Enter your email address" 
                       value="{{ old('email') }}" 
                       required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="contact">Contact Number *</label>
                <input type="tel" 
                       id="contact" 
                       name="contact" 
                       class="form-control @error('contact') is-invalid @enderror" 
                       placeholder="Enter your contact number" 
                       value="{{ old('contact') }}" 
                       required>
                @error('contact')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="message">Message *</label>
                <textarea id="message" 
                         name="message" 
                         class="form-control @error('message') is-invalid @enderror" 
                         placeholder="Tell me about your project, timeline, and requirements..." 
                         rows="5" 
                         required>{{ old('message') }}</textarea>
                @error('message')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-submit">
                Send Message
            </button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('hireForm');
    const submitBtn = form.querySelector('.btn-submit');

    form.addEventListener('submit', function() {
        submitBtn.disabled = true;
        submitBtn.textContent = 'Sending...';
        
        setTimeout(function() {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Send Message';
        }, 3000);
    });
});
</script>
@endsection
