<?php

$t = date("H");

if ($t < "10") {
    echo "Have a good morning!";

} else if ($t > "10" && $t < "16") {
    echo "Good afternoon";

} else {
    echo "Have a good night!";

}
?> 