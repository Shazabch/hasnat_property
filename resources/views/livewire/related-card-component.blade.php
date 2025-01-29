<div>
    <section class="bg-dark2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title no-after pt-0 ps-0">
                        <p class="after-circle text-thin after-circle mx-auto text-white">Research and Market Insights
                        </p>
                        <h2 class="text-center text-secondary">Similar Listings</h2>
                    </div>
                </div>
            </div>
          <div class="row">
            @each('common.property-card',$properties , 'property')
          </div>
        </div>
    </section>
</div>
