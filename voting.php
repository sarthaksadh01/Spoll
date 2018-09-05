<?php ob_start();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
      crossorigin="anonymous">
      <script
         src="https://code.jquery.com/jquery-3.3.1.js"
         integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
         crossorigin="anonymous"></script>

      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <title></title>
  </head>
  <body class="bg-info">
  <?php
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $link =  mysqli_connect("localhost","root","","phppoll");
    $query = "SELECT * FROM `polld` WHERE id = '$id'";
    $result = mysqli_query($link,$query);
    if($result){

      $row = mysqli_fetch_assoc($result);
      echo '<div id="voteform" class="text-light bg-info m-5  jumbotron text-center">

            <h1 class=" text-light ">'.$row['question'].'</h1>
            <hr style="background-color:#ffffff;">
            <h1 class="display-5">Options!</h1>
            <form method ="POST">
            <div class="custom-control custom-radio">
        <input type="radio" value= "option1_value" class="custom-control-input" id="option1" name="votes">
        <label class="custom-control-label"  for="option1">'.$row['option1'].'</label>
      </div>

      <!-- Group of default radios - option 2 -->
      <div class="custom-control custom-radio">
        <input value ="option_2value"  type="radio" class="custom-control-input" id="option2" name="votes" >
        <label class="custom-control-label" for="option2">'.$row['option2'].'</label>
      </div>

      <!-- Group of default radios - option 3 -->
      <div class="custom-control custom-radio">
        <input value="option3_value" type="radio" class="custom-control-input" id="option3" name="votes">
        <label class="custom-control-label"  for="option3">'.$row['option3'].'</label>
      </div>
      <input id="hdn" type = "hidden" name = "s_id" value ='.$id.'>
      <br>
      <button id="frm" class="btn-success btn-lg" type="button" name="button">Vote</button>
      <hr style="background-color:#ffffff;">


      </form>';

    }

  }


  ?>


    </div>
  <div class="container">
    <a class="float-left text-white lead" href="index.php"><u>Create Survey here!</u></a>
    <p class="float-right text-white lead">Powered by S Poll </p><br>
    <div  class="container" id ="if" >

    </div>
    <div class="text-white text-center display-5">
      S Poll

    </div>

  </div>


  <script type="text/javascript">

      $("#frm").click(function(){
        // alert("fsd");

            var voting = $('input:radio[name=votes]:checked').val();
            var id = $("#hdn").val();
             $.ajax({
                 type:"POST",
                 url :"generate.php",
                 data: {
                   vote:"yes",
                   s_id:id,
                   ans:voting


                 },
                 success : function(msg){
                //alert(msg);
                $("#voteform").hide();
                $("#if").html('<iframe  style="width:100%; height:370px;" src='+msg+'></iframe>')

                }


             });

      });





  </script>



  </body>
</html>
