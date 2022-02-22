<section id="topBar">

        <div class="col-12 col-md-12 col-lg-12">
            <nav class="navbar navbar-light bg-light">
          
         <a href="{{route('contact')}}" class="btn btn-jaune"><i class="fas fa-address-book as-logo"></i></a>
         <div class="btn-group dropstart">
  <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="fas fa-user"></i>
  </button>
  <ul class="dropdown-menu">
    <li>{{Auth::user()->name}}</li>
    <li>
   
      <form id="logout-form" action="{{ route('logout') }}" method="POST" >
          {{ csrf_field() }}
          
         <input type="submit" name="logout" value="Quitter" class="btn bg-red color--white">
     </form>
 
    </li>
  </ul>
</div>
        </div>
        </nav>
        </div>

   
</section>
