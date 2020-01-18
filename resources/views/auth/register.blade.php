@extends('layouts.app')

@section('content')
<b-container>
    <b-row class="justify-content-md-center">
        <b-col md="8">
            <b-card header="{{ __('Register') }}">

            @if ($errors->any())
                <b-alert show variant="danger">
                    @foreach ($errors->all() as $error)
                    <ul class="fa-ul mb-0">
                        <li><i class="fa-li fa fa-times"></i>{{ $error }}</li>
                    </ul>
                    @endforeach
                </b-alert>
            @endif

                <b-form method="POST" action="{{ route('register') }}">

                    @csrf
                    <b-row class="form-group">
                        <label for="input-valid" class="col-md-4 col-form-label text-md-right">
                                {{ __('Name') }}
                        </label>
                        
                        <b-col md="6">
                            <b-form-input
                                id="name"
                                type="name"
                                name="name" 
                                value="{{ old('name') }}"
                                :state="{{ $errors->has('name') ? 'false' : 'null' }}"
                                autofocus
                                required
                            /> 
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif                       
                        </b-col>
                    </b-row>

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
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif                       
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
                        <label for="input-valid" class="col-md-4 col-form-label text-md-right">
                                {{ __('Confirm Password') }}
                        </label>
                        <b-col md="6">
                            <b-form-input
                                id="password-confirm"
                                type="password"
                                name="password_confirmation" 
                                required
                            />                        
                        </b-col>
                    </b-row>

                    <b-row class="form-group">
                        <b-col md="8" offset-md="4">
                            <b-button type="submit" variant="primary">{{ __('Register') }}</b-button>                   
                        </b-col>
                    </b-row>
                </b-form>
            </b-card>
        </b-col>
    </b-row>
</b-container>
@endsection
