<div style="height: 100vh" class="bg-info-subtle">
  <nav class="nav nav-pills flex-column bg-info-subtle px-4 py-2" style="width: 200px;">
    <ul class="nav nav-pills flex-column">
      <li class="nav-item">
        <a class="nav-link <?= ($activePage === 'dashboard') ? 'active' : ''; ?>" href="/dashboard">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage === 'orangtua') ? 'active' : ''; ?>" href="/orang_tua">Orang Tua</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage === 'siswa') ? 'active' : ''; ?>" href="/siswa">Siswa </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage === 'guru') ? 'active' : ''; ?>" href="/guru">Guru</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage === 'kelas') ? 'active' : ''; ?>" href="/kelas">Kelas</a>
      </li>
    </ul>
  </nav>
</div>
