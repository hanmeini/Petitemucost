<?php

    namespace App\View\Composers;

    use Illuminate\View\View;
    use Illuminate\Support\Facades\Auth;
    use App\Models\Notification;

    class NotificationComposer
    {
        /**
         * Mengikat data ke view.
         *
         * @param  \Illuminate\View\View  $view
         * @return void
         */
        public function compose(View $view)
        {
            $unreadCount = 0;

            // hitung notif if Klien login
            if (Auth::check() && Auth::user()->role == 'client') {
                $unreadCount = Notification::where('user_id', Auth::id())
                                           ->whereNull('read_at')
                                           ->count();
            }
            $view->with('unreadNotificationsCount', $unreadCount);
        }
    }
