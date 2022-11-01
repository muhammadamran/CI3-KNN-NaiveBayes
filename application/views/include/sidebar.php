<!--**********************************Sidebar start***********************************-->
<div class="nk-sidebar">
  <div class="nk-nav-scroll">
    <ul class="metismenu" id="menu">
      <li class="nav-label">NAVIGATION</li>
      <li class="<?= $this->uri->segment(1) == "Dashboard" ? "active" : ""; ?>">
        <a href="<?= base_url('Dashboard'); ?>" aria-expanded="false">
          <i class="fa-solid fa-chart-pie"></i><span class="nav-text">Dashboard</span>
        </a>
      </li>
      <li class="nav-label">K-Nearest Neighbors</li>
      <li class="<?= $this->uri->segment(1) == "KNN" ? "active" : ""; ?>">
        <a href="<?= base_url('KNN'); ?>" aria-expanded="false">
          <i class="fa-solid fa-table"></i><span class="nav-text">Data Set</span>
        </a>
      </li>
      <li class="nav-label">Naive Bayes Classifier</li>
      <li class="<?= $this->uri->segment(1) == "NBC" ? "active" : ""; ?>">
        <a href="<?= base_url('NBC'); ?>" aria-expanded="false">
          <i class="fa-solid fa-table"></i><span class="nav-text">Data Set</span>
        </a>
      </li>
      <li class="nav-label">Apps</li>
      <li class="<?= $this->uri->segment(1) == "tentang" ? "active" : ""; ?>">
        <a href="<?= base_url('tentang'); ?>" aria-expanded="false">
          <i class="fa-solid fa-gear"></i><span class="nav-text">Pengaturan</span>
        </a>
      </li>
    </ul>
  </div>
</div>
<!--**********************************Sidebar end***********************************-->