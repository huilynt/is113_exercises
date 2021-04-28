<?php
// extra.php
// extra.php will ERROR OUT
// no session_start() so PHP won't know what $_SESSION is!

echo "Forrest wanna marry {$_SESSION['forrest_gf']}";

?>