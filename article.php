<?php
    include './modules/newsalgos.php';
    $conn = OpenCon();

    $sql = "SELECT * FROM `Articles` WHERE `Id`='".$_GET['a']."';";

    $result = mysqli_query($conn,$sql);

    if (!$result) {
        echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
        exit;
    }
    $row = mysqli_fetch_assoc($result);

    $id = $_GET['a'];
    $Title = $row['Title'];
    $Article = $row['Article'];
    $ImgListSize = $row['ImgListSize'];
    $YoutubeId = $row['YoutubeId'];
    $Date = $row['Date'];
    $District = $row['District'];
    $Category = $row['Category'];

    CloseCon($conn);
    getTrandingIds(3);
    viewCounter($_GET['a']);
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="canonical" href="https://policedarpannews.in/">
    <style>
        .hytPlayerWrap {
            display: inline-block;
            position: relative;
        }

        .hytPlayerWrap.ended::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            cursor: pointer;
            background-color: black;
            background-repeat: no-repeat;
            background-position: center;
            background-size: 64px 64px;
            background-image: url(data:image/svg+xml;utf8;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMjgiIGhlaWdodD0iMTI4IiB2aWV3Qm94PSIwIDAgNTEwIDUxMCI+PHBhdGggZD0iTTI1NSAxMDJWMEwxMjcuNSAxMjcuNSAyNTUgMjU1VjE1M2M4NC4xNSAwIDE1MyA2OC44NSAxNTMgMTUzcy02OC44NSAxNTMtMTUzIDE1My0xNTMtNjguODUtMTUzLTE1M0g1MWMwIDExMi4yIDkxLjggMjA0IDIwNCAyMDRzMjA0LTkxLjggMjA0LTIwNC05MS44LTIwNC0yMDQtMjA0eiIgZmlsbD0iI0ZGRiIvPjwvc3ZnPg==);
        }

        .hytPlayerWrap.paused::after {
            content: "";
            position: absolute;
            top: 70px;
            left: 0;
            bottom: 50px;
            right: 0;
            cursor: pointer;
            /* background-color: black; */
            background-repeat: no-repeat;
            background-position: center;
            background-size: 40px 40px;
            background-image: url(data:image/svg+xml;utf8;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEiIHdpZHRoPSIxNzA2LjY2NyIgaGVpZ2h0PSIxNzA2LjY2NyIgdmlld0JveD0iMCAwIDEyODAgMTI4MCI+PHBhdGggZD0iTTE1Ny42MzUgMi45ODRMMTI2MC45NzkgNjQwIDE1Ny42MzUgMTI3Ny4wMTZ6IiBmaWxsPSIjZmZmIi8+PC9zdmc+);
        }
    </style>
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
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
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
                                        <span class="text-light border-end border-secondary pe-3">Login</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <span class="text-light">Sign up</span>
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
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-end text-uppercase fw-bolder">
                            <li class="nav-item">
                                <a class="nav-link text-light" aria-current="page" href="./">Home</a>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                    class="bi bi-youtube" viewBox="0 0 16 16">
                                    <path
                                        d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                                </svg>
                            </a>
                            <a href="#" class="badge navSocial me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                    class="bi bi-twitter" viewBox="0 0 16 16">
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
                        <span role="button" title="Click to Read More"
                            onclick="window.location.href ='./article.php?a=<?php echo $Id; ?>'">
                            <span class="badge bg-primary mx-2">Tecnology</span>
                            <?php echo $Title ?>
                        </span>
                        <?php }getBreaking('Business'); if($Id!=''){?>
                        <span role="button" title="Click to Read More"
                            onclick="window.location.href ='./article.php?a=<?php echo $Id; ?>'">
                            <span class="badge bg-secondary mx-2">Business</span>
                            <?php echo $Title ?>
                        </span>
                        <?php }getBreaking('Sports'); if($Id!=''){?>
                        <span role="button" title="Click to Read More"
                            onclick="window.location.href ='./article.php?a=<?php echo $Id; ?>'">
                            <span class="badge bg-success mx-2">Sports</span>
                            <?php echo $Title ?>
                        </span>
                        <?php }getBreaking('Politics'); if($Id!=''){?>
                        <span role="button" title="Click to Read More"
                            onclick="window.location.href ='./article.php?a=<?php echo $Id; ?>'">
                            <span class="badge bg-danger mx-2">Politics</span>
                            <?php echo $Title ?>
                        </span>
                        <?php }getBreaking('Travel'); if($Id!=''){?>
                        <span role="button" title="Click to Read More"
                            onclick="window.location.href ='./article.php?a=<?php echo $Id; ?>'">
                            <span class="badge bg-warning text-dark mx-2">Travel</span>
                            <?php echo $Title ?>
                        </span>
                        <?php }getBreaking('Entertainment'); if($Id!=''){?>
                        <span role="button" title="Click to Read More"
                            onclick="window.location.href ='./article.php?a=<?php echo $Id; ?>'">
                            <span class="badge bg-info text-dark mx-2">Entertainment</span>
                            <?php echo $Title ?>
                        </span>
                        <?php } ?>
                        <!-- <span class="badge bg-dark">Dark</span> Lorem ipsum dolor sit amet consectetur adipisicing elit. -->
                    </marquee>
                </div>
            </div>
        </div>
    </div>
    <div class="content-wrapper mb-4">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div>
                                    <?php if($YoutubeId!=''){ ?>
                                    <div class="hytPlayerWrapOuter">
                                        <div class="hytPlayerWrap ratio ratio-16x9 mb-2">
                                            <iframe loading="lazy" width="100%" height="100%" allow="fullscreen"
                                                src="https://www.youtube.com/embed/<?php echo $YoutubeId; ?>?rel=0&enablejsapi=1"
                                                frameborder="0"></iframe>
                                        </div>
                                    </div>
                                    <?php } ?>

                                    <?php if($ImgListSize>0){ ?>
                                    <div id="carouselExampleIndicators" class="carousel slide mb-2"
                                        data-bs-ride="carousel">
                                        <?php if ($ImgListSize>1) { ?>
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="0" class="active" aria-current="true"
                                                aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <?php } ?>
                                        <div class="carousel-inner">
                                            <?php for ($i=1; $i <= $ImgListSize; $i++) { ?>
                                            <div class="carousel-item <?php if($i==1){echo 'active';}?>">
                                                <img src="./images/<?php echo $_GET['a']."_".($i-1); ?>.jpg"
                                                class="d-block w-100" alt="Article Image 1">
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php if ($ImgListSize>1) { ?>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                                <h3 class="font-weight-600 mb-1">
                                    <?php echo $Title; ?>
                                </h3>
                                <div class="row my-3">
                                    <div class="col-sm-4  d-none d-md-block ">
                                        <div class="row">
                                            <div class="col-2">
                                                <span class="material-icons text-primary"
                                                    style="font-size: min(16vw, 52px);">account_circle</span>
                                            </div>
                                            <div class="col-10 pt-1 ps-4">
                                                <h5 class="fw-bold mb-0">Police Darpan<i
                                                        class="material-icons small text-success ms-1">verified</i>
                                                </h5>
                                                <span class="fs-13 text-muted">
                                                    <?php echo $Category; ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <span class="fs-13 ms-2 fw-bold float-sm-end">
                                            <?php echo $District; ?>
                                        </span><br>
                                        <span class="fs-13 text-muted ms-2 float-sm-end">
                                            <?php echo $Date; ?>
                                        </span>
                                    </div>
                                </div>
                                <p class="mb-4 fs-15">
                                    <?php echo $Article; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="trending">
                                <h4 class="mb-4 text-primary font-weight-600">
                                    Trending
                                </h4>
                                <?php for ($i=0; $i < 3; $i++) { articleData($trendsIds[$i]);?>
                                <div role="button" title="Click to Read More"
                                    onclick="window.location.href ='./article.php?a=<?php echo $trendsIds[$i]; ?>'"
                                    class="mb-4">
                                    <div class="ratio ratio-16x9">
                                        <img src="<?php echo $thumbnailUrl; ?>" style="object-fit: cover;" alt="banner"
                                            class="img-fluid" />
                                    </div>
                                    <h5 class="mt-3 font-weight-600">
                                        <?php echo $Title; ?>
                                    </h5>
                                    <p class="fs-6 text-muted mb-0">
                                        <span class="mr-2">
                                            <?php echo $District; ?>
                                        </span>
                                        <?php echo $Date; ?>
                                    </p>
                                </div>
                                <?php $idCounter++; } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                        Police Darpan is a humble endeavor to cater to the population of North India spread across the
                        Globe. This is an online newspaper that concentrates on local news from every nook and corner of
                        North India and also of news pertaining to people from the North India spread across the globe.
                    </h6>
                    <a href="#" class="badge bg-white navSocial me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#032a63"
                            class="bi bi-facebook" viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                        </svg>
                    </a>
                    <a href="#" class="badge bg-white navSocial me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#032a63"
                            class="bi bi-youtube" viewBox="0 0 16 16">
                            <path
                                d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                        </svg>
                    </a>
                    <a href="#" class="badge bg-white navSocial me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#032a63"
                            class="bi bi-twitter" viewBox="0 0 16 16">
                            <path
                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                        </svg>
                    </a>
                </div>
                <div class="col-sm-6">
                    <div class="float-end mb-4">
                        <a class="me-2" href="#">
                            <span class="text-light border-end border-secondary pe-3">Admin Login</span>
                        </a>
                        <a href="#">
                            <span class="text-light">Feedback</span>
                        </a>
                    </div>
                    <div class="mb-3">
                        <div class="input-group float-end">
                            <input type="email" class="form-control" placeholder="Enter email"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-success border-rad" type="button" id="button-addon2"> Subscribe
                                Newsletter
                            </button>
                        </div>
                        <div id="emailHelp" class="form-text float-end text-light">Get daily news updates direct in your
                            inbox.
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

    <script>
        "use strict";
        document.addEventListener('DOMContentLoaded', function () {
            // Activate only if not already activated
            if (window.hideYTActivated) return;
            // Activate on all players
            let onYouTubeIframeAPIReadyCallbacks = [];
            for (let playerWrap of document.querySelectorAll(".hytPlayerWrap")) {
                let playerFrame = playerWrap.querySelector("iframe");

                let tag = document.createElement('script');
                tag.src = "https://www.youtube.com/iframe_api";
                let firstScriptTag = document.getElementsByTagName('script')[0];
                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                let onPlayerStateChange = function (event) {
                    if (event.data == YT.PlayerState.ENDED) {
                        playerWrap.classList.add("ended");
                    } else if (event.data == YT.PlayerState.PAUSED) {
                        playerWrap.classList.add("paused");
                    } else if (event.data == YT.PlayerState.PLAYING) {
                        playerWrap.classList.remove("ended");
                        playerWrap.classList.remove("paused");
                    }
                };

                let player;
                onYouTubeIframeAPIReadyCallbacks.push(function () {
                    player = new YT.Player(playerFrame, {
                        events: {
                            'onStateChange': onPlayerStateChange
                        }
                    });
                });

                playerWrap.addEventListener("click", function () {
                    let playerState = player.getPlayerState();
                    if (playerState == YT.PlayerState.ENDED) {
                        player.seekTo(0);
                    } else if (playerState == YT.PlayerState.PAUSED) {
                        player.playVideo();
                    }
                });
            }

            window.onYouTubeIframeAPIReady = function () {
                for (let callback of onYouTubeIframeAPIReadyCallbacks) {
                    callback();
                }
            };

            window.hideYTActivated = true;
        });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"
        integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>