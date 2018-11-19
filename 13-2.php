<?php
    if (isset($_POST['submit']))
    {
        echo "You like the following languages:<br>";
        if (is_array($_POST['languages'])) {
          foreach($_POST['languages'] AS $language) {
              $language = htmlentities($language);
              echo "$language<br>";
          }
      }
    }
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
   What's your favorite programming language?<br> (check all that apply):<br>
   <input type="checkbox" name="languages[]" value="csharp">C#<br>
   <input type="checkbox" name="languages[]" value="javascript">JavaScript<br>
   <input type="checkbox" name="languages[]" value="perl">Perl<br>
   <input type="checkbox" name="languages[]" value="php">PHP<br>
   <input type="submit" name="submit" value="Submit!">
</form>
