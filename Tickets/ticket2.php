<?php


function generateImage($ticketName, $ticketNumber)
{
    $ticket = imagecreatetruecolor(500, 180);
    $backgroundColor = imagecolorallocate($ticket, 0, 0, 255);
    $fontColor = imagecolorallocate($ticket, 255, 255, 0);
    $lineColor = imagecolorallocate($ticket, 128, 255, 0);
    //imagecolorallocate is not working since I use imagecreatetruecolor so I ise imagefill instead  to fill the image
    $textX = 30;
    $textY = 25;
    imagefill($ticket, 0, 0, $backgroundColor);
    imagestring($ticket, 4, $textX + 180, $textY, "SuperLotto", $fontColor);
    imagestring($ticket, 4, $textX, $textY + 30, "Name: $ticketName", $fontColor);
    imagestring($ticket, 4, $textX, $textY + 60, "Ticket Code: $ticketNumber", $fontColor);
    // imageline($ticket, 30, $textY + 45, 165, $textY + 45, $lineColor);
    imagecolordeallocate($ticket, $backgroundColor);
    imagecolordeallocate($ticket, $fontColor);
    imagecolordeallocate($ticket, $lineColor);

    return $ticket;
}

    $ticketName = "Adrian Gaile Singh";
    $ticketNumber = md5(mt_rand());
    header("Content-type: image/png");
    $ticketImage = generateImage($ticketName, $ticketNumber);
    imagepng($ticketImage);
    imagedestroy($ticketImage);
    ?>
