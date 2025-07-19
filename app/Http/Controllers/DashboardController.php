<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $yesterday = Carbon::yesterday();
        $totalUsersYesterday = User::whereDate('created_at', '<=', $yesterday)->count();
        $growth = $totalUsersYesterday > 0
            ? (($totalUsers - $totalUsersYesterday) / $totalUsersYesterday) * 100
            : 100;

        // Artikel CSC
        $totalArticlesCsc = Article::where('target_website', 'csc')->count();
        $totalArticlesCscLastWeek = Article::where('target_website', 'csc')
            ->whereDate('created_at', '<=', Carbon::now()->subWeek())->count();
        $growthCsc = $totalArticlesCscLastWeek > 0
            ? (($totalArticlesCsc - $totalArticlesCscLastWeek) / $totalArticlesCscLastWeek) * 100
            : 100;

        // Artikel Pustaka Pemda
        $totalArticlesPemda = Article::where('target_website', 'pustaka-pemda')->count();
        $totalArticlesPemdaYesterday = Article::where('target_website', 'pustaka-pemda')
            ->whereDate('created_at', '<=', $yesterday)->count();
        $growthPemda = $totalArticlesPemdaYesterday > 0
            ? (($totalArticlesPemda - $totalArticlesPemdaYesterday) / $totalArticlesPemdaYesterday) * 100
            : 100;

        // Artikel PSPI
        $totalArticlesPspi = Article::where('target_website', 'pspi')->count();
        $totalArticlesPspiYesterday = Article::where('target_website', 'pspi')
            ->whereDate('created_at', '<=', $yesterday)->count();
        $growthPspi = $totalArticlesPspiYesterday > 0
            ? (($totalArticlesPspi - $totalArticlesPspiYesterday) / $totalArticlesPspiYesterday) * 100
            : 100;

        // Artikel per bulan
        $monthlyArticleStats = Article::selectRaw('MONTH(created_at) as month, target_website, COUNT(*) as total')
    ->groupBy('month', 'target_website')
    ->orderBy('month')
    ->get();


        $monthLabels = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        return view('admin.dashboard', compact(
            'totalUsers', 'growth',
            'totalArticlesCsc', 'growthCsc',
            'totalArticlesPemda', 'growthPemda',
            'totalArticlesPspi', 'growthPspi',
            'monthlyArticleStats', 'monthLabels'
        ));

    }
}
