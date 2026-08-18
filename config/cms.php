<?php

use App\Models\ConsultantSkill;
use App\Models\CoreValue;
use App\Models\Feature;
use App\Models\Page;
use App\Models\RelatedService;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;

return [
    'setting_groups' => [
        'general' => [
            'title' => 'General & branding',
            'fields' => [
                ['key' => 'site_name', 'label' => 'Site name', 'type' => 'text'],
                ['key' => 'site_tagline', 'label' => 'Tagline', 'type' => 'text'],
                ['key' => 'logo', 'label' => 'Logo', 'type' => 'image'],
                ['key' => 'favicon', 'label' => 'Favicon', 'type' => 'image'],
                ['key' => 'header_availability', 'label' => 'Header availability text', 'type' => 'text'],
                ['key' => 'cta_label', 'label' => 'Header / banner button label', 'type' => 'text'],
            ],
        ],
        'contact' => [
            'title' => 'Contact details',
            'fields' => [
                ['key' => 'contact_email', 'label' => 'Public email', 'type' => 'text'],
                ['key' => 'phone_primary', 'label' => 'Primary phone', 'type' => 'text'],
                ['key' => 'phone_secondary', 'label' => 'Secondary phone', 'type' => 'text'],
                ['key' => 'whatsapp_number', 'label' => 'WhatsApp number', 'type' => 'text'],
                ['key' => 'whatsapp_title', 'label' => 'WhatsApp popup title', 'type' => 'text'],
                ['key' => 'whatsapp_popup', 'label' => 'WhatsApp popup message', 'type' => 'text'],
                ['key' => 'whatsapp_prefill', 'label' => 'WhatsApp prefilled message', 'type' => 'textarea'],
                ['key' => 'location', 'label' => 'Location', 'type' => 'text'],
            ],
        ],
        'social' => [
            'title' => 'Social links',
            'fields' => [
                ['key' => 'social_facebook', 'label' => 'Facebook URL', 'type' => 'text'],
                ['key' => 'social_twitter', 'label' => 'Twitter / X URL', 'type' => 'text'],
                ['key' => 'social_linkedin', 'label' => 'LinkedIn URL', 'type' => 'text'],
                ['key' => 'social_instagram', 'label' => 'Instagram URL', 'type' => 'text'],
            ],
        ],
        'seo' => [
            'title' => 'SEO & metadata',
            'fields' => [
                ['key' => 'seo_title', 'label' => 'Meta title', 'type' => 'text'],
                ['key' => 'seo_description', 'label' => 'Meta description', 'type' => 'textarea'],
                ['key' => 'seo_keywords', 'label' => 'Keywords', 'type' => 'textarea'],
                ['key' => 'seo_canonical', 'label' => 'Canonical URL', 'type' => 'text'],
                ['key' => 'og_image', 'label' => 'Social share image', 'type' => 'image'],
                ['key' => 'schema_type', 'label' => 'Schema.org type', 'type' => 'text'],
            ],
        ],
        'hero' => [
            'title' => 'Homepage hero',
            'fields' => [
                ['key' => 'hero_title_accent', 'label' => 'Title accent (first line)', 'type' => 'text'],
                ['key' => 'hero_title', 'label' => 'Title (second line)', 'type' => 'text'],
                ['key' => 'hero_subtitle', 'label' => 'Subtitle', 'type' => 'text'],
                ['key' => 'hero_body', 'label' => 'Intro paragraph', 'type' => 'textarea'],
                ['key' => 'hero_cta_label', 'label' => 'Explore button label', 'type' => 'text'],
            ],
        ],
        'about' => [
            'title' => 'Company overview',
            'fields' => [
                ['key' => 'about_title', 'label' => 'Section title', 'type' => 'text'],
                ['key' => 'about_body', 'label' => 'Overview text', 'type' => 'textarea'],
                ['key' => 'about_image', 'label' => 'Overview image', 'type' => 'image'],
                ['key' => 'about_cta_label', 'label' => 'Button label', 'type' => 'text'],
            ],
        ],
        'vision' => [
            'title' => 'Vision & mission',
            'fields' => [
                ['key' => 'vision_label', 'label' => 'Vision label', 'type' => 'text'],
                ['key' => 'vision_text', 'label' => 'Vision text', 'type' => 'textarea'],
                ['key' => 'mission_label', 'label' => 'Mission label', 'type' => 'text'],
                ['key' => 'mission_text', 'label' => 'Mission text', 'type' => 'textarea'],
            ],
        ],
        'values' => [
            'title' => 'Core values section',
            'fields' => [
                ['key' => 'values_title', 'label' => 'Section title', 'type' => 'text'],
                ['key' => 'values_image', 'label' => 'Section image', 'type' => 'image'],
            ],
        ],
        'why' => [
            'title' => 'Why choose us',
            'fields' => [
                ['key' => 'why_cards_title', 'label' => 'Cards section title', 'type' => 'text'],
                ['key' => 'why_banner_label', 'label' => 'Banner eyebrow', 'type' => 'text'],
                ['key' => 'why_banner_body', 'label' => 'Banner body', 'type' => 'textarea'],
                ['key' => 'why_banner_cta', 'label' => 'Banner button', 'type' => 'text'],
            ],
        ],
        'services' => [
            'title' => 'Services intro',
            'fields' => [
                ['key' => 'services_eyebrow', 'label' => 'Eyebrow', 'type' => 'text'],
                ['key' => 'services_title', 'label' => 'Section title', 'type' => 'text'],
                ['key' => 'services_cta', 'label' => 'Button label', 'type' => 'text'],
                ['key' => 'related_title', 'label' => 'Related services heading', 'type' => 'text'],
            ],
        ],
        'team' => [
            'title' => 'Team & consultants',
            'fields' => [
                ['key' => 'team_eyebrow', 'label' => 'Team eyebrow', 'type' => 'text'],
                ['key' => 'team_title', 'label' => 'Team title', 'type' => 'text'],
                ['key' => 'team_body', 'label' => 'Team introduction', 'type' => 'textarea'],
                ['key' => 'consultants_title', 'label' => 'Consultants title', 'type' => 'text'],
                ['key' => 'consultants_intro', 'label' => 'Consultants intro', 'type' => 'textarea'],
                ['key' => 'consultants_image', 'label' => 'Consultants image', 'type' => 'image'],
                ['key' => 'consultants_cta', 'label' => 'Consultants button', 'type' => 'text'],
            ],
        ],
        'testimonials' => [
            'title' => 'Testimonials heading',
            'fields' => [
                ['key' => 'testimonials_title', 'label' => 'Section title', 'type' => 'text'],
            ],
        ],
        'contact_form' => [
            'title' => 'Contact form copy',
            'fields' => [
                ['key' => 'contact_name_label', 'label' => 'Name label', 'type' => 'text'],
                ['key' => 'contact_email_label', 'label' => 'Email label', 'type' => 'text'],
                ['key' => 'contact_message_label', 'label' => 'Message label', 'type' => 'text'],
                ['key' => 'contact_submit_label', 'label' => 'Submit button', 'type' => 'text'],
                ['key' => 'contact_human_label', 'label' => 'Human check label prefix', 'type' => 'text'],
            ],
        ],
        'mail' => [
            'title' => 'Inquiry email delivery',
            'fields' => [
                ['key' => 'mail_to', 'label' => 'Send inquiries to', 'type' => 'text'],
                ['key' => 'mail_to_name', 'label' => 'Recipient name', 'type' => 'text'],
                ['key' => 'mail_bcc', 'label' => 'BCC address', 'type' => 'text'],
                ['key' => 'mail_from', 'label' => 'From address', 'type' => 'text'],
                ['key' => 'mail_from_name', 'label' => 'From name', 'type' => 'text'],
                ['key' => 'mail_subject', 'label' => 'Email subject', 'type' => 'text'],
            ],
        ],
        'footer' => [
            'title' => 'Footer',
            'fields' => [
                ['key' => 'footer_subscribe_title', 'label' => 'Subscribe heading', 'type' => 'text'],
                ['key' => 'footer_inquiry_label', 'label' => 'Phone block label', 'type' => 'text'],
                ['key' => 'footer_mail_label', 'label' => 'Email block label', 'type' => 'text'],
                ['key' => 'footer_about_title', 'label' => 'About column title', 'type' => 'text'],
                ['key' => 'footer_related_title', 'label' => 'Related column title', 'type' => 'text'],
                ['key' => 'footer_legal_title', 'label' => 'Legal column title', 'type' => 'text'],
                ['key' => 'copyright_name', 'label' => 'Copyright company name', 'type' => 'text'],
            ],
        ],
    ],

    'resources' => [
        'core-values' => [
            'model' => CoreValue::class,
            'title' => 'Core values',
            'singular' => 'core value',
            'order' => 'sort_order',
            'columns' => ['title', 'description'],
            'fields' => [
                ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
                ['name' => 'description', 'label' => 'Description', 'type' => 'textarea'],
                ['name' => 'sort_order', 'label' => 'Sort order', 'type' => 'number'],
                ['name' => 'is_visible', 'label' => 'Visible on site', 'type' => 'checkbox'],
            ],
        ],
        'features' => [
            'model' => Feature::class,
            'title' => 'Why choose us cards',
            'singular' => 'feature',
            'order' => 'sort_order',
            'columns' => ['title', 'description'],
            'fields' => [
                ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
                ['name' => 'description', 'label' => 'Description', 'type' => 'textarea'],
                ['name' => 'sort_order', 'label' => 'Sort order', 'type' => 'number'],
                ['name' => 'is_visible', 'label' => 'Visible on site', 'type' => 'checkbox'],
            ],
        ],
        'services' => [
            'model' => Service::class,
            'title' => 'Service cards',
            'singular' => 'service',
            'order' => 'sort_order',
            'columns' => ['title', 'anchor'],
            'fields' => [
                ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
                ['name' => 'anchor', 'label' => 'Page anchor (e.g. postnatal-care)', 'type' => 'text'],
                ['name' => 'card_style', 'label' => 'Card class (two / three / blank)', 'type' => 'text'],
                ['name' => 'link_label', 'label' => 'Card link label', 'type' => 'text'],
                ['name' => 'items', 'label' => 'Bullet items (one per line)', 'type' => 'textarea'],
                ['name' => 'sort_order', 'label' => 'Sort order', 'type' => 'number'],
                ['name' => 'is_visible', 'label' => 'Visible on site', 'type' => 'checkbox'],
            ],
        ],
        'related-services' => [
            'model' => RelatedService::class,
            'title' => 'Related services',
            'singular' => 'related service',
            'order' => 'sort_order',
            'columns' => ['title', 'url'],
            'fields' => [
                ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
                ['name' => 'url', 'label' => 'Link URL', 'type' => 'text'],
                ['name' => 'sort_order', 'label' => 'Sort order', 'type' => 'number'],
                ['name' => 'is_visible', 'label' => 'Visible on site', 'type' => 'checkbox'],
            ],
        ],
        'team-members' => [
            'model' => TeamMember::class,
            'title' => 'Leadership team',
            'singular' => 'team member',
            'order' => 'sort_order',
            'columns' => ['name', 'role'],
            'fields' => [
                ['name' => 'name', 'label' => 'Name', 'type' => 'text', 'required' => true],
                ['name' => 'role', 'label' => 'Role', 'type' => 'text'],
                ['name' => 'photo', 'label' => 'Photo', 'type' => 'image'],
                ['name' => 'bio', 'label' => 'Biography', 'type' => 'textarea'],
                ['name' => 'linkedin', 'label' => 'LinkedIn URL', 'type' => 'text'],
                ['name' => 'twitter', 'label' => 'Twitter URL', 'type' => 'text'],
                ['name' => 'sort_order', 'label' => 'Sort order', 'type' => 'number'],
                ['name' => 'is_visible', 'label' => 'Visible on site', 'type' => 'checkbox'],
            ],
        ],
        'consultant-skills' => [
            'model' => ConsultantSkill::class,
            'title' => 'Consultant skills',
            'singular' => 'skill',
            'order' => 'sort_order',
            'columns' => ['title', 'description'],
            'fields' => [
                ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
                ['name' => 'description', 'label' => 'Description', 'type' => 'textarea'],
                ['name' => 'sort_order', 'label' => 'Sort order', 'type' => 'number'],
                ['name' => 'is_visible', 'label' => 'Visible on site', 'type' => 'checkbox'],
            ],
        ],
        'testimonials' => [
            'model' => Testimonial::class,
            'title' => 'Testimonials',
            'singular' => 'testimonial',
            'order' => 'sort_order',
            'columns' => ['author', 'headline'],
            'fields' => [
                ['name' => 'author', 'label' => 'Author', 'type' => 'text', 'required' => true],
                ['name' => 'role', 'label' => 'Role / label', 'type' => 'text'],
                ['name' => 'headline', 'label' => 'Headline', 'type' => 'text'],
                ['name' => 'quote', 'label' => 'Quote', 'type' => 'textarea', 'required' => true],
                ['name' => 'sort_order', 'label' => 'Sort order', 'type' => 'number'],
                ['name' => 'is_visible', 'label' => 'Visible on site', 'type' => 'checkbox'],
            ],
        ],
        'pages' => [
            'model' => Page::class,
            'title' => 'Legal pages',
            'singular' => 'page',
            'order' => 'title',
            'columns' => ['title', 'slug'],
            'fields' => [
                ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
                ['name' => 'slug', 'label' => 'Slug (privacy-policy, terms-and-conditions, cookie-policy)', 'type' => 'text', 'required' => true],
                ['name' => 'effective_date', 'label' => 'Effective date label', 'type' => 'text'],
                ['name' => 'content', 'label' => 'HTML content', 'type' => 'html'],
            ],
        ],
    ],
];
