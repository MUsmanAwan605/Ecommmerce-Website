@extends('frontend.body.main')
@section('main.content')


<!--------------- login-section --------------->
<section class="login footer-padding">
    <div class="container">
        <div class="login-section">
            <div class="review-form">
                <h5 class="comment-title">Forgot Password</h5>
                <p>Forgot your password? No problem. Just let us know your email address and we will email you a
                    password reset link that will allow you to choose a new one</p>
                <div class="review-inner-form">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <!-- Email Address -->
                        <div class="review-form-name">
                            {{-- <x-input-label for="email" :value="__('Email')" />
                             --}}
                             <label for="email">Email</label>
                             <input type="email" class="form-control @error('email') is-invalid @enderror"
                             name="email">
                         <span><p class="text-danger">{{ $errors->first() }}</p></span>

                        </div>

                        <!-- Remember Me -->
                        <div class="review-form-name checkbox">

                            {{-- <div class="forget-pass">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div> --}}
                        </div>
                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn">Email Password Reset Link</button>

                            {{-- <span class="shop-account">Don't have an account? <a href="{{ route('register') }}">Sign Up Free</a></span> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--------------- login-section-end --------------->
@endsection
