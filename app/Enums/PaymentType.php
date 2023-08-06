<?php

namespace App\Enums;

enum PaymentType : string
{
    case CASH = "Hotovost";
    case CASH_ON_DELIVERY = "Dobírka";
    case PAYMENT_CARD = "Platební karta";
    case BANK_TRANSFER = "Bankovní převod";

}
