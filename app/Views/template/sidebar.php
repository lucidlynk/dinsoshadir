<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="/img/buleleng.png" width="50px" alt="">
                </div>
                <div class="sidebar-brand-text mx-4"><font size='2'>PUSKESSOS</font><br><font size='2'>C-G-T</font></div>
            </a>
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <?php if( in_groups('admin')): ?>
            <li class="nav-item">
                <a class="nav-link" href="/adm">
                    <i class="fas fa-users"></i>
                    <span>User List</span>
                </a>
            </li>      
            <?php endif; ?>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>User</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data User:</h6>
                        <a class="collapse-item" href="/user/profile">Profile</a>
                        <a class="collapse-item" href="/user/edit/<?= user()->id; ?>">Edit Profile</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            
            <!-- Heading -->
            <!--
            <div class="sidebar-heading">
                Interface
            </div>
            -->
            
            

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>KIS</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kepesertaan:</h6>
                        <a class="collapse-item" href="/kis">KIS APBD</a>
                        <a class="collapse-item" href="/kis/apbn">KIS APBN</a>
                        <a class="collapse-item" href="/kis/input">PESERTA BARU</a>
                        <a class="collapse-item" href="/kis/usul">DATA USULAN KIS</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Logout -->
            <li class="nav-item">
                <a class="nav-link" href="/pmks/input">
                <i class="fas fa-sign-out-alt"></i>
                <span>PPKS</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Logout -->
            <li class="nav-item">
                <a class="nav-link" href="/logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            

        </ul>