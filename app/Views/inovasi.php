<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title><?= $tittle ?? 'Kosong'; ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/buleleng.png" />

    <!-- ICON CSS -->
    <link rel="stylesheet" href="/news/js/font-awesome/css/font-awesome.min.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="/news/js/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="/news/css/animate.css" />
    <link rel="stylesheet" href="/news/css/style.css" />

    <!-- MODERNIZR -->
    <script src="/news/js/modernizr-2.8.3-respond-1.4.2.min.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <header class="header header1">
        <nav class="navbar navbar-default" role="navigation">
          <div class="container">
            <!-- <div class="search-bar">
              <input type="search" placeholder="Type search text here..." />
              <div class="search-close"><i class="fa fa-times"></i></div>
            </div> -->
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="https://dinsos.bulelengkab.go.id"><img src="/news/img/2222222.png" class="img-responsive" alt="" /></a>
            </div>
            <!-- <div class="search-trigger pull-right"></div>

            <div class="login pull-right"></div> -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav">
                <!--<li class="dropdown dropdown-v1">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Home--> <!-- <span class="fa fa-angle-down"></span>--></a>
                  <!-- <ul class="dropdown-menu">
								<li><a href="./01_home_01.html">Homepage - 01</a></li>
								<li><a href="./02_home_02.html">Homepage - 02</a></li>
								<li><a href="./03_home_03.html">Homepage - 03</a></li>
								<li><a href="./04_home_04.html">Homepage - 04</a></li>
								<li><a href="./05_home_05.html">Homepage - 05</a></li>
								<li><a href="./06_home_06.html">Homepage - 06</a></li>
								<li><a href="./07_home_07.html">Homepage - 07</a></li>
								<li><a href="./08_home_08.html">Homepage - 08</a></li>
							</ul> -->
                <!-- </li>
                <li class="dropdown dropdown-v1">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <span class="fa fa-angle-down"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="./09_category_01.html">Artikel</a></li>
                    <li><a href="./10_category_02.html">Video</li>
                     
                  </ul>
                </li>-->
                <!-- <li class="dropdown dropdown-v1">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Posts <span class="fa fa-angle-down"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="./17_post_01.html">Post style - 01</a></li>
                    <li><a href="./18_post_02.html">Post Style - 02</a></li>
                    <li><a href="./19_post_03.html">Post Style - 03</a></li>
                    <li><a href="./20_post_04.html">Post Style - 04</a></li>
                  </ul>
                </li>
                <li class="dropdown dropdown-v1">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <span class="fa fa-angle-down"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="./22_headers.html">Headers</a></li>
                    <li><a href="./23_home_sidemenu.html">Header - Sidemenu</a></li>
                    <li><a href="./21_footers.html">Footer</a></li>
                  </ul>
                </li>
                <li class="dropdown dropdown-v1">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Technology <span class="fa fa-angle-down"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Popular</a></li>
                    <li><a href="#">Commented</a></li>
                    <li class="dropdown-parent">
                      <a href="#">Trending</a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Aviation</a></li>
                        <li><a href="#">Boats</a></li>
                        <li><a href="#">Golf</a></li>
                        <li><a href="#">Hunting & Fishing</a></li>
                        <li><a href="#">Snow & Water</a></li>
                        <li><a href="#">Sports</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Videos</a></li>
                    <li><a href="#">Photos</a></li>
                  </ul>
                </li>
                <li class="dropdown dropdown-v1">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Finance <span class="fa fa-angle-down"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Popular</a></li>
                    <li><a href="#">Commented</a></li>
                    <li class="dropdown-parent">
                      <a href="#">Trending</a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Aviation</a></li>
                        <li><a href="#">Boats</a></li>
                        <li><a href="#">Golf</a></li>
                        <li><a href="#">Hunting & Fishing</a></li>
                        <li><a href="#">Snow & Water</a></li>
                        <li><a href="#">Sports</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Videos</a></li>
                    <li><a href="#">Photos</a></li>
                  </ul>
                </li> -->
              </ul>
            </div>
            <!-- /.navbar-collapse -->
          </div>
        </nav>
      </header>

      <div class="inner-content">
        <div class="container">
          <div class="section-head">
            <h2>Articles Dinsos Melawan Lupa</h2>
          </div>

          <div class="row">
            <div class="col-md-8">
            <?php foreach ($tampildata as $d ) :?>
              <article class="style2">
                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <a href="<?= $d->link; ?>">
                      <div class="article-thumb">
                        <img src="<?= $d->image; ?>" class="img-responsive" alt="" />
                      </div>
                    </a>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="post-excerpt">
                      <div class="small-title cat">Dinsos Hadir</div>
                      <h3><a href="<?= $d->link; ?>"><?= $d->judul; ?></a></h3>
                      <div class="meta">
                        <span>by <?= $d->team; ?></span>
                        <!-- <span><?= $d->tgl; ?></span> -->
                        <!-- <span class="comment"><i class="fa fa-comment-o"></i> 1</span> -->
                      </div>
                      <p>
                         <?= $d->isi; ?>              
                        <br><a href="<?= $d->link; ?>" class="small-title rmore">Read More</a>
                      </p>
                    </div>
                  </div>
                </div>
              </article>
              <?php endforeach ?>  
              
              <?= $pager->links() ?>  
              <!-- <ul class="pagi-nation">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#">42</a></li>
              </ul> -->
            </div>

            <aside class="col-md-4">
              <div class="side-widget">
                <h4>Follow Us</h4>
                <div class="side-social">
                  <a href="https://www.facebook.com/profile.php?id=100081074663747"><i class="fa fa-facebook"></i> 460 <span>fans</span></a>
                  <a href="https://twitter.com/HadirDinsos"><i class="fa fa-instagram"></i> 280 <span>followers</span></a>
                  <a href="https://www.youtube.com/channel/UCtkU8OYKDValfeUJJJGnZQg"><i class="fa fa-youtube-play"></i> 57 <span>followers</span></a>
                </div>
              </div>

              <div class="clearfix"></div>

              <!-- <div class="side-widget">
                <h4>Subscribe</h4>
                <div class="side-newsletter text-center">
                  <p>Get the best viral stories straight into your inbox!</p>
                  <form action="php/subscribe.php" id="invite" method="POST">
                    <input placeholder="Your email address" class="e-mail" name="email" id="address" data-validate="validate(required, email)" type="email" />
                    <button type="submit">Sign up</button>
                    <span>Don't worry we don't spam</span>
                  </form>
                </div>
              </div> -->

              <div class="clearfix"></div>

              <div class="side-widget hidden-sm">
                <h4>Video</h4>
                <?php foreach ($hot as $a ) :?>
                <article class="style4">
                <iframe
                      width="500"
                      height="315"
                      src="<?= $a->youtube; ?>"
                      title="YouTube video player"
                      frameborder="0"
                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen
                    ></iframe>
                </article>
                <?php endforeach ?>
                

              <div class="clearfix"></div>

              <div class="side-widget">
                <h4>Most</h4>

                <div role="tabpanel">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs nav-justified" role="tablist">
                    <!-- <li role="presentation" class="active">
                      <a href="#popular" aria-controls="popular" role="tab" data-toggle="tab">Popular</a>
                    </li> -->
                    <!-- <li role="presentation">
                      <a href="#commented" aria-controls="commented" role="tab" data-toggle="tab">Commented</a>
                    </li>
                    <li role="presentation">
                      <a href="#viewed" aria-controls="viewed" role="tab" data-toggle="tab">Viewed</a>
                    </li> -->
                  </ul>

                  <!-- Tab panes -->
                  
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active fade in" id="popular">
                      <?php foreach ($popular as $b ) :?>
                      <article class="style4">
                        <a href="<?= $b->link; ?>">
                          <div class="overlay overlay-02"></div>
                          <div class="post-thumb">
                            <div class="small-title cat"><?= $b->team; ?></div>
                            <div class="post-excerpt">
                              <div class="meta">
                                <span class="date"><?= $b->tgl; ?></span>
                              </div>
                              <h3 class="text-white"><?= $b->judul; ?></h3>
                            </div>
                            <img src="<?= $b->image; ?>" class="bg-img img-full" alt="" />
                          </div>
                        </a>
                      </article>
                      <?php endforeach ?>
                      <div class="mini-posts">
                      <?php foreach ($cili as $c ) :?>
                        <article class="style2">
                          <div class="row">
                            <div class="col-md-4 col-sm-4">
                              <a href="<?= $c->link; ?>">
                                <div class="article-thumb">
                                  <img src="<?= $c->image; ?>" class="img-responsive" alt="" />
                                </div>
                              </a>
                            </div>
                            <div class="col-md-8 col-sm-8">
                              <div class="post-excerpt no-padding">
                                <div class="meta">
                                  <span><?= $c->tgl; ?></span>
                                </div>
                                <h5><a href="<?= $c->link; ?>"><?= $c->judul; ?></a></h5>
                              </div>
                            </div>
                          </div>
                        </article>
                        <?php endforeach ?>
                      </div>
                    </div>

                    <!-- <div role="tabpanel" class="tab-pane fade in" id="commented">
                      <article class="style4">
                        <a href="../17_post_01.html">
                          <div class="overlay overlay-02"></div>
                          <div class="post-thumb">
                            <div class="small-title cat">Market</div>
                            <div class="post-excerpt">
                              <div class="meta">
                                <span class="date">Sep 22,2016</span>
                              </div>
                              <h3 class="text-white">Solange Knowles Will Release Her New Album on Friday</h3>
                            </div>
                            <img src="/news/img/category/08/4.jpg" class="bg-img img-responsive" alt="" />
                          </div>
                        </a>
                      </article>
                      <div class="mini-posts">
                        <article class="style2">
                          <div class="row">
                            <div class="col-md-4">
                              <a href="../17_post_01.html">
                                <div class="article-thumb">
                                  <img src="/news/img/category/08/8.jpg" class="img-responsive" alt="" />
                                </div>
                              </a>
                            </div>
                            <div class="col-md-8">
                              <div class="post-excerpt no-padding">
                                <div class="meta">
                                  <span>Sep 19, 2016</span>
                                </div>
                                <h5><a href="./17_post_01.html">What You Missed While Not Watching the Debate</a></h5>
                              </div>
                            </div>
                          </div>
                        </article>
                        <article class="style2">
                          <div class="row">
                            <div class="col-md-4">
                              <a href="../17_post_01.html">
                                <div class="article-thumb">
                                  <img src="/news/img/category/08/8.jpg" class="img-responsive" alt="" />
                                </div>
                              </a>
                            </div>
                            <div class="col-md-8">
                              <div class="post-excerpt no-padding">
                                <div class="meta">
                                  <span>Sep 19, 2016</span>
                                </div>
                                <h5><a href="./17_post_01.html">What You Missed While Not Watching the Debate</a></h5>
                                <div class="meta">
                                  <span class="comment"><i class="fa fa-comment-o"></i> 18</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </article>
                        <article class="style2">
                          <div class="row">
                            <div class="col-md-4">
                              <a href="../17_post_01.html">
                                <div class="article-thumb">
                                  <img src="/news/img/category/08/8.jpg" class="img-responsive" alt="" />
                                </div>
                              </a>
                            </div>
                            <div class="col-md-8">
                              <div class="post-excerpt no-padding">
                                <div class="meta">
                                  <span>Sep 19, 2016</span>
                                </div>
                                <h5><a href="./17_post_01.html">What You Missed While Not Watching the Debate</a></h5>
                              </div>
                            </div>
                          </div>
                        </article>
                        <article class="style2">
                          <div class="row">
                            <div class="col-md-4">
                              <a href="../17_post_01.html">
                                <div class="article-thumb">
                                  <img src="/news/img/category/08/8.jpg" class="img-responsive" alt="" />
                                </div>
                              </a>
                            </div>
                            <div class="col-md-8">
                              <div class="post-excerpt no-padding">
                                <div class="meta">
                                  <span>Sep 19, 2016</span>
                                </div>
                                <h5><a href="./17_post_01.html">What You Missed While Not Watching the Debate</a></h5>
                              </div>
                            </div>
                          </div>
                        </article>
                      </div>
                    </div>

                    <div role="tabpanel" class="tab-pane fade in" id="viewed">
                      <article class="style4">
                        <a href="../17_post_01.html">
                          <div class="overlay overlay-02"></div>
                          <div class="post-thumb">
                            <div class="small-title cat">Market</div>
                            <div class="post-excerpt">
                              <div class="meta">
                                <span class="date">Sep 22,2016</span>
                              </div>
                              <h3 class="text-white">Solange Knowles Will Release Her New Album on Friday</h3>
                            </div>
                            <img src="/news/img/category/08/4.jpg" class="bg-img img-responsive" alt="" />
                          </div>
                        </a>
                      </article>

                      <div class="mini-posts">
                        <article class="style2">
                          <div class="row">
                            <div class="col-md-4">
                              <a href="../17_post_01.html">
                                <div class="article-thumb">
                                  <img src="/news/img/category/08/8.jpg" class="img-responsive" alt="" />
                                </div>
                              </a>
                            </div>
                            <div class="col-md-8">
                              <div class="post-excerpt no-padding">
                                <div class="meta">
                                  <span>Sep 19, 2016</span>
                                </div>
                                <h5><a href="./17_post_01.html">What You Missed While Not Watching the Debate</a></h5>
                              </div>
                            </div>
                          </div>
                        </article>

                        <article class="style2">
                          <div class="row">
                            <div class="col-md-4">
                              <a href="../17_post_01.html">
                                <div class="article-thumb">
                                  <img src="/news/img/category/08/8.jpg" class="img-responsive" alt="" />
                                </div>
                              </a>
                            </div>
                            <div class="col-md-8">
                              <div class="post-excerpt no-padding">
                                <div class="meta">
                                  <span>Sep 19, 2016</span>
                                </div>
                                <h5><a href="./17_post_01.html">What You Missed While Not Watching the Debate</a></h5>
                                <div class="meta">
                                  <span class="comment"><i class="fa fa-comment-o"></i> 18</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </article>

                        <article class="style2">
                          <div class="row">
                            <div class="col-md-4">
                              <a href="../17_post_01.html">
                                <div class="article-thumb">
                                  <img src="/news/img/category/08/8.jpg" class="img-responsive" alt="" />
                                </div>
                              </a>
                            </div>
                            <div class="col-md-8">
                              <div class="post-excerpt no-padding">
                                <div class="meta">
                                  <span>Sep 19, 2016</span>
                                </div>
                                <h5><a href="./17_post_01.html">What You Missed While Not Watching the Debate</a></h5>
                              </div>
                            </div>
                          </div>
                        </article>

                        <article class="style2">
                          <div class="row">
                            <div class="col-md-4">
                              <a href="../17_post_01.html">
                                <div class="article-thumb">
                                  <img src="/news/img/category/08/8.jpg" class="img-responsive" alt="" />
                                </div>
                              </a>
                            </div>
                            <div class="col-md-8">
                              <div class="post-excerpt no-padding">
                                <div class="meta">
                                  <span>Sep 19, 2016</span>
                                </div>
                                <h5><a href="./17_post_01.html">What You Missed While Not Watching the Debate</a></h5>
                              </div>
                            </div>
                          </div>
                        </article>
                      </div>
                    </div> -->
                  </div>
                </div>
                <!-- TABS -->
              </div>

              <div class="clearfix"></div>

              <div class="side-widget">
                <h4><i class="fa fa-instagram"></i> &nbsp;Instagram</h4>
                <ul class="instagram-lite"></ul>
              </div>

              <div class="clearfix"></div>

              <div class="side-widget">
                <h4>Tweets</h4>
                <div id="tweecool"></div>
              </div>
            </aside>
          </div>
        </div>
      </div>

      <footer class="margin-top-30">
        <div class="container">
          <div class="footer-head">
            <div class="row center-content">
              <div class="col-md-2 col-sm-3">
                <a href="./index.html">
                  <img src="/news/img/2222221.png" class="img-responsive" alt="" />
                </a>
              </div>
              <!-- <div class="col-md-6 col-sm-4">
                <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse</p>
              </div>
              <div class="col-md-4 col-sm-5">
                <form class="footer-search">
                  <input type="search" placeholder="Search" />
                  <button type="submit"><i class="fa fa-search"></i></button>
                </form>
              </div> -->
            </div>
          </div>

          <!-- <div class="footer-content">
            <div class="row">
              <div class="col-md-2 col-sm-2">
                <h5 class="text-white">Life</h5>
                <ul class="footer-links">
                  <li><a href="#">People</a></li>
                  <li><a href="#">Entertain This!</a></li>
                  <li><a href="#">Movies</a></li>
                  <li><a href="#">Music</a></li>
                  <li><a href="#">TV</a></li>
                  <li><a href="#">Books</a></li>
                </ul>
              </div>
              <div class="col-md-2 col-sm-2">
                <h5 class="text-white">Money</h5>
                <ul class="footer-links">
                  <li><a href="#">People</a></li>
                  <li><a href="#">Entertain This!</a></li>
                  <li><a href="#">Movies</a></li>
                  <li><a href="#">Music</a></li>
                  <li><a href="#">TV</a></li>
                  <li><a href="#">Books</a></li>
                </ul>
              </div>
              <div class="col-md-2 col-sm-2">
                <h5 class="text-white">Tech</h5>
                <ul class="footer-links">
                  <li><a href="#">People</a></li>
                  <li><a href="#">Entertain This!</a></li>
                  <li><a href="#">Movies</a></li>
                  <li><a href="#">Music</a></li>
                  <li><a href="#">TV</a></li>
                  <li><a href="#">Books</a></li>
                </ul>
              </div>
              <div class="col-md-2 col-sm-2">
                <h5 class="text-white">Travel</h5>
                <ul class="footer-links">
                  <li><a href="#">People</a></li>
                  <li><a href="#">Entertain This!</a></li>
                  <li><a href="#">Movies</a></li>
                  <li><a href="#">Music</a></li>
                  <li><a href="#">TV</a></li>
                  <li><a href="#">Books</a></li>
                </ul>
              </div>
              <div class="col-md-2 col-sm-2">
                <h5 class="text-white">Sport</h5>
                <ul class="footer-links">
                  <li><a href="#">People</a></li>
                  <li><a href="#">Entertain This!</a></li>
                  <li><a href="#">Movies</a></li>
                  <li><a href="#">Music</a></li>
                  <li><a href="#">TV</a></li>
                  <li><a href="#">Books</a></li>
                </ul>
              </div>
              <div class="col-md-2 col-sm-2">
                <h5 class="text-white">Follow Us</h5>
                <ul class="footer-social">
                  <li><a href="#">Facebook</a></li>
                  <li><a href="#">Twitter</a></li>
                  <li><a href="#">Google +</a></li>
                  <li><a href="#">Instagram</a></li>
                  <li><a href="#">Youtube</a></li>
                </ul>
              </div>
            </div>
          </div>

          <div class="footer-bottom">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <p>&copy; 2016 Crucial.com. All rights reserved.</p>
              </div>
              <div class="col-md-6 col-sm-6 text-right">
                <ul class="list-inline">
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Work With Us</a></li>
                  <li><a href="#">Advertise</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Terms of Service</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div> -->
      </footer>
    </div>

    <!-- jQuery -->
    <script src="/news/js/jquery.min.js"></script>
    <script src="/news/js/bootstrap/bootstrap.min.js"></script>
    <script src="/news/js/theme.js"></script>

    <!-- Instagram Feed -->
    <script src="/news/js/instagramLite.min.js"></script>
    <script>
      $(".instagram-lite").instagramLite({
        //Replace ACCESSTOKEN with your twitter username
        accessToken: "1730464.199554e.e561d1b801d74e35a1453110a44a09e8",
        urls: true,
        limit: 6,
        captions: false,
        likes: false,
        comments_count: false,
        success: function () {
          console.log("The request was successful!");
        },
        error: function () {
          console.log("There was an error with your request.");
        },
      });
    </script>

    <!-- Twitterfeed -->
    <script src="/news/js/tweecool.min.js"></script>
    <script>
      $(document).ready(function () {
        $("#tweecool").tweecool({
          //Replace TWEECOOL with your twitter username
          username: "mdbudhi",
          profile_image: false,
          limit: 3,
        });
      });
    </script>
  </body>
</html>
