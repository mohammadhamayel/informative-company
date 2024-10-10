<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageComponent;
use App\Models\Social;
use App\Models\Subscription;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $data = [
            [
                'title' => 'Total Components',
                'value' => PageComponent::count(),
                'icon' => 'fa fa-list-alt',

            ],
            [
                'title' => 'Total Pages',
                'value' => Page::count(),
                'icon' => 'fa fa-clone',

            ],
            [
                'title' => 'Total Socials Links',
                'value' => Social::count(),
                'icon' => 'fa fa-share-alt-square',

            ],
            [
                'title' => 'Total Subscribers',
                'value' => Subscription::count(),
                'icon' => 'fa fa-envelope',

            ],
        ];

        $today = Carbon::now();
        $lastWeek = Carbon::now()->subDays(6);
        $statistics = Subscription::whereBetween('created_at', [$lastWeek, $today])
            ->selectRaw('DAYNAME(created_at) as day_name, COUNT(*) as count')
            ->groupBy('day_name')
            ->pluck('count', 'day_name')
            ->toArray();
        $dayNames = [];

        for ($i = 0; $i < 7; $i++) {
            $dayNames[] = $lastWeek->copy()->addDays($i)->englishDayOfWeek;
        }

        $statistics = array_merge(array_fill_keys($dayNames, 0), $statistics);

        if (config('app.demo')) {
            $value = [4, 5, 3, 5, 4, 5, 4];
            $statistics = array_combine($dayNames, $value);

        }

        return view('backend.dashboard', compact('data', 'statistics'));
    }
}
