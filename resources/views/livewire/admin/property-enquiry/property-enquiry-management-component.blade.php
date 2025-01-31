
    <div class="sidebar-card">
        <div class="sidebar-card-title">
            <h5>Request Info</h5>
        </div>
        <form wire:submit.prevent="saveEnquiry">

            <div class="review-form">
                <input type="text" class="form-control input-field" wire:model="enquiry.name" placeholder="Your Name">
            </div>
            <div class="review-form">
                <input type="email" class="form-control input-field" wire:model="enquiry.email" placeholder="Your Email">
            </div>
            <div class="review-form">
                <input type="text" class="form-control input-field" wire:model="enquiry.phone" placeholder="Your Phone Number">
            </div>
            <div class="review-form">
                <textarea rows="5" class="input-field" wire:model="enquiry.message" placeholder="Yes, I'm Interested"></textarea>
            </div>
            <div class="review-form submit-btn">
                <button type="submit" class="btn-primary">Send Email</button>
            </div>
        </form>
        <div class="connect-us row g-2">
            <div class="col-md-6">
                <a href="tel:{{ $phone1['label'] }}" class="phone-link text-decoration-none">
                    <span class="phone-number fs-6 fw-semibold text-warning">Call us</span>
                </a>
            </div>
            <div class="col-md-6">
                <a href="javascript:void(0);">
                    <i class="fa-brands fa-whatsapp"></i>
                    Whatsapp
                </a>
            </div>
        </div>
        <style>
            .review-form input,
            .review-form textarea {
                color: white; /* Default color */
                transition: color 0.3s ease-in-out;
            }

            /* Jab input field par focus ho */
            .review-form input:focus,
            .review-form textarea:focus {
                color: blue !important; /* Blue color jab input active ho */
            }
        </style>


<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('success-box', message => {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: message,
                timer: 3000,
                showConfirmButton: false
            });
        });
    });
</script>
    </div>


