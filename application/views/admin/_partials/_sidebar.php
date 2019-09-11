<!-- Sidebar -->
<ul class="sidebar navbar-nav" id="accordionSidebar">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Overview</span>
        </a>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == 'topic' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/topic') ?>">
            <i class="fas fa-fw fa-comments"></i>
            <span>Topics</span>
        </a>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == 'user' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/user') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span></a>
    </li>
   
    <li class="nav-item <?php echo $this->uri->segment(2) == 'settings' ? 'active': '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Settings</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo site_url('admin/settings/role') ?>">Role</a>
            <a class="collapse-item" href="<?php echo site_url('admin/settings/parameter') ?>">Parameter</a>
          </div>
        </div>
      </li>

      <!-- <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'topic' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Topics</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/topic/add') ?>">New Topic</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/topic') ?>">List Topics</a>
        </div>
    </li> -->
</ul>
<!-- End Sidebar -->