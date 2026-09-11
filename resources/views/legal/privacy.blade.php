@extends('layouts.app')

@section('content')
<x-page-hero title="Privacy Policy" :breadcrumb="[
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Privacy Policy', 'url' => route('privacy-policy')],
]">
    Last updated: {{ date('F j, Y') }}
</x-page-hero>

<section class="section-padding bg-ink-50">
    <div class="container-site">
        <div class="legal-content mx-auto max-w-3xl">
            <p>This Privacy Policy describes how {{ config('company.name') }} ("we," "us," or "our") collects, uses, and protects your personal information when you visit our website or use our mobile tyre services.</p>

            <h2>Information We Collect</h2>
            <p>We may collect the following types of information:</p>
            <ul>
                <li><strong>Contact Information:</strong> Name, phone number, email address and location details when you call us, submit our contact form or request mobile tyre assistance.</li>
                <li><strong>Service Details:</strong> Vehicle and tyre information you provide so we can attend and complete a job safely.</li>
                <li><strong>Usage Data:</strong> Information about how you interact with our website, such as IP address, browser type and pages visited.</li>
            </ul>

            <h2>How We Use Your Information</h2>
            <p>We use collected information to:</p>
            <ul>
                <li>Respond to enquiries and provide mobile tyre services</li>
                <li>Confirm location, pricing and appointment details</li>
                <li>Improve our website and service quality</li>
                <li>Comply with legal obligations</li>
            </ul>

            <h2>Data Sharing</h2>
            <p>We do not sell your personal information. We may share data with trusted service providers who help us operate our website or deliver services, subject to appropriate safeguards. We may also disclose information when required by law.</p>

            <h2>Data Security</h2>
            <p>We take reasonable technical and organisational measures to protect your personal information against unauthorised access, alteration, disclosure or destruction.</p>

            <h2>Your Rights</h2>
            <p>Depending on applicable UK data protection law, you may have the right to access, correct, delete or restrict processing of your personal data. Contact us using the details below to exercise these rights.</p>

            <h2>Cookies</h2>
            <p>Our website may use cookies and similar technologies to improve browsing and understand site usage. You can control cookies through your browser settings.</p>

            <h2>Changes to This Policy</h2>
            <p>We may update this Privacy Policy from time to time. Changes will be posted on this page with an updated revision date.</p>

            <h2>Contact Us</h2>
            <p>If you have questions about this Privacy Policy, please contact us:</p>
            <ul>
                <li>Phone: <a href="tel:+{{ config('company.phone_link') }}">{{ config('company.phone') }}</a></li>
                @if(config('company.email'))
                <li>Email: <a href="mailto:{{ config('company.email') }}">{{ config('company.email') }}</a></li>
                @endif
                <li>Service: {{ config('company.address') }}</li>
            </ul>
        </div>
    </div>
</section>
@endsection
