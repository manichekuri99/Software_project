<?php
    //Start session
    session_start();

    //checking connection and connecting to a database
    require_once('connection/config.php');
    //Connect to mysqli server
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
    if(!$link) {
        die('Failed to connect to server: ' . mysqli_error());
    }

    //Select database
    $db = mysqli_select_db($link,DB_DATABASE);
    if(!$db) {
        die("Unable to select database");
    }

     // check if the 'id' variable is set in URL
     if (isset($_GET['id']))
     {
         // get id value
         $id = $_GET['id'];

         // delete the entry
         $result = mysqli_query($link,"DELETE FROM messages WHERE message_id='$id'")
         or die("There was a problem while removing the message ... \n" . mysqli_error());

         // redirect back to the messages page
         header("Location: messages.php");
         }
     else
     // if id isn't set, redirect back to the messages page
     {
        header("Location: messages.php");
     }

?>
