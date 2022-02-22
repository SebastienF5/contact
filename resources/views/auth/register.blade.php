@extends('layouts.app')
@section('content')
  <section id="register">
      <div class="container">
          <div class="row">
            <div class="middle-container col-12 mx-auto d-flex justify-content-space-between shadow"">
                
               <div class="col-12 col-md-12 col-lg-5 login-form">
               <form method="POST" action="{{ route('register') }}">
                @csrf
                <h3>Enregistrer</h3>
                    <!-- Email Address -->
                    <div class="mb-4">
                 
                 <input id="name" class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="nom"  autofocus>
                 <div id="name" class="form-text">
                 @if($errors->has('name'))
                     <span class="error"> {{$errors->first('name')}}</span>
                    @endif
                 </div>
             </div>

                <!-- Email Address -->
                <div class="mb-4">
                 
                    <input id="email" class="form-control" type="email" name="email" value="{{old('email')}}" placeholder="email" autofocus>
                    <div id="email" class="form-text">
                    @if($errors->has('email'))
                     <span class="error"> {{$errors->first('email')}}</span>
                    @endif
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-4">
               
                    <input id="password" class="form-control"
                                    type="password"
                                    name="password"
                                     autocomplete="current-password" placeholder="mot de passe">
             <div id="password" class="form-text">
             @if($errors->has('password'))
                     <span class="error"> {{$errors->first('password')}}</span>
                    @endif
             </div>
             
                </div>

                      <!-- Password confirmation -->
                      <div class="mb-3">
               
               <input id="password" class="form-control"
                               type="password"
                               name="password_confirmation"
                                autocomplete="current-password" placeholder="confirmer mot de passe">
        <div id="password" class="form-text">
        @if($errors->has('password_confirmation'))
                     <span class="error"> {{$errors->first('password_confirmation')}}</span>
                    @endif
        </div>
        
           </div>
        
                <div class="mb-3">
                    <input type="submit" class="btn bg-bleu col-md-5" value="Creer Compte">
                </div>
 

            </form>
               </div>
          <div class="col-5 col-md-12 col-lg-6 login-infos text-center register-infos" data-aos="flip-up" data-aos-delay="200">
          <p class=""  data-aos="zoom-in" data-aos-delay="200"> <i class="fas fa-address-book as-logo"></i></p>
             <p class="animate__animated animate__fadeInDown">Connectez-vous a votre compte !</p>
             <a href="{{route('login')}}" class="btn btn-jaune">Connection</a>
           
          </div>
      </div>
      </div>
     
      </div>
  </section>
       
@endsection

