<?php

namespace App\Http\Controllers;

use App\Models\ConsultantSkill;
use App\Models\CoreValue;
use App\Models\Feature;
use App\Models\Inquiry;
use App\Models\Page;
use App\Models\RelatedService;
use App\Models\SendEmail;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Redirect;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', $this->siteData());
    }

    public function page(string $slug)
    {
        $page = Page::query()->where('slug', $slug)->firstOrFail();

        return view('legal', array_merge($this->siteData(), compact('page')));
    }

    public function send(Request $request)
    {
        if ($request->verify_contact != $request->verify_contact_input) {
            Log::warning('Contact form verification failed', [
                'submitted_verify_contact' => $request->verify_contact_input,
                'expected_verify_contact' => $request->verify_contact,
            ]);

            return Redirect::back()->with('error', 'Please complete the human check correctly.');
        }

        $inquiry = Inquiry::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->massage,
            'status' => 'new',
            'mail_sent' => false,
        ]);

        try {
            SendEmail::sendEmail(
                setting('mail_from', 'noreply@trustedtouchnursing.co.ke'),
                setting('mail_from_name', 'No Reply'),
                $request->massage,
                $request->name,
                $request->email,
                setting('mail_subject', 'TTN Website Inquiry')
            );
            $inquiry->update(['mail_sent' => true]);
        } catch (\Throwable $e) {
            Log::error('Contact form mail failed', ['error' => $e->getMessage()]);
            $inquiry->update(['mail_error' => $e->getMessage()]);
        }

        return view('thank');
    }

    protected function siteData(): array
    {
        return [
            'coreValues' => CoreValue::query()->where('is_visible', true)->orderBy('sort_order')->get(),
            'features' => Feature::query()->where('is_visible', true)->orderBy('sort_order')->get(),
            'services' => Service::query()->where('is_visible', true)->orderBy('sort_order')->get(),
            'relatedServices' => RelatedService::query()->where('is_visible', true)->orderBy('sort_order')->get(),
            'teamMembers' => TeamMember::query()->where('is_visible', true)->orderBy('sort_order')->get(),
            'consultantSkills' => ConsultantSkill::query()->where('is_visible', true)->orderBy('sort_order')->get(),
            'testimonials' => Testimonial::query()->where('is_visible', true)->orderBy('sort_order')->get(),
        ];
    }
}
