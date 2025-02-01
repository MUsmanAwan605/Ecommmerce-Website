@extends('frontend.body.main')
@section('main.content')


<!--------------- login-section --------------->
<section class="login footer-padding">
    <div class="container">
        <div class="login-section">
            <div class="review-form">
                <h5 class="comment-title">Log In</h5>
                <div class="review-inner-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email Address -->
                        <div class="review-form-name">
                            <label for="email" class="form-label">Email Address*</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus autocomplete="username">
                            @error('email')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Password -->
                        <div class="review-form-name">
                            <label for="password" class="form-label">Password*</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required autocomplete="current-password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Remember Me -->
                        <div class="review-form-name checkbox">
                            <div class="checkbox-item">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember" class="address">{{ __('Remember me') }}</label>
                            </div>
                            <div class="forget-pass">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn">Log In</button>
                            <span class="shop-account">Don't have an account? <a href="{{ route('register') }}">Sign Up Free</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--------------- login-section-end --------------->
@endsection
