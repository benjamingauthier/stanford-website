<?php include('header.php') ?>

    <!-- ============================================================= MAIN ============================================================= -->

    <main>

        <div class="container inner">
            <div class="row">
                <div class="col-md-12 text-center">

                    <!-- ============================================================= SECTION – CONTACT FORM ============================================================= -->

                    <section id="contact-form">
                        <div class="text-center">
                            <header>
                                <h1>Félicitation vous faites parti de la communauté STANDiO !</h1>

                                <p>Afin de compléter votre inscription, merci de renseigner votre adresse de
                                    facturation.</p><br><br>
                            </header>
                        </div>
                        <!-- /.col -->
                        <form id="contactform" class="forms" action="contact_form.php" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="address" class="form-control" placeholder="Adresse">
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="postcode" class="form-control" placeholder="Code postal">
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="city" class="form-control" placeholder="Ville">
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <button type="submit" class="btn btn-default btn-submit">Envoyer le message</button>

                        </form>
                        <div id="response"></div>

                    </section>

                    <!-- ============================================================= SECTION – CONTACT FORM : END ============================================================= -->

                </div>
                <!-- ./col -->


            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->

    </main>

    <!-- ============================================================= MAIN : END ============================================================= -->

<?php include('footer.php') ?>