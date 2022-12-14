<?php
require_once 'backend/core.php';
require_once('./components/header.php'); ?>

<body>
    <?php require_once('./components/navbar.php'); ?>

    <div class="container-fluid d-flex justify-content-center align-items-center dollorContainer">
        <div class="dollors">
            <span style="--i:11;">$</span>
            <span style="--i:12;">$</span>
            <span style="--i:24;">$</span>
            <span style="--i:10;">$</span>
            <span style="--i:14;">$</span>
            <span style="--i:23;">$</span>
            <span style="--i:18;">$</span>
            <span style="--i:16;">$</span>
            <span style="--i:29;">$</span>
            <span style="--i:20;">$</span>
            <span style="--i:22;">$</span>
            <span style="--i:25;">$</span>
            <span style="--i:18;">$</span>
            <span style="--i:21;">$</span>
            <span style="--i:15;">$</span>
            <span style="--i:13;">$</span>
            <span style="--i:26;">$</span>
            <span style="--i:17;">$</span>
        </div>
    </div>
    <div class="cursor"></div>

    <script>
    const cursor = document.querySelector(".cursor");

    document.addEventListener("mousemove", (e) => {
        cursor.setAttribute(
            "style",
            "top: " + (e.pageY - 10) + "px; left: " + (e.pageX - 10) + "px;"
        );
    });

    document.addEventListener("click", () => {
        cursor.classList.add("expand");

        setTimeout(() => {
            cursor.classList.remove("expand");
        }, 500);
    })
    </script>
    <div class="container-fluid mainContainer">
        <div class="row mainRow">
            <div class="col-md-12 text-center mainColumn">
                <h1 class="text-center mainHeading">Lorem Ipsum&nbsp;<br><strong>dolor sit amet,
                        consectetur</strong><br></h1><button
                    class="btn btn-danger btn-lg text-center mx-auto mt-5 mainButton" type="button">Learn More</button>
            </div>
        </div>
    </div>
    <section id="services" class="services indexContainer">
        <div class="container-md section-title">
            <div class="row">
                <div class="col-12 text-center col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="text-center icon-box">
                        <div class="icon"><i class="fab fa-dribbble" style="margin-bottom: 15px;"></i>
                            <h4 class="title">Service 001<a href="#"></a></h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                                excepturi<br>&nbsp; &nbsp; &nbsp;&nbsp;</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="text-center icon-box">
                        <div class="icon"><i class="fab fa-renren" style="margin-bottom: 15px;"></i>
                            <h4 class="title">Service 002<a href="#"></a></h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                                excepturi<br>&nbsp; &nbsp; &nbsp;&nbsp;</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="text-center icon-box">
                        <div class="icon"><i class="fab fa-codepen" style="margin-bottom: 15px;"></i>
                            <h4 class="title">Service 003<a href="#"></a></h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                                excepturi<br>&nbsp; &nbsp; &nbsp;&nbsp;</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="text-center icon-box">
                        <div class="icon"><i class="fab fa-telegram" style="margin-bottom: 15px;"></i>
                            <h4 class="title">Service 004</h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                                excepturi<br>&nbsp; &nbsp; &nbsp;&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="d-flex flex-column justify-content-center align-items-center imageSection indexContainer">
        <h2 class="text-center text-danger subTopic"><strong><span style="color: rgb(255, 255, 255);">Lorem
                    Ipsum&nbsp;dolor sit amet, consectetur</span></strong><br></h2>
        <p class="text-white">Description</p><a class="btn btn-danger fw-bold" role="button">View More</a>
    </section>
    <div class="container headingContainer mb-5">
        <h2 class="text-center text-white homeSubTopics" data-aos="fade-up" data-aos-duration="1000"
            data-aos-delay="500">Why iTrustLD?</h2>
        <p class="text-center text-white-50" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1000">Short
            Description</p>
    </div>
    <div class="container indexContainer">
        <div class="row blurRow">
            <div
                class="col-md-6 d-flex flex-column align-items-end align-items-sm-start align-items-md-start align-items-lg-end align-items-xl-end align-items-xxl-end">
                <h3 class="text-end text-danger subTopic w-75">Heading</h3>
                <p class="text-end text-white w-75 fs-5 fw-semibold"><br>Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ullamcorper a
                    lacus vestibulum sed arcu non.&nbsp;<br></p>
            </div>
            <div class="col-md-6"><img class="img-fluid whyImage" src="assets/img/Crypto%20portfolio.gif"></div>
        </div>
    </div>
    <div class="container indexContainer" id="whyUp">
        <div class="row">
            <div class="col-md-6"><img class="img-fluid whyImage" src="assets/img/Investment%20data.gif"></div>
            <div class="col-md-6">
                <h3 class="text-danger subTopic">Heading</h3>
                <p class="text-white w-75 fs-5 fw-semibold"><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ullamcorper a lacus vestibulum
                    sed arcu non. Erat nam at lectus urna duis convallis convallis tellus. Proin fermentum leo vel orci
                    porta. Sed risus ultricies tristique nulla aliquet enim tortor.&nbsp;<br><br></p>
            </div>
        </div>
    </div>
    <div class="container indexContainer">
        <div class="row blurRow">
            <div class="col-md-6 d-flex flex-column align-items-end">
                <h3 class="text-end text-danger subTopic w-75">Heading</h3>
                <p class="text-end text-white w-75 fs-5 fw-semibold"><br>Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ullamcorper a
                    lacus vestibulum sed arcu non. Erat nam at lectus urna duis convallis convallis tellus.&nbsp;<br>
                </p>
            </div>
            <div class="col-md-6"><img class="img-fluid whyImage" src="assets/img/Analytics.gif"></div>
        </div>
    </div>
    <div class="container headingContainer mb-5">
        <h1 class="text-center text-white homeSubTopics indexContainer" data-aos="fade-up" data-aos-duration="1000"
            data-aos-delay="500">Video Tutorials</h1>
        <p class="text-center text-white-50" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1000">Short
            Description</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="d-xxl-flex flex-column justify-content-xxl-center p-3 bg bg-dark rounded-3 mt-2"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500"><iframe allowfullscreen=""
                        frameborder="0" src="https://www.youtube.com/embed/aXhYOCs8ViM" class="tutorialThumbnail"
                        width="250" height="250"></iframe>
                    <h5 class="text-white mt-3">Video Tutorial topic</h5><button class="btn btn-danger fw-bold my-2"
                        type="button">View More</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-xxl-flex flex-column justify-content-xxl-center p-3 bg bg-dark rounded-3 mt-2"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1000"><iframe allowfullscreen=""
                        frameborder="0" src="https://www.youtube.com/embed/aXhYOCs8ViM" class="tutorialThumbnail"
                        width="250" height="250"></iframe>
                    <h5 class="text-white mt-3">Video Tutorial topic</h5><button class="btn btn-danger fw-bold my-2"
                        type="button">View More</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-xxl-flex flex-column justify-content-xxl-center p-3 bg bg-dark rounded-3 mt-2"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1500"><iframe allowfullscreen=""
                        frameborder="0" src="https://www.youtube.com/embed/aXhYOCs8ViM" class="tutorialThumbnail"
                        width="250" height="250"></iframe>
                    <h5 class="text-white mt-3">Video Tutorial topic</h5><button class="btn btn-danger fw-bold my-2"
                        type="button">View More</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="d-xxl-flex flex-column justify-content-xxl-center p-3 bg bg-dark rounded-3 mt-2"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500"><iframe allowfullscreen=""
                        frameborder="0" src="https://www.youtube.com/embed/aXhYOCs8ViM" class="tutorialThumbnail"
                        width="250" height="250"></iframe>
                    <h5 class="text-white mt-3">Video Tutorial topic</h5><button class="btn btn-danger fw-bold my-2"
                        type="button">View More</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-xxl-flex flex-column justify-content-xxl-center p-3 bg bg-dark rounded-3 mt-2"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1000"><iframe allowfullscreen=""
                        frameborder="0" src="https://www.youtube.com/embed/aXhYOCs8ViM" class="tutorialThumbnail"
                        width="250" height="250"></iframe>
                    <h5 class="text-white mt-3">Video Tutorial topic</h5><button class="btn btn-danger fw-bold my-2"
                        type="button">View More</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-xxl-flex flex-column justify-content-xxl-center p-3 bg bg-dark rounded-3 mt-2"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1500"><iframe allowfullscreen=""
                        frameborder="0" src="https://www.youtube.com/embed/aXhYOCs8ViM" class="tutorialThumbnail"
                        width="250" height="250"></iframe>
                    <h5 class="text-white mt-3">Video Tutorial topic</h5><button class="btn btn-danger fw-bold my-2"
                        type="button">View More</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bottomContainer"></div>


    <?php require_once('./components/footer.php') ?>