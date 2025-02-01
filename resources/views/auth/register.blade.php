@extends('frontend.body.main')
@section('main.content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!--------------- login-section--------------->
    <section class="login account footer-padding">
        <div class="container">
            <div class="login-section account-section">
                <div class="review-form">
                    <h5 class="comment-title">Create Account</h5>
                    <div class=" account-inner-form">
                        <div class="review-form-name">
                            <label for="fname" :value="__('FirstName')" class="form-label">First Name*</label>
                            <input type="text" id="fname" class="form-control" name="FirstName" value="{{ old('FirstName') }}"  placeholder="First Name">
                        </div>
                        <div class="review-form-name">
                            <label for="lname" :value="__('LastName')" class="form-label">Last Name*</label>
                            <input type="text" id="lname" class="form-control" name="LastName" value="{{ old('LastName') }}" placeholder="Last Name">

                        </div>
                    </div>
                    <div class="account-inner-form">
                        <div class="review-form-name">
                            <label for="password"  class="form-label">Password*</label>
                            <input type="password" id="password"  value="{{ old('password') }}" class="form-control @error('password') is-invalid

                            @enderror" name="password" placeholder="Password" >
                            @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="review-form-name">
                            <label for="password_confirmation"  class="form-label">Confirm Password*</label>
                            <input type="password" id="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" name="password_confirmation"  placeholder="Confirm Password" >
                            {{-- @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                        </div>
                    </div>
                    <div class=" account-inner-form">
                        <div class="review-form-name">
                            <label for="email" :value="__('Email')" class="form-label">Email*</label>
                            <input type="email" id="email" class="form-control @error('email') is-invalid

                            @enderror" name="email" value="{{ old('email') }}"  placeholder="user@gmail.com">
                            @error('email')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="review-form-name">
                            <label for="phone" class="form-label">Phone*</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid
                            @enderror" placeholder="+880388**0899">
                            @error('phone')
                            <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror
                        </div>

                    </div>
                    <div class="review-form-name">
                        <label for="country" class="form-label">Country*</label>
                        <select id="country" name="Country" class="form-select" required>
                            <option value="">Choose...</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Brunei">Brunei</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cabo Verde">Cabo Verde</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo (Congo-Brazzaville)">Congo (Congo-Brazzaville)</option>
                            <option value="Congo (Congo-Kinshasa)">Congo (Congo-Kinshasa)</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="East Timor">East Timor</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Eswatini">Eswatini</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Greece">Greece</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran">Iran</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Laos">Laos</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libya">Libya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia">Micronesia</option>
                            <option value="Moldova">Moldova</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar (Burma)">Myanmar (Burma)</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="North Korea">North Korea</option>
                            <option value="North Macedonia">North Macedonia</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Romania">Romania</option>
                            <option value="Russia">Russia</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Saint Vincent and the Grenadines">Saint Vincent and
                            </select>
                    </div>

                    <div class="review-form-name pt-4">
                        <label for="country" class="form-label">Address*</label>
                        <input type="tel" id="address" name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid
                        @enderror" placeholder="Address">
                        @error('address')
                        <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="review-form-name pt-4">
                        <label for="fname" :value="__('images')" class="form-label">Image* <span>Optional</span></label>
                        <input type="file" id="fname" class="form-control" name="images" :value="old('images')" placeholder="First Name">
                    </div>

                    <div class="review-form-name checkbox">
                        <div class="checkbox-item">
                            <input type="checkbox">
                            <p class="remember">
                                I agree all terms and condition in <span class="inner-text">ShopUs.</span></p>
                        </div>
                    </div>
                    <div class="login-btn text-center">
                        <x-primary-button class="ms-4">
                            {{ __('Register') }}
                        </x-primary-button>
                        {{-- <button>

                            <a href="{{route('register')}}" class="shop-btn">Create an Account</a>
                        </button> --}}

                         {{-- <button type="submit">Create an Account</button> --}}
                        <span class="shop-account">Already have an account ?<a href="{{route('login')}}">Log In</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- login-section-end --------------->

    </form>
@endsection
