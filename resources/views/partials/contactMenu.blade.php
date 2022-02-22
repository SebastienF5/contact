<div class="col-12 col-md-12 col-lg-2 text-center shadow-lg menu-contact">
         <div class="item-menu">
             <div class="user-info">
                <span><i class="fas fa-address-book as-logo"></i></span><br>
                <span>{{Auth::user()->name}}</span>
             </div>
                <ul class="list-unstyled">
                    <li><a href="{{route('addcontact')}}"><i class="fas fa-plus-circle"></i><br/>Ajouter </a></li>
                    <li><a href="{{route('contact')}}"><i class="fas fa-list"></i><br/>Lister </a></li>
                </ul>
            <div class="block-logout">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                    {{ csrf_field() }}
                    
                    <input type="submit" name="logout" value="Deconnecter" class="btn logout">
                </form>
            </div>
         </div>
 </div>