<!doctype html>
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

$dossier = "../assets" . DIRECTORY_SEPARATOR . "Library" . DIRECTORY_SEPARATOR . request('category');
$array = parcourir_fichiers($dossier);
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Category : {{ $category }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="../assets/style/images/favicon.ico"/>
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="../assets/style/css/bootstrap.min.css" rel="stylesheet">
    <!-- Slick slider -->
    <link href="../assets/style/css/slick.css" rel="stylesheet">
    <!-- Theme color -->
    <link id="switcher" href="../assets/style/css/theme-color/lite-blue-theme.css" rel="stylesheet">
    <!-- Main Style -->
    <link href="../assets/style/css/style.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <title>Hello!</title>
<body>
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
                                    <h6><a href="<?= $fichier->path . DIRECTORY_SEPARATOR . $fichier->name?>"><?= $fichier->name ?></a></h6>
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
</body>
</html>
