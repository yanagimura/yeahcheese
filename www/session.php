<?php

session_start();
if (!isset($_SESSION['count'])) {
    echo '初めての訪問です';
    $_SESSION['count'] = 1;
} else {
    $_SESSION['count'] = $_SESSION['count'] + 1;
    echo $_SESSION['count'];
    echo '回目の訪問です';
}

?>
