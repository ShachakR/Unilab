<div class="side-nav">
    <a class="nav-item" href="{{ route('home') }}"> 
        <i class="{{ request()->is('home') ? 'material-icons' : 'material-icons-outlined' }} nv-icon-36">home</i>  
        <span class="{{ request()->is('home') ? 'active' : '' }}">Home</span> 
    </a>
    <a class="nav-item" href="{{ route('profile', Auth::user()->username ) }}"> 
        <i class="{{ request()->is('profile', Auth::user()->username ) ? 'material-icons' : 'material-icons-outlined' }} nv-icon-36">person</i>  
        <span class="{{ request()->is('profile', Auth::user()->username ) ? 'active' : '' }}">Profile</span> 
     </a>
    <a class="nav-item" href="#"> <i class="material-icons-outlined nv-icon-36">class</i>  <span>Courses</span></a></li>
    <a class="nav-item" href="#"> <i class="material-icons-outlined nv-icon-36">face</i>  <span>Professors</span></a></li>
    <a class="nav-item" href="#"> <i class="material-icons-outlined nv-icon-36">bookmarks</i>  <span>Bookmarks</span></a></li>
</div>