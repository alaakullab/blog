@extends('home.index')

@section('content')

    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {
            height: 1500px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

            .active {
                background-color: #5cb85c;
            }

            .row.content {
                height: auto;
            }
        }
    </style>
    <div style=" background-color: #F2F2F2;">
        <section id="hire" style=" padding: 30px 0 0px 0;">
            <div class="container">

                <div class="container-fluid">
                    <div class="col-md-12 col-sm-10 ">

                        <div class="row content">

                            <div class="col-sm-3 sidenav">
                                <div class="row">
                                    <div class="col-sm-3 col-md-12">
                                        <div class="thumbnail">
                                                    <img
                                                        src="https://scontent.fjrs5-1.fna.fbcdn.net/v/t1.0-9/37973277_117327459196412_4696052696677875712_n.jpg?_nc_cat=0&oh=2965e5573d88a6cc23799480aed72a5c&oe=5C0C26C3"
                                                        alt="...">

                                            <div class="caption">
                                                <h3>John's Blog</h3>
                                                <p>...</p>
                                                <p><a href="#" class="btn btn-primary" role="button">Button</a> <a
                                                        href="#" class="btn btn-default" role="button">Button</a></p>
                                            </div>

                                            <ul class="nav nav-pills nav-stacked">
                                                <li class="active"><a href="#section1">Home</a></li>
                                                <li><a href="#section2">Friends</a></li>
                                                <li><a href="#section3">Family</a></li>
                                                <li><a href="#section3">Photos</a></li>
                                            </ul>

                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9">
                                <div class="thumbnail"
                                     style="box-shadow: 0 1px 6px rgba(57,73,76,0.35); padding: 20px 30px;">

                                    <h4>
                                        <small>RECENT POSTS</small>
                                    </h4>
                                    <hr>
                                    <h2>I Love Food</h2>
                                    <h5><span class="glyphicon glyphicon-time"></span> Post by Jane Dane, Sep 27,
                                        2015.
                                    </h5>
                                    <h5><span class="label label-danger">Food</span> <span
                                            class="label label-primary">Ipsum</span></h5><br>
                                    <p>Food is my passion. Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed
                                        do
                                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                        veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat.
                                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt
                                        mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod
                                        tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <br><br>

                                    <h4>
                                        <small>RECENT POSTS</small>
                                    </h4>
                                    <hr>
                                    <h2>Officially Blogging</h2>
                                    <h5><span class="glyphicon glyphicon-time"></span> Post by John Doe, Sep 24,
                                        2015.
                                    </h5>
                                    <h5><span class="label label-success">Lorem</span></h5><br>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        Excepteur
                                        sint
                                        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                        anim
                                        id
                                        est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                        labore
                                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                        ullamco
                                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <hr>

                                    <h4>Leave a Comment:</h4>
                                    <form role="form">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </form>
                                    <br><br>

                                    <p><span class="badge">2</span> Comments:</p><br>

                                    <div class="row">
                                        <div class="col-sm-2 text-center">
                                            <img src="bandmember.jpg" class="img-circle" height="65" width="65"
                                                 alt="Avatar">
                                        </div>
                                        <div class="col-sm-10">
                                            <h4>Anja
                                                <small>Sep 29, 2015, 9:12 PM</small>
                                            </h4>
                                            <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit
                                                amet,
                                                consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                                labore
                                                et
                                                dolore magna aliqua.</p>
                                            <br>
                                        </div>
                                        <div class="col-sm-2 text-center">
                                            <img src="bird.jpg" class="img-circle" height="65" width="65"
                                                 alt="Avatar">
                                        </div>
                                        <div class="col-sm-10">
                                            <h4>John Row
                                                <small>Sep 25, 2015, 8:25 PM</small>
                                            </h4>
                                            <p>I am so happy for you man! Finally. I am looking forward to read
                                                about
                                                your
                                                trendy life. Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit,
                                                sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            <br>
                                            <p><span class="badge">1</span> Comment:</p><br>
                                            <div class="row">
                                                <div class="col-sm-2 text-center">
                                                    <img src="bird.jpg" class="img-circle" height="65" width="65"
                                                         alt="Avatar">
                                                </div>
                                                <div class="col-xs-10">
                                                    <h4>Nested Bro
                                                        <small>Sep 25, 2015, 8:28 PM</small>
                                                    </h4>
                                                    <p>Me too! WOW!</p>
                                                    <br>
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
        </section>
    </div>

@stop
