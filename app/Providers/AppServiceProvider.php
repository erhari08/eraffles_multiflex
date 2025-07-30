<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // ✅ Move the helper function OUTSIDE of View::composer
        if (!function_exists('menuItemWithLabel')) {
            function menuItemWithLabel($text, $url, $icon, $count)
            {
                $item = [
                    'text' => $text,
                    'url' => $url,
                    'icon' => $icon,
                ];
                if ($count >= 1) {
                    $item['label'] = $count;
                    $item['label_color'] = 'danger';
                }
                return $item;
            }
        }

        View::composer('*', function ($view) {
            if (!auth()->check()) return;

            $user = auth()->user();
            $role = $user->role_id;
          
        $mastercount = 0;

            $menu = [];

            $menu[] = ['header' => 'account_settings'];
            $menu[] = [
                'text' => 'profile',
                'url' => '/home',
                'icon' => 'fas fa-fw fa-user',
            ];

            if ($role == "1") {
                $menu[] = menuItemWithLabel('Masters', 'admin/masters', 'fas fa-fw fa-cogs', $mastercount);
                $menu[] = menuItemWithLabel('GRN', '/goods-receipt-notes', 'fas fa-fw fa-cogs', $mastercount);
                $menu[] = menuItemWithLabel('Purchase Order', '/purchaseorder', 'fas fa-fw fa-cogs', $mastercount);
                $menu[] = menuItemWithLabel('Job-Cards', '/jobcards', 'fas fa-fw fa-cogs', $mastercount);
                $menu[] = menuItemWithLabel('Re-winding Process', '/rewinding', 'fas fa-fw fa-cogs', $mastercount);
                $menu[] = menuItemWithLabel('Printing-Process', '/printingprocess', 'fas fa-fw fa-cogs', $mastercount);

                $menu[] = menuItemWithLabel('inspection', '/inspection', 'fas fa-fw fa-cogs', $mastercount);
                $menu[] = menuItemWithLabel('lamination', '/lamination', 'fas fa-fw fa-cogs', $mastercount);
                $menu[] = menuItemWithLabel('slitting', '/slitting', 'fas fa-fw fa-cogs', $mastercount);
                $menu[] = menuItemWithLabel('folding', '/folding', 'fas fa-fw fa-cogs', $mastercount);
                $menu[] = menuItemWithLabel('pouching', '/pouching', 'fas fa-fw fa-cogs', $mastercount);
                $menu[] = menuItemWithLabel('production process', '/production_process', 'fas fa-fw fa-cogs', $mastercount);




            } elseif ($role == "2") {
                $menu[] = [
                    'text' => 'Address Change Request',
                    'url' => 'user/address-change',
                    'icon' => 'fas fa-fw fa-plane',
                ];
                


                
            }

     

           

            config(['adminlte.menu' => $menu]);
        });
    }
}
