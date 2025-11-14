<?php

    namespace App\Providers;

    use Illuminate\Support\ServiceProvider;
    use Illuminate\Support\Facades\View;
    use App\View\Composers\NotificationComposer;
    use Illuminate\Pagination\Paginator;
    use App\View\Composers\AdminSidebarComposer;

    class AppServiceProvider extends ServiceProvider
    {
        /**
         * Register any application services.
         */
        public function register(): void
        {
            //
        }

        /**
         * Bootstrap any application services.
         */
        public function boot(): void
        {
            Paginator::useBootstrapFive();
            View::composer('components.navbar', NotificationComposer::class);

            //Admin Notification
            View::composer('components.admin-sidebar', AdminSidebarComposer::class);
        }
    }
