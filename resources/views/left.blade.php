 <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
		{!! HTML::image ("admintheme/dist/img/user2-160x160.jpg" , "User Image",array('class' => 'img-circle' )) !!}
        </div>
        <div class="pull-left info">
          <p>Chintan Doshi</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Devloper</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="dashbord">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
          </a>
        </li>
        <li><a href="{{ url() }}/emp"><i class="fa fa-circle-o text-red"></i> <span>Employee Section</span></a></li>
        <li><a href="{{ url() }}/news"><i class="fa fa-circle-o text-yellow"></i> <span>News Section</span></a></li>
        <li><a href="{{ url() }}/gallery"><i class="fa fa-circle-o text-aqua"></i> <span>Photo Gallery</span></a></li>
        <li><a href="{{ url() }}/logout"><i class="fa fa-circle-o text-green"></i> <span>Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>