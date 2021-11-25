<?php

//send email function
function email_update($buyer, $price)
{
    $name = "Auction Website";
    $email = "";
    $recipient = $buyer;

    $mail_body = "Dear ".$buyer.",\r
    \tWe are sorry to inform you that you are outbid. \r
    \tThe price is £".$price." now. ";
    $subject = "Auction Situation update";
    $header = "From: ".$name." <".$email.">\r\n";
    if(mail($recipient, $subject, $mail_body, $header))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function email_watch($buyer, $price)
{
    $name = "Auction Website";
    $email = "";
    $recipient = $buyer;

    $mail_body = "Dear ".$buyer.",\r
    \tWe are here to inform you about the item in your watchlist. \r
    \tThe price is £".$price." now. ";
    $subject = "Auction Situation update";
    $header = "From: ".$name." <".$email.">\r\n";
    if(mail($recipient, $subject, $mail_body, $header))
    {
        return true;
    }
    else
    {
        return false;
    }
}
?>