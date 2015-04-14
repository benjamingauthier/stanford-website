<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include('connectbdd.php');
?>
<div id="page-wrapper">
	<?php 
	if (isset($_POST['stripeToken']))
	{
		require_once 'stripe-php-2.1.1/init.php';
	// Set your secret key: remember to change this to your live secret key in production
	// See your keys here https://dashboard.stripe.com/account/apikeys
	\Stripe\Stripe::setApiKey("sk_test_0lTOy0erzGTnkhCBJgxrnmgu");
	\Stripe\Stripe::setApiVersion("2015-04-07");
	// Get the credit card details submitted by the form
	$token = $_POST['stripeToken'];
	$customer = \Stripe\Customer::create(array(
	  "source" => $token, // obtained from Stripe.js
	  "plan" => "standio",
	  "email" => "payinguser@example.com"
	));
	//var_dump($customer)
	if (!is_null($customer->id))
	{
        $ndd = $_POST['ndd'];
		$infos = $dbh->prepare('INSERT INTO users(stripe_id, ndd) VALUES (:id, :ndd)');
		  // On envois la requète
		  $infos->execute(array(
		  	'id' => $customer->id,
		  	'ndd' => $ndd
		  	//,'subid' => $subid)
		  ));
        $ch = curl_init("http://vps141243.ovh.net/respond.php?domain=" . $ndd);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        echo $data;
        header('Location: informations');   //end_subscriptions.php
	}
}

include('header.php');

?>
 <main>
    <div class="container inner">
        <div class="row">
            <div class="col-md-8 inner-right inner-bottom-md">

                <!-- ============================================================= SECTION – CONTACT FORM ============================================================= -->

                <section id="contact-form">
                        <div class="text-center">
                            <header>
                                <h1>Faites comme des dizaines d'étudiants</h1>
                                <p>Rejoignez Standio et mettez toutes les chances de votre coté pour votre recherche de stage ou d'emploi !</p><br><br>
                            </header>
    
    	        <form id="contactform" class="forms" action="" method="post">

                                <div class="row">
                                    <div class="col-lg-6 col-centered">
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                        <div class="input-group">
                                              <input type="text" name="ndd" id="ndd" class="form-control" placeholder="Site web" onkeyup="ndd_validation()">
                                            <span class="input-group-addon" id="basic-addon2">.fr</span>
                                            &nbsp;<i id="result" class="fa fa-2x"></i>
                                        </div>
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                                <script
            				    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            				    data-key="pk_test_I2Y93k4JEIJJFbeImUxYoFeX"
            				    data-amount="399"
            				    data-name="Standio.fr"
            				    data-email="<?php echo $email; ?>"
            				    data-currency="EUR"
            				    data-label="S'abonner avec Stripe"
            				    data-panel-label="Payer"
            				    data-description="Abonnement Standio.fr">
            				  </script>
                            </form>

				<br>
				<p class="lead">Le paiement de votre abonnement sera géré par notre partenaire <a href="http://stripe.com">Stripe.com</a>.<br>Aucune donnée bancaire ne transite par nos serveurs, et la connexion est 100% sécurisée par Stripe.</p>
           </form>
                        </div>
                </section>

                <!-- ============================================================= SECTION – CONTACT FORM : END ============================================================= -->

            </div><!-- ./col -->

            <div class="col-md-4">


                <!-- ============================================================= SECTION – CONTACT NAMES ============================================================= -->

                <section id="contact-names" class="light-bg inner-xs inner-left-xs inner-right-xs">

                    <h3 class="team-headline sidelines text-center"><span>Vos contacts</span></h3>

                    <div class="row thumbs gap-md text-center">

                        <div class="col-sm-6 thumb">
                            <figure class="member">

                                <div class="member-image">

                                    <div class="text-overlay">
                                        <div class="info">
                                            <ul class="social">
                                                <li><a href="#"><i class="icon-s-facebook"></i></a></li>
                                                <li><a href="#"><i class="icon-s-gplus"></i></a></li>
                                                <li><a href="#"><i class="icon-s-twitter"></i></a></li>
                                            </ul><!-- /.social -->
                                        </div><!-- /.info -->
                                    </div><!-- /.text-overlay -->

                                    <img src="assets/images/team/benjamin.jpg">

                                </div><!-- /.member-image -->

                                <figcaption class="member-details bordered no-top-border">
                                    <h3>
                                        Benjamin Gauthier
                                        <span>Co-fondateur</span>
                                    </h3>
                                </figcaption>

                            </figure>
                        </div><!-- /.col -->

                        <div class="col-sm-6 thumb">
                            <figure class="member">

                                <div class="member-image">

                                    <div class="text-overlay">
                                        <div class="info">
                                            <ul class="social">
                                                <li><a href="#"><i class="icon-s-facebook"></i></a></li>
                                                <li><a href="#"><i class="icon-s-gplus"></i></a></li>
                                                <li><a href="#"><i class="icon-s-twitter"></i></a></li>
                                            </ul><!-- /.social -->
                                        </div><!-- /.info -->
                                    </div><!-- /.text-overlay -->

                                    <img src="assets/images/team/benoit.png">

                                </div><!-- /.member-image -->

                                <figcaption class="member-details bordered no-top-border">
                                    <h3>
                                        Benoit Palabre
                                        <span>Co-fondateur</span>
                                    </h3>
                                </figcaption>

                            </figure>
                        </div><!-- /.col -->

                    </div><!-- /.row -->

                    <div class="row thumbs gap-md text-center">

                        <div class="col-sm-6 thumb last-bottom">
                            <figure class="member">

                                <div class="member-image">

                                    <div class="text-overlay">
                                        <div class="info">
                                            <ul class="social">
                                                <li><a href="#"><i class="icon-s-facebook"></i></a></li>
                                                <li><a href="#"><i class="icon-s-gplus"></i></a></li>
                                                <li><a href="#"><i class="icon-s-twitter"></i></a></li>
                                            </ul><!-- /.social -->
                                        </div><!-- /.info -->
                                    </div><!-- /.text-overlay -->

                                    <img src="assets/images/team/louis.jpg">

                                </div><!-- /.member-image -->

                                <figcaption class="member-details bordered no-top-border">
                                    <h3>
                                        Louis Parrouy
                                        <span>Co-fondateur</span>
                                    </h3>
                                </figcaption>

                            </figure>
                        </div><!-- /.col -->

                        <div class="col-sm-6 thumb last-bottom">
                            <figure class="member">

                                <div class="member-image">

                                    <div class="text-overlay">
                                        <div class="info">
                                            <ul class="social">
                                                <li><a href="#"><i class="icon-s-facebook"></i></a></li>
                                                <li><a href="#"><i class="icon-s-gplus"></i></a></li>
                                                <li><a href="#"><i class="icon-s-twitter"></i></a></li>
                                            </ul><!-- /.social -->
                                        </div><!-- /.info -->
                                    </div><!-- /.text-overlay -->

                                    <img src="assets/images/team/guillaume.jpeg">

                                </div><!-- /.member-image -->

                                <figcaption class="member-details bordered no-top-border">
                                    <h3>
                                        Guillaume Isselin
                                        <span>Co-fondateur</span>
                                    </h3>
                                </figcaption>

                            </figure>
                        </div><!-- /.col -->

                    </div><!-- /.row -->

                </section>

                <!-- ============================================================= SECTION – CONTACT NAMES : END ============================================================= -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->

    </main>

    <!-- ============================================================= MAIN : END ============================================================= -->

<script language="JavaScript">
    function ndd_validation(element)
    {
        $.ajax({
            url: 'https://standio.fr/checkdomain.php',
            type: 'GET',
            dataType: 'json',
            data: {
                domain: $('#ndd').val()+'.fr'
            },
            error: function() {
                $("#result").removeClass('fa-check-circle yellow').addClass("fa-times-circle black")
                $('button').prop('disabled',true);
            },
            success: function(data) {
                if (data.available == true)
                {
                    $("#result").removeClass('fa-times-circle black').addClass("fa-check-circle yellow")
                    $('button').prop('disabled',false);
                }
                else
                {
                    $("#result").removeClass('fa-check-circle yellow').addClass("fa-times-circle black")
                    $('button').prop('disabled',true);
                }
            }
        });
    }
</script>
<?php include('footer.php') ?>
<?php require_once 'footer.php'; ?>