@extends('layouts.app')
@section('content')

<section id="contact">
@include('partials.topbar')
    <div class="container-fluid">
        <div class="row">
           @include('partials.contactMenu')
         <div class="col-12 col-md-12 col-lg-11 body-contact text-center">
            <h1>@if(!empty($contactList)){{$contactList->count()}} contact(s) @endif</h1>
            <div class="col-12 col-md-4 col-lg-4 ">
                    @if(session('message'))
                      <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                </div>
            <div class="col-12 col-md-6 col-lg-7 mx-auto list-contact">
  
                <table class="table overflow-auto">
                <tbody>
                    @if($contactList->count()==0)
                      <tr><td>La liste de contact est vide !</td></tr>
                    @else
                     @foreach($contactList as $contact)
                      <tr class="shadow-sm">
                            <td><a href="{{route('getContact',['id'=>$contact->id])}}" ><img src="{{Storage::url($contact->image)}}" class="col-2 col-md-2 col-lg-2" alt="profil image"></a></td>
                            <td>{{$contact->name}}</td>
                            
                        </tr>
                     @endforeach
                    @endif
                 </tbody>
                </table>
            </div>
         </div>
        </div>
    </div>
</section>
@endsection