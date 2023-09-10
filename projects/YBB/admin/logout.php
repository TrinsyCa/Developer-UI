<?php
   session_destroy();
   ob_start();
   header("Refresh: 0; url=../");
?>