<?php

namespace Database\Seeders;

use App\Models\ConsultantSkill;
use App\Models\CoreValue;
use App\Models\Feature;
use App\Models\Page;
use App\Models\RelatedService;
use App\Models\Service;
use App\Models\Setting;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CmsSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedAdmin();
        $this->seedSettings();
        $this->seedCollections();
        $this->seedPages();
    }

    protected function seedAdmin(): void
    {
        $password = Hash::make('Admin@TTN2026');

        foreach ([
            ['email' => 'admin@trustedtouchnursing.co.ke', 'name' => 'TTN Admin'],
            ['email' => 'm.muthoni@trustedtouchnursing.co.ke', 'name' => 'Martha Muthoni'],
            ['email' => 's.kamau@trustedtouchnursing.co.ke', 'name' => 'Sylvia Kamau'],
        ] as $admin) {
            User::query()->updateOrCreate(
                ['email' => $admin['email']],
                [
                    'name' => $admin['name'],
                    'password' => $password,
                ]
            );
        }
    }

    protected function seedSettings(): void
    {
        $settings = [
            'site_name' => 'Trusted Touch Nursing',
            'site_tagline' => 'Expert Newborn & Postnatal Care Services in Kenya',
            'logo' => 'uploads/logo-ttn.png',
            'favicon' => 'uploads/favicon.png',
            'header_availability' => 'Available 24Hours',
            'cta_label' => 'Get in Touch',

            'contact_email' => 'info@trustedtouchnursing.co.ke',
            'phone_primary' => '+254726961550',
            'phone_secondary' => '+254722360332',
            'whatsapp_number' => '+254722360332',
            'whatsapp_title' => 'Chat with us on WhatsApp!',
            'whatsapp_popup' => 'Hello, how can we help you?',
            'whatsapp_prefill' => 'I have just visited *http://trustedtouchnursing.co.ke/*',
            'location' => 'Nairobi',

            'social_facebook' => 'https://facebook.com/trustedtouchnursing',
            'social_twitter' => 'https://twitter.com/',
            'social_linkedin' => 'https://www.linkedin.com/company/trusted-touch-nursing-home-services/',
            'social_instagram' => 'https://www.instagram.com/trustedtouchnursing/',

            'seo_title' => 'Trusted Touch Nursing | Expert Newborn & Postnatal Care Services in Kenya',
            'seo_description' => 'At Trusted Touch Nursing, we offer professional, personalized newborn care by experienced maternity, neonatal, and pediatric nurses in Kenya. Partnering with families to foster safe and nurturing environments for early childhood development.',
            'seo_keywords' => 'newborn care, newborn care specialist, Trusted Touch Nursing, Kenya, pediatric nursing, neonatal care, maternity nurses, personalized newborn care, baby care services, early childhood support',
            'seo_canonical' => 'https://trustedtouchnursing.co.ke/',
            'og_image' => 'uploads/favicon.png',
            'schema_type' => 'MedicalBusiness',

            'hero_title_accent' => 'Newborn Care',
            'hero_title' => 'Specialist Agency',
            'hero_subtitle' => 'First Homebased Nursing Services in Kenya Specializing in Newborn Care',
            'hero_body' => 'At Trusted Touch Nursing (TTN), we are deeply committed to supporting families in nurturing their little ones through professional, personalized care that caters to each child’s unique journey from birth through early childhood.',
            'hero_cta_label' => 'Explore More',

            'about_title' => 'Company Overview.',
            'about_body' => "At Trusted Touch Nursing (TTN), we are deeply committed to supporting families in nurturing their little ones through professional, personalized care that caters to each child’s unique journey from birth through early childhood.\n\nOur skilled team of maternity, neonatal, and pediatric nurses brings extensive experience and a compassionate touch to every family, ensuring that both parents and babies receive the best possible care. We understand the importance of attentive, specialized support during these formative years, and we partner closely with families to foster a safe, nurturing, and development-focused environment at home.",
            'about_image' => 'uploads/WhatsApp Image 2024-12-12 at 06.57.08_54de3197.jpg',
            'about_cta_label' => 'More About',

            'vision_label' => 'Vision',
            'vision_text' => 'To be the leading provider of nursing care services, known for unwavering dedication to trust, compassion, and cultural sensitivity.',
            'mission_label' => 'Mission',
            'mission_text' => 'To deliver compassionate, trust- centered care while celebrating diversity and upholding the highest standards of professionalism.',

            'values_title' => 'Core Values.',
            'values_image' => 'uploads/9.webp',

            'why_cards_title' => 'Why Choose Us',
            'why_banner_label' => 'Why Choose Us',
            'why_banner_body' => "At Trusted Touch Nursing Home Services (TTN) we offer exceptional expertise in postnatal and neonatal care. Our team is led by highly experienced and specialized nurses who are also our directors, ensuring every aspect of care meets the highest professional standards\n\nOur nurses are thoroughly vetted, and are mentored by the experienced leadership team\n\nTTN is Registered and Licensed by Nursing Council of Kenya and our nurses are all licenced to Practice",
            'why_banner_cta' => 'Our Core Values',

            'services_eyebrow' => 'Our Services',
            'services_title' => 'Delivering the Best in Compassionate Care for Newborns, Children, and the Elderly',
            'services_cta' => 'Our Team',
            'related_title' => 'Related Services:',

            'team_eyebrow' => 'Meet Our Team',
            'team_title' => 'Our Leadership Team',
            'team_body' => "Our leadership team at TTN is driven by a dynamic group of neonatal and experienced nurses who bring a wealth of expertise and passion to the forefront of our mission.\n\nTheir deep understanding of healthcare, combined with hands-on experience, ensures that our organization remains steadfast in delivering exceptional care and innovative solutions to meet the needs of our community.\n\nWith a commitment to continuous learning and adapting to advancements in the field, the team fosters a culture of excellence and compassion, ensuring every family receives personalized and professional care that aligns with the highest standards of neonatal support.",
            'consultants_title' => 'We Value Our Consultants.',
            'consultants_intro' => "Our nurses bring extensive experience in neonatal and pediatric care, particularly in delivering home-based, compassionate care through Trusted Touch Nursing Home Services (TTN).\n\nThey are highly skilled in:",
            'consultants_image' => 'uploads/5.jpg',
            'consultants_cta' => 'Explore Services',

            'testimonials_title' => 'What Our Clients Say',

            'contact_name_label' => 'Name*',
            'contact_email_label' => 'Email*',
            'contact_message_label' => 'Write Your Massage*',
            'contact_submit_label' => 'Submit Now',
            'contact_human_label' => 'Are you human?',

            'mail_to' => 'info@trustedtouchnursing.co.ke',
            'mail_to_name' => 'Trusted Touch Nursing',
            'mail_bcc' => 'albertmuhatia@gmail.com',
            'mail_from' => 'noreply@trustedtouchnursing.co.ke',
            'mail_from_name' => 'No Reply',
            'mail_subject' => 'TTN Website Inquiry',

            'footer_subscribe_title' => 'Stay Subscribed!',
            'footer_inquiry_label' => 'For More Inquiry',
            'footer_mail_label' => 'To Send Mail',
            'footer_about_title' => 'About Us',
            'footer_related_title' => 'Related Services',
            'footer_legal_title' => 'Legality',
            'copyright_name' => 'Trusted Touch Nursing Home Services',
        ];

        foreach ($settings as $key => $value) {
            Setting::query()->updateOrCreate(['key' => $key], ['value' => $value]);
        }

        Setting::forgetCache();
    }

    protected function seedCollections(): void
    {
        if (CoreValue::query()->count() === 0) {
            $values = [
                ['Trust', 'Build with clients through accountability and dedication'],
                ['Compassion', "Approach all clients with genuine care easing families' concerns"],
                ['Cultural Sensitivity', 'Embrase diversity and honor various cutural beliefs'],
                ['Professionalism', 'Maintain consistency, ethical standards, and focus on quality care'],
                ['confidence', 'protect the privacy and information of our clients'],
                ['Empathy and Care', "Understand and support clients' needs with warmth"],
                ['Integrity', 'Practice transparency and honesty in every service'],
                ['Respect', 'Treat everyone with respect, honoring their individuality'],
            ];
            foreach ($values as $i => [$title, $description]) {
                CoreValue::query()->create(['title' => $title, 'description' => $description, 'sort_order' => $i + 1]);
            }
        }

        if (Feature::query()->count() === 0) {
            $features = [
                ['Experienced Leadership', 'Directors with over 14 years in neonatal and maternal healthcare oversee all operations.'],
                ['Qualified Team', 'Every nurse undergoes rigorous screening and training in advanced neonatal and postnatal care.'],
                ['Comprehensive Services', 'We provide in-home care, postpartum support, breastfeeding guidance, infant safety, training and family education.'],
                ['Specialized Expertise', 'Our focus on critical newborn care family counseling, and maternal health ensures holistic support'],
            ];
            foreach ($features as $i => [$title, $description]) {
                Feature::query()->create(['title' => $title, 'description' => $description, 'sort_order' => $i + 1]);
            }
        }

        if (Service::query()->count() === 0) {
            Service::query()->create([
                'title' => 'Postnatal Care',
                'anchor' => 'postnatal-care',
                'card_style' => 'two',
                'link_label' => 'Read More',
                'sort_order' => 1,
                'items' => "In-home care for parents and their babies\nNight nurse services\nComprehensive postpartum check-ups\nBreastfeeding support\nNewborn assessments and vital checks\nAssistance with baby feeding and sleep routines\nInfant and maternal health assessments\nPerineal care and contraceptive counseling\nInfant sleep safety, first aid, and care education",
            ]);
            Service::query()->create([
                'title' => 'Available Care Options',
                'anchor' => 'lactation-support',
                'card_style' => 'three',
                'link_label' => 'Read More',
                'sort_order' => 2,
                'items' => "Day and Night nurse support\n24-hour maternal/newborn nurse\nLive - in nurse\nSafari nurse\nSleep Consultant\nLactation specialist",
            ]);
            Service::query()->create([
                'title' => 'Training and Education',
                'anchor' => 'sleep-training',
                'card_style' => '',
                'link_label' => 'Explore More',
                'sort_order' => 3,
                'items' => "Sleep training.\nNanny training.\nFirst aid training.\nBaby feeding and weaning support.\nFamily and individual nutrition support.",
            ]);
        }

        if (RelatedService::query()->count() === 0) {
            $related = ['Newborn nannies', 'School nurse services', 'Special need Nurse services', 'Elderly Care', 'General home care services', 'Training and Education'];
            foreach ($related as $i => $title) {
                RelatedService::query()->create(['title' => $title, 'url' => '#related', 'sort_order' => $i + 1]);
            }
        }

        if (TeamMember::query()->count() === 0) {
            TeamMember::query()->create([
                'name' => 'Martha Muthoni',
                'photo' => 'uploads/martha.jpg',
                'linkedin' => 'https://www.linkedin.com/',
                'twitter' => 'https://twitter.com/',
                'sort_order' => 1,
                'bio' => 'Martha is an experienced nursing professional with a strong background in clinical and leadership roles. She has 11 years of experience in newborn care, having worked in both private and government institutions. With expertise in neonatal and pediatric care, Martha has supported patients in labor, postpartum, and neonatal care, demonstrating a deep commitment to delivering exceptional healthcare services.',
            ]);
            TeamMember::query()->create([
                'name' => 'Sylvia Kamau',
                'photo' => 'uploads/sylvia.jpg',
                'linkedin' => 'https://www.linkedin.com/',
                'twitter' => 'https://twitter.com/',
                'sort_order' => 2,
                'bio' => 'Sylvia is a seasoned nursing professional with over 14 years of experience specializing in midwifery, neonatal nursing, and maternal-child health. She has extensive expertise in providing 24-hour care for premature and critically ill newborns, gained through her work in both private and government institutions. Sylvia is deeply committed to ensuring the highest standards of care for newborns and their families.',
            ]);
        }

        if (ConsultantSkill::query()->count() === 0) {
            ConsultantSkill::query()->create([
                'title' => 'Neonatal and Critical Infant Care',
                'description' => 'Providing advanced care to critically ill infants, including specialized resuscitation and equipment handling, ensuring high-quality support for vulnerable newborns.',
                'sort_order' => 1,
            ]);
            ConsultantSkill::query()->create([
                'title' => 'Home-Based Newborn Services',
                'description' => 'Offering individualized, compassionate home care that eases the transition for families post-discharge, ensuring newborns receive seamless, professional care in a home setting.',
                'sort_order' => 2,
            ]);
            ConsultantSkill::query()->create([
                'title' => 'Family Education and Support',
                'description' => 'Guiding families on newborn routine, feeding, health monitoring and emotional coping strategies, they empower parents to confidently care for their infants',
                'sort_order' => 3,
            ]);
        }

        if (Testimonial::query()->count() === 0) {
            $quotes = [
                ['Rachel Breaux', 'Client', 'Amaizing Services', 'We are so thankful to find the team!! Our daughter surprised us a month early, and their expertise as neonatal nurses gave us the much-needed comfort that our premature little one had all the proper care at home. I cannot recommend them enough'],
                ['Daisy Hurt', 'TTN Client', 'Great Consulting!', "Team was nothing short of a godsend with both my new born babies. I couldn't have coped without them. They created such a happy and relaxed atmosphere for a newborn to thrive in. They helped and advised me when I wasn't feeding properly. Recognised when my baby was sick and helped advise and treated immediately. My babies had the most wonderful start to life because of them. They were complete baby whisperers. So brilliant, talented and professional. I cannot recommend their services enough."],
                ['Shirley', 'Client', 'Great Consulting!', 'Thank you for changing my life! Your exceptional care and support gave me confidence and peace of mind during such a critical time. I’ll always be grateful for the difference you made for me and my baby.'],
                ['Kate', 'Client', 'Great Consulting!', 'Thank you beyond words for all the help the last 6 months. We are so lucky to have found you. Truly appreciate all the love and support you gave our family. And we survived one night!.'],
                ['Rael', 'Client', 'Great Consulting!', 'Thank you both for being such an incredible support to our family these last four months. It has been so helpful and wonderful to know Clara was well cared for.'],
            ];
            foreach ($quotes as $i => [$author, $role, $headline, $quote]) {
                Testimonial::query()->create(compact('author', 'role', 'headline', 'quote') + ['sort_order' => $i + 1]);
            }
        }
    }

    protected function seedPages(): void
    {
        Page::query()->updateOrCreate(['slug' => 'privacy-policy'], [
            'title' => 'Privacy Policy',
            'effective_date' => 'December 10, 2024',
            'content' => <<<'HTML'
<p>Trusted Touch Nursing (TTN) values your privacy and is dedicated to protecting the personal information you share with us. This Privacy Policy outlines how we collect, use, and safeguard your information when you interact with our website and services.</p>
<h3>1. Information We Collect</h3>
<p>We may collect the following types of information:</p>
<ul>
<li><strong>Personal Information:</strong> Name, contact details (email address, phone number, and mailing address), billing information for payments and invoicing.</li>
<li><strong>Non-Personal Information:</strong> Browser type and version, IP address, website usage data (e.g., pages visited, time spent on the site).</li>
<li><strong>Sensitive Information:</strong> Information you voluntarily share about health or family specifics to enable personalized care.</li>
</ul>
<h3>2. How We Use Your Information</h3>
<ul>
<li>To provide professional maternity, neonatal, and pediatric nursing services.</li>
<li>To communicate with you regarding our services, schedules, and updates.</li>
<li>To process payments and send invoices.</li>
<li>To improve the functionality and user experience of our website.</li>
<li>To comply with legal obligations and ensure your information's safety and security.</li>
</ul>
<h3>3. Information Sharing and Disclosure</h3>
<p>We respect your confidentiality and only share your personal information with consent, with trusted service providers, or when required by law.</p>
<h3>4. Data Security</h3>
<p>TTN implements encryption, secure servers, firewalls, and regular monitoring. No system can guarantee complete security.</p>
<h3>5. Data Retention</h3>
<p>We retain your personal information only as long as necessary to fulfill the purposes outlined in this policy or as required by law.</p>
<h3>6. Your Privacy Rights</h3>
<p>You may access, update, or delete your personal information, withdraw consent, and file a complaint with the relevant authority.</p>
<h3>7. Cookies and Tracking Technologies</h3>
<p>Our website uses cookies to enhance your browsing experience. You can modify your browser settings to block cookies.</p>
<h3>8. Third-Party Links</h3>
<p>TTN is not responsible for the privacy practices or content of external sites.</p>
<h3>9. Updates to This Privacy Policy</h3>
<p>Changes will be posted on this page with the updated effective date.</p>
<h3>10. Contact Us</h3>
<p>Trusted Touch Nursing (TTN), Nairobi. Email: info@trustedtouchnursing.co.ke</p>
HTML,
        ]);

        Page::query()->updateOrCreate(['slug' => 'terms-and-conditions'], [
            'title' => 'Terms and Conditions',
            'effective_date' => 'December 10, 2024',
            'content' => <<<'HTML'
<p>Welcome to Trusted Touch Nursing (TTN). By accessing and using our website or services, you agree to comply with and be bound by the following Terms and Conditions.</p>
<h3>1. Definitions</h3>
<p>The terms "we," "our," and "us" refer to Trusted Touch Nursing (TTN), and "you" refers to the user of our website or services.</p>
<h3>2. Use of Services</h3>
<p>Our services are intended for families seeking professional maternity, neonatal, and pediatric nursing care. You agree to provide accurate information, use services lawfully, and refrain from disrupting the website.</p>
<h3>3. Service Scope</h3>
<p>Specific details regarding scope, duration, and pricing will be outlined in individual agreements made with each client.</p>
<h3>4. Payment Terms</h3>
<p>Payments must be made as per the terms outlined in your service agreement. All fees are non-refundable unless otherwise stated.</p>
<h3>5. Limitation of Liability</h3>
<p>TTN will not be liable for indirect, incidental, or consequential damages. Liability is limited to the amount paid by the client for our services.</p>
<h3>6. Confidentiality</h3>
<p>TTN will maintain the confidentiality of all sensitive information shared during service provision.</p>
<h3>7. Intellectual Property</h3>
<p>All content on this website is the property of TTN and protected by applicable copyright and trademark laws.</p>
<h3>8. Third-Party Links</h3>
<p>TTN is not responsible for the content, policies, or practices of third-party websites.</p>
<h3>9. Termination</h3>
<p>We reserve the right to terminate access if you violate these Terms or engage in unlawful behavior.</p>
<h3>10. Governing Law</h3>
<p>These Terms are governed by the laws of Kenya.</p>
<h3>11. Updates to Terms</h3>
<p>Changes are effective immediately upon posting. Continued use indicates acceptance of the updated terms.</p>
<h3>12. Contact Information</h3>
<p>Trusted Touch Nursing (TTN), Nairobi. Email: info@trustedtouchnursing.co.ke</p>
HTML,
        ]);

        Page::query()->updateOrCreate(['slug' => 'cookie-policy'], [
            'title' => 'Cookie Policy',
            'effective_date' => 'December 10, 2024',
            'content' => <<<'HTML'
<p>Trusted Touch Nursing uses cookies to improve browsing, remember preferences, and understand how visitors use the website.</p>
<h3>What are cookies?</h3>
<p>Cookies are small text files stored on your device when you visit a website.</p>
<h3>How we use cookies</h3>
<ul>
<li>Essential cookies needed for the site to function.</li>
<li>Analytics cookies that help us improve pages and content.</li>
</ul>
<p>You can control cookies through your browser settings. Blocking cookies may affect some site features.</p>
<p>Questions: info@trustedtouchnursing.co.ke</p>
HTML,
        ]);
    }
}
