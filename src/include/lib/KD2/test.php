<?php

$i = 1;
$ok = false;

while (!$ok)
{
    $result = sprintf('%u', 1231 << $i);
    if ($result == 3472883712) $ok = true;
    var_dump($result);
    $i++;
}
