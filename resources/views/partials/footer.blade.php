
        <!-- Footer -->
        <footer class="pb-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-lg-4">
                        <div class="footer-item">
                            <div class="footer-contact">
                                <h3>Contact Us</h3>
                                <ul>
                                    <li>
                                        <i class="icofont-ui-message"></i>
                                        <a href="mailto:{{ $email1 }}">{{ $email1 }}</a>
                                        @if ($email2 != '')
                                            <a href="mailto:{{ $email2 }}">{{ $email2 }}</a>
                                        @endif
                                    </li>
                                    <li>
                                        <i class="icofont-stock-mobile"></i>
                                        <a href="tel:{{ $phone1['value'] }}">Call: {{ $phone1['label'] }}</a>
                                        @if ($phone2['value'] != '' && $phone2['label'] != '')
                                            <a href="tel:{{ $phone2['value'] }}">Call: {{ $phone2['label'] }}</a>
                                        @else
                                        <br>
                                        @endif
                                    </li>
                                    <li>
                                        <i class="icofont-location-pin"></i>
                                        <a href="https://maps.app.goo.gl/VawBGXtFt1pyJzSs7" target="_blank">
                                            {{ $address_line_1 }} {{ $address_line_2 }}<br> {{ $address_line_3 }}
                                        </a>
                                    </li>

                                </ul>
                                <h3 class="mt-5">Social Links</h3>
                                <div class="shareArticle">
                                    <div class="shareSocial">
                                        <ul class="socialList">
                                            <li>
                                                <a target="_blank" href="https://www.facebook.com/hasnatproperties">
                                                    <i class="fa-brands fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a target="_blank" href="https://www.youtube.com/@HasnatProperties">
                                                    <i class="fa-brands fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a target="_blank" href="https://www.instagram.com/hasnatproperties">
                                                    <i class="fa-brands fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="footer-item">
                            <div class="footer-quick">
                                <h3>Quick Links</h3>
                                <ul>
                                    <li>
                                        <a href="{{ route('about-us') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('about-us') }}">About us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('properties') }}">Properties</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('publications') }}">Blogs</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact-us') }}">Contact us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3406.5542122020306!2d74.18644227598911!3d31.37127865749347!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469e246f562b4583%3A0xbaf80296bfe30046!2sHasnat%20Properties!5e0!3m2!1sen!2s!4v1745491159896!5m2!1sen!2s" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Copyright -->
        <div class="copyright-area">
            <div class="container">
                <div class="copyright-item">
                    <p>Copyright © {{ date('Y') }} All rights reserved
                        <span class="text-secondary">Hasnat Properties</span>  <br>
                        Developed by <span class="text-warning"><a style="text-decoration: none" class="text-secondary" href="https://majesticsofts.com/">Majestic Softs</a></span>
                    </p>
                </div>
            </div>
        </div>
