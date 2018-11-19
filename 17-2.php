<?php

class MySQLiSessionHandler {

  private $_dbLink;
  private $_sessionName;
  private $_sessionTable;
  CONST SESS_EXPIRE = 3600;

  public function __construct($host, $user, $pswd, $db, $sessionName, $sessionTable)
  {
    // Create a connection to the database
    $this->_dbLink = new mysqli($host, $user, $pswd, $db);
    $this->_sessionName = $sessionName;
    $this->_sessionTable = $sessionTable;

    // Set the handlers for open, close, read, write, destroy and garbage collection.
    session_set_save_handler(
      array($this, "session_open"),
      array($this, "session_close"),
      array($this, "session_read"),
      array($this, "session_write"),
      array($this, "session_destroy"),
      array($this, "session_gc")
    );

    session_start();
  }

  function session_open($session_path, $session_name) {
    $this->_sessionName = $session_name;
    return true;
  }

  function session_close() {
      return 1;
  }

  function session_write($SID, $value) {
    $stmt = $this->_dbLink->prepare("
      INSERT INTO {$this->_sessionTable}
        (sid, value) VALUES (?, ?) ON DUPLICATE KEY
        UPDATE value = ?, expiration = NULL");

    $stmt->bind_param('sss', $SID, $value, $value);
    $stmt->execute();

    session_write_close();
  }

  function session_read($SID) {
      // create a SQL statement that selects the value for the cussent session ID and validates that it is not expired.
      $stmt = $this->_dbLink->prepare(
        "SELECT value FROM {$this->_sessionTable}
         WHERE sid = ? AND
         UNIX_TIMESTAMP(expiration) + " .
         self::SESS_EXPIRE . " > UNIX_TIMESTAMP(NOW())"
      );

      $stmt->bind_param('s', $SID);

      if ($stmt->execute())
      {
      $stmt->bind_result($value);
        $stmt->fetch();

        if (! empty($value))
        {
          return $value;
        }
      }
  }

  public function session_destroy($SID) {
    // Delete the record for the session id provided
    $stmt = $this->_dbLink->prepare("DELETE FROM {$this->_sessionTable} WHERE SID = ?");
    $stmt->bind_param('s', $SID);
    $stmt->execute();
  }

    public function session_gc($lifetime) {
      // Delete records that are expired.
      $stmt = $this->_dbLink->prepare("DELETE FROM {$this->_sessionTable}
          WHERE UNIX_TIMESTAMP(expiration) < " . UNIX_TIMESTAMP(NOW()) - self::SESS_EXPIRE);

      $stmt->execute();
   }
}
