<script
 src="https://code.jquery.com/jquery-3.3.1.min.js"
 integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
 crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function() {

 // Attach a click handler to the Check Username button
 $('#check_un').click(function(e) {

 // Retrieve the username field value
 var username = $('#username').val();

 // Use jQuery's $.get function to send a GET request to the available.php script
 // and provide an appropriate response based on the outcome
 $.get(
 "available.php",
 {username: username},
 function(response){
 if (response.status == "FALSE") {
 $("#valid").html("Not available!");
 } else {
 $("#valid").html("Available!");
 }
 },
 "json"
 );

 // Use jQuery's preventDefault() method to prevent the link from being followed
 e.preventDefault();
 });
});

</script>
