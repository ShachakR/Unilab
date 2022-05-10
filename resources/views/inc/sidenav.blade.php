<div class="side-nav">
    <a class="nav-item" href="{{ route('home') }}"> 
        <i class="{{ request()->is('home') ? 'material-icons' : 'material-icons-outlined' }} nv-icon-36">home</i>  
        <span class="{{ request()->is('home') ? 'fw-bold' : '' }}">Home</span> 
    </a>
    @if(Auth::check())
    <a class="nav-item" href="{{ route('profile', Auth::user()->username ) }}"> 
        <i class="{{ request()->is('profile', Auth::user()->username ) ? 'material-icons' : 'material-icons-outlined' }} nv-icon-36">person</i>  
        <span class="{{ request()->is('profile', Auth::user()->username ) ? 'fw-bold' : '' }}">Profile</span> 
     </a>
     @endif 
     <a class="nav-item" href="{{ route('courses') }}"> 
        <i class="{{ request()->is('courses') ? 'material-icons' : 'material-icons-outlined' }} nv-icon-36">class</i>  
        <span class="{{ request()->is('courses') ? 'fw-bold' : '' }}">Courses</span> 
     </a>
     <a class="nav-item" href="{{ route('professors') }}"> 
        <i class="{{ request()->is('professors') ? 'material-icons' : 'material-icons-outlined' }} nv-icon-36">face</i>  
        <span class="{{ request()->is('professors') ? 'fw-bold' : '' }}">Professors</span> 
     </a>
    <a class="nav-item" href=""> <i class="material-icons-outlined nv-icon-36">bookmarks</i>  <span>Bookmarks</span></a></li>
</div>