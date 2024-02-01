 <nav class="navbar navbar-expand-md navbar-3d" id="my-nav">
  
  <div class="container-fluid">
    
    <a class="navbar-brand logo-nav pe-1" href="{{route('homePage')}}"> <img src="/media/Presto-logo.png" class="img-nav-custom pb-1" alt="">Presto.it</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse text-end navbar-collapse" id="navbarSupportedContent">
      
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
     
        
        <li class="nav-item">
          <a class="nav-link " href="{{route('createAnnouncement')}}">{{__('ui.createAnnouncement')}}</a>
        </li>
        @auth
        @if (Auth::user()->is_revisor)
        <li class="nav-item">
          <a class="nav-link text-end btn btn-revisor btn-sm position-relative" aria-current="page" href="{{route('revisorIndex')}}">
            {{__('ui.revisorZone')}}
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-blue-custom">{{App\Models\Announcement::toBeRevisionedCount()}}
              <span class="visually-hidden">messaggi non letti</span>
            </span>
          </a>
        </li>
        @endif
        @endauth
        <li class="nav-item">
          <a class="nav-link " href="{{route('workWithUs')}}">{{__('ui.workWithUs')}}</a>
        </li>
        
       
      </ul>
      
      {{-- FORSE DA INSERIRE --}}
      <form method="GET" action="{{route('searchAnnouncements')}}" class="d-flex pe-3" role="search">
        <input name="searched" class="form-control me-2" id="expanded-form" type="search" placeholder="{{__('ui.search')}}" aria-label="Search">
        <button class="btn btn-search-navbar bg-blue-custom" type="submit">{{__('ui.search')}}</button>
      </form>
      

     
      @guest
      <div class="nav-item dropdown nav-dropdown">
        <ul class="nav-link dropdown-toggle m-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{__('ui.helloNav')}}
        </ul>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item " href="{{route('register')}}">{{__('ui.register/loginNav')}}</a></li>
          {{-- <li><a class="dropdown-item " href="{{route('login')}}"> Login </a></li> --}}
        </ul>
      </div>
      @else
      <div class="nav-item dropdown ">
        <ul class="nav-link dropdown-toggle m-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{__('ui.hello')}}, {{Auth::user()->name}}</ul>
        <ul class="dropdown-menu  dropdown-menu-end">
          <li><a class="dropdown-item " href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>
          <form id="form-logout" method="POST" action="{{route('logout')}}">@csrf</form>
        </ul>
      </div>
      @endguest
      <div class="nav-item dropdown mx-2">
        <ul class="nav-link dropdown flag-nav-custom m-0 pt-1 " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          @if(session('locale')=='es')
            <li><x-_locale lang="es"/></li>
          @elseif(session('locale')=='en')
            <li><x-_locale lang="en"/></li>
          @else
            <li><x-_locale lang="it"/></li>
          @endif
        </ul>
        <ul class="dropdown-menu  bg-flag-custom text-end  dropdown-menu-end ">
          <li><x-_locale lang="en"/></li>
          <li><x-_locale lang="es"/></li>
          <li><x-_locale lang="it"/></li>
        </ul>
        
      </div>

    </div>
  </div>
  
  </nav>
  