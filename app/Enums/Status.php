<?php

namespace App\Enums;

enum Status: string
{
    case Pending = "Pending";
    case Completed = "Completed";
    case InProgress = "In progress";
    case Failed = "Failed";
}
