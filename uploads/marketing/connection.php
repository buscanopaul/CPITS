<?php

require "constant.php";

mysql_connect(DB_SERVER, DB_USER, DB_PASS) or die ("No database connection");
mysql_select_db(DB_NAME);



?>