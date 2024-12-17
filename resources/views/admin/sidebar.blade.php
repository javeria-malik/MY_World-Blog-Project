<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="admincss/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Javeria Malik</h1>
            <p>Backend Developer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="http://127.0.0.1:8000/"> <i class="icon-home"></i>Home </a></li>
                <li><a href="{{url('post_page')}}"> <i class="icon-grid"></i>Add Post</a></li>
                <li><a href="{{url('/show_post')}}"> <i class="fa fa-bar-chart"></i>Show Post </a></li>
                <li><a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li>
                
                <div class="sidebar-links">
             <ul>
        <!-- Other links -->
               <li>
            <a href="{{ url('categories') }}">Manage Categories</a>
             </li>
             </ul>
            </div>
        
        
      </nav>