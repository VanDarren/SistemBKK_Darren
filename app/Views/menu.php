<?php
// Get the user ID from the session
$id_user = session()->get('id');

// Get the user's photo from the database
$model = new \App\Models\bkkmodel();
$user = $model->getWhere('user', ['id_user' => $id_user]);

// Define the path to the user's photo
$photoPath = 'images/user/' . $user->foto;

// Check if the user's photo exists, otherwise use the default photo
if (!empty($user->foto) && file_exists($photoPath)) {
    $profilePhoto = base_url($photoPath);
} else {
    $profilePhoto = base_url('images/user/user.png'); // Default photo
}
?>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
    <div class="sidebar_blog_1">
        <div class="sidebar-header">
            <div class="logo_section">
                <a href="<?=base_url('home/dashboard')?>"><img class="logo_icon img-responsive" src="<?=base_url("images/logo/logo_icon.png")?>" alt="#" /></a>
            </div>
        </div>
        <div class="sidebar_user_info">
    <div class="icon_setting"></div>
    <div class="user_profle_side">
        <div class="user_img"><img class="img-responsive" src="<?= $profilePhoto ?>" alt="#" /></div>
        <div class="user_info">
            <h6><?= session()->get('username') ?></h6>
            <p><span class="online_animation"></span> Online</p>
        </div>
    </div>
</div>
        <?php if (isset($showRegisterAlert) && $showRegisterAlert): ?>
    <div class="alert alert-warning" role="alert">
        Anda perlu mendaftar sebagai siswa sebelum mengakses menu lain.
         <a href="<?= base_url('home/registersiswa') ?>" class="btn btn-link">Daftar Sekarang</a>
    </div>
<?php endif; ?>

    </div>
    <div class="sidebar_blog_2">
    <h4>General</h4>
    <ul class="list-unstyled components">
        <li class="active">
            <a href="<?=base_url('home/dashboard')?>"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
        </li>
        <li>
    <?php 
    $id_level = session()->get('id_level'); 
    if ($id_level == 3) {
        // Check if the alert should be shown
        if (!$showRegisterAlert): ?>
            <a href="<?= base_url('home/lowongan') ?>"><i class="fa fa-briefcase orange_color"></i> <span>Lowongan</span></a>
        <?php else: ?>
            <a href="<?= base_url('home/error404') ?>" class="disabled"><i class="fa fa-briefcase orange_color"></i> <span>Lowongan</span></a>
        <?php endif; 
    } else {
        // For users with id_level 1 and 2, allow access without alert
        ?>
        <a href="<?= base_url('home/lowongan') ?>"><i class="fa fa-briefcase orange_color"></i> <span>Lowongan</span></a>
    <?php } ?>
</li>
<?php if(session()->get('id_level')== '2' ){ ?>
<li>
    
    <?php 
    $id_level = session()->get('id_level'); 
    $id_user = session()->get('id'); // Ambil id_user dari sesi
    if ($id_level == 2): // Hanya tampilkan untuk id_level 2 ?>
        <a href="<?= base_url('home/detailPerusahaan2/' . $id_user) ?>"><i class="fa fa-building purple_color"></i> <span>Perusahaan</span></a>
    <?php else: ?>
        <a href="<?= base_url('home/error404') ?>" class="disabled"><i class="fa fa-building purple_color"></i> <span>Perusahaan</span></a>
    <?php endif; ?>
</li>
<?php } ?>

<?php if(session()->get('id_level')== '1' ){ ?>
        <li>
            <a href="<?=base_url('home/daftaruser')?>"><i class="fa fa-users blue2_color"></i> <span>Daftar User</span></a>
        </li>
        <li>
            <a href="<?=base_url('home/setting')?>"><i class="fa fa-cog yellow_color"></i> <span>Setting</span></a>
        </li>
        <li>
            <a href="<?=base_url('home/logActivity')?>"><i class="fa fa-list-alt red_color"></i> <span>Log Activity</span></a>
        </li>
        <?php } ?>
        <?php 
$id_user = session()->get('id');
$model = new \App\Models\bkkmodel();
$perusahaan = $model->getWhere('perusahaan', ['id_user' => $id_user]);

if (!empty($perusahaan)) {
    $id_perusahaan = $perusahaan->id_perusahaan;  // Access the property directly since it's an object
} else {
    $id_perusahaan = null;
}
?>
<?php if(session()->get('id_level')== '2' ){ ?>
<li>
    <?php if ($id_perusahaan): ?>
        <a href="<?= base_url('home/daftarLamaran/' . $id_perusahaan) ?>"><i class="fa fa-paper-plane red_color"></i> <span>Lamaran</span></a>
    <?php else: ?>
        <a href="<?= base_url('home/error404') ?>" class="disabled"><i class="fa fa-paper-plane red_color"></i> <span>Lamaran</span></a>
    <?php endif; ?>
</li>
<?php } ?>
    </ul>
</div>

</nav>

            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
            <!-- topbar -->
<div class="topbar">
   <nav class="navbar navbar-expand-lg navbar-light">
      <div class="full">
         <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
         <div class="logo_section">
            <a href="<?=base_url('home/dashboard')?>"><img class="img-responsive" src="<?= base_url('images/logo/' . $darren2->iconmenu) ?>" alt="#" /></a>
         </div>
         <div class="right_topbar">
            <div class="icon_info">
               <ul>
                  <!-- Other icons in the topbar -->
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell-o"></i>
                        <?php if (!empty($notifications)): ?>
                        <span class="badge bg-danger"><?= count($notifications) ?></span>
                        <?php endif; ?>
                     </a>
                     <!-- Notification dropdown -->
                     <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown" style="left: auto; right: 0; width: 490px; padding: 50px;">
                        <li class="dropdown-header d-flex justify-content-between align-items-center">
                           <span>Notifications</span>
                           <?php if (!empty($notifications)): ?>
                           <form method="post" action="<?= base_url('notifications/clear') ?>">
                              <button type="submit" class="btn btn-sm btn-link text-danger">Clear All</button>
                           </form>
                           <?php endif; ?>
                        </li>
                        <hr class="dropdown-divider">
                        <?php if (!empty($notifications)): ?>
                        <?php foreach ($notifications as $notification): ?>
                        <li class="p-2" style="font-size: 0.9rem; white-space: normal; padding: 5px 10px;">
                           <a class="dropdown-item d-flex justify-content-between align-items-center" href="#" style="color: inherit; text-decoration: none; padding: 10px;">
                              <div>
                                 <strong><?= $notification->judul_lowongan ?></strong><br>
                                 Lamaran anda: 
                                 <?php if ($notification->status == 'Diterima'): ?>
                                 <span class="text-success">Diterima</span>
                                 <?php else: ?>
                                 <span class="text-danger">Ditolak</span>
                                 <?php endif; ?>
                              </div>
                              <small class="text-muted"><?= date('d M, Y', strtotime($notification->created_at)) ?></small>
                           </a>
                        </li>
                        <hr class="dropdown-divider">
                        <?php endforeach; ?>
                        <?php else: ?>
                        <li><a class="dropdown-item text-center" href="#" style="font-size: 0.9rem;">Tidak ada notifikasi</a></li>
                        <?php endif; ?>
                     </ul>
                  </li>
               </ul>
               <ul class="user_profile_dd">
    <li>
        <a class="dropdown-toggle" data-toggle="dropdown">
            <img class="img-responsive rounded-circle" src="<?= $profilePhoto ?>" alt="#" />
            <span class="name_user"><?= session()->get('username') ?></span>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="<?= base_url('home/profile/' . $id_user) ?>">My Profile</a>
            <a class="dropdown-item" href="<?= base_url('home/setting') ?>">Settings</a>
            <a class="dropdown-item" href="<?= base_url('home/logactivity') ?>">Log Activity</a>
            <a class="dropdown-item" href="<?= base_url('home/logout') ?>"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
        </div>
    </li>
</ul>
            </div>
         </div>
      </div>
   </nav>
</div>
<!-- end topbar -->



               <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>      
                    
                      
                    
                       
   