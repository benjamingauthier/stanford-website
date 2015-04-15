<?php
session_start();
include('connectbdd.php');
if(isset($_SESSION['ndd'])) {
    $ndd = $_SESSION['ndd'];
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$address = $_POST['address'];
$postcode = $_POST['postcode'];
$city = $_POST['city'];

$stmt = $dbh->prepare("UPDATE users SET email = :email, firstname = :firstname, lastname = :lastname, address = :address, postcode = :postcode, city = :city WHERE ndd = :ndd");

$stmt->bindValue(':email', $email);
$stmt->bindValue(':firstname', $firstname);
$stmt->bindValue(':lastname', $lastname);
$stmt->bindValue(':address', $address);
$stmt->bindValue(':postcode', $postcode);
$stmt->bindValue(':city', $city);
$stmt->bindValue(':ndd', $ndd);
$stmt->execute();

$codehtml=
"


<!DOCTYPE html PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
<!-- L10N_LIMIT_DESTINATION_LANGUAGES=de,es,it,fr,pt-br,ko,tr,ms,zh-tw -->
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>STANDiO</title>
    <style>
        @media only screen and (max-device-width: 480px) {
            table[class=table], td[class=cell] {width: 320px !important;}
            table[class=innertable], td[class=innercell] {width: 316px !important;}
            td[class=content] {width: 276px !important; padding: 22px 20px 0 20px !important;}
            table[class=webby] {width: 276px !important;}
            img[class=footer] {height: 8px !important}
            p[class=title] {font-size: 22px !important; line-height: 25px !important; margin-top: 10px !important;}
            p[class=tools] {display: block !important;}
            p[class=support] {border-top: none !important;}
            td[class=hide] {display: none !important;}
            p[class=hide] {display: none !important;}
            img[class=hide] {display: none !important}
            td[class=half] {width: 160px !important; padding: 0 !important;}
            table[class=list] {width: 100% !important;}
            td[class=list-item] {padding-right: 10px !important;}
            img[class=list-image] {width: 90px !important; height: auto !important;}
            img[class=img2] {width: 120px !important; height: auto !important;}
            p[class=sml] {display: block !important;}
            a[class=social] {color: #e6e6e6 !important; text-decoration: none !important; font-size: 1px !important;}
            span[class=social] {color: #e6e6e6 !important; text-decoration: none !important; font-size: 1px !important;}
        }

    </style>
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' rel='stylesheet'>

</head>
<body bgcolor='#000' topmargin='0' leftmargin='0' marginheight='0' marginwidth='0' style='-webkit-font-smoothing: antialiased;width:100% !important;background:#f1c40f;-webkit-text-size-adjust:none;'>

<table width='100%' cellpadding='0' cellspacing='0' border='0' bgcolor='#000'>
    <tr>
        <td bgcolor='#000' width='100%'>

            <table width='584' cellpadding='0' cellspacing='0' border='0' align='center' class='table'>
                <tr>
                    <td width='584' class='cell'>


                        <table width='584' cellpadding='0' cellspacing='0' border='0' class='table' style='background-color: #000000; background-position: 0 0; background-repeat: no-repeat;'>
                            <tr>
                                <td width='504' class='logocell' style='padding: 20px 40px;'>

                                    <a href='http://standio.fr/' target='_blank'><img style='width: 40%'src='https://standio.fr/stanford-website/assets/images/standiotightwhite.png'></a>
                                </td>
                            </tr>
                        </table>

                        <table width='584' cellpadding='0' cellspacing='0' border='0' class='table'>
                            <tr>
                                <td width='580' class='innercell' style='background-color: #fff;  background-position: 0 0; background-repeat: repeat-y; padding-left: 2px; padding-right: 2px;'>

                                    <table width='580' cellpadding='0' cellspacing='0' border='0' class='innertable'>

                                        <tr>
                                            <td width='500' class='content' style='background-color: #ffffff; background-position: 0 0; background-repeat: repeat-x; padding: 38px 40px 0 40px;'>
                                                <table border='0' cellspacing='0' cellpadding='0' style='margin: 0; padding: 0; width: 100%;' class='list'>

                                                    <tr>
                                                        <td style='vertical-align: top; text-align: left; padding: 0; margin: 0;'>
                                                            <p style='font-family: 'Lato'; font-weight: normal; font-size: 15px; line-height: 20px; color: #595959; margin-top: 0px; margin-left: 0; margin-bottom: 15px; margin-right: 0; padding: 0; text-align:justify;'>
                                                                <br><span style='color: #000;font-weight: bold;'>Félicitations !</span>
                                                                <br />
                                    <span> Votre inscription sur STANDiO est confirmée ! Réalisez dès à présent votre site web en suivant ce lien : <a href='http://app.".$ndd.".mink.so' style='color: #f1c40f' onmouseover='this.style.color='#000000';' onmouseout='this.style.color='#f1c40f';'>app.".$ndd.".mink.so</a>. Votre PASSCODE est ilovestandio<br>
                                    Votre site <br><br>

                                      Nous procédons actuellement à l'enregistrement de votre nom de domaine. Vous pouvez cependant commencer à créer votre site, nous transférerons automatiquement ce dernier sur votre nom de domaine une fois son dépot effectué.<br>
                                      Un fois votre site créé vous pouvez y accéder via <a href='http://".$ndd.".mink.so' style='color: #f1c40f' onmouseover='this.style.color='#000000';' onmouseout='this.style.color='#f1c40f';'>".$ndd.".mink.so</a>.
<br>
Enfin, pour apporter de nouvelles modifications à ce dernier, suivez ce lien<a href='http://app.".$ndd.".mink.so/login/".$ndd."' style='color: #f1c40f' onmouseover='this.style.color='#000000';' onmouseout='this.style.color='#f1c40f';'>app.".$ndd.".mink.so</a>.
									</span>
                                                            <p>
                                                            </p>
                                                            </p>
                                                        </td>
                                                        <td width='1' style='vertical-align: top; text-align: right; padding: 0px 0 0 15px; margin: 0;' class='list-item'>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style='vertical-align: top; text-align: left; padding: 0; margin: 0;'>
                                                            <br> <p style='text-align:justify; font-family: 'Lato', serif; font-weight: normal; font-size: 15px; line-height: 20px; color: #595959; margin-top: 0; margin-left: 0; margin-bottom: 15px; margin-right: 0; padding: 0;'><span style='color: #000; font-weight: bold;'>N'hesitez pas a nous contacter</span>
                                                                <br />
                                  <span>
								  <a href='mailto:contact@mink.so' style='color: #f1c40f' onmouseover='this.style.color='#000000';' onmouseout='this.style.color='#f1c40f';'>contact@mink.so</a>.
								  </span>
                                                                <br />

                                                        </td>
                                                        <td width='1' style='vertical-align: top; text-align: right; padding:0px 0 0 15px; margin: 0;' class='list-item'>
                                                            <br><br><a target='_blank' href='https://www.facebook.com/standio.fr'><img src='http://lasttram.fr/images/fb-logo.jpg' width='25' height='25' border='0' style='-ms-interpolation-mode:bicubic;' class='list-image'/></a><br><br>
                                                            <a target='_blank' href='https://twitter.com/STANDiO_fr'><img src='http://lasttram.fr/images/tw-logo.png' width='25' height='25' border='0' style='-ms-interpolation-mode:bicubic;' class='list-image' alt='Astuce : listes de contrôle' /></a></td>
                                                    </tr>

                                                </table>
                                                <table class='table'>
                                                    <br><p style='font-family: 'Lato'; font-weight: bold; font-size: 15px; line-height: 20px; color: #595959; margin-top: 0; margin-left: 0; margin-bottom: 25px; margin-right: 0; padding: 0;' align='center'>Retrouvez nous sur <a style='color: #f1c40f' onmouseover='this.style.color='#000000';' onmouseout='this.style.color='#f1c40f';' href='http://standio.fr/' target='_blank'>STANDiO.fr</a></p>

                                                </table>
                                                <br />


                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>


                        </table>

                        <table width='584' cellpadding='0' cellspacing='0' border='0' class='table'>
                            <tr>
                                <td width='584' class='cell'>

                                    <table border='0' cellspacing='0' cellpadding='10' align='left' width='100%'>
                                        <tr>
                                            <td>


                                                <p style='font-family: 'Lato', sans-serif; font-size: 11px;text-align: center; line-height: 12px; color: #595959; margin: 0; padding: 0;'>Mink S.A.S. 2015, tous droits réservés.</p>

                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                        </table>

                        <br>

                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>

</body>
</html>";
        mail('benjamin-gauthier@live.fr',
            "Confirmation de votre inscription STANDiO !",
            $codehtml,
            "From: \"STANDiO\"<contact@standio.fr>\r\n".
            "Reply-To: \"STANDiO\"<contact@standio.fr>\r\n".
            "Content-Type: text/html; charset=\"utf-8\"\r\n");
  
echo "<h2>Merci ! </h2><h3>Un mail de confirmation vous a été envoyé.</h3>";
//header("Location: merci");

