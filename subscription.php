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
                        </div><!-- /.col -->


                    <form id="contactform" class="forms" action="script_subscription.php" method="post">

                        <div class="row">
                            <div class="col-xs-4">
                                <span>www.
                                <input type="text" name="ndd" id="ndd" class="form-control" placeholder="Site web" onkeyup="ndd_validation()">
                                .fr</span>
                                <i id="result" class="fa"></i>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                        <button type="submit" class="btn btn-default btn-submit">Envoyer le message</button>

                    </form>

                    <div id="response"></div>

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
    function createInstance()
    {
        var req = null;
        if(window.XMLHttpRequest) {
            req = new XMLHttpRequest();
        }
        else if (window.ActiveXObject) {
            try {
                req = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    req = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    alert("XHR not created");
                }
            }
        }
        return req;
    }

    function storing(data)
    {

        if(data == 1) {
            document.getElementById('registered').style.display = 'none';
            document.getElementById('available').style.display = 'block';
        }
        else {
            document.getElementById('available').style.display = 'none';
            document.getElementById('registered').style.display = 'block';
        }
    }

    function ndd_validation(element)
    {
       /* var req =  createInstance();
        var ndd = document.getElementById('ndd').value;
        var data = "ndd=" + ndd + ".fr";
        req.onreadystatechange = function()
        {
            if(req.readyState == 4)
            {
                if(req.status == 200)
                {
                    storing(req.responseText);
                }
                else
                {
                    alert("Error: returned status code " + req.status + " " + req.statusText);
                }
            }
        };

        req.open("POST", "http://vps141243.ovh.net/dev/standio/bgauthie/example.php", true);
        req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        req.send(data);*/
        $.ajax({
            url: 'http://www.one.com/test-domain.do',
            type: 'GET',
            dataType: 'json',
            data: {
                domain: $('#ndd').val()
            },
            error: function() {
                $("#result").removeClass('fa-check-circle').addClass("fa-times-circle")
            },
            success: function(data) {
                if (data.available == true)
                {
                    $("#result").removeClass('fa-times-circle').addClass("fa-check-circle")
                }
                else
                {
                    $("#result").removeClass('fa-check-circle').addClass("fa-times-circle")
                }
            }
        });
    }
</script>
<?php include('footer.php') ?>