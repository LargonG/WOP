<?php
exec("start start_testengine.bat");
header("Refresh: 0; url=/problems/".$_COOKIE['last_submit']);
?>