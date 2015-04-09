<?php include('header.php') ?>

    <!-- ============================================================= MAIN ============================================================= -->

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
                            <form id="contactform" class="forms" action="script_subscription.php" method="post">

                                <div class="row">
                                    <div class="col-lg-6 col-centered">
                                        <div class="input-group">
                                            <input type="text" name="ndd" id="ndd" class="form-control" placeholder="Site web" onkeyup="ndd_validation()">
                                            <span class="input-group-addon" id="basic-addon2">.fr</span>
                                            &nbsp;<i id="result" class="fa fa-2x"></i>
                                        </div>
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                                <button type="submit" class="btn btn-default btn-submit" disabled>Inscription</button>
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