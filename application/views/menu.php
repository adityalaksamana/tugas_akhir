<?php
    if($this->session->userdata['level']=="admin"){
?>

    <li class="sidebar-title">Menu</li>

    <li id="dashboard" class="sidebar-item">
        <a href="<?=base_url()?>" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li id="perangkat" class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-collection-fill"></i>
            <span>Perangkat</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item ">
                <a href="<?=base_url('device')?>">Data Perangkat</a>
            </li>
            <li class="submenu-item ">
                <a href="<?=base_url('device/add')?>">Tambah Perangkat</a>
            </li>
        </ul>
    </li>

    <li id="client" class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-people-fill"></i>
            <span>Client</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item ">
                <a href="<?=base_url('client')?>">Data Client</a>
            </li>
            <li class="submenu-item ">
                <a href="<?=base_url('client/add')?>">Tambah Client</a>
            </li>
        </ul>
    </li>

    <li class="sidebar-title">Akun</li>

    <li id="profil" class="sidebar-item  ">
        <a href="<?=base_url('profile')?>" class='sidebar-link'>
            <i class="bi bi-person-fill"></i>
            <span>Profil</span>
        </a>
    </li>

<?php
    }else if($this->session->userdata['level']=="xadmin"){
?>

    <li class="sidebar-title">Menu</li>

    <li id="dashboard" class="sidebar-item">
        <a href="<?=base_url()?>" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li id="perangkat" class="sidebar-item">
        <a href="<?=base_url('device')?>" class='sidebar-link'>
            <i class="bi bi-collection-fill"></i>
            <span>Perangkat</span>
        </a>
    </li>

    <li id="admin" class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-people-fill"></i>
            <span>Client</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item ">
                <a href="<?=base_url('client')?>">Data Client</a>
            </li>
            <li class="submenu-item ">
                <a href="<?=base_url('client/add')?>">Tambah Client</a>
            </li>
        </ul>
    </li>

    <li class="sidebar-title">Akun</li>

    <li id="profil" class="sidebar-item  ">
        <a href="<?=base_url('profile')?>" class='sidebar-link'>
            <i class="bi bi-person-fill"></i>
            <span>Profil</span>
        </a>
    </li>

<?php
    }else if($this->session->userdata['level']=="client"){
?>
    <li class="sidebar-title">Menu</li>

    <li id="dashboard" class="sidebar-item">
        <a href="<?=base_url()?>" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="sidebar-title">Akun</li>

    <li id="profil" class="sidebar-item  ">
        <a href="<?=base_url('profile')?>" class='sidebar-link'>
            <i class="bi bi-person-fill"></i>
            <span>Profil</span>
        </a>
    </li>

<?php
    }
?>
    <li class="sidebar-item  ">
        <a role="button" data-bs-toggle="modal" data-bs-target="#default" href="" class='sidebar-link'>
            <i class="bi bi-arrow-bar-left"></i>
            <span>Logout</span>
        </a>
    </li>

    <!-- <li class="sidebar-item  ">
        <a role="button" data-bs-toggle="modal" data-bs-target="#default" href="<?=base_url('login/logout/')?>" class='sidebar-link'>
            <i class="bi bi-arrow-bar-left"></i>
            <span>Logout</span>
        </a>
    </li> -->

<!--     <li class="sidebar-item  ">
        <button class="sidebar-link" data-bs-toggle="modal" data-bs-target="#default">
            <i class="bi bi-arrow-bar-left"></i>
            Launch Modal
        </button>
    </li> -->

    