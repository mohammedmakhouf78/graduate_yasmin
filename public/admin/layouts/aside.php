 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="index3.html" class="brand-link">
     <img src="<?= asset('adminLTE/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">AdminLTE 3</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="<?= asset('adminLTE/dist/img/user2-160x160') ?>.jpg" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="#" class="d-block"><?= $_SESSION['admin']['name'] ?></a>
       </div>
     </div>

     <!-- SidebarSearch Form -->
     <div class="form-inline">
       <div class="input-group" data-widget="sidebar-search">
         <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
         <div class="input-group-append">
           <button class="btn btn-sidebar">
             <i class="fas fa-search fa-fw"></i>
           </button>
         </div>
       </div>
     </div>

     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


         <li class="nav-item 
         <?=
          (getUrl() == getPage("users/create.php") ||
            getUrl() == getPage("users/index.php"))
            ? 'menu-open' : '' ?>">


           <a href="#" class="nav-link 
           <?=
            (getUrl() == getPage("users/create.php") ||
              getUrl() == getPage("users/index.php"))
              ? 'active' : '' ?>
           ">
             <i class="nav-icon fas fa-user"></i>
             <p>
               Users
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?= getPage("users/create.php") ?>" class="nav-link <?= getUrl() == getPage("users/create.php") ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Create</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= getPage("users/index.php") ?>" class="nav-link <?= getUrl() == getPage("users/index.php") ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>All Users</p>
               </a>
             </li>
           </ul>
         </li>




         <li class="nav-item 
         <?=
          (getUrl() == getPage("customers/create.php") ||
            getUrl() == getPage("customers/index.php"))
            ? 'menu-open' : '' ?>">
           <a href="#" class="nav-link 
           <?=
            (getUrl() == getPage("customers/create.php") ||
              getUrl() == getPage("customers/index.php"))
              ? 'active' : '' ?>
           ">
             <i class="nav-icon fas fa-user"></i>
             <p>
               Customers
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?= getPage("customers/create.php") ?>" class="nav-link <?= getUrl() == getPage("customers/create.php") ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Create</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= getPage("customers/index.php") ?>" class="nav-link <?= getUrl() == getPage("customers/index.php") ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>All Customers</p>
               </a>
             </li>
           </ul>
         </li>



         <li class="nav-item 
         <?=
          (getUrl() == getPage("workers/create.php") ||
            getUrl() == getPage("workers/index.php"))
            ? 'menu-open' : '' ?>">
           <a href="#" class="nav-link 
           <?=
            (getUrl() == getPage("workers/create.php") ||
              getUrl() == getPage("workers/index.php"))
              ? 'active' : '' ?>
           ">
             <i class="nav-icon fas fa-user"></i>
             <p>
               Workers
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?= getPage("workers/create.php") ?>" class="nav-link <?= getUrl() == getPage("workers/create.php") ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Create</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= getPage("workers/index.php") ?>" class="nav-link <?= getUrl() == getPage("workers/index.php") ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>All Workers</p>
               </a>
             </li>
           </ul>
         </li>




         <li class="nav-item 
         <?=
          (getUrl() == getPage("works/create.php") ||
            getUrl() == getPage("works/index.php"))
            ? 'menu-open' : '' ?>">
           <a href="#" class="nav-link 
           <?=
            (getUrl() == getPage("works/create.php") ||
              getUrl() == getPage("works/index.php"))
              ? 'active' : '' ?>
           ">
             <i class="nav-icon fas fa-user"></i>
             <p>
               Works
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?= getPage("works/create.php") ?>" class="nav-link <?= getUrl() == getPage("works/create.php") ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Create</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= getPage("works/index.php") ?>" class="nav-link <?= getUrl() == getPage("works/index.php") ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>All Works</p>
               </a>
             </li>
           </ul>
         </li>






         <li class="nav-item 
         <?=
          (getUrl() == getPage("work_images/create.php") ||
            getUrl() == getPage("work_images/index.php"))
            ? 'menu-open' : '' ?>">
           <a href="#" class="nav-link 
           <?=
            (getUrl() == getPage("work_images/create.php") ||
              getUrl() == getPage("work_images/index.php"))
              ? 'active' : '' ?>
           ">
             <i class="nav-icon fas fa-user"></i>
             <p>
               Work Images
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?= getPage("work_images/create.php") ?>" class="nav-link <?= getUrl() == getPage("work_images/create.php") ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Create</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= getPage("work_images/index.php") ?>" class="nav-link <?= getUrl() == getPage("work_images/index.php") ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>All Work Images</p>
               </a>
             </li>
           </ul>
         </li>





         <li class="nav-item 
         <?=
          (getUrl() == getPage("customers_workers/create.php") ||
            getUrl() == getPage("customers_workers/index.php"))
            ? 'menu-open' : '' ?>">
           <a href="#" class="nav-link 
           <?=
            (getUrl() == getPage("customers_workers/create.php") ||
              getUrl() == getPage("customers_workers/index.php"))
              ? 'active' : '' ?>
           ">
             <i class="nav-icon fas fa-user"></i>
             <p>
               Customers Jobs
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?= getPage("customers_workers/create.php") ?>" class="nav-link <?= getUrl() == getPage("customers_workers/create.php") ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Create</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= getPage("customers_workers/index.php") ?>" class="nav-link <?= getUrl() == getPage("customers_workers/index.php") ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>All Customers Jobs</p>
               </a>
             </li>
           </ul>
         </li>




       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>