<?php
exec("testengine.exe >logs.txt");
header("Refresh: 0; url=/problems/".$_COOKIE['last_submit']);
?>