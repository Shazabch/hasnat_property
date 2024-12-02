<div>
    <div class="appointment-item appointment-item-two">
        <h2 class="text-center">Book your appointment</h2>
        <span class="text-center">You will be called for confirmation.</span>
        <div>
            @if ($success)
                <div class="alert alert-success text-center"> <i class="fa-regular fa-circle-check"></i> We have received your request. We will contact you soon.</div>
            @endif
        </div>
        <div class="appointment-form">
            <form wire:submit="save">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <i class="icofont-business-man-alt-1"></i>
                            <label>Name <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" wire:model="appointmentRequest.name" placeholder="Enter Your Name">
                            @error('appointmentRequest.name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <i class="icofont-ui-message"></i>
                            <label>Email <small class="text-danger">*</small></label>
                            <input type="email" class="form-control" wire:model="appointmentRequest.email" placeholder="Enter Your Email">
                            @error('appointmentRequest.email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <i class="icofont-ui-call"></i>
                            <label>Phone <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" wire:model="appointmentRequest.phone" placeholder="Enter Your Number">
                            @error('appointmentRequest.phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <i class="icofont-hospital"></i>
                            <label>Message <small class="text-danger">*</small></label>
                            <textarea name="" id="" rows="4" class="form-control" wire:model="appointmentRequest.message" placeholder="Enter Your Message"></textarea>
                            @error('appointmentRequest.message')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- <div class="col-lg-6">
                        <div class="form-group">
                            <i class="icofont-doctor"></i>
                            <label>Doctor</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>Choose Your Doctor</option>
                                <option>John Smith</option>
                                <option>Sarah Taylor</option>
                                <option>Stevn King</option>
                            </select>
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-6">
                        <div class="form-group">
                            <i class="icofont-business-man"></i>
                            <label>Age</label>
                            <input type="text" class="form-control" placeholder="Your Age">
                        </div>
                    </div> -->
                </div>
                <div class="text-center">
                    <button type="submit" class="btn appointment-btn">Submit <small wire:loading wire:target="save"><i class="fa-solid fa-spinner fa-spin"></i></small></button>
                </div>
            </form>
        </div>
    </div>
    <button type="button" class="close" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
</div>
