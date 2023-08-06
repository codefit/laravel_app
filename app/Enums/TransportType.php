<?php

namespace App\Enums;

enum TransportType : string
{
    case ZASILKOVNA_CZ = "Zásilkovna CZ";
    case ZASILKOVNA_SK = "Zásilkovna SK";
    case ZASILKOVNA  = "Zásilkovna";
    case CESKA_POSTA_DO_RUKY = "Česká pošta - Balík do ruky";
    case CESKA_POSTA_NA_POSTU = "Česká pošta - Balík na poštu";
    case CESKA_POSTA_BALIKOVNA = "Česká pošta - Balík do balíkovny";
    case PPL = "PPL";
    case PPL_PARCEL_SHOP = "PPL Výdejní místa";
    case DPD = "DPD";
    case DPD_PICKUP = " DPD výdejní místa";
    case WE_DO = "WE DO";
    case GEIS = "GIES";
    case GLS = "GLS";
    case SLOVENSKA_POSTA = "Slovenská pošta";
    case SPS = "SPS";
    case SPS_PARCEL_SHOP = "SPS Výdejní místa";
    case DHL = "DHL";
    case TOP_TRANS = "TOP TRANS";
}
