<section class="qualifications py-70 technology">
    <div class="container qualification-section">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title no-after pt-0 ps-0 text-center">
                    <p class="after-circle text-thin after-circle mx-auto text-white">Certified and Skilled</p>
                    <h2 class="text-center text-secondary">Technologies and Method</h2>
                    <p class="text-white">Technology during surgery encompasses various tools, systems, and innovations that enhance the precision, safety, and effectiveness of surgical procedures.
                        Here are some technologies and methods that MSPine may use during surgeries and procedures:
                        </p>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            @foreach ($tech_and_methods as $tech)
                @include('website.expertise.tech-card', ['tech' => $tech, 'tech_no' => $loop->iteration])
            @endforeach
        </div>
        <img src="{{ asset('front/assets/img/home-one/5.png') }}" class="bg-overlay" alt="About">
    </div>
</section>