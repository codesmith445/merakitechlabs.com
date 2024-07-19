<div>
    <!-- Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="contactModalLabel">Contact Us</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="submitForm">
          <div class="mb-3">
            <label for="name" class="form-label" style="color: black;">Your Name</label>
            <input type="text" wire:model="name" class="form-control" id="name" style="color: black;" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label" style="color: black;">Your Email</label>
            <input type="email" wire:model="email" class="form-control" id="email" style="color: black;" required>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label" style="color: black;">Message</label>
            <textarea class="form-control" wire:model="message" id="message" rows="5" style="color: black;" required></textarea>
          </div>
          <button type="submit" class="btn btn-default contact-btn">Send Message</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Success Modal -->

<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="contactModalLabel">Message Sent</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Your message has been sent successfully.
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Success Modal -->
</div>
