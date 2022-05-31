<br>


<div class="container contact-form">
            <div class="contact-image">
                <img src="images/logo.png" width="250" height="250">
            </div>
            <form method="post">
                <h3>Contactez-nous</h3>
                   <br>   <br>
               <div class="row">

                <?php 

                        if (isset($_POST['btnSubmit']) and !empty($_POST['txtName']) and !empty($_POST['txtEmail'])
                        and !empty($_POST['txtMsg']))
                        {

                            echo '<div class="btn btn-success me-2"> Message envoyé avec succès<br/></div> ';
                          
                        }elseif (isset($_POST['btnSubmit']) and empty($_POST['txtName']) and empty($_POST['txtEmail'])
                        and empty($_POST['txtMsg'])){ 
                            echo '<div class="btn btn-danger me-2"> Veuillez remplir tous les champs <br/></div> ';
                        }
                ?>


                    <div class="col-md-6">
                        <div class="form-group">
                            <br>
                            <input type="text" name="txtName" class="form-control" placeholder="Votre nom *" value="" />
                            <br>
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtEmail" class="form-control" placeholder="Votre Email *" value="" />
                        </div>
                             <br>
                        
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="txtMsg" class="form-control" placeholder="Votre message *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" name="btnSubmit" class="btnContact" value="Envoyez-le message" />
                        </div>
                    </div>
                     
                </div>
            </form>
</div>

<br>
<br>
<br>
<br>

