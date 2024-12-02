<div>
    <form wire:submit="save">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-lg-12">
                <div class="form-group">
                    <input type="text" wire:model="enquiry.name" class="form-control" required data-error="Please enter your name" placeholder="Name">
                    @error('enquiry.name')
                        <div class="help-block with-errors">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6 col-lg-6">
                <div class="form-group">
                    <input type="email" wire:model="enquiry.email" class="form-control" required data-error="Please enter your email" placeholder="Email">
                    @error('enquiry.email')
                        <div class="help-block with-errors">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6 col-lg-6">
                <div class="form-group">
                    <input type="text" wire:model="enquiry.phone" class="form-control" required data-error="Please enter your number" placeholder="Phone">
                    @error('enquiry.phone')
                        <div class="help-block with-errors">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 col-lg-12">
                <div class="form-group">
                    <textarea wire:model="enquiry.message" class="form-control" cols="30" rows="5" required data-error="Write your message" placeholder="Your Message"></textarea>
                    @error('enquiry.message')
                        <div class="help-block with-errors">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-lg-12 col-md-12">
                <div class="form-group">
                    <div class="form-check agree-label">
                        <input
                            name="gridCheck"
                            value="I agree to the terms and privacy policy."
                            class="form-check-input"
                            type="checkbox"
                            required
                        >
                
                        <label class="form-check-label" for="gridCheck">
                            Accept <a target="_blank" href="{{ route('terms-and-conditions') }}" class="text-dark">Terms & Conditions</a> And <a target="_blank" href="{{ route('privacy-policy') }}">Privacy Policy.</a>
                        </label>
                        <div class="help-block with-errors gridCheck-error"></div>
                    </div>
                </div>
            </div>
            <div>
                {{-- print all errors here --}}
                @foreach ($errors->all() as $error)
                    <div class="help-block with-errors">{{ $error }}</div>
                @endforeach
            </div>
            @if ($success)
                <div class="alert alert-success text-center"><i class="fa-solid fa-check"></i> We have received your message successfully. We will get back to you soon.</div>
            @endif
            <div class="col-md-12 col-lg-12">
                <button type="submit" class="button smaller">
                    Send <small wire:loading wire:target="save"><i class="fa-solid fa-spinner fa-spin"></i></small>
                </button>
                
                <div class="clearfix"></div>
            </div>
        </div>
    </form>
</div>
