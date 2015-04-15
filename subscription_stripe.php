<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
include('connectbdd.php');
	if (isset($_POST['stripeToken']))
	{
		require_once 'stripe-php-2.1.1/init.php';
	// Set your secret key: remember to change this to your live secret key in production
	// See your keys here https://dashboard.stripe.com/account/apikeys
	\Stripe\Stripe::setApiKey("sk_live_uEeuBcFcKjTurmWRCNJzcDUa");
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
        $_SESSION['ndd'] = $ndd;
		$infos = $dbh->prepare('INSERT INTO users(stripe_id, ndd) VALUES (:id, :ndd)');
		  // On envois la requète
		  $infos->execute(array(
		  	'id' => $customer->id,
		  	'ndd' => $ndd
		  	//,'subid' => $subid)
		  ));
        $ch = curl_init("http://vps141243.ovh.net/respond.php?domain=" . $ndd.'.fr');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        header('Location: informations');   //end_subscriptions.php
        exit();
	}
}

include('header.php');

?>
<div id="page-wrapper">
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
                                               
                                        </div><br>
                                        <div class="input-group">
                                           <input type="checkbox" id="checkbox_cu" value="value">
                                            <span class="label-group" for="checkbox_cu"><a id="link-cu" role="button"onclick=" $('#modalCu').modal('show');">J'accepte les conditions d'utilisations<br> et je m'engage pour 6 mois</a></span>
                                        </div>
                                    </div><!-- /.col -->
                                </div><!-- /.row --><br>
                                <script
            				    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            				    data-key="pk_live_2Yb83PExQsqmqiPRbFKS2XbV"
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

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Attention</h4>
                  </div>
                  <div class="modal-body">
                    Seul les minuscules et les tirets sont autorisés.
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modalCu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Conditions d'utilisations</h4>
                        </div>
                        <div class="modal-body">
                            <h2>Objet</h2>
                            <h4>Les présentes Conditions Générales ont pour objet de définir les modalités de mise à disposition
                                des services du site STANDiO.fr, ci-après nommé « le Service » et les conditions d'utilisation
                                du Service par l'Utilisateur. <br>
                                <br>
                                Tout accès et/ou Utilisation du site www.STANDiO.fr suppose l'acceptation et le respect de
                                l'ensemble des termes des présentes Conditions et leur acceptation inconditionnelle. Elles
                                constituent donc un contrat entre le Service et l'Utilisateur.<br>
                                <br>
                                Dans le cas où l'Utilisateur ne souhaite pas accepter tout ou partie des présentes conditions
                                générales, il lui est demandé de renoncer à tout usage du Service.</h4>

                            <h2>Mentions légales</h2>
                            <h4>
                                Le site STANDiOs.fr est édité par : <br>
                                <br>
                                Mink S.A.S.<br>
                                50 Rue Bouffard,<br>
                                33000 Bordeaux<br>
                                05 56 07 23 91<br>
                                06 73 74 93 05<br>
                                <a href="mailto:contact@mink.so">contact@mink.so</a><br>
                                <br>

                                Le site STANDiO.fr est hébergé par : <br>
                                <br>
                                <b>One.com France</b><br>
                                57 Rue d’Amsterdam<br>
                                Paris 75008<br>
                                France<br>
                                Fax: +33 805 080286<br>
                            </h4>

                            <h2>Définitions</h2>
                            <h4>
                                <ul>
                                    <li><b>Utilisateur :</b> L'Utilisateur est toute personne qui utilise le Site ou l'un des
                                        services proposés sur le Site.
                                    </li>
                                    <li><b>Contenu Utilisateur :</b> Le terme « Contenu Utilisateur » désigne les données
                                        transmises par l'Utilisateur dans les différentes rubriques du Site.
                                    </li>
                                    <li><b>Membre :</b> Le terme « Membre » désigne un utilisateur identifié sur le site.</li>
                                    <li><b>Identifiant :</b> Le terme « Identifiant » recouvre les informations nécessaires à
                                        l'identification d'un utilisateur sur le site pour accéder aux zones réservées aux
                                        membres.
                                    </li>
                                    <li><b>Mot de passe :</b> Le « Mot de passe » est une information confidentielle, dont
                                        l'Utilisateur doit garder le secret, lui permettant, utilisé conjointement avec son
                                        Identifiant, de prouver l'identité.
                                    </li>
                                </ul>
                            </h4>
                            <h2>Accès au service</h2>
                            <h4>Le Service est accessible gratuitement à tout Utilisateur disposant d'un accès à internet. Tous
                                les coûts afférents à l'accès au Service, que ce soient les frais matériels, logiciels ou
                                d'accès à internet sont exclusivement à la charge de l'utilisateur. Il est seul responsable du
                                bon fonctionnement de son équipement informatique ainsi que de son accès à internet.
                                <br><br>
                                Certaines sections du site sont réservées aux Membres après identification à l'aide de leur
                                Identifiant et de leur Mot de passe.
                                <br><br>
                                STANDiO se réserve le droit de refuser l'accès au Service, unilatéralement et sans notification
                                préalable, à tout Utilisateur ne respectant pas les présentes conditions d'utilisation.
                                <br><br>
                                One.com met en œuvre tous les moyens raisonnables à sa disposition pour assurer un accès de
                                qualité au Service, mais n'est tenu à aucune obligation d'y parvenir.
                                <br><br>
                                One.com ne peut, en outre, être tenue responsable de tout dysfonctionnement du réseau ou des
                                serveurs ou de tout autre événement échappant au contrôle raisonnable, qui empêcherait ou
                                dégraderait l'accès au Service.
                                <br><br>
                                One.com se réserve la possibilité d'interrompre, de suspendre momentanément ou de modifier sans
                                préavis l'accès à tout ou partie du Service, afin d'en assurer la maintenance, ou pour toute
                                autre raison, sans que l'interruption n'ouvre droit à aucune obligation ni indemnisation.
                            </h4>

                            <h2>Propriété intellectuelle</h2>
                            <h4>Les textes et illustrations dont la mention le précise sont soumis à la licence Creative Commons
                                et ne peuvent être reproduits, distribués ou modifiés.
                                <br><br>
                                « One.com » est une marque déposée de One.com (B-one). Toute reproduction non autorisée de ces
                                marques, logos et signes distinctifs constitue une contrefaçon passible de sanctions pénales. Le
                                contrevenant s'expose à des sanctions civiles et pénales et notamment aux peines prévues aux
                                articles L. 335.2 et L. 343.1 du code de la Propriété Intellectuelle.
                                <br><br>
                                L'Utilisateur est seul responsable du Contenu Utilisateur qu'il met en ligne via le Service,
                                ainsi que des textes et/ou opinions qu'il formule. Il s'engage notamment à ce que ces données ne
                                soient pas de nature à porter atteinte aux intérêts légitimes de tiers quels qu'ils soient. A ce
                                titre, il garantit STANDiO.fr contre tous recours, fondés directement ou indirectement sur ces
                                propos et/ou données, susceptibles d'être intentés par quiconque à l'encontre de STANDiO.fr. Il
                                s'engage en particulier à prendre en charge le paiement des sommes, quelles qu'elles soient,
                                résultant du recours d'un tiers à l'encontre de STANDiO.fr, y compris les honoraires d'avocat et
                                frais de justice.
                                <br><br>
                                STANDiO.fr se réserve le droit de supprimer tout ou partie du Contenu Utilisateur, à tout moment
                                et pour quelque raison que ce soit, sans avertissement ou justification préalable. L'Utilisateur
                                ne pourra faire valoir aucune réclamation à ce titre.
                            </h4>

                            <h2>Données personnelles</h2>
                            <h4>Dans une logique de respect de la vie privée de ses Utilisateurs, STANDiO.fr s'engage à ce que
                                la collecte et le traitement d'informations personnelles, effectués au sein du présent site,
                                soient effectués conformément à la loi n°78-17 du 6 janvier 1978 relative à l'informatique, aux
                                fichiers et aux libertés, dite Loi « Informatique et Libertés ». A ce titre, le site STANDiO.fr
                                fait l'objet d'une déclaration à la CNIL sous le numéro 1740452 v 0.
                                <br><br>
                                Conformément à l'article 34 de la loi « Informatique et Libertés », STANDiO.fr garantit à
                                l'Utilisateur un droit d'opposition, d'accès et de rectification sur les données nominatives le
                                concernant.
                                L'Utilisateur a la possibilité d'exercer ce droit :
                                <ul>
                                    <li>sur le site, dans l'Espace membres ;</li>
                                    <li>en utilisant l’adresse de contact mis à sa disposition ;</li>
                                </ul>
                            </h4>
                            <h2>Limites de responsabilité</h2>
                            <h4>Le site STANDiO.fr est un site de création de pages personnelles accessible via QRCode.
                                <br><br>
                                Les informations diffusées sur le site STANDiO.fr proviennent de sources réputées fiables.
                                Toutefois, STANDiO.fr ne peut garantir l'exactitude ou la pertinence de ces données. En outre,
                                les informations mises à disposition sur ce site le sont uniquement à titre purement informatif
                                et ne sauraient constituer en aucun cas un conseil ou une recommandation de quelque nature que
                                ce soit.
                                <br><br>
                                En conséquence, l'Utilisation des informations et contenus disponibles sur l'ensemble du site,
                                ne sauraient en aucun cas engager la responsabilité de STANDiO.fr, à quelque titre que ce soit.
                                L'Utilisateur est seul maître de la bonne utilisation, avec discernement et esprit, des
                                informations mises à sa disposition sur le Site.
                                <br><br>
                                Par ailleurs, l'Utilisateur s'engage à indemniser STANDiO.fr de toutes conséquences dommageables
                                liées directement ou indirectement à l'usage qu'il fait du Service.
                                <br><br>
                                L'accès à certaines sections du site STANDiO.fr nécessite l'utilisation d'un Identifiant et d'un
                                Mot de passe. Le Mot de passe, choisi par l'utilisateur, est personnel et confidentiel.
                                L'utilisateur s'engage à conserver secret son mot de passe et à ne pas le divulguer sous quelque
                                forme que ce soit. L'utilisation de son Identifiant et de son Mot de passe à travers internet se
                                fait aux risques et périls de l'Utilisateur. Il appartient à l'Utilisateur de prendre toutes les
                                dispositions nécessaires permettant de protéger ses propres données contre toute atteinte.
                                <br>
                                STANDiO.fr s'engage néanmoins à mettre en place tous les moyens nécessaires pour garantir la
                                sécurité et la confidentialité des données transmises. L'Utilisateur est informé qu'un ou
                                plusieurs cookies, ne contenant aucune information personnelle, pourront être placés sur son
                                disque dur afin d'assurer son identification.
                                <br><br>
                                L'Utilisateur admet connaître les limitations et contraintes propres au réseau internet et, à ce
                                titre, reconnaît notamment l'impossibilité d'une garantie totale de la sécurisation des échanges
                                de données. STANDiO.fr ne pourra pas être tenue responsable des préjudices découlant de la
                                transmission de toute information, y compris de celle de son identifiant et/ou de son mot de
                                passe, via le Service.
                                <br><br>
                                STANDiO.fr ne pourra en aucun cas, dans la limite du droit applicable, être tenue responsable
                                des dommages et/ou préjudices, directs ou indirects, matériels ou immatériels, ou de quelque
                                nature que ce soit, résultant d'une indisponibilité du Service ou de toute Utilisation du
                                Service. Le terme « Utilisation » doit être entendu au sens large, c'est-à-dire tout usage du
                                site quel qu'il soit, licite ou non.
                                <br><br>
                                L'Utilisateur s'engage, d'une manière générale, à respecter l'ensemble de la réglementation en
                                vigueur en France.
                            </h4>

                            <h2>Liens hypertextes</h2>
                            <h4>STANDiO.fr propose des liens hypertextes vers des sites web édités et/ou gérés par des tiers.
                                <br><br>
                                Dans la mesure où aucun contrôle n'est exercé sur ces ressources externes, l'Utilisateur
                                reconnaît que STANDiO.fr n'assume aucune responsabilité relative à la mise à disposition de ces
                                ressources, et ne peut être tenue responsable quant à leur contenu.
                            </h4>

                            <h2>Force majeure</h2>
                            <h4>La responsabilité de STANDiO.fr ne pourra être engagée en cas de force majeure ou de faits
                                indépendants de sa volonté.</h4>

                            <h2>Evolution du présent contrat</h2>
                            <h4>STANDiO.fr se réserve le droit de modifier les termes, conditions et mentions du présent contrat
                                à tout moment.
                                <br>
                                Il est ainsi conseillé à l'Utilisateur de consulter régulièrement la dernière version des
                                Conditions d'Utilisation disponible sur le site www.STANDiO.fr.</h4>

                            <h2>Durée et résiliation</h2>
                            <h4>Le présent contrat est conclu pour une durée de 6 mois à compter de l'Utilisation du Service
                                par l'Utilisateur. Ce dernier peut résilier son abonnement au terme de cette durée.</h4>

                            <h2>Droit applicable et juridiction compétente</h2>
                            <h4>Les règles en matière de droit, applicables aux contenus et aux transmissions de données sur et
                                autour du site, sont déterminées par la loi française. En cas de litige, n'ayant pu faire
                                l'objet d'un accord à l'amiable, seuls les tribunaux français du ressort de la cour d'appel de
                                Paris sont compétents.</h4>
                        </div>
                    </div>
                </div>
            </div>


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
<script src="assets/js/jquery.min.js"></script>
<script type="text/javascript">
 $('.stripe-button-el').prop("disabled", true);
    $(document).ready(function() {
        $('#checkbox_cu').change(function(){
            if (this.checked && $("#result").hasClass("fa-check-circle")) {
                $('button').prop('disabled',false);
            }
            else
            {
                $('button').prop('disabled',true);
            }
        });
    });
  function ndd_validation(element)
    {
       
         $('#ndd').keyup(function() {
                    var $th = $(this);
                        $th.val( $th.val().replace(/[^a-z-]|\./g, function(str) { 
                        $('#myModal').modal('show');
                        return ''; 
                         
                        } ) 
                    );
        });
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
                        if ( $('#checkbox_cu').prop('checked') && $("#result").hasClass("fa-check-circle")) {
                            $('button').prop('disabled',false);
                        }
                        
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