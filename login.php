<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Login Sistem</title>
    <link rel="icon" type="image/png" href="assets/images/logo.png" />
    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/chosen.css" />
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </head>

  <body class="text-center">
    <section
      class="vh-100"
      style="
        background-image: url(./assets/images/login.png);
        background-size: cover;
        background-position: center;
      "
    >
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div
              class="card shadow-2-strong"
              style="
                border-radius: 1rem;
                background-color: rgb(255, 255, 255, 0.7);
              "
            >
              <div class="card-body p-5 text-center">
                <div align="center" class="w-100 m-auto">
                  <h5>
                    Selamat Datang di Sistem Informasi Rekam Medis Klinik
                    Pratama BP Cilandak
                  </h5>
                  <h4><img class="w-50 m-4" src="assets/images/logo.png" /></h4>
                  <form
                    action="actlogin.php"
                    method="post"
                    class="d-flex flex-column align-items-center gap-3"
                  >
                    <?php if ( isset($_GET['err1']) ) { ?>
                    <div class="alert alert-danger">
                      <strong>Terjadi kesalahan,</strong> Username atau Password Anda
                      Salah
                    </div>
                    <?php } elseif ( isset($_GET['err2']) ) { ?>
                    <div class="alert alert-warning">
                      <strong>Terjadi kesalahan,</strong> Username atau Password
                      Tidak Boleh Kosong
                    </div>
                    <?php } ?>
                    <div class="w-100 gap-2 form-floating">
                      <input
                        id="username"
                        name="username"
                        type="text"
                        class="form-control"
                        placeholder="username"
                        autocomplete="off"
                        autofocus
                      />
                      <label class="floatingInput">USERNAME</label>
                    </div>
                    <div class="w-100 gap-2 form-floating">
                      <input
                        id="password"
                        name="password"
                        type="password"
                        class="form-control"
                        placeholder="Password"
                        autocomplete="off"
                      />
                      <label class="floatingPassword">PASSWORD</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" name="login">
                      <i class="icon-signin"></i> Masuk
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript">
      window.jQuery ||
        document.write(
          "<script src='assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>"
        );
    </script>
    <script type="text/javascript">
      if ("ontouchend" in document)
        document.write(
          "<script src='assets/js/jquery.mobile.custom.min.js'>" +
            "<" +
            "/script>"
        );
    </script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.2.1.1.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/ace-elements.min.js"></script>
    <script src="assets/js/ace.min.js"></script>
    <script type="text/javascript">
      function show_box(id) {
        $(".widget-box.visible").removeClass("visible");
        $("#" + id).addClass("visible");
      }
    </script>
  </body>
</html>
