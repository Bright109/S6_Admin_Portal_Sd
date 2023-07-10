<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<!-- My Css -->
<!-- <link rel="stylesheet" href="/css/style.css"> -->
</head>

<body>
  <div class="bg-info-subtle">
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
      <div class="card shadow" style="width: 1000px;">
        <div class="row">
          <div class="col-7">
            <div id="carouselExampleCaptions" class="carousel slide">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                  aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                  aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                  aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="assets/images/PapanSDVidyaSasana.jpeg" class="d-block carousel-image" alt="...">
                </div>
                <div class="carousel-item active">
                  <img src="assets/images/12.jpeg" class=" d-block w-100" alt="...">
                </div>
                <div class="carousel-item active">
                  <img src="assets/images/Untitled.jpeg" class="d-block w-100 d-block h-100" alt="...">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class="col-5 d-flex flex-column align-items-center justify-content-center">
            <h2 class="mb-4">Login</h2>
            <?php if(session()->getFlashData('error')) : ?>
            <div class="alert alert-danger">
              <?php echo session()->getFlashData('error'); ?>
            </div>
            <?php endif; ?>

            <form action="auth/login" method="post">
              <div class="form-group mb-3">
                <label for="username">Username</label>
                <input type="username" name="username" class="form-control" id="username">
              </div>
              <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
              </div>
              <div class="d-flex flex-column align-items-center">
                <button type="submit" class="btn btn-primary px-4">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>
</body>


<style>
.card {
  overflow: hidden;
}

.carousel-inner {
  height: 400px;
  /* Ukuran tinggi carousel yang ditetapkan */
}

.carousel-inner img {
  width: 100%;
  height: 100%;
  max-width: 100%;
  max-height: 100%;
  object-fit: cover;
}

.carousel-caption {
  background-color: rgba(0, 0, 0, 0.5);
  padding: 20px;
  color: #fff;
}
</style>

</html>