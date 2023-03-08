<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $notificaciones = Auth::user()-> unreadNotifications;

        // Marcar como leidas las notificacioens
        Auth::user()-> unreadNotifications -> markAsRead();
        return view('notificaciones.index', [
            'notificaciones' => $notificaciones
        ]);
    }
}
