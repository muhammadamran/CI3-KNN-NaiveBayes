<!--**********************************Sidebar start***********************************-->
<div class="nk-sidebar">
  <div class="nk-nav-scroll">
    <ul class="metismenu" id="menu">
      <li class="nav-label">NAVIGATION</li>
      <li class="<?= $this->uri->segment(1) == "home" ? "active" : ""; ?>">
        <a href="<?= base_url('home'); ?>" aria-expanded="false">
          <i class="icon-home"></i><span class="nav-text">Home</span>
        </a>
      </li>
      <li class="nav-label">K-Nearest Neighbors</li>
      <li class="<?= $this->uri->segment(1) == "tentang" ? "active" : ""; ?>">
        <a href="<?= base_url('tentang'); ?>" aria-expanded="false">
          <i class="icon-info"></i><span class="nav-text">Tentang Aplikasi</span>
        </a>
      </li>
      <li class="nav-label">Naive Bayes Classifier</li>
      <li class="<?= $this->uri->segment(1) == "tentang" ? "active" : ""; ?>">
        <a href="<?= base_url('tentang'); ?>" aria-expanded="false">
          <i class="icon-info"></i><span class="nav-text">Tentang Aplikasi</span>
        </a>
      </li>
      <li class="nav-label">Apps</li>
      <li class="<?= $this->uri->segment(1) == "tentang" ? "active" : ""; ?>">
        <a href="<?= base_url('tentang'); ?>" aria-expanded="false">
          <i class="icon-cog"></i><span class="nav-text">Setting</span>
        </a>
      </li>
      <li class="<?= $this->uri->segment(1) == "tentang" ? "active" : ""; ?>">
        <a href="<?= base_url('tentang'); ?>" aria-expanded="false">
          <i class="icon-info"></i><span class="nav-text">Tentang Aplikasi</span>
        </a>
      </li>
    </ul>
  </div>
</div>
<!--**********************************Sidebar end***********************************-->