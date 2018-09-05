<?php


    if(isset($_POST['submit'])){

      $option1 = $_POST['option1'];
      $option2=$_POST['option2'];
      $option3=$_POST['option3'];
      $question = $_POST['question'];
      $link = mysqli_connect("localhost","root","","phppoll");
      $query ="INSERT INTO `polld`
      (question,option1,option2,option3,option1_value,option_2value,option3_value)
      VALUES('$question','$option1','$option2','$option3','0','0','0');
      ";
      $result = mysqli_query($link,$query);
      if($result){

        $last_id = mysqli_insert_id($link);
          echo $last_id;



      }


    }
    if(isset($_POST['vote'])){

      $id=$_POST['s_id'];
      $ans =$_POST['ans'];
      $link = mysqli_connect("localhost","root","","phppoll");
      $query=
      "UPDATE `polld`
      SET $ans = $ans+1
      WHERE id = '$id'";
      $result = mysqli_query($link,$query);
      if($result){

        $query2 ="SELECT * FROM `polld` WHERE id ='$id'";
        $row=mysqli_fetch_assoc(mysqli_query($link,$query2));
        $dataPoints = array(
        	array("y" => $row['option1_value'], "label" => $row['option1'] ),
        	array("y" => $row['option_2value'], "label" => $row['option2']  ),
        	array("y" => $row['option3_value'], "label" => $row['option3']  )
        );


    echo "charts.php?result=".$id;


      }
      else echo "Error Please try agian later";



    }





 ?>
