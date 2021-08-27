@php
    $social=DB::table('socials')->first();
    $contact=DB::table('contacts')->first();
@endphp
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 footer-contact">
                    <h3>Young Minds</h3>
                    <p>
                        {{$contact->location}}
                    </p>
                </div>

                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('home')}}">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('show.news')}}">News</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('show.notice')}}">Notice</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('show.download')}}">Download</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('show.contact')}}">Contact Us</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> Web Design</li>
                        <li><i class="bx bx-chevron-right"></i> Web Development</li>
                        <li><i class="bx bx-chevron-right"></i> Product Management</li>
                        <li><i class="bx bx-chevron-right"></i> Marketing</li>
                        <li><i class="bx bx-chevron-right"></i> Graphic Design</li>
                    </ul>
                </div>



            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="mr-md-auto text-center text-md-left">
            <div class="copyright">
                &copy; Copyright <strong><span>Company</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/company-free-html-bootstrap-template/ -->
                Designed by <a href="https://bootstrapmade.com/">Young Minds</a>
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="{{$social->twitter}}" class="twitter" target="_blank"><i class="bx bxl-twitter"></i></a>
            <a href="{{$social->facebook}}" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
            <a href="{{$social->instagram}}" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
            <a href="{{$social->skype}}" class="google-plus" target="_blank"><i class="bx bxl-skype"></i></a>
            <a href="{{$social->linkedin}}" class="linkedin" target="_blank"><i class="bx bxl-linkedin"></i></a>
        </div>
    </div>
</footer><!-- End Footer -->
