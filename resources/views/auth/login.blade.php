@extends('layouts.app')
@section('content')
  <section id="login">
      <div class="container">
          <div class="row">
        
            <div class="middle-container col-12 mx-auto d-flex justify-content-space-between shadow"">
                
               <div class="col-12 col-md-12 col-lg-5 login-form">
               <form method="POST" action="{{ route('login') }}">
                @csrf
                <h3>Connexion</h3>
                <!-- Email Address -->
                <div class="mb-4">
                 
                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" placeholder="email"  autofocus>
                    <div id="email-error" class="form-text">
                    @if($errors->has('email'))
                     <span class="error"> {{$errors->first('email')}}</span>
                    @endif
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3">
               
                    <input id="password" class="form-control"
                                    type="password"
                                    name="password"
                                     autocomplete="current-password" placeholder="password">
             <div id="password-error" class="form-text">
                    @if($errors->has('password'))
                       <span class="error"> {{$errors->first('password')}}</span>
                    @endif
             </div>
             
                </div>
          
                <!-- Remember Me -->
                <div class="block mb-2">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class=" text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn bg-bleu col-md-5" value="connecter">
                </div>
           

            </form>
               </div>
          <div class="col-5 col-md-12 col-lg-6 login-infos text-center" >
          <p class="" data-aos="zoom-in" data-aos-delay="200"> <i class="fas fa-address-book as-logo"></i></p>
             <p class="text-center animate__animated animate__fadeInDown">Creer un compte afin d'utiliser notre <br>
                 Systeme de gestion de contact  <br>
               </p>
                 <a href="{{route('register')}}" class="btn btn-jaune animate__animated animate__fadeInUp">Enregister</a>
          </div>
      </div>
      </div>
     
      </div>
  </section>
       
@endsection

