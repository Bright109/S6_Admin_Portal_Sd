<div class="navbar navbar-expand-lg bd-navbar sticky-top bg-info" style="height:70px">
  <img src="/assets/images/LOGO-K.png" alt="" style="max-width: 100%; max-height: 100%;" class="ps-4">
  <h5 id="navbarText" class="ps-3 fw-bold"><?= ucfirst($title); ?> </h5>
  <form action="/logout" method="post" class="ms-auto me-4">
    <button class="btn btn-primary" type="submit">Logout</button>
  </form>
</div>
