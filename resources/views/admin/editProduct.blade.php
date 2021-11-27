<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>boutique en ligne</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="{{asset('vendor/magnific-popup/magnific-popup.css')}}" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="{{asset('css/creative.min.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top"><img src="{{asset('img/logo.jpg')}}" width='50' height='30'><span style='font-size:10px;color:black;font-family:arial;'>TUNISIE TELECOM</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="page-scroll" href="{{url('/admin')}}" style="color:black">Accueil</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{url('admin/users')}}" style="color:black">Utilisateurs</a>
                </li>
                <li class="active">
                    <a class="page-scroll" href="{{url ('/admin/products')}}" style="color:black">Produits</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{url('/admin/messages')}}" style="color:black">Messages</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{url('/admin/reclamations')}}" style="color:black">Réclamation</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{url('/admin/evenements')}}" style="color:black">Evenements</a>
                </li>
                @if(Auth::user())
                    <li>
                        <a class="page-scroll" href="{{url('/logout')}}" style="color:black">Se déconnecter</a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<section id="services">
    <div class="container">

        <form class="well form-horizontal" method="post" action="{{url('/admin/product/edit',[$product->id])}}" id="contact_form" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <fieldset>
                <legend>Modifier Produit</legend>
                <div class="form-group">
                    <label class="col-md-4 control-label">Libellé</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <input name="name" placeholder="Libellé" class="form-control" type="text" value="{{$product->name}}" required="required">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Prix</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <input name="price" placeholder="Prix" class="form-control" type="text" value="{{$product->price}}" required="required">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Type</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <select class="form-control" name="type" required="required">
                                <option value="1" @if($product->category_id == 1) selected @endif>Téléphone</option>
                                <option value="2" @if($product->category_id == 2) selected @endif>Clé internet</option>
                                <option value="3" @if($product->category_id == 3) selected @endif>ADSL</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Image</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <input type="file" class="form-control" name="image" accept="image/x-png,image/gif,image/jpeg">
                        </div>
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-warning" >envoyer <span class="glyphicon glyphicon-send"></span></button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    </div><!-- /.container -->
</section>

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">Restez en contact avec nous</h2>
                <hr class="primary">
            </div>
            <div class="col-lg-4 col-lg-offset-2 text-center">
                <i class="fa fa-phone fa-3x sr-contact"></i>
                <p>22012047</p>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                <p><a href="mailto:your-email@your-domain.com">anoussa.ines220@yahoo.com</a></p>
            </div>
        </div>
    </div>
</section>

<!-- jQuery -->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="{{asset('vendor/scrollreveal/scrollreveal.min.js')}}"></script>
<script src="{{asset('vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

<!-- Theme JavaScript -->
<script src="{{asset('js/creative.min.js')}}"></script>

</body>

</html>