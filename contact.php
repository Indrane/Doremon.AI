<?php
    session_start();
    $con=mysqli_connect("localhost","root","","doremon");
    
    if(isset($_POST['submit'])){

      $name=$_POST['name'];
      $email=$_POST['email'];
      $mobile=$_POST['mobile'];
      $comment=$_POST['comment'];

    
      $query = "insert into contact_us(name,email,mobile,comment) values('$name','$email','$mobile','$comment')";
      $res=mysqli_query($con,$query);
      if($res>0){
          ?>
          <script>
              alert("Thank you for contacting us. We will review your query and response back soon.");
          </script> 
          <?php
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    /* Style inputs with type="text", select elements and textareas */
input[type=text], select, textarea {
  width: 100%; /* Full width */
  padding: 12px; /* Some padding */
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
  background-color: #4285f4;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
  background-color: #4286f3;
}

/* Add a background color and some padding around the form */
/* .container {
  border-radius: 10px;
  box-shadow: 0 4px 24px -4px #4285f4;
  /* background-color: lightblue; */
  /* padding: 20px;
} */

</style>
<body>
<div class="container">
  <form method="POST">

    <label for="fname">Name</label>
    <input type="text"  name="name" placeholder="Your Name" required>

    <label for="lname">Email</label>
    <input type="text" name="email" placeholder="Your Email" required>

    <label for="lname">Mobile</label>
    <input type="text" name="mobile" placeholder="Your Mobile" required>

    <label for="subject">Comment</label>
    <textarea name="comment" placeholder="Write your query" style="height:200px" required></textarea>

    <input type="submit" value="submit" name="submit">

  </form>
</div>
</body>
</html>