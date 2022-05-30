<?php 

error_reporting(E_ALL);
ini_set('display_errors','On');

$serveur = $_SERVER['SERVER_NAME']; 
if ($_SERVER['SERVER_NAME']=="127.0.0.1" || $_SERVER['SERVER_NAME']=="localhost")
   { 
   //$serveur ="localhost:3306"; 
   $bdd = "neigesoleil";
   $user="root";
   $mdp=""; 
   } 
  else // 1and1
   { 
   $serveur ="db5006990148.hosting-data.io";
   $bdd = "dbs5771376";
   $user="dbu372597";
   $mdp="Wanuke70"; 
  }   
  //echo "<br/><h2>-------------serveur=".$serveur.", bdd=".$bdd.", user=".$user."</h2>";
?>
<!-- JavaScript code -->
<script>
  
  /* Code for changing active 
  link on clicking */
  var btns = 
      $("#navigation .navbar-nav .nav-link");

  for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click",
                            function () {
          var current = document
              .getElementsByClassName("active");

          current[0].className = current[0]
              .className.replace(" active", "");

          this.className += " active";
      });
  }

  /* Code for changing active 
  link on Scrolling */
  $(window).scroll(function () {
      var distance = $(window).scrollTop();
      $('.page-section').each(function (i) {

          if ($(this).position().top 
              <= distance + 250) {
                
                  $('.navbar-nav a.active')
                      .removeClass('active');

                  $('.navbar-nav a').eq(i)
                      .addClass('active');
          }
      });
  }).scroll();
</script>
