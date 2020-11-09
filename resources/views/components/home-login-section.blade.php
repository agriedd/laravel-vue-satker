<div class="position-relative">
    <div class="login-section-prepend"></div>
    <div class="card shadow-lg border-0 mb-5">
        <div class="d-md-flex d-block">
            <div class="border-right d-md-block d-none" style="flex: 1 1 0">
                <div class="card-body h-100" style="background-image: url('{{ asset('img/random.jpg') }}'); background-position: center; background-size: cover;"></div>
            </div>
            <div style="max-width: 350px" class="w-100 py-3 pb-0 mx-auto">
                <div class="card-body">
                    <h4>
                        Form Login
                    </h4>
                    <div class="text-muted small" style="max-width: 200px">
                        Gunakan email dan password yang sudah didapat
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('home.login') }}">
                        @csrf
    
                        <div class="form-group">
                            <label for="email" class="small text-muted">Alamat Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="small text-muted">{{ __('Password') }}</label>
                            <div class="">
                                <div class="input-group">
                                    <input id="password" :type="type_password_field" class="form-control input-group-prepend @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <button class="btn btn-outline-secondary text-decoration-none input-group-append" type="button" @click="togglePassword">
                                        <div v-if="show_password">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                            </svg>
                                        </div>
                                        <div v-else>
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                            </svg>
                                        </div>
                                    </button>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group py-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    <small>
                                        Ingat saya pada perangkat ini
                                    </small>
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-0 pt-5">
                            <div class="d-flex">
                                <button type="submit" class="btn btn-primary ml-auto w-100 py-3 px-3 shadow">
                                    {{ __('Login') }}
                                </button>
                            </div>
    
                            {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
