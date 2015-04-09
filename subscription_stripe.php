<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include('connectbdd.php');
include('header.php');

?>
<div id="page-wrapper">
	<?php 
	if (isset($_POST['stripeToken']))
	{
		echo "yolo1";
		require_once 'stripe-php-2.1.1/init.php';
				echo "yolo2";
	// Set your secret key: remember to change this to your live secret key in production
	// See your keys here https://dashboard.stripe.com/account/apikeys
	\Stripe\Stripe::setApiKey("sk_test_0lTOy0erzGTnkhCBJgxrnmgu");
	\Stripe\Stripe::setApiVersion("2015-04-07");
echo "yolo22";
	// Get the credit card details submitted by the form
	$token = $_POST['stripeToken'];
echo "yolo23";
	$customer = \Stripe\Customer::create(array(
	  "source" => $token, // obtained from Stripe.js
	  "plan" => "standio",
	  "email" => "payinguser@example.com"
	));
	//var_dump($customer)
			echo "yolo3";
	if (!is_null($customer->id))
	{
				echo "yolo4";
		$infos = $dbh->prepare('INSERT INTO users(stripe_id, ndd) VALUES (:id, :ndd)');
		  // On envois la requète
		  $infos->execute(array(
		  	'id' => $customer->id,
		  	'ndd' => $_POST['ndd']
		  	//,'subid' => $subid)
		  ));
               
	}
}
	?>
    <div class="row">
    	<div class="col-lg-6">

				<form action="" method="POST">
				<input type="text" name="email" /><br>
				<input type="text" name="ndd" /><br>
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
    	</div>
    </div>
</div><!-- /#wrapper -->

<?php require_once 'footer.php'; ?>