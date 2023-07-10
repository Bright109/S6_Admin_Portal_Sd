<!-- <div class="row vh-100">
  <div class="col-3 bg-info-subtle">
    <nav class="nav flex-column">
      <a class="nav-link active" aria-current="page" href="#">Active</a>
      <a class="nav-link" href="#">Link</a>
      <a class="nav-link" href="#">Link</a>
      <a class="nav-link disabled">Disabled</a>
    </nav>
  </div>
</div> -->

<!-- <div class="col-1 vh-100 bg-info-subtle"> -->
<!-- </div> -->

<div style="height: 90vh" class="bg-info-subtle">
  <nav class="nav nav-pills flex-column bg-info-subtle px-4 py-2" style="width: 200px;">
    <ul class="nav nav-pills flex-column">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/siswa" onclick="changeHeaderText('Siswa', '/siswa')">Siswa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
      </li>
    </ul>
  </nav>
</div>
<script>
function changeHeaderText(text, href) {
  const headerText = document.getElementById('navbarText');
  headerText.textContent = text;
  window.location.href = href;
}
</script>


<!--
<div class="d-flex" style="height: 100%;">
  <nav class="nav flex-column bg-info-subtle" style="width: 200px;">
    <a class="nav-link active" aria-current="page" href="#">Active</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link disabled">Disabled</a>
  </nav>
</div> -->
<!--
<nav class="nav flex-column">
  <a class="nav-link active" aria-current="page" href="#">Active</a>
  <a class="nav-link" href="#">Link</a>
  <a class="nav-link" href="#">Link</a>
  <a class="nav-link disabled">Disabled</a>
</nav> -->


<!-- <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Active</a>
  <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Link</a>
  <a class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Link</a>
  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
</div> -->