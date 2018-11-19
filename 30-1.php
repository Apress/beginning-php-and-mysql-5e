<?php

   // Connect to the MySQL database
   $mysqli = new mysqli("localhost", "websiteuser", "secret", "helpdesk");

// Create a trigger
$query = <<<HEREDOC
DELIMITER //
CREATE TRIGGER au_reassign_ticket
AFTER UPDATE ON technicians
FOR EACH ROW
BEGIN
   IF NEW.available = 0 THEN
      UPDATE tickets SET  technician_id=null WHERE  technician_id=NEW.id;
   END IF;
END;//
HEREDOC;
$mysqli->query($query);

?>
