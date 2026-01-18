<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png') }}">
    <title>Sign Up - UI Coffee</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Argon CSS -->
    <link href="{{ asset('css/argon-dashboard.css') }}" rel="stylesheet" />
    <style>
      body {
        background: #3d5a73;
        min-height: 100vh;
        display: flex;
        align-items: center;
        font-family: 'Open Sans', sans-serif;
      }
      .register-container {
        max-width: 400px;
        width: 100%;
        margin: 0 auto;
      }
      .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        overflow: hidden;
      }
      .card-header {
        background: white;
        border: none;
        padding: 18px 20px 10px 20px;
        text-align: center;
      }
      .card-header h4 {
        color: #3d5a73;
        font-weight: 600;
        margin: 0 0 3px 0;
        font-size: 22px;
      }
      .card-header p {
        color: #3d5a73;
        margin: 0;
        font-size: 11px;
      }
      .card-body {
        padding: 5px 40px 20px 40px;
      }
      .form-group {
        margin-bottom: 3px;
      }
      .form-group label {
        font-weight: 600;
        color: #3d5a73;
        font-size: 10px;
        margin-bottom: 3px;
        display: block;
      }
      .form-group label i {
        color: #3d5a73;
      }
      .form-control, .form-select {
        border: 1px solid #cbd5e0;
        border-radius: 6px;
        padding: 6px 10px;
        font-size: 12px;
        transition: all 0.3s ease;
      }
      .form-control:focus, .form-select:focus {
        border-color: #3d5a73;
        box-shadow: 0 0 0 0.2rem rgba(61, 90, 115, 0.25);
        background-color: #f8f9ff;
      }
      .btn-register {
        background: linear-gradient(135deg, #3d5a73 0%, #2d4355 100%);
        border: none;
        border-radius: 6px;
        padding: 12px 20px;
        font-weight: 600;
        font-size: 14px;
        width: 100%;
        margin-top: 10px;
        transition: all 0.3s ease;
      }
      .btn-register:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(61, 90, 115, 0.3);
      }
      .text-center.mt-3 {
        margin-top: 20px !important;
      }
      .text-center small {
        font-size: 13px;
        color: #8898aa;
      }
      .text-center a {
        color: #3d5a73;
        text-decoration: none;
        font-weight: 600;
      }
      .text-center a:hover {
        text-decoration: underline;
      }
      .alert {
        border: none;
        border-radius: 6px;
        font-size: 13px;
      }
      .error-text {
        color: #f5365c;
        font-size: 12px;
        margin-top: 5px;
      }
      .logo-section {
        text-align: center;
        margin-bottom: 20px;
      }
      .logo-section i {
        font-size: 32px;
        color: #3d5a73;
      }
      .form-control::placeholder, .form-select {
        color: #b2bec3;
        opacity: 1;
      }
    </style>
  </head>

  <body>
    <div class="register-container">
      <div class="card">
        <div class="card-header">
          <div class="logo-section">
            <img src="{{ asset('assets/img/sidebarlogin.png') }}" alt="UI Coffee Logo" style="max-height: 100px;">
          </div>
          <h4>UI Coffee & Eatery</h4>
          <p>Create Your Account</p>
        </div>

        <div class="card-body">
          <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
              <label for="profile_photo">
                <i class="fas fa-image"></i> Profile Photo
              </label>
              <input 
                type="file" 
                id="profile_photo"
                name="profile_photo" 
                class="form-control @error('profile_photo') is-invalid @enderror" 
                accept="image/*"
              />
              <small class="text-muted" style="font-size: 11px;">Format: JPG, PNG, GIF (Max: 2MB) - Optional</small>
              @error('profile_photo')
                <div class="error-text">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="username">
                <i class="fas fa-user"></i> Username
              </label>
              <input 
                type="text" 
                id="username"
                name="username" 
                value="{{ old('username') }}" 
                class="form-control @error('username') is-invalid @enderror" 
                placeholder="Choose a username" 
                required
                autofocus
                style="text-transform: uppercase;"
              />
              @error('username')
                <div class="error-text">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="password">
                <i class="fas fa-lock"></i> Password
              </label>
              <input 
                type="password" 
                id="password"
                name="password" 
                class="form-control @error('password') is-invalid @enderror" 
                placeholder="Create a strong password" 
                required
              />
              @error('password')
                <div class="error-text">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="password_confirmation">
                <i class="fas fa-check-circle"></i> Confirm Password
              </label>
              <input 
                type="password" 
                id="password_confirmation"
                name="password_confirmation" 
                class="form-control" 
                placeholder="Confirm your password" 
                required
              />
            </div>

            <div class="form-group">
              <label for="level">
                <i class="fas fa-shield-alt"></i> Role/Level
              </label>
              <select 
                id="level"
                name="level" 
                class="form-select @error('level') is-invalid @enderror" 
                required
              >
                <option value="">-- Select User Role --</option>
                <option value="administrator" {{ old('level') == 'administrator' ? 'selected' : '' }}>
                  <i class="fas fa-crown"></i> Administrator
                </option>
                <option value="petugas" {{ old('level') == 'petugas' ? 'selected' : '' }}>
                  <i class="fas fa-user-tie"></i> Petugas / Cashier
                </option>
              </select>
              @error('level')
                <div class="error-text">{{ $message }}</div>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-register">
              <i class="fas fa-user-check"></i> Create Account
            </button>

            <div class="text-center mt-3">
              <small>Already have an account? 
                <a href="{{ route('login') }}">Sign in here</a>
              </small>
            </div>
          </form>
        </div>
      </div>

      <div class="text-center mt-4">
        <small style="color: rgba(255, 255, 255, 0.8);">© 2026 UI Coffee. All rights reserved.</small>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>


