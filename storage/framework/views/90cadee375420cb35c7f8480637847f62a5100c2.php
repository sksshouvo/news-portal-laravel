<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name"><?php echo e(Auth::user()->name); ?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
   
    <ul class="nav menu">
        
        <?php if(strpos(Request::url(),"update_news")): ?>
        <li class="parent"><a data-toggle="collapse" href="#sub-item" >
            <em class="fa fa-navicon">&nbsp;</em>News<span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item">
                <li><a class="" href="../news">
                    <span class="fa fa-arrow-right">&nbsp;</span>News Post</a></li>
                
                <li><a class="" href="../edit_news">
                    <span class="fa fa-arrow-right">&nbsp;</span>News List
                </a></li>
              
               
            </ul>
        </li> 
  
          <li <?php echo e((Request::is('users') ? 'class=active' : '')); ?> ><a href="../users"><em class="fa fa-user">&nbsp;</em> Users</a></li>    
          <li <?php echo e((Request::is('designation') ? 'class=active' : '')); ?> ><a href="../designation"><em class="fa fa-briefcase">&nbsp;</em> Designation</a></li>
          <li <?php echo e((Request::is('concern') ? 'class=active' : '')); ?> ><a href="../concern"><em class="fa fa-cog">&nbsp;</em> Concern</a></li>
          <li <?php echo e((Request::is('main_settings') ? 'class=active' : '')); ?> ><a href="../main_settings"><em class="fa fa-cogs">&nbsp;</em> Main Settings</a></li>
          <li <?php echo e((Request::is('social_medias') ? 'class=active' : '')); ?> ><a href="../social_medias"><em class="fa fa-user">&nbsp;</em>Social Media</a></li>
          <li <?php echo e((Request::is('categories') ? 'class=active' : '')); ?> ><a href="../categories"><em class="fa fa-list">&nbsp;</em>Category</a></li>
          <li <?php echo e((Request::is('ads') ? 'class=active' : '')); ?> ><a href="../ads"><em class="fa fa-film">&nbsp;</em>Ads</a></li>
          <li class="parent"><a data-toggle="collapse" href="#sub-item-2" >
            <em class="fa fa-briefcase">&nbsp;</em>Set As <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-2">
                <li <?php echo e((Request::is('set_as_breaking_news') ? 'class=active' : '')); ?> ><a href="../set_as_breaking_news"><em class="fa fa-arrow-right">&nbsp;</em>For Breaking News</a></li> 
                <li <?php echo e((Request::is('set_as') ? 'class=active' : '')); ?> ><a href="../set_as"><em class="fa fa-arrow-right">&nbsp;</em>For home page</a></li> 
                <li><a class="set_as_cat" href="../set_as_cat">
                    <span class="fa fa-arrow-right">&nbsp;</span>For categories
                </a></li>
                <li><a class="set_as_sub_cat" href="../set_as_sub_cat">
                    <span class="fa fa-arrow-right">&nbsp;</span>For Sub Categories
                </a></li>
               
            </ul>
          </li>
          <li class="parent"><a data-toggle="collapse" href="#sub-item-1" >
              <em class="fa fa-navicon">&nbsp;</em> Menu Permission <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
              </a>
              <ul class="children collapse" id="sub-item-1">
                  <li><a class="" href="../menus">
                      <span class="fa fa-arrow-right">&nbsp;</span>Menu / Submenu
                  </a></li>
                  
                  <li><a class="" href="../user_permissions">
                      <span class="fa fa-arrow-right">&nbsp;</span> User wise
                  </a></li>
                  <li><a class="" href="../desg_permissions">
                      <span class="fa fa-arrow-right">&nbsp;</span> Designation wise
                  </a></li>
                 
              </ul>
          </li> 
        
        <?php else: ?>
        <li <?php echo e((Request::is('dashboard') ? 'class=active' : '')); ?> ><a href="dashboard"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
        <li class="parent"><a data-toggle="collapse" href="#sub-item" >
          <em class="fa fa-navicon">&nbsp;</em>News<span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
          </a>
          <ul class="children collapse" id="sub-item">
              <li><a class="" href="./news">
                  <span class="fa fa-arrow-right">&nbsp;</span>News Post</a></li>
              
              <li><a class="" href="./edit_news">
                  <span class="fa fa-arrow-right">&nbsp;</span>News List
              </a></li>
            
             
          </ul>
      </li> 

        <li <?php echo e((Request::is('users') ? 'class=active' : '')); ?> ><a href="./users"><em class="fa fa-user">&nbsp;</em> Users</a></li>    
        <li <?php echo e((Request::is('designation') ? 'class=active' : '')); ?> ><a href="./designation"><em class="fa fa-briefcase">&nbsp;</em> Designation</a></li>
        <li <?php echo e((Request::is('concern') ? 'class=active' : '')); ?> ><a href="./concern"><em class="fa fa-cog">&nbsp;</em> Concern</a></li>
        <li <?php echo e((Request::is('main_settings') ? 'class=active' : '')); ?> ><a href="./main_settings"><em class="fa fa-cogs">&nbsp;</em> Main Settings</a></li>
        <li <?php echo e((Request::is('social_medias') ? 'class=active' : '')); ?> ><a href="./social_medias"><em class="fa fa-user">&nbsp;</em>Social Media</a></li>
        <li <?php echo e((Request::is('categories') ? 'class=active' : '')); ?> ><a href="./categories"><em class="fa fa-list">&nbsp;</em>Category</a></li>
        <li <?php echo e((Request::is('ads') ? 'class=active' : '')); ?> ><a href="./ads"><em class="fa fa-film">&nbsp;</em>Ads</a></li>
      
        <li class="parent"><a data-toggle="collapse" href="#sub-item-2" >
            <em class="fa fa-briefcase">&nbsp;</em>Set As <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-2">
                <li <?php echo e((Request::is('set_as_breaking_news') ? 'class=active' : '')); ?> ><a href="./set_as_breaking_news"><em class="fa fa-arrow-right">&nbsp;</em>For Breaking News</a></li> 
                <li <?php echo e((Request::is('set_as') ? 'class=active' : '')); ?> ><a href="./set_as"><em class="fa fa-arrow-right">&nbsp;</em>For home page</a></li> 
                <li><a class="set_as_cat" href="./set_as_cat">
                    <span class="fa fa-arrow-right">&nbsp;</span>For categories
                </a></li>
                <li><a class="" href="./set_as_sub_cat">
                    <span class="fa fa-arrow-right">&nbsp;</span>For Sub Categories
                </a></li>
               
            </ul>
        </li> 
        <li class="parent"><a data-toggle="collapse" href="#sub-item-1" >
            <em class="fa fa-navicon">&nbsp;</em> Menu Permission <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li><a class="" href="./menus">
                    <span class="fa fa-arrow-right">&nbsp;</span>Menu / Submenu
                </a></li>
                
                <li><a class="" href="./user_permissions">
                    <span class="fa fa-arrow-right">&nbsp;</span> User wise
                </a></li>
                <li><a class="" href="./desg_permissions">
                    <span class="fa fa-arrow-right">&nbsp;</span> Designation wise
                </a></li>
               
            </ul>
        </li> 
        <?php endif; ?>
        
      
        <li>  <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          <em class="fa fa-sign-out">&nbsp;</em> <?php echo e(__('Logout')); ?>

         </a>

         <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
             <?php echo csrf_field(); ?>
         </form></li>
         
    </ul>
</div><!--/.sidebar-->