<?php

$isAvailable = true;

$username = $_POST['username'];





echo json_encode(array(
    'valid' => $isAvailable,
));
