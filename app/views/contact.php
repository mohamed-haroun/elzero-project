<div class="form-div">
    <form method="post" action="/send_message">
        <div class="mb-3">
            <label for="senderName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="senderName" name="senderName" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="senderEmail" name="senderEmail" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea id="messageBody" name="messageBody" class="form-control"></textarea>
        </div>
        <button type="submit" value="submit" name="submit" class="btn btn-success w-100 pt-3 pb-3 fw-bold">Send Message
            <i class="fa-solid fa-paper-plane"></i></button>
    </form>
</div>
<div class="text-div">
    <h2 class="section-title fw-bold">Contact Us</h2>
    <p class="text-black-50 fs-6">Feel free to tell us what you want...</p>
</div>