<?php

   // Give the POSTed item ID a friendly variable name
   $itemID = filter_var($_POST['itemid'], FILTER_VALIDATE_INT);
   $participant = new Participant();
   $buyerID = $participant->getParticipantKey();

   // Retrieve the item seller and price using some fictitious item class
   $item = new Item();
   $sellerID = $item->getItemOwner($itemID);
   $price = $item->getPrice($itemID);

   // Instantiate the mysqli class
   $db = new mysqli("localhost","website","secret","chapter34");

   // Disable the autocommit feature
   $db->autocommit(FALSE);

   // Debit buyer's account

   $stmt = $db->prepare("UPDATE participants SET cash = cash - ? WHERE id = ?");

   $stmt->bind_param('di', $price, $buyerID);

   $stmt->execute();

   // Credit seller's account
   $query = $db->prepare("UPDATE participants SET cash = cash + ? WHERE id = ?");

   $stmt->bind_param('di', $price, $sellerID);

   $stmt->execute();

   // Update trunk item ownership. If it fails, set $success to FALSE
   $stmt = $db->prepare("UPDATE trunks SET owner = ? WHERE id = ?");

   $stmt->bind_param('ii', $buyerID, $itemID);

   $stmt->execute();

   if ($db->commit()) {
      echo "The swap took place! Congratulations!";
   } else {
      echo "There was a problem with the swap!";
   }

?>
