<div class="side-nav">
    <a id="home" class="nav-item" href="{{ route('home') }}"> 
        <i id="home-0"class="{{ request()->is('home') ? 'material-icons' : 'material-icons-outlined' }} nv-icon-36">home</i>  
        <span id="home-1"class="{{ request()->is('home') ? 'fw-bold' : '' }}">Home</span> 
    </a>
    @if(Auth::check())
    <a id="profile" class="nav-item" href="{{ route('profile', Auth::user()->username ) }}"> 
        <i id="profile-0"class="{{ request()->is('profile', Auth::user()->username ) ? 'material-icons' : 'material-icons-outlined' }} nv-icon-36">person</i>  
        <span id="profile-1"class="{{ request()->is('profile', Auth::user()->username ) ? 'fw-bold' : '' }}">Profile</span> 
     </a>
     @endif 
     <a id="courses" class="nav-item" href="{{ route('courses') }}"> 
        <i id="courses-0"class="{{ request()->is('courses') ? 'material-icons' : 'material-icons-outlined' }} nv-icon-36">class</i>  
        <span id="courses-1"class="{{ request()->is('courses') ? 'fw-bold' : '' }}">Courses</span> 
     </a>
     <a id="professors" class="nav-item" href="{{ route('professors') }}"> 
        <i id="professors-0"class="{{ request()->is('professors') ? 'material-icons' : 'material-icons-outlined' }} nv-icon-36">face</i>  
        <span id="professors-1"class="{{ request()->is('professors') ? 'fw-bold' : '' }}">Professors</span> 
     </a>
    <a id="bookmarks"class="nav-item" href=""> 
        <i id="bookmarks-0" class="material-icons-outlined nv-icon-36">bookmarks</i>  
        <span id="bookmarks-1">Bookmarks</span>
    </a>
</div>
{{-- <script src="{{ URL::asset('/js/routeLoading/sideNavRoutes.js') }}"></script> --}}