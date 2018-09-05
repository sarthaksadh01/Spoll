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

        <style media="screen">
        .border{
          border-width:5px !important;
        }

        </style>


    <title></title>
  </head>
  <body class="bg-info">
    <br>
    <div class=" bg-info m-5  jumbotron text-center">
      <h1 class="text-light display-1">S Poll</h1>
      <p class="text-light lead">Generate polls here</p>
      <!-- <hr style="background-color:#ffffff;"> -->
      <a class="btn btn-warning btn-lg" href="#generate" role="button">Generate</a>
    </div>

  </body>

  <div id="generate" class="border container">

    <form  id="xyz" method = "POST" class="m-5 text-light">

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Enter your Question here!</label>
        <textarea  class="form-control" name="question" id="question" rows="3"></textarea>
      </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Option 1</label>
    <input maxlength="10" name="option1" type="text" class="form-control" id="optiona" placeholder="Option 1(required)">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Option 2</label>
    <input maxlength="10" name="option2"  type="text" class="form-control" id="optionb" placeholder="Option 2(required)">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Option 3</label>
    <input maxlength="10" name="option3"  type="text" class="form-control" id="optionc" placeholder="Option 3(required)">
  </div>
  <!-- <div class="form-group">
    <label for="exampleFormControlInput1">Option 4</label>
    <input maxlength="10"  type="text" class="form-control" id="exampleFormControlInput1" placeholder="Option 4">
  </div> -->


<button  class="btn btn-lg btn-success" id ="frm" type="button" name="submit">Submit</button>
</form>

  </div>
  <div  id ="lnk" style="display:none;" class="alert alert-success">
  </div>
  <div  id ="rslt" style="display:none;" class="alert alert-warning">
  <strong>Check Result here:</strong> <span id="result_link"></span>Indicates a successful or positive action.
  </div>





  <script type="text/javascript">

      $("#frm").click(function(){
        // alert("fsd");

          var question = $("#question").val();
          var optiona = $("#optiona").val();
          var optionb = $("#optionb").val();
          var optionc = $("#optionc").val();
             $.ajax({
                 type:"POST",
                 url :"generate.php",
                 data: {
                   submit:"yes",
                   question:question,
                   option1:optiona,
                   option2:optionb,
                   option3:optionc
                 },
                 success : function(msg){
                    $("#generate").hide();
                    //alert(msg);
                    $("#lnk").html('<strong>Vote here: http://localhost/PollPhp/voting.php?id='+msg+'</strong>');
                    $("#rslt").html('<strong>Check Result here: http://localhost/PollPhp/charts.php?result='+msg+'</strong>');
                    $("#lnk").show();
                    $("#rslt").show();
                   //alert(msg);

                 }
             });

      });

  </script>


</html>
