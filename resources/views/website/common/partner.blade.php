<!-- PARTNER -->
<section class="section-partner bg-light-gray pt-70">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-7">
                <div class="section-title no-after pt-0 ps-0">
                    <p class="after-circle text-thin after-circle text-primary">Recognized and Connected</p>
                    <h2 class="">Accridation and Affiliations</h2>
                    <p class="text-primary">Showcasing our professional accreditations and affiliations with leading organizations. These endorsements highlight our commitment to excellence and industry standards.</p>
                </div>
            </div>
            @php
            $partners = [
                [
                    'image' => 'front/assets/partners/nass-logo-tag.svg',
                    'alt' => 'NASS Logo',
                ],
                [
                    'image' => 'front/assets/partners/sbns.png',
                    'alt' => 'SBNS Logo',
                ],
                [
                    'image' => 'front/assets/partners/BASS Logo.jpg',
                    'alt' => 'BASS Logo',
                ],
                [
                    'image' => 'front/assets/partners/ISMISS_Logo.svg',
                    'alt' => 'SMISS Logo',
                ],
                [
                    'image' => 'front/assets/partners/euro_spine.svg',
                    'alt' => 'Euro Spine Logo',
                ],
                [
                    'image' => 'front/assets/partners/british_orthopedic.png',
                    'alt' => 'British Orthopedic Associations Logo',
                ],
            ];
            @endphp
            <div class="partner-logos partner_slider owl-carousel owl-theme">
                @foreach ($partners as $partner)
                <div class="partner-item">
                    <img src="{{ asset($partner['image']) }}" alt="{{ $partner['alt'] }}">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>