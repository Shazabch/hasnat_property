@extends('layouts.master')

@section('meta_title', $pageData->meta_title ?? "Privacy Policy")
@section('meta_description', $pageData->meta_description ?? "")

@section('content')
@if ($pageData && $pageData->schema)
    @include('website.common.scheme', ['schema' => $pageData->schema])
@endif
<section class="inner-banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title no-after pt-0 ps-0">
                    <p class="after-circle text-white text-thin after-circle mx-auto">Privacy Policy</p>
                    <h2 class="text-center text-secondary">Privacy Policy</h2>
                    <div class="page-title-item mt-0 mx-auto">
                        <ul class="text-center">
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>
                                <i class="icofont-simple-right"></i>
                            </li>
                            <li>Privacy Policy</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shape-bg">
        <img class="shape" src="{{ asset('front/assets/img/banners/hero-bg.webp') }}">
    </div>
</section>
<section>
    <div class="container my-5">
        <div class="card bg-white border-0">
            <div class="card-body p-0">
                <h1 class="card-title text-center mb-4">Privacy Policy</h1>
                <p>
                   We are committed to protecting and respecting your privacy.
                    This Privacy Policy explains how we collect, use, and store your personal information when you interact with us, whether through
                    our website, in person, or through any other communication channels.
                </p>

                <h4 class="mt-4">1. Information We Collect</h4>
                <p>We may collect and process the following data about you:</p>
                <ul>
                    <li><strong>Personal Identification Information:</strong> This includes your name, date of birth, address, phone number, and email address.</li>
                    <li><strong>Medical Information:</strong> Details related to your medical history, treatments, test results, imaging reports, and other health-related information necessary for your care.</li>
                    <li><strong>Payment Information:</strong> Credit or debit card details, billing information, and transaction data.</li>
                    <li><strong>Website Usage Data:</strong> Information collected when you visit our website, such as IP address, browser type, and pages viewed, for the purpose of improving the site experience.</li>
                </ul>

                <h4 class="mt-4">2. How We Use Your Information</h4>
                <p>We use the information we collect to:</p>
                <ul>
                    <li>Provide you with medical care and treatment.</li>
                    <li>Communicate with you regarding appointments, follow-ups, or any changes in your care.</li>
                    <li>Comply with legal and regulatory requirements.</li>
                    <li>Improve our services and your experience.</li>
                    <li>Process payments and issue invoices.</li>
                </ul>

                <h4 class="mt-4">3. Sharing Your Information</h4>
                <p>We do not sell, rent, or trade your personal information. However, in the course of providing medical care, we may share your data with:</p>
                <ul>
                    <li><strong>Healthcare Providers:</strong> Other medical professionals involved in your care, such as radiologists or physiotherapists.</li>
                    <li><strong>Third-Party Service Providers:</strong> Providers who help us with administrative services, like appointment scheduling and payment processing.</li>
                    <li><strong>Regulatory Bodies:</strong> If required by law or to comply with legal obligations.</li>
                </ul>

                <h4 class="mt-4">4. Data Security</h4>
                <p>
                    We take the security of your personal information seriously. All data is stored securely, and we use the latest technologies and procedures
                    to protect your information from unauthorized access, loss, or misuse. Access to personal and medical data is restricted to those who require it to perform their duties.
                </p>

                <h4 class="mt-4">5. Your Rights</h4>
                <p>You have the right to:</p>
                <ul>
                    <li>Access the personal information we hold about you.</li>
                    <li>Request correction of any inaccurate or incomplete data.</li>
                    <li>Request deletion of your data, where appropriate.</li>
                    <li>Object to the processing of your data in certain circumstances.</li>
                    <li>Request the transfer of your data to another healthcare provider.</li>
                </ul>

                <h4 class="mt-4">6. Retention of Your Data</h4>
                <p>
                    We retain your personal and medical information for as long as necessary to provide you with care and comply with legal obligations.
                    Once your data is no longer needed, it will be securely destroyed.
                </p>

                <h4 class="mt-4">7. Cookies and Website Analytics</h4>
                <p>
                    Our website uses cookies to enhance your browsing experience and to analyze how visitors use the site. Cookies are small text files that are placed
                    on your device to collect standard internet log information and visitor behavior information. You can manage your cookie preferences through your browser settings.
                </p>

                <h4 class="mt-4">8. Changes to Our Privacy Policy</h4>
                <p>
                    We may update this Privacy Policy from time to time. Any changes will be posted on our website, and where appropriate, we will notify you by email.
                </p>

                <h4 class="mt-4">9. Contact Us</h4>
                <p>If you have any questions or concerns about how we handle your personal information or if you wish to exercise any of your rights, please contact us at:</p>
                <ul class="list-unstyled">
                    <li><strong>Mr.Hasnat Properties – Spinal Neurosurgeon</strong></li>
                    <li>London, United Kingdom</li>
                    <li>Email: <a href="mailto:info@mspine.uk">info@mspine.uk</a></li>
                    <li>Phone: <a href="tel:+442070348978">+(44) 20 7034 8978</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- End Map -->
@endsection