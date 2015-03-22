<?php

function nddValidation($ndd)
{
   require('src/AvailabilityService.php');
   $service = new HelgeSverre\DomainAvailability\AvailabilityService(true);

   $available = $service->isAvailable($ndd);

    if($available) {
        echo 1;
    }
    else {
        echo 0;
    }

    return 200;
}

$ndd = ($_POST['ndd']);
nddValidation($ndd);

?>




