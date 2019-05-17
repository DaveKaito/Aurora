<?php require_once '../../private/initialize.php';?>

<?php include SHARED_PATH . '/staff_header.php';?>
<body>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
      <div class="container">
        <!-- Brand -->
        <a
          class="navbar-brand"
          href="https://mdbootstrap.com/docs/jquery/"
          target="_blank"
          ><img
            src="assets/img/aurora_orange.png"
            height="40"
            alt="aurora logo"
          />
        </a>
        <!-- Collapse -->
        <button
          class="navbar-toggler ml-auto"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#"
                >Aurora
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                href="https://mdbootstrap.com/docs/jquery/"
                target="_blank"
                >Explore</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                href="https://mdbootstrap.com/docs/jquery/getting-started/download/"
                target="_blank"
                >License</a
              >
            </li>
          </ul>
          <form class="searchbar mr-auto ">
            <input
              class="form-control "
              type="text"
              placeholder="Search"
              aria-label="Search"
            />
          </form>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item mr-4">
              <a href="" class="nav-link border border-light rounded"
                ><i class="fas fa-upload"></i>Upload</a
              >
            </li>
            <li class="nav-item">
              <a
                href="https://github.com/mdbootstrap/bootstrap-material-design"
                class="nav-link border border-light rounded"
                target="_blank"
              >
                <i class="fas fa-sign-in-alt mr-2"></i>Login
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->

    <!-- Full Page Intro -->
    <div
      class="view"
      style="background-image: url('assets/img/background_plants.png'); background-repeat: no-repeat; background-size: cover;"
    >
      <!-- Mask & flexbox options-->
      <div
        class="mask rgba-black-light d-flex justify-content-center align-items-center"
      >
        <!-- Content -->
        <div class="text-center white-text mx-5 wow fadeIn">
          <h1 class="mb-5">
            <strong>Get high quality images for free</strong>
          </h1>

          <div class="active-cyan-4 mx-auto">
            <input
              class="form-control"
              type="text"
              placeholder="Search"
              aria-label="Search"
            />
          </div>

          <a
            target="_blank"
            href="https://mdbootstrap.com/education/bootstrap/"
            class="btn btn-outline-white btn-lg mt-5"
            >Join us as a contributor <i class="fas fa-users ml-2"></i>
          </a>
        </div>
        <!-- Content -->
      </div>
      <!-- Mask & flexbox options-->
    </div>
    <!-- Full Page Intro -->

    <!--Main layout-->
    <main>
      <div class="container-fluid mt-5">
        <h1 class="my-4 font-weight-bold">Popular images</h1>

        <div class="grid">
          <div class="grid-sizer"></div>
          <div class="grid-item">
            <img src="https://mdbootstrap.com/img/Photos/Others/food3.jpg" />
          </div>
          <div class="grid-item">
            <img src="https://mdbootstrap.com/img/Photos/Others/image02.jpg" />
          </div>
          <div class="grid-item">
            <img src="https://mdbootstrap.com/img/Photos/Others/image002.jpg" />
          </div>
          <div class="grid-item">
            <img src="https://mdbootstrap.com/img/Photos/Others/image06.jpg" />
          </div>
          <div class="grid-item">
            <img src="https://mdbootstrap.com/img/Photos/Others/image008.jpg" />
          </div>
          <div class="grid-item">
            <img src="https://mdbootstrap.com/img/Photos/Others/image005.jpg" />
          </div>
          <div class="grid-item">
            <img src="https://mdbootstrap.com/img/Photos/Others/image010.jpg" />
          </div>
          <div class="grid-item">
            <img src="https://mdbootstrap.com/img/Photos/Others/image18.jpg" />
          </div>
          <div class="grid-item">
            <img src="https://mdbootstrap.com/img/Photos/Others/image17.jpg" />
          </div>
        </div>
      </div>
    </main>
    <!--Main layout-->
    <?php include SHARED_PATH . '/staff_footer.php';?>