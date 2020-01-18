@extends('layouts.app')

@section('content')
<b-container>
    <b-row class="justify-content-md-center">
        <b-col md="8">
            <b-card header="{{ __('Login') }}">

            @if ($errors->any())
                <b-alert show variant="danger">
                    @foreach ($errors->all() as $error)
                    <ul class="fa-ul mb-0">
                        <li><i class="fa-li fa fa-times"></i>{{ $error }}</li>
                    </ul>
                    @endforeach
                </b-alert>
             @endif
                
                <b-form method="POST" action="{{ route('login') }}">

                    @csrf

                    <b-row class="form-group">
                        
                        <label for="input-valid" class="col-md-4 col-form-label text-md-right">
                                {{ __('E-Mail Address') }}
                        </label>
                        
                        <b-col md="6">
                            <b-form-input
                                id="email"
                                type="email"
                                name="email" 
                                value="{{ old('email') }}"
                                :state="{{ $errors->has('email') ? 'false' : 'null' }}"
                                autofocus
                                required
                            />
                        </b-col>
                    </b-row>

                    <b-row class="form-group">
                        
                        <label for="input-valid" class="col-md-4 col-form-label text-md-right">
                                {{ __('Password') }}
                        </label>
                        
                        <b-col md="6">
                            <b-form-input
                                id="password"
                                type="password"
                                name="password" 
                                :state="{{ $errors->has('password') ? 'false' : 'null' }}"
                                required
                            />
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif                       
                        </b-col>
                    </b-row>

                    <b-row class="form-group">
                        <b-col md="6" offset-md="4">
                            <b-form-checkbox id="remember" name="remember" {{ old('remember') ? 'checked="true"' : '' }}>
                                {{ __('Remember Me') }}
                            </b-form-checkbox>                       
                        </b-col>
                    </b-row>

                    <b-row class="form-group">
                        <b-col md="8" offset-md="4">
                            <b-button type="submit" variant="primary">{{ __('Login') }}</b-button>
                            @if (Route::has('password.request'))
                                <b-button href="{{ route('password.request') }}" variant="link">{{ __('Forgot Your Password?') }}</b-button>
                            @endif                     
                        </b-col>
                    </b-row>

                </b-form>
            </b-card>
        </b-col>
    </b-row>
</b-container>
@endsection
