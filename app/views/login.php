<h3 class="text-end text-black-50 mt-5 mb-5 me-4">Access your account</h3>
<div class="row mb-5">
    <div class="col">
        <h3 class="text-black-50 fw-bold text-center mt-5 mb-5 fs-1">Feel free to Access account</h3>
        <p class="text-center text-info fs-4">you are here for a reason</p>
    </div>
    <div class="col">
        <form method="post" action="/login" class="p-5 border border-secondary">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control"
                       id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="user_password" class="form-label">Password</label>
                <input type="password" class="form-control"
                       id="user_password" name="user_password">
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

</div>