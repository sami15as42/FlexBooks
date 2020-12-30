<!DOCTYPE html>
<?php
class Book
{
    public $name;
    public $path;

    public function __construct($name, $path)
    {
        $this->name = $name;
        $this->path = $path;
    }
}

 function ajouter_vue(){
     $fichier = "../assets" . DIRECTORY_SEPARATOR . "VisitorsNumber.txt";
     $compteur = 1;
     if(file_exists($fichier)){
         $compteur=(int)file_get_contents($fichier) + 1;
         file_put_contents($fichier,$compteur);
     } else {
        file_put_contents($fichier,'1');
     }
     return $compteur;
 }

 function count_books($dossier)
 {
    $cpt = 0;
     $files = scandir($dossier);
     for($i=2;$i<count($files);$i++)
     {
         if(is_dir($dossier . DIRECTORY_SEPARATOR .$files[$i]))
         {
             $cpt += count_books($dossier . DIRECTORY_SEPARATOR . $files[$i]);
         }
         else $cpt++;
     }
    return $cpt;
 }

 function count_categories($dossier){
     return count(scandir($dossier))-2;
 }

function parcourir_fichiers($dossier)
{
    $files = scandir($dossier);
    $books = [];
    for($i=2;$i<count($files);$i++)
    {
        if(is_dir($dossier . DIRECTORY_SEPARATOR .$files[$i]))
        {
            $files1 = parcourir_fichiers($dossier . DIRECTORY_SEPARATOR . $files[$i]);
            foreach($files1 as $file)
            {
                $books[] = $file;
            }
        }
        else $books[] = new Book($files[$i],$dossier);
    }
    return $books;
}

function get_categories($path)
{
    $categories = scandir($path);
    array_shift($categories);
    array_shift($categories);
    return $categories;
}

$dossier = "../assets" . DIRECTORY_SEPARATOR . "Categories";
//$array = parcourir_fichiers($dossier);
$array = get_categories($dossier);
$visitors_number = ajouter_vue();
$books_number = count_books($dossier);
$categories_number = count_categories($dossier);
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Kindle : Home</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="../assets/images/favicon.ico"/>
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Slick slider -->
    <link href="../assets/css/slick.css" rel="stylesheet">
    <!-- Theme color -->
    <link id="switcher" href="../assets/css/theme-color/lite-blue-theme.css" rel="stylesheet">

    <!-- Main Style -->
    <link href="../style.css" rel="stylesheet">

    <!-- Fonts -->

    <!-- Open Sans for body font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">
    <!-- Lato for Title -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>


<!-- Start Header -->
<header id="mu-header" class="" role="banner">
    <div class="container">
        <nav class="navbar navbar-default mu-navbar">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Text Logo -->
                    <a class="navbar-brand" href="index.html"><i class="fa fa-book" aria-hidden="true"></i> Kindle</a>

                    <!-- Image Logo -->
                    <!-- <a class="navbar-brand" href="index.html"><img src="assets/images/logo.png"></a> -->


                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav mu-menu navbar-right">
                        <li><a href="#">HOME</a></li>
                        <li><a href="#mu-book-overview">OVERVIEW</a></li>
                        <li><a href="#mu-author">AUTHOR</a></li>
                        <li><a href="#mu-contact">CONTACT</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
</header>
<!-- End Header -->

<!-- Start Featured Slider -->

<section id="mu-hero">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-6 col-sm-push-6">
                <div class="mu-hero-right">
                    <img src="https://preview.colorlib.com/theme/author/images/undraw_book_lover_mkck.svg" alt="Ebook img">
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-sm-pull-6">
                <div class="mu-hero-left">
                    <h1>Perfect Landing Page Template to Present Your eBook</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam saepe, recusandae quidem nulla! Eveniet explicabo perferendis aut, ab quos omnis labore laboriosam quisquam hic deserunt ipsum maxime aspernatur velit impedit.</p>
                    <a href="#" class="mu-primary-btn">Download Now!</a>
                    <span>*Avaliable in PDF, ePUB, Mobi & Kindle.</span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Start Featured Slider -->

<!-- Start main content -->

<main role="main">

    <!-- Start Counter -->
    <section id="mu-counter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-counter-area">

                        <div class="mu-counter-block">
                            <div class="row">

                                <!-- Start Single Counter -->
                                <div class="col-md-4 col-sm-6">
                                    <div class="mu-single-counter">
                                        <i class="fa fa-files-o" aria-hidden="true"></i>
                                        <div class="counter-value"><?=$books_number?></div>
                                        <h5 class="mu-counter-name">Total Pages</h5>
                                    </div>
                                </div>
                                <!-- / Single Counter -->

                                <!-- Start Single Counter -->
                                <div class="col-md-4 col-sm-6">
                                    <div class="mu-single-counter">
                                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                        <div class="counter-value"><?= $categories_number?></div>
                                        <h5 class="mu-counter-name">Chapters</h5>
                                    </div>
                                </div>
                                <!-- / Single Counter -->

                                <!-- Start Single Counter -->
                                <div class="col-md-4 col-sm-6">
                                    <div class="mu-single-counter">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        <div class="counter-value"><?= $visitors_number?></div>
                                        <h5 class="mu-counter-name">Active Readers</h5>
                                    </div>
                                </div>


                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Counter -->

    <!-- Start Book Overview -->
    <section id="mu-book-overview">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-book-overview-area">

                        <div class="mu-heading-area">
                            <h2 class="mu-heading-title">Book Overview</h2>
                            <span class="mu-header-dot"></span>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                        </div>

                        <!-- Start Book Overview Content -->
                        <div class="mu-book-overview-content">
                            <div class="row">

                                <!-- Book Overview Single Content -->
                                <?php foreach($array as $fichier): ?>
                                <div class="col-md-4 col-sm-6">
                                    <div class="mu-book-overview-single" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
											<span class="mu-book-overview-icon-box">
												<i class="fa fa-area-chart" aria-hidden="true"></i>
											</span>
                                        <h6>COURS</h6>
                                        <p><?= $fichier ?></p>
                                    </div>
                                </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                        <!-- End Book Overview Content -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Book Overview -->





    <!-- Start Author -->
    <section id="mu-author">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-author-area">

                        <div class="mu-heading-area">
                            <h2 class="mu-heading-title">About The Author</h2>
                            <span class="mu-header-dot"></span>
                        </div>

                        <!-- Start Author Content -->
                        <div class="mu-author-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mu-author-image">
                                        <img src="assets/images/author.jpg" alt="Author Image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mu-author-info">
                                        <h3>John Doe</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo suscipit facilis ipsum ullam reiciendis odio error iste neque ratione libero rem accusamus voluptatibus, nihil unde maiores sunt nisi. Assumenda, consectetur.</p>

                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate, dolorem error neque! Dolores similique ut iusto odit esse ipsam, nesciunt pariatur animi minima maiores mollitia cupiditate ad ipsum deleniti perspiciatis!</p>
                                        <img class="mu-author-sign" src="assets/images/author-signature.png" alt="Author Signature">

                                        <div class="mu-author-social">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Author Content -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Author -->

    <!-- Start Pricing -->
    <section id="mu-pricing">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-pricing-area">

                        <div class="mu-heading-area">
                            <h2 class="mu-heading-title">Our Pricing Plans</h2>
                            <span class="mu-header-dot"></span>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                        </div>

                        <!-- Start Pricing Content -->

                        <!-- End Pricing -->

                        <!-- Start Testimonials -->

                        <!-- End Testimonials -->


                        <!-- Start Contact -->
                        <section id="mu-contact">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mu-contact-area">

                                            <div class="mu-heading-area">
                                                <h2 class="mu-heading-title">Drop Us A Message</h2>
                                                <span class="mu-header-dot"></span>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                                            </div>

                                            <!-- Start Contact Content -->
                                            <div class="mu-contact-content">

                                                <div id="form-messages"></div>
                                                <form id="ajax-contact" method="post" action="mailer.php" class="mu-contact-form">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Name" id="name" name="name" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Message" id="message" name="message" required></textarea>
                                                    </div>
                                                    <button type="submit" class="mu-send-msg-btn"><span>SUBMIT</span></button>
                                                </form>

                                            </div>
                                            <!-- End Contact Content -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- End Contact -->

                        <!-- Start Google Map -->

                        <!-- End Google Map -->

</main>

<!-- End main content -->


<!-- Start footer -->
<!-- Start footer -->
<footer id="mu-footer" role="contentinfo">
    <div class="container">
        <div class="mu-footer-area">
            <div class="mu-social-media">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
            <p class="mu-copyright">&copy; Copyright <a rel="nofollow" href="http://markups.io">markups.io</a>. All right reserved.</p>
        </div>
    </div>

</footer>
<!-- End footer -->
<!-- End footer -->



<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Slick slider -->
<script type="text/javascript" src="../assets/js/slick.min.js"></script>
<!-- Counter js -->
<script type="text/javascript" src="../assets/js/counter.js"></script>
<!-- Ajax contact form  -->
<script type="text/javascript" src="../assets/js/app.js"></script>



<!-- Custom js -->
<script type="text/javascript" src="../assets/js/custom.js"></script>


</body>
</html></html>
