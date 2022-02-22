@extends('layouts.app')
@section('content')

<section id="addContact">

  <div class="container-fluid">
        <div class="row">
           @include('partials.contactMenu')
           <div class="col-12 col-md-12 col-lg-10 body-contact text-center">
    <h1>Modifier Contact</h1>
           <div class="col-12 col-md-12 col-lg-7 mx-auto">
             
           <form action="{{route('updateContact',['id'=>$getContact->id])}}" method="POST" enctype="multipart/form-data">
               @csrf
            <div class="mb-3">
              <input type="file" class="form-control col-md-1" id="image" value="{{$getContact->image}}" name="image" aria-describedby="imageHelp">
                    <div id="imageHelp" class="form-text">
                    @if($errors->has('image'))
                        <span class="error"> {{$errors->first('image')}}</span>
                    @endif
                    </div>
                <input type="text" hidden name="user_id" value="{{Auth::user()->id}}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" value="{{$getContact->name}}" aria-describedby="nameHelp" name="name">
                <div id="nameHelp" class="form-text">
                @if($errors->has('name'))
                       <span class="error"> {{$errors->first('name')}}</span>
                    @endif
                </div>
            </div>
             <div class="mb-3">
               <div class="row">
               <div class="col-6">
                <label for="number" class="form-label">Numero</label>
                <input type="text" class="form-control" id="numero" value="{{$getContact->number}}" name="number" aria-describedby="numberHelp">
                <div id="firstNameHelp" class="form-text">
                @if($errors->has('number'))
                       <span class="error"> {{$errors->first('number')}}</span>
                    @endif
                </div>
            </div>
            <div class="col-6">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" value="{{$getContact->email}}" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">
                @if($errors->has('email'))
                       <span class="error"> {{$errors->first('email')}}</span>
                    @endif
                </div>
            </div>
               </div>
             </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="adress" value="{{$getContact->adress}}" name="adress" aria-describedby="adressHelp">
                <div id="adressHelp" class="form-text">
                @if($errors->has('adress'))
                       <span class="error"> {{$errors->first('adress')}}</span>
                    @endif
                </div>
            </div>
         
            <input type="submit" class="btn btn-primary" value="Modifier ">
</form>
           </div>
        </div>
    </div>
    </div>
</section>
@endsection