<?php

use App\Models\Notifi;

function createNotifi($title, $message, $type = null)
{
    Notifi::create([
        'user_id' => auth()->id(),
        'title'   => $title,
        'message' => $message,
        'type'    => $type,
    ]);
}
