<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Page;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'inquiryCount' => Inquiry::query()->count(),
            'newInquiries' => Inquiry::query()->where('status', 'new')->count(),
            'serviceCount' => Service::query()->count(),
            'teamCount' => TeamMember::query()->count(),
            'testimonialCount' => Testimonial::query()->count(),
            'pageCount' => Page::query()->count(),
            'recentInquiries' => Inquiry::query()->latest()->limit(6)->get(),
        ]);
    }
}
