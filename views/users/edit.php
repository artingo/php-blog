<?php $isExistingUser = !empty($user->name);
?>
<div class="content-wrapper px-4 py-2">
    <div class="content-header">
        <h1 class="m-0"><?= $title ?></h1>
    </div>

    <div class="content px-2">
        <div class="col-md-6">

            <div class="card card-indigo card-outline">
                <form method="post" action="/users/save" id="userForm">
                    <input type="hidden" name="isExistingUser" value="<?= $isExistingUser ?>"><br/>
                    <input type="hidden" name="id" value="<?= $user->id ?>">

                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <img class="profile-user-img img-fluid img-circle" width="128"
                                     src="<?= $user->avatarUrl ?>" alt="User profile picture"><br/>
                            </div>
                            <div class="col-sm-10">
                                <label for="avatarUrl">Avatar URL</label>
                                <input type="text" class="form-control" name="avatarUrl" id="avatarUrl"
                                       value="<?= $user->avatarUrl ?>" placeholder="Paste your avatar URL here...">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="offset-md-2 col-sm-10">
                                <label for="name">Username</label>
                                <input type="text" class="form-control" name="name" id="name" autocomplete="off"
                                       required value="<?= $user->name ?>" placeholder="Enter your username here ...">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="offset-md-2 col-sm-10">
                                <label for="email">E-Mail address</label>
                                <input type="email" class="form-control" name="email" id="email" autocomplete="off"
                                       required value="<?= $user->email ?>"
                                       placeholder="Enter your email address here ...">
                            </div>
                        </div>

                        <?php if ($isExistingUser): ?>
                          <div class="form-group">
                              <div class="offset-md-2 col-sm-10">
                                  <label for="password">Password</label>
                                  <div class="input-group">
                                      <input type="password" class="form-control" name="password" id="password"
                                             autocomplete="off" required value="<?= $user->getPassword() ?>"
                                             placeholder="Enter your password here ...">
                                      <button type="button" class="btn input-group-text"
                                              onclick="togglePassword(nextSibling)">
                                            <i class="fa fa-fw fa-eye field_icon"></i>
                                        </button>
                                  </div>
                              </div>
                          </div>

                        <?php else: ?>
                          <div class="form-group">
                              <div class="offset-md-2 col-sm-10">
                                  <label for="password">Password</label>
                                  <input type="text" class="form-control" name="password" id="password"
                                         autocomplete="off" required value="<?= $user->password ?>"
                                         placeholder="Enter your password here ...">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="offset-md-2 col-sm-10">
                                  <label for="password2">Re-type password</label>
                                  <input type="text" class="form-control" name="password2" id="password2"
                                         autocomplete="off" required
                                         placeholder="Re-type your password here ...">
                              </div>
                          </div>
                        <?php endif; ?>
                    </div>

                    <div class="card-footer">
                        <div class="float-right">
                            <button type="submit" class="btn bg-gradient-indigo">
                                <i class="fas fa-floppy-disk"></i> Save
                            </button>
                        </div>
                        <a class="btn btn-default" href="/users">
                            <i class="fas fa-xmark"></i> Cancel
                        </a>
                    </div>
                </form>

                <script src="/js/jquery.validate.min.js" defer></script>
                <script>
                    function togglePassword(icon) {
                        $(icon).toggleClass('fa-eye fa-eye-slash')
                        const pwdField = $('#password')
                        const newType = (pwdField.attr('type') === 'password') ? 'text' : 'password'
                        pwdField.attr("type", newType)
                    }

                    function initForm() {
                        $.validator.setDefaults({ignore: ''})

                        $('#userForm').validate({
                            rules: {
                                name: {required: true, minlength: 4},
                                email: {required: true, email: true},
                                password: {required: true, minlength: 6},
                                password2: {required: true, minlength: 6, equalTo: '#password'},
                            },
                            messages: {
                                name: {required: "Please enter a username"},
                                email: {
                                    required: "Please enter an email address",
                                    email: "Please enter a valid email address"
                                },
                                password: {required: "Please enter a password"},
                                password2: {
                                    required: "Please re-type the password",
                                    equalTo: "Passwords must match",
                                }
                            },
                            errorElement: 'span',
                            errorPlacement: function (error, element) {
                                error.addClass('invalid-feedback')
                                element.closest('div').append(error)
                            },
                            highlight: function (element, errorClass, validClass) {
                                $(element).addClass('is-invalid')
                            },
                            unhighlight: function (element, errorClass, validClass) {
                                $(element).removeClass('is-invalid')
                            }
                        })
                    }

                    window.onload = setTimeout(initForm, 100)
                </script>
            </div>

        </div>
    </div>
</div>