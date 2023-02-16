<?php
  include './modules/newsalgos.php';
  getArticleIds();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Police Darpan | Latest News</title>
  <meta name="description" content="Get the latest buzz in the town first.">
  <meta name="keywords" content="Latest News Punjabi Jalandhar Phagwara">
  <meta name="author" content="Police Darpan">
  <meta name="author_email" content="editor@policedarpannews.in">
  <meta property="og:title" content="Police Darpan | Latest News" />
  <meta property="og:type" content="article" />
  <meta property="og:site_name" content="Police Darpan" />
  <meta property="og:description" content="Get the latest buzz in the town first." />
  <meta property="og:url" content="https://policedarpannews.in/" />
  <meta property="og:image" content="https://policedarpannews.in/assets/images/newbg.png" />
  <meta property="og:locale" content="en_GB" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/x-icon" href="./favicon.ico">
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css"
    integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="canonical" href="https://policedarpannews.in/">
</head>

<body>
  <div class="container-fluid m-0" id="brandLogo">
    <div class="container">
      <nav class="navbar">
        <div class="container-fluid">
          <img src="./assets/img/logoRound.png" width="96px" alt="Police Darpan">
        </div>
      </nav>
    </div>
  </div>
  <div class="container-fluid" style="background-color: #032a63;">
    <div class="container d-none d-lg-block">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-bold" style="font-size: 15px;margin-left: 100px;">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">
                  <span class="text-light border-end border-secondary pe-3">Advertise</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span class="text-light border-end border-secondary pe-3">About</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span class="text-light border-end border-secondary pe-3">Event</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span class="text-light border-end border-secondary pe-3">Write for us</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span class="text-light">In the Press</span>
                </a>
              </li>
            </ul>
            <div class="d-flex">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-bold" style="font-size: 15px;">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="#">
                    <span class="text-light border-end border-secondary pe-3">Punjabi</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="text-light">English</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <div class="container-fluid bottomNav sticky-top" style="background-color: #032a63;">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand text-light fw-bolder" href="#"
            id="brandLogoText">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
          <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-end text-uppercase fw-bolder">
              <li class="nav-item">
                <a class="nav-link text-light" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="#">Business</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="#">Sports</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="#">Art</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="#">Politics</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="#">Travel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="#">Contact</a>
              </li>
            </ul>
            <div class="d-flex float-end">
              <a href="#" class="badge navSocial me-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                  class="bi bi-facebook" viewBox="0 0 16 16">
                  <path
                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                </svg>
              </a>
              <a href="#" class="badge navSocial me-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-youtube"
                  viewBox="0 0 16 16">
                  <path
                    d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                </svg>
              </a>
              <a href="#" class="badge navSocial me-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-twitter"
                  viewBox="0 0 16 16">
                  <path
                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </div>

  <div class="container-fluid mb-4 pb-1 d-block d-lg-none" style="background-color: #032a63;"><br><br></div>
  <div class="container-fluid bg-white mb-4 d-none d-lg-block">
    <div class="container py-3">
      <div class="row">
        <div class="col-auto ps-4 pe-0">
          <div class="badge py-2 mb-0 breaking d-inline"> Breaking News</div>
        </div>
        <div class="col pe-5">
          <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
            <?php getBreaking('Tecnology'); if($Id!=''){?>
            <span role="button" title="Click to Read More" onclick="window.location.href ='./article.php?a=<?php echo $Id; ?>'">
            <span class="badge bg-primary mx-2">Tecnology</span> <?php echo $Title ?></span>
            <?php }getBreaking('Business'); if($Id!=''){?>
            <span role="button" title="Click to Read More" onclick="window.location.href ='./article.php?a=<?php echo $Id; ?>'">
            <span class="badge bg-secondary mx-2">Business</span><?php echo $Title ?></span>
            <?php }getBreaking('Sports'); if($Id!=''){?>
            <span role="button" title="Click to Read More" onclick="window.location.href ='./article.php?a=<?php echo $Id; ?>'">
            <span class="badge bg-success mx-2">Sports</span> <?php echo $Title ?></span>
            <?php }getBreaking('Politics'); if($Id!=''){?>
            <span role="button" title="Click to Read More" onclick="window.location.href ='./article.php?a=<?php echo $Id; ?>'">
            <span class="badge bg-danger mx-2">Politics</span> <?php echo $Title ?></span>
            <?php }getBreaking('Travel'); if($Id!=''){?>
            <span role="button" title="Click to Read More" onclick="window.location.href ='./article.php?a=<?php echo $Id; ?>'">
            <span class="badge bg-warning text-dark mx-2">Travel</span> <?php echo $Title ?></span>
            <?php }getBreaking('Entertainment'); if($Id!=''){?>
            <span role="button" title="Click to Read More" onclick="window.location.href ='./article.php?a=<?php echo $Id; ?>'">
            <span class="badge bg-info text-dark mx-2">Entertainment</span> <?php echo $Title ?></span>
            <?php }getBreaking('Crime'); if($Id!=''){?>
            <span role="button" title="Click to Read More" onclick="window.location.href ='./article.php?a=<?php echo $Id; ?>'">
            <span class="badge bg-dark mx-2">Crime</span> <?php echo $Title ?></span>
            <?php } ?>
          </marquee>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row gx-5">
      <div class="col-xl-8 mb-4">
        <?php articleData($newsIds[$idCounter]); ?>
        <div role="button" title="Click to Read More"
          onclick="window.location.href ='./article.php?a=<?php echo $newsIds[$idCounter]; ?>'" class="card">
          <div class="ratio ratio-16x9">
            <img src="<?php echo $thumbnailUrl; if($thumbnailUrl==''){echo './assets/img/logoRound.png';} ?>" alt="banner" style="object-fit: cover;" class="rounded img-fluid">
          </div>
          <div class="banner-content w-100">
            <span class="badge bg-danger mb-3">
              <?php echo $Category; ?>
            </span>
            <h2>
              <?php echo $Title; ?>
            </h2>
            <small class="me-3">
              <?php echo $District; ?>
            </small> <small>
              <?php echo $Date; ?>
            </small>
          </div>
        </div>
      </div>
      <div class="col-xl-4 mb-4 ">
        <div class="card bg-black mb-3 h-100">
          <div class="card-body text-light lnbody">
            <h4>Latest News</h4>
            <?php $idCounter++; for ($i=0; $i < 3; $i++) {  articleData($newsIds[$idCounter]);?>
            <div role="button" title="<?php echo $Title; ?>"
              onclick="window.location.href ='./article.php?a=<?php echo $newsIds[$idCounter]; ?>'"
              class="d-flex <?php if($i<2){ ?>border-bottom-blue<?php } ?> pt-3 pb-4 align-items-center justify-content-between">
              <div class="pr-3 col-8">
                <h6 class="hideOverflowText">
                  <?php echo $Title; ?>
                </h6>
                <small class="me-2">
                  <?php echo $District; ?>
                </small> <small>
                  <?php echo $Date; ?>
                </small>
              </div>
              <div class="col-3 p-0">
                <div class="ratio ratio-16x9">
                  <img src="<?php echo $thumbnailUrl; if($thumbnailUrl==''){echo './assets/img/logoRound.png';} ?>" alt="banner" style="object-fit: cover;"
                    class="img-fluid img-lg">
                </div>
              </div>
            </div>
            <?php $idCounter++; } ?>
            <!-- <div role="button"  onclick="window.location.href ='#'" class="pt-3 h6 d-flex"> See more >></div> -->

          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 mb-4 d-none d-lg-block">
        <div class="card h-100">
          <div class="card-body vmbody">
            <h4>Districts</h4>
            <ul class="vertical-menu">
              <li><a>Amritsar</a></li>
              <li><a>Bathinda</a></li>
              <li><a>Faridkot</a></li>
              <li><a>Fatehgarh Sahib</a></li>
              <li><a>Firozpur</a></li>
              <li><a>Fazilka</a></li>
              <li><a>Gurdaspur</a></li>
              <li><a>Hoshiarpur</a></li>
              <li><a>Jalandhar</a></li>
              <li><a>Kapurthala</a></li>
              <li><a>Ludhiana</a></li>
              <li><a>Malerkotla</a></li>
              <li><a>Mansa</a></li>
              <li><a>Moga</a></li>
              <li><a>Sri Muktsar Sahib</a></li>
              <li><a>Pathankot</a></li>
              <li><a>Patiala</a></li>
              <li><a>Rupnagar</a></li>
              <li><a>Sahibzada Ajit Singh Nagar</a></li>
              <li><a>Sangrur</a></li>
              <li><a>Shahid Bhagat Singh Nagar</a></li>
              <li><a>Tarn Taran</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-9 mb-4">
        <div class="card">
          <div class="card-body pb-0 p-4">
            <?php for ($i=0; $i < 6; $i++) {  articleData($newsIds[$idCounter]);?>
            <div role="button" title="Click to Read More"
              onclick="window.location.href ='./article.php?a=<?php echo $newsIds[$idCounter]; ?>'"
              class="row mb-3 pb-3 <?php if($i<5){ ?>border-bottom<?php } ?>">
              <div class="col-sm-4 grid-margin">
                <div class="position-relative">
                  <div class="news-img">
                    <div class="ratio ratio-16x9">
                      <img src="<?php echo $thumbnailUrl; if($thumbnailUrl==''){echo './assets/img/logoRound.png';} ?>" style="object-fit: cover;" alt="thumb" class="img-fluid">
                    </div>
                  </div>
                  <div class="badge-positioned">
                    <span class="badge bg-danger font-weight-bold">
                      <?php echo $Category; ?>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-sm-8  grid-margin">
                <h3 class="mb-2 font-weight-600">
                  <?php echo $Title; ?>
                </h3>
                <p class="text-muted mb-0">
                  <small class="me-3">
                    <?php echo $District; ?>
                  </small> <small>
                    <?php echo $Date; ?>
                  </small>
                </p>
                <p class="mt-2 mb-0">
                  Read More
                </p>
              </div>
            </div>
            <?php $idCounter++; } ?>
          </div>
        </div>
      </div>
    </div>
    <?php getNoImgArticleIds(); $idNoImgCounter=0; ?>
    <div class="row mb-4">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-xl-6">
                <div class="row">
                  <div class="col-sm-6">
                    <?php articleData($newsIds[$idCounter]);?>
                    <div role="button" title="Click to Read More"
                      onclick="window.location.href ='./article.php?a=<?php echo $newsIds[$idCounter]; ?>'"
                      class="border-bottom pb-3 mb-3">
                      <div class="news-img">
                        <div class="ratio ratio-16x9">
                          <img src="<?php echo $thumbnailUrl; if($thumbnailUrl==''){echo './assets/img/logoRound.png';} ?>" style="object-fit: cover;" alt="thumb" class="img-fluid">
                        </div>
                      </div>
                      <p class="h6 fw-bolder mb-0 mt-3">
                        <?php echo $Title; ?>
                      </p>
                      <p class="text-muted mb-0">
                        <small class="me-3">
                          <?php echo $District; ?>
                        </small> <small>
                          <?php echo $Date; ?>
                        </small>
                      </p>
                    </div>

                    <?php $idCounter++; for ($i=0; $i < 2; $i++) {  articleData($newsNoImgIds[$idNoImgCounter]);?>
                    <div role="button" title="Click to Read More"
                      onclick="window.location.href ='./article.php?a=<?php echo $newsNoImgIds[$idNoImgCounter]; ?>'"
                      class="<?php if($i<1){ ?>border-bottom pb-3 mb-3<?php } ?>">
                      <h4 class="font-weight-600 mb-0">
                        <?php echo $Title; ?>
                      </h4>
                      <p class="text-muted mb-0">
                        <small class="me-3">
                          <?php echo $District; ?>
                        </small> <small>
                          <?php echo $Date; ?>
                        </small>
                      </p>
                      <p class="mb-0">
                        Read More
                      </p>
                    </div>
                    <?php $idNoImgCounter++; } ?>

                  </div>
                  <div class="col-sm-6">
                    <?php articleData($newsNoImgIds[$idNoImgCounter]);?>
                    <div role="button" title="Click to Read More"
                      onclick="window.location.href ='./article.php?a=<?php echo $newsNoImgIds[$idNoImgCounter]; ?>'"
                      class="border-bottom pb-3 mb-3">
                      <h4 class="font-weight-600 mb-0">
                        <?php echo $Title; ?>
                      </h4>
                      <p class="text-muted mb-0">
                        <small class="me-3">
                          <?php echo $District; ?>
                        </small> <small>
                          <?php echo $Date; ?>
                        </small>
                      </p>
                      <p class="mb-0">
                        Read More
                      </p>
                    </div>

                    <?php $idCounter++; articleData($newsIds[$idCounter]);?>
                    <div role="button" title="Click to Read More"
                      onclick="window.location.href ='./article.php?a=<?php echo $newsIds[$idCounter]; ?>'"
                      class="border-bottom pb-3 mb-3">
                      <div class="news-img">
                        <div class="ratio ratio-16x9">
                          <img src="<?php echo $thumbnailUrl; if($thumbnailUrl==''){echo './assets/img/logoRound.png';} ?>" style="object-fit: cover;" alt="thumb" class="img-fluid">
                        </div>
                      </div>
                      <p class="h6 fw-bolder mb-0 mt-3">
                        <?php echo $Title; ?>
                      </p>
                      <p class="text-muted mb-0">
                        <small class="me-3">
                          <?php echo $District; ?>
                        </small> <small>
                          <?php echo $Date; ?>
                        </small>
                      </p>
                    </div>

                    <?php $idNoImgCounter++; articleData($newsNoImgIds[$idNoImgCounter]);?>
                    <div role="button" title="Click to Read More"
                    onclick="window.location.href ='./article.php?a=<?php echo $newsNoImgIds[$idNoImgCounter]; ?>'" class="">
                      <h4 class="font-weight-600 mb-0">
                        <?php echo $Title; ?>
                      </h4>
                      <p class="text-muted mb-0">
                        <small class="me-3">
                          <?php echo $District; ?>
                        </small> <small>
                          <?php echo $Date; ?>
                        </small>
                      </p>
                      <p class="mb-0">
                        Read More
                      </p>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-xl-6">
                <div class="row">
                  <div class="col-sm-6">
                    <?php $idCounter++;  articleData($newsIds[$idCounter]);?>
                    <div role="button" title="Click to Read More"
                      onclick="window.location.href ='./article.php?a=<?php echo $newsIds[$idCounter]; ?>'"
                      class="border-bottom pb-3 mb-3">
                      <div class="news-img">
                        <div class="ratio ratio-16x9">
                          <img src="<?php echo $thumbnailUrl; if($thumbnailUrl==''){echo './assets/img/logoRound.png';} ?>" style="object-fit: cover;" alt="thumb" class="img-fluid">
                        </div>
                      </div>
                      <p class="h6 fw-bolder mb-0 mt-3">
                        <?php echo $Title; ?>
                      </p>
                      <p class="text-muted mb-0">
                        <small class="me-3">
                          <?php echo $District; ?>
                        </small> <small>
                          <?php echo $Date; ?>
                        </small>
                      </p>
                    </div>

                    <?php for ($i=0; $i < 2; $i++) { articleData($newsNoImgIds[$idNoImgCounter]);?>
                    <div role="button" title="Click to Read More"
                      onclick="window.location.href ='./article.php?a=<?php echo $newsNoImgIds[$idNoImgCounter]; ?>'"
                      class="<?php if($i<1){ ?>border-bottom pb-3 mb-3<?php } ?>">
                      <h4 class="font-weight-600 mb-0">
                        <?php echo $Title; ?>
                      </h4>
                      <p class="text-muted mb-0">
                        <small class="me-3">
                          <?php echo $District; ?>
                        </small> <small>
                          <?php echo $Date; ?>
                        </small>
                      </p>
                      <p class="mb-0">
                        Read More
                      </p>
                    </div>
                    <?php $idNoImgCounter++; } ?>

                  </div>
                  <div class="col-sm-6">
                    <?php for ($i=0; $i < 2; $i++) {  articleData($newsNoImgIds[$idNoImgCounter]);?>
                    <div role="button" title="Click to Read More"
                      onclick="window.location.href ='./article.php?a=<?php echo $newsNoImgIds[$idNoImgCounter]; ?>'"
                      class="border-bottom pb-3 mb-3">
                      <h4 class="font-weight-600 mb-0">
                        <?php echo $Title; ?>
                      </h4>
                      <p class="text-muted mb-0">
                        <small class="me-3">
                          <?php echo $District; ?>
                        </small> <small>
                          <?php echo $Date; ?>
                        </small>
                      </p>
                      <p class="mb-0">
                        <?php if($thumbnailUrl!=''){echo 'Click to watch';}else{echo 'Read More';}; ?>
                      </p>
                    </div>
                    <?php $idNoImgCounter++; } ?>

                    <?php articleData($newsIds[$idCounter]);?>
                    <div role="button" title="Click to Read More"
                      onclick="window.location.href ='./article.php?a=<?php echo $newsIds[$idCounter]; ?>'" class="">
                      <div class="news-img">
                        <div class="ratio ratio-16x9">
                          <img src="<?php echo $thumbnailUrl; if($thumbnailUrl==''){echo './assets/img/logoRound.png';} ?>" style="object-fit: cover;" alt="thumb" class="img-fluid">
                        </div>
                      </div>
                      <p class="h6 fw-bolder mb-0 mt-3">
                        <?php echo $Title; ?>
                      </p>
                      <p class="text-muted mb-0">
                        <small class="me-3">
                          <?php echo $District; ?>
                        </small> <small>
                          <?php echo $Date; ?>
                        </small>
                      </p>
                    </div>
                    <?php $idCounter++; ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 mb-4">
        <div class="card h-100">
          <div class="card-body pb-0 p-4">
            <?php for ($i=0; $i < 6; $i++) {  articleData($newsIds[$idCounter]);?>
            <div role="button" title="Click to Read More"
              onclick="window.location.href ='./article.php?a=<?php echo $newsIds[$idCounter]; ?>'"
              class="row mb-3 pb-3 <?php if($i<5){ ?>border-bottom<?php } ?>">
              <div class="col-sm-4 grid-margin">
                <div class="position-relative">
                  <div class="news-img">
                    <div class="ratio ratio-16x9">
                      <img src="<?php echo $thumbnailUrl; if($thumbnailUrl==''){echo './assets/img/logoRound.png';} ?>" style="object-fit: cover;" alt="thumb" class="img-fluid">
                    </div>
                  </div>
                  <div class="badge-positioned">
                    <span class="badge bg-danger font-weight-bold">
                      <?php echo $Category; ?>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-sm-8  grid-margin">
                <h3 class="mb-2 font-weight-600">
                  <?php echo $Title; ?>
                </h3>
                <p class="text-muted mb-0">
                  <small class="me-3">
                    <?php echo $District; ?>
                  </small> <small>
                    <?php echo $Date; ?>
                  </small>
                </p>
                <p class="mt-2 mb-0">
                  Read More
                </p>
              </div>
            </div>
            <?php $idCounter++; } ?>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-4">
        <div class="card h-100">
          <div class="card-body pb-0 p-4">
            <?php for ($i=0; $i < 6; $i++) {  articleData($newsIds[$idCounter]);?>
            <div role="button" title="Click to Read More"
              onclick="window.location.href ='./article.php?a=<?php echo $newsIds[$idCounter]; ?>'"
              class="row mb-3 pb-3 <?php if($i<5){ ?>border-bottom<?php } ?>">
              <div class="col-sm-4 grid-margin">
                <div class="position-relative">
                  <div class="news-img">
                    <div class="ratio ratio-16x9 mb-2">
                      <img src="<?php echo $thumbnailUrl; if($thumbnailUrl==''){echo './assets/img/logoRound.png';} ?>" style="object-fit: cover;" alt="thumb" class="img-fluid">
                    </div>
                  </div>
                  <div class="badge-positioned">
                    <span class="badge bg-danger font-weight-bold">
                      <?php echo $Category; ?>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-sm-8  grid-margin">
                <h4 class="mb-2 font-weight-600">
                  <?php echo $Title; ?>
                </h4>
                <p class="text-muted mb-0">
                  <small class="me-3">
                    <?php echo $District; ?>
                  </small> <small>
                    <?php echo $Date; ?>
                  </small>
                </p>
                <p class="mt-2 mb-0">
                  Read More
                </p>
              </div>
            </div>
            <?php $idCounter++; } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid text-light footer">
    <div class="container">
      <div class="row mb-4">
        <div class="col-sm-6 mb-3">
          <a class="navbar-brand text-light fw-bolder" href="#" style="margin-right: 50px;">Police Darpan</a>
          <h6 class="font-weight-normal mt-4 mb-5">
            Police Darpan is a humble endeavor to cater to the population of North India spread across the Globe. This
            is an online newspaper that concentrates on local news from every nook and corner of North India and also of
            news pertaining to people from the North India spread across the globe.
          </h6>
          <a href="#" class="badge bg-white navSocial me-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#032a63" class="bi bi-facebook"
              viewBox="0 0 16 16">
              <path
                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
            </svg>
          </a>
          <a href="#" class="badge bg-white navSocial me-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#032a63" class="bi bi-youtube"
              viewBox="0 0 16 16">
              <path
                d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
            </svg>
          </a>
          <a href="#" class="badge bg-white navSocial me-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#032a63" class="bi bi-twitter"
              viewBox="0 0 16 16">
              <path
                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
            </svg>
          </a>
        </div>
        <div class="col-sm-6">
          <div class="float-end mb-4">
            <a class="me-2" href="./Admin">
              <span class="text-light border-end border-secondary pe-3">Admin Login</span>
            </a>
            <a href="#">
              <span class="text-light">Feedback</span>
            </a>
          </div>
          <div class="mb-3">
            <div class="input-group float-end">
              <input type="email" class="form-control" placeholder="Enter email" aria-label="Recipient's username"
                aria-describedby="button-addon2">
              <button class="btn btn-success border-rad" type="button" id="button-addon2"> Subscribe Newsletter
              </button>
            </div>
            <div id="emailHelp" class="form-text float-end text-light">Get daily news updates direct in your inbox.
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="d-sm-flex justify-content-between align-items-center">
            <div class="fs-14 fw-bold">
              © 2023 @ <a href="#" class="text-light">Aditya Dubey</a>. All rights reserved.
            </div>
            <div class="fs-14 fw-bold">
              Designed and developed for <a href="#" class="text-light">Police Darpan</a>.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"
    integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>