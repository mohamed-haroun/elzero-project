<h2 class="text-black-50 mt-5 mb-5">Create New User</h2>

<div class="row mb-5">
    <div class="col">
        <form method="post" action="/register" class="p-5 pb-3 border border-secondary">
            <div class="row">
                <div class="mb-3 col">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text"
                           class="form-control <?php
                           if (array_key_exists('model', $args)) {
                               echo array_key_exists('first_name', $args['model']->errors) ? 'is-invalid' : " ";
                           };
                           ?>"
                           value="<?php echo $args['model']->first_name ?? ""; ?>"
                           id="first_name" name="first_name">
                    <div class="invalid-feedback">
                        <?php
                        echo $args['model']->errors['first_name'][0];
                        ?>
                    </div>
                </div>
                <div class="mb-3 col">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control <?php
                    if (array_key_exists('model', $args)) {
                        echo array_key_exists('last_name', $args['model']->errors) ? 'is-invalid' : " ";
                    };
                    ?>"
                           value="<?php echo $args['model']->last_name ?? ""; ?>"
                           id="last_name" name="last_name">
                    <div class="invalid-feedback">
                        <?php
                        echo $args['model']->errors['last_name'][0];
                        ?>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control <?php
                if (array_key_exists('model', $args)) {
                    echo array_key_exists('email', $args['model']->errors) ? 'is-invalid' : " ";
                };
                ?>"
                       value="<?php echo $args['model']->email ?? ""; ?>"
                       id="email" name="email">
                <div class="invalid-feedback">
                    <?php
                    echo $args['model']->errors['email'][0];
                    ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="user_password" class="form-label">Password</label>
                <input type="password" class="form-control <?php
                if (array_key_exists('model', $args)) {
                    echo array_key_exists('user_password', $args['model']->errors) ? 'is-invalid' : " ";
                };
                ?>"
                       value="<?php echo $args['model']->user_password ?? ""; ?>"
                       id="user_password" name="user_password">
                <div class="invalid-feedback">
                    <?php
                    echo $args['model']->errors['user_password'][0];
                    ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="passwordConfirm" class="form-label">Confirm Password</label>
                <input type="password" class="form-control <?php
                if (array_key_exists('model', $args)) {
                    echo array_key_exists('passwordConfirm', $args['model']->errors) ? 'is-invalid' : " ";
                };
                ?>"
                       value="<?php echo $args['model']->passwordConfirm ?? ""; ?>"
                       id="passwordConfirm" name="passwordConfirm">
                <div class="invalid-feedback">
                    <?php
                    echo $args['model']->errors['passwordConfirm'][0];
                    ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="birth_date" class="form-label">Birth Date</label>
                <input type="date" class="form-control <?php
                if (array_key_exists('model', $args)) {
                    echo array_key_exists('birth_date', $args['model']->errors) ? 'is-invalid' : " ";
                };
                ?>"
                       value="<?php echo $args['model']->birth_date ?? ""; ?>"
                       id="birth_date" name="birth_date">
                <div class="invalid-feedback">
                    <?php
                    echo $args['model']->errors['birth_date'][0];
                    ?>
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                <label class="form-check-label" for="male">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div>
            <div class="form-check mb-5">
                <input class="form-check-input" type="radio" name="gender" id="unspecified" value="undefined">
                <label class="form-check-label" for="unspecified">
                    Undefined
                </label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

    <div class="col">
        <h3 class="text-black-50 fw-bold text-center mt-5 mb-5 fs-1">Feel free to create a new account</h3>
        <p class="text-center text-info fs-4">you are here for a reason</p>
    </div>

</div>