@extends('layouts.admin_loggedin_app')

@section('content')
    <style>
        .bloger-card .blogs-body .top-blog ul.top-list li .list-item, .bloger-card .blogs-body .top-blog ul.top-list li .list-item .item-left, .bloger-card .table-responsive .table tbody tr td .ads-item, .blogger-admin.style-three .section-wrapper .bloger-card .bloger-profile, .blogger-admin.style-three .section-wrapper .bloger-card .bloger-profile .pro-right ul.pro-list, .blogger-admin .bloger-iteml .section-wrapper ul.blogerl-item, .ad-modal .modal-dialog .modal-content .modal-body .body-wrapper, .ad-modal .modal-dialog .modal-content .modal-body .body-wrapper .wrap-left .ad-type ul.ad-list, .ad-modal .modal-dialog .modal-content .modal-body .body-wrapper .wrap-left .ad-type .add-item, .create-form .section-wrapper .form-content .contact-wizard .wizard-acc, .create-form .section-wrapper .form-content .contact-wizard .wizard-acc .acc-content, .create-form .section-wrapper .link-wizard .link-input, .create-form .section-wrapper .link-wizard .price-input, .create-form .section-wrapper .spot-wizard .spot-list, .creat-account .section-wrapper .ac-categori, .creat-account.style-one .section-wrapper, .creat-account.style-three .section-wrapper .ac-form .ac-recover {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }
        .bloger-card .blogs-body .top-blog ul.top-list {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .bloger-card .blogs-body .top-blog ul.top-list .list-header {
            padding-top: 10px;
        }

        .bloger-card .blogs-body .top-blog ul.top-list .list-header span {
            font-size: 18px;
        }

        .bloger-card .blogs-body .top-blog ul.top-list li {
            padding: 5px 0;
            border-bottom: 1px solid #ececec;
        }

        .bloger-card .blogs-body .top-blog ul.top-list li:last-child {
            border-bottom: 0;
            padding-bottom: 0;
        }

        .bloger-card .blogs-body .top-blog ul.top-list li .list-item {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .bloger-card .blogs-body .top-blog ul.top-list li .list-item .item-left {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .bloger-card .blogs-body .top-blog ul.top-list li .list-item .item-left .list-crount span {
            height: 30px;
            width: 30px;
            line-height: 30px;
            text-align: center;
            border-radius: 5px;
            background: #dee2e6;
            display: inline-block;
        }

        .bloger-card .blogs-body .top-blog ul.top-list li .list-item .item-left .list-thumb {
            padding: 0 8px;
        }

        .bloger-card .blogs-body .top-blog ul.top-list li .list-item .item-left .list-thumb img {
            height: 30px;
            width: 30px;
            border-radius: 100%;
        }

        .bloger-card .blogs-body .top-blog ul.top-list li .list-item .item-left .list-text h6 {
            margin: 0;
            font-size: 12px;
        }

        .bloger-card .blogs-body .top-blog ul.top-list li .list-item .item-left .list-text p {
            margin: 0;
            font-size: 10px;
        }

        .bloger-card .blogs-body .top-blog ul.top-list li .list-item .item-right p {
            margin: 0;
            font-weight: 600;
        }

        .bloger-card .blogs-body .top-blog ul.top-list li .list-item .item-right span {
            color: aqua;
        }
    </style>
    <div class="col-xl-9 col-12">
        <div class="crount-card">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="crount-item">
                        <div class="item-left">
                            <div class="left-icon">
                                <i class="fa fa-eye"></i>
                            </div>
                            <div class="left-text">
                                <h6>Website Views</h6>
                                <h4 class="crount">{{$views['website']}}</h4>
                            </div>
                        </div>
                        <div class="item-right">
                            <i class="far fa-question-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-4 mt-sm-0">
                    <div class="crount-item">
                        <div class="item-left">
                            <div class="left-icon">
                                <i class="fa fa-eye"></i>
                            </div>
                            <div class="left-text">
                                <h6>Posts Views</h6>
                                <h4 class="crount">{{$views['post']}}</h4>
                            </div>
                        </div>
                        <div class="item-right">
                            <i class="far fa-question-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-6 col-12 mt-4 mt-lg-0">
                    <div class="crount-item">
                        <div class="item-left">
                            <div class="left-icon">
                                <i class="fa fa-eye"></i>
                            </div>
                            <div class="left-text">
                                <h6>Blogs Views</h6>
                                <h4 class="crount">{{$views['blog']}}</h4>
                            </div>
                        </div>
                        <div class="item-right">
                            <i class="far fa-question-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bloger-card">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="chart-card">
                        <div class="char-header d-flex flex-wrap justify-content-between">
                            <div class="header-left">
                                <h4>Pages (Views)</h4>
                            </div>
                            <div class="header-right d-flex">
                                <div class="page-fillter pe-5">
                                    <div class="dropdown">
                                        <button class="bg-transparent" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span>Week</span><span><i class="fa fa-angle-down ms-2"></i></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another</a></li>
                                            <li><a class="dropdown-item" href="#">Something</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="page-fillter">
                                    <button class="bg-transparent" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span>View</span><i class="fa fa-angle-down ms-2"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another</a></li>
                                        <li><a class="dropdown-item" href="#">Something</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="chart-header">
                            <canvas id="myChart" ></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="avarage-card">
                        <div class="avarage-header">
                            <h6>Avarage reach</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ad-table">
            <div class="bloger-card mt-4">
                <div class="blogs-header">
                    <h4>Advertisment</h4>
                    <button type="button" class="view-more bg-transparent" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        (Pop-up) See All
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table caption-top">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Reach</th>
                            <th>Clik</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="ads-item">
                                    <div class="item-thumb">
                                        <img src="assets/images/blog/category/01.jpg" alt="">
                                    </div>
                                    <div class="item-title">
                                        <h6>Company name</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span>Top Banner</span>
                            </td>
                            <td>
                                <div class="status">
                                    <span class="text-success fw-bold">Active</span>
                                </div>
                            </td>
                            <td>
                                <span><i class="fa fa-calendar-alt me-1"></i> latest update <strong>2021-02-01</strong></span>
                            </td>
                            <td>
                                <span>12 032</span>
                            </td>
                            <td>
                                <span>124</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="bg-transparent" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span><i class="fa fa-ellipsis-v"></i></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                        <li><a class="dropdown-item" href="#">Hide</a></li>
                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="ads-item">
                                    <div class="item-thumb">
                                        <img src="assets/images/blog/category/01.jpg" alt="">
                                    </div>
                                    <div class="item-title">
                                        <h6>Company name</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span>Top Banner</span>
                            </td>
                            <td>
                                <div class="status">
                                    <span class="text-success fw-bold">Active</span>
                                </div>
                            </td>
                            <td>
                                <span><i class="fa fa-calendar-alt me-1"></i> latest update <strong>2021-02-01</strong></span>
                            </td>
                            <td>
                                <span>12 032</span>
                            </td>
                            <td>
                                <span>124</span>
                            </td>
                            <td>
                                <span><i class="fa fa-ellipsis-v"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="ads-item">
                                    <div class="item-thumb">
                                        <img src="assets/images/blog/category/01.jpg" alt="">
                                    </div>
                                    <div class="item-title">
                                        <h6>Company name</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span>Top Banner</span>
                            </td>
                            <td>
                                <div class="status">
                                    <span class="text-success fw-bold">Active</span>
                                </div>
                            </td>
                            <td>
                                <span><i class="fa fa-calendar-alt me-1"></i> latest update <strong>2021-02-01</strong></span>
                            </td>
                            <td>
                                <span>12 032</span>
                            </td>
                            <td>
                                <span>124</span>
                            </td>
                            <td>
                                <span><i class="fa fa-ellipsis-v"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="ads-item">
                                    <div class="item-thumb">
                                        <img src="assets/images/blog/category/01.jpg" alt="">
                                    </div>
                                    <div class="item-title">
                                        <h6>Company name</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span>Top Banner</span>
                            </td>
                            <td>
                                <div class="status">
                                    <span class="text-success fw-bold">Active</span>
                                </div>
                            </td>
                            <td>
                                <span><i class="fa fa-calendar-alt me-1"></i> latest update <strong>2021-02-01</strong></span>
                            </td>
                            <td>
                                <span>12 032</span>
                            </td>
                            <td>
                                <span>124</span>
                            </td>
                            <td>
                                <span><i class="fa fa-ellipsis-v"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="ads-item">
                                    <div class="item-thumb">
                                        <img src="assets/images/blog/category/01.jpg" alt="">
                                    </div>
                                    <div class="item-title">
                                        <h6>Company name</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span>Top Banner</span>
                            </td>
                            <td>
                                <div class="status">
                                    <span class="text-success fw-bold">Active</span>
                                </div>
                            </td>
                            <td>
                                <span><i class="fa fa-calendar-alt me-1"></i> latest update <strong>2021-02-01</strong></span>
                            </td>
                            <td>
                                <span>12 032</span>
                            </td>
                            <td>
                                <span>124</span>
                            </td>
                            <td>
                                <span><i class="fa fa-ellipsis-v"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="ads-item">
                                    <div class="item-thumb">
                                        <img src="assets/images/blog/category/01.jpg" alt="">
                                    </div>
                                    <div class="item-title">
                                        <h6>Company name</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span>Top Banner</span>
                            </td>
                            <td>
                                <div class="status">
                                    <span class="text-success fw-bold">Active</span>
                                </div>
                            </td>
                            <td>
                                <span><i class="fa fa-calendar-alt me-1"></i> latest update <strong>2021-02-01</strong></span>
                            </td>
                            <td>
                                <span>12 032</span>
                            </td>
                            <td>
                                <span>124</span>
                            </td>
                            <td>
                                <span><i class="fa fa-ellipsis-v"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="ads-item">
                                    <div class="item-thumb">
                                        <img src="assets/images/blog/category/01.jpg" alt="">
                                    </div>
                                    <div class="item-title">
                                        <h6>Company name</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span>Top Banner</span>
                            </td>
                            <td>
                                <div class="status">
                                    <span class="text-success fw-bold">Active</span>
                                </div>
                            </td>
                            <td>
                                <span><i class="fa fa-calendar-alt me-1"></i> latest update <strong>2021-02-01</strong></span>
                            </td>
                            <td>
                                <span>12 032</span>
                            </td>
                            <td>
                                <span>124</span>
                            </td>
                            <td>
                                <span><i class="fa fa-ellipsis-v"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="ads-item">
                                    <div class="item-thumb">
                                        <img src="assets/images/blog/category/01.jpg" alt="">
                                    </div>
                                    <div class="item-title">
                                        <h6>Company name</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span>Top Banner</span>
                            </td>
                            <td>
                                <div class="status">
                                    <span class="text-success fw-bold">Active</span>
                                </div>
                            </td>
                            <td>
                                <span><i class="fa fa-calendar-alt me-1"></i> latest update <strong>2021-02-01</strong></span>
                            </td>
                            <td>
                                <span>12 032</span>
                            </td>
                            <td>
                                <span>124</span>
                            </td>
                            <td>
                                <span><i class="fa fa-ellipsis-v"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="ads-item">
                                    <div class="item-thumb">
                                        <img src="assets/images/blog/category/01.jpg" alt="">
                                    </div>
                                    <div class="item-title">
                                        <h6>Company name</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span>Top Banner</span>
                            </td>
                            <td>
                                <div class="status">
                                    <span class="text-success fw-bold">Active</span>
                                </div>
                            </td>
                            <td>
                                <span><i class="fa fa-calendar-alt me-1"></i> latest update <strong>2021-02-01</strong></span>
                            </td>
                            <td>
                                <span>12 032</span>
                            </td>
                            <td>
                                <span>124</span>
                            </td>
                            <td>
                                <span><i class="fa fa-ellipsis-v"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="ads-item">
                                    <div class="item-thumb">
                                        <img src="assets/images/blog/category/01.jpg" alt="">
                                    </div>
                                    <div class="item-title">
                                        <h6>Company name</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span>Top Banner</span>
                            </td>
                            <td>
                                <div class="status">
                                    <span class="text-success fw-bold">Active</span>
                                </div>
                            </td>
                            <td>
                                <span><i class="fa fa-calendar-alt me-1"></i> latest update <strong>2021-02-01</strong></span>
                            </td>
                            <td>
                                <span>12 032</span>
                            </td>
                            <td>
                                <span>124</span>
                            </td>
                            <td>
                                <span><i class="fa fa-ellipsis-v"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="ads-item">
                                    <div class="item-thumb">
                                        <img src="assets/images/blog/category/01.jpg" alt="">
                                    </div>
                                    <div class="item-title">
                                        <h6>Company name</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span>Top Banner</span>
                            </td>
                            <td>
                                <div class="status">
                                    <span class="text-success fw-bold">Active</span>
                                </div>
                            </td>
                            <td>
                                <span><i class="fa fa-calendar-alt me-1"></i> latest update <strong>2021-02-01</strong></span>
                            </td>
                            <td>
                                <span>12 032</span>
                            </td>
                            <td>
                                <span>124</span>
                            </td>
                            <td>
                                <span><i class="fa fa-ellipsis-v"></i></span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-8 col-12">
        <div class="bloger-card mt-4 mt-xl-0">
            <div class="blogs-header">
                <div class="active-status">
                    <h4>Toplist</h4>
                </div>
                <div class="view-more">
                    <a href="#0">See All</a>
                </div>
            </div>
            <div class="blogs-body">
                <div class="top-blog">
                    <ul class="top-list">
                        <div class="list-header">
                            <span>Blogs</span>
                        </div>
                        <li class="pt-0">
                            <div class="list-item">
                                <div class="item-left">
                                    <div class="list-crount">
                                        <span>1</span>
                                    </div>
                                    <div class="list-thumb">
                                        <img src="assets/images/blog/01.png" alt="">
                                    </div>
                                    <div class="list-text">
                                        <h6>Shayna alwik</h6>
                                        <p>view blog</p>
                                    </div>
                                </div>
                                <div class="item-right">
                                    <p>12094</p>
                                    <span>+4771</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="list-item">
                                <div class="item-left">
                                    <div class="list-crount">
                                        <span>1</span>
                                    </div>
                                    <div class="list-thumb">
                                        <img src="assets/images/blog/01.png" alt="">
                                    </div>
                                    <div class="list-text">
                                        <h6>Shayna alwik</h6>
                                        <p>view blog</p>
                                    </div>
                                </div>
                                <div class="item-right">
                                    <p>12094</p>
                                    <span>+4771</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="list-item">
                                <div class="item-left">
                                    <div class="list-crount">
                                        <span>1</span>
                                    </div>
                                    <div class="list-thumb">
                                        <img src="assets/images/blog/01.png" alt="">
                                    </div>
                                    <div class="list-text">
                                        <h6>Shayna alwik</h6>
                                        <p>view blog</p>
                                    </div>
                                </div>
                                <div class="item-right">
                                    <p>12094</p>
                                    <span>+4771</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="top-list">
                        <div class="list-header">
                            <span>Post</span>
                        </div>
                        <li class="pt-0">
                            <div class="list-item">
                                <div class="item-left">
                                    <div class="list-crount">
                                        <span>1</span>
                                    </div>
                                    <div class="list-thumb">
                                        <img src="assets/images/blog/01.png" alt="">
                                    </div>
                                    <div class="list-text">
                                        <h6>Shayna alwik</h6>
                                        <p>view blog</p>
                                    </div>
                                </div>
                                <div class="item-right">
                                    <p>12094</p>
                                    <span>+4771</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="list-item">
                                <div class="item-left">
                                    <div class="list-crount">
                                        <span>1</span>
                                    </div>
                                    <div class="list-thumb">
                                        <img src="assets/images/blog/01.png" alt="">
                                    </div>
                                    <div class="list-text">
                                        <h6>Shayna alwik</h6>
                                        <p>view blog</p>
                                    </div>
                                </div>
                                <div class="item-right">
                                    <p>12094</p>
                                    <span>+4771</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="list-item">
                                <div class="item-left">
                                    <div class="list-crount">
                                        <span>1</span>
                                    </div>
                                    <div class="list-thumb">
                                        <img src="assets/images/blog/01.png" alt="">
                                    </div>
                                    <div class="list-text">
                                        <h6>Shayna alwik</h6>
                                        <p>view blog</p>
                                    </div>
                                </div>
                                <div class="item-right">
                                    <p>12094</p>
                                    <span>+4771</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="top-list">
                        <div class="list-header">
                            <span>Videos</span>
                        </div>
                        <li class="pt-0">
                            <div class="list-item">
                                <div class="item-left">
                                    <div class="list-crount">
                                        <span>1</span>
                                    </div>
                                    <div class="list-thumb">
                                        <img src="assets/images/blog/01.png" alt="">
                                    </div>
                                    <div class="list-text">
                                        <h6>Shayna alwik</h6>
                                        <p>view blog</p>
                                    </div>
                                </div>
                                <div class="item-right">
                                    <p>12094</p>
                                    <span>+4771</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="list-item">
                                <div class="item-left">
                                    <div class="list-crount">
                                        <span>1</span>
                                    </div>
                                    <div class="list-thumb">
                                        <img src="assets/images/blog/01.png" alt="">
                                    </div>
                                    <div class="list-text">
                                        <h6>Shayna alwik</h6>
                                        <p>view blog</p>
                                    </div>
                                </div>
                                <div class="item-right">
                                    <p>12094</p>
                                    <span>+4771</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="list-item">
                                <div class="item-left">
                                    <div class="list-crount">
                                        <span>1</span>
                                    </div>
                                    <div class="list-thumb">
                                        <img src="assets/images/blog/01.png" alt="">
                                    </div>
                                    <div class="list-text">
                                        <h6>Shayna alwik</h6>
                                        <p>view blog</p>
                                    </div>
                                </div>
                                <div class="item-right">
                                    <p>12094</p>
                                    <span>+4771</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
