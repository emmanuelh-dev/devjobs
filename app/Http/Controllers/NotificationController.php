<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {   
        $notificaiones = auth()->user()->unreadNotifications;

        // Marcar como leídas las notificaciones
        auth()->user()->unreadNotifications->markAsRead();
        return view ('notificaciones.index', [
            'notificaciones' => $notificaiones,
        ]);
    }
}
