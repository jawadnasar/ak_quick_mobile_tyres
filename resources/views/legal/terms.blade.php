@extends('layouts.app')

@section('content')
<x-page-hero title="Terms & Conditions" :breadcrumb="[
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Terms & Conditions', 'url' => route('terms')],
]">
    Last updated: {{ date('F j, Y') }}
</x-page-hero>

<section class="section-padding bg-ink-50">
    <div class="container-site">
        <div class="legal-content mx-auto max-w-3xl">
            <p>These Terms and Conditions ("Terms") govern your use of the {{ config('company.name') }} website and mobile tyre services. By accessing our website or engaging our services, you agree to these Terms.</p>

            <h2>Services</h2>
            <p>{{ config('company.name') }} provides mobile tyre fitting, puncture repairs, emergency callouts and related roadside assistance. Specific work, pricing and attendance details are confirmed when you book or call us.</p>

            <h2>Use of Website</h2>
            <p>You agree to use our website only for lawful purposes. You may not:</p>
            <ul>
                <li>Attempt to gain unauthorised access to our systems or data</li>
                <li>Transmit malicious code or interfere with website functionality</li>
                <li>Copy, reproduce or distribute our content without permission</li>
                <li>Use our website in any way that could harm {{ config('company.name') }} or third parties</li>
            </ul>

            <h2>Bookings and Attendance</h2>
            <p>Arrival times are estimates and may vary with traffic, weather, location and demand. Pricing quoted before attendance is based on the information you provide; final charges may change if the job differs from what was described (for example tyre size, vehicle type or additional work required).</p>

            <h2>Intellectual Property</h2>
            <p>All content on this website, including text, graphics and logos, is the property of {{ config('company.name') }} or its licensors and is protected by intellectual property laws.</p>

            <h2>Payment</h2>
            <p>Payment methods and timing are confirmed at the time of booking or on completion of the job, unless otherwise agreed.</p>

            <h2>Limitation of Liability</h2>
            <p>To the maximum extent permitted by law, {{ config('company.name') }} shall not be liable for indirect, incidental, special or consequential damages arising from the use of our website or services. Nothing in these Terms excludes or limits liability for death or personal injury caused by negligence, fraud, or any other liability that cannot be limited under UK law.</p>

            <h2>Governing Law</h2>
            <p>These Terms are governed by the laws of England and Wales. Any disputes shall be subject to the exclusive jurisdiction of the courts of England and Wales.</p>

            <h2>Changes to Terms</h2>
            <p>We may modify these Terms at any time. Continued use of our website after changes constitutes acceptance of the updated Terms.</p>

            <h2>Contact</h2>
            <p>For questions about these Terms, call <a href="tel:+{{ config('company.phone_link') }}">{{ config('company.phone') }}</a>
            @if(config('company.email'))
            or email <a href="mailto:{{ config('company.email') }}">{{ config('company.email') }}</a>
            @endif
            .</p>
        </div>
    </div>
</section>
@endsection
