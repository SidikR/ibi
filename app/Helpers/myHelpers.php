<?php

use App\Models\Info;
use App\Models\Berita;
use App\Models\Bidang;
use App\Models\Layanan;
use App\Models\Product;
use App\Models\Program;
use App\Models\Testimoni;
use App\Models\KategoriBerita;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BeritaController;

if (!function_exists('GetNavbar')) {
    function roleName()
    {
        return Auth::user()->role->name;
    }
    function nameUser()
    {
        return Auth::user()->name;
    }
    function isKeywordActive($keywords)
    {
        $currentUrl = request()->url();
        foreach ($keywords as $keyword) {
            if (strpos($currentUrl, $keyword) !== false) {
                return true;
            }
        }
        return false;
    }
}
