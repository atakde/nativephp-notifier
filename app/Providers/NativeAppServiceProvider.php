<?php

namespace App\Providers;

use App\Jobs\FetchRSS;
use Native\Laravel\Facades\ContextMenu;
use Native\Laravel\Facades\Dock;
use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Facades\Window;
use Native\Laravel\GlobalShortcut;
use Native\Laravel\Menu\Menu;

class NativeAppServiceProvider
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        // MenuBar::create()
        // ->alwaysOnTop();

        Menu::new()
            ->appMenu()
            ->submenu(
                'About',
                Menu::new()
                    ->link('https://nativephp.com', 'NativePHP')
            )
            ->submenu(
                'View',
                Menu::new()
                    ->toggleFullscreen()
                    ->separator()
                    ->toggleDevTools()
            )
            ->register();

        Window::open()
            ->width(800)
            ->height(800);

        // $refreshLink = sprintf('%s://refresh', config('nativephp.deeplink_scheme'));
        // MenuBar::create()
        //     ->route('menu-bar-home')->showDockIcon()->withContextMenu(
        //         Menu::new()
        //             ->link($refreshLink, 'Refresh', 'CmdOrCtrl+R')
        //             ->separator()
        //             ->quit()
        //     );
    }
}
