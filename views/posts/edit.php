<?php $userId = $post->userId ?? $_SESSION['currentUser'];
$author = $GLOBALS['users'][$userId]; ?>

<div class="content-wrapper px-4 py-2">
    <div class="content-header">
        <h1 class="m-0"><?= $title ?></h1>
    </div>

    <div class="content px-2">
        <div class="col-md-8">
            <div class="card card-indigo card-outline">
                <form method="post" action="/posts/save" id="blogForm">
                    <input type="hidden" name="isExistingPost" value="<?= $post->userId ?>">
                    <input type="hidden" name="id" value="<?= $post->id ?>">

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" id="title" required
                                       value="<?= $post->title ?>" placeholder="Write your post title here...">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="userId" class="col-sm-2 col-form-label">Author</label>
                            <div class="col-sm-10">
                                <span class="form-control-plaintext"><?= $author->name ?></span>
                                <input type="hidden" name="userId" value="<?= $userId ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categories[]" class="col-sm-2 col-form-label">Categories</label>
                            <div class="col-sm-10">
                                <select name="categories[]" id="categories" multiple
                                    class="select2 form-control col-12" data-placeholder="Select a category">
                                <?php foreach ($GLOBALS['categories'] as $category) : ?>
                                    <option value="<?= $category->id ?>"
                                        <?= $post->categories && in_array($category->id, $post->categories) ? 'selected' : '' ?> >
                                        <?= $category->name ?>
                                    </option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                <textarea id="body" name="body" class="col-sm-12" required><?= $post->body ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="float-right">
                            <button type="submit" class="btn bg-gradient-indigo">
                                <i class="fas fa-floppy-disk"></i> Save
                            </button>
                        </div>
                        <a class="btn btn-default" href="/posts">
                            <i class="fas fa-xmark"></i> Cancel
                        </a>
                    </div>
                </form>

                <script src="https://cdn.tiny.cloud/1/vh9li5widrs2gxoiv00dst7g4yqxkua7b0z1l54d83hsetlf/tinymce/6/tinymce.min.js"></script>
                <script src="/js/jquery.validate.min.js" defer></script>
                <script src="/js/select2.min.js" defer></script>
                <script>
                    tinymce.init({
                        selector: 'textarea#body',
                        plugins: 'image',
                        menubar: false,
                        toolbar: 'undo redo | styles | bold italic align | image',
                        statusbar: false,
                        height: "300"
                    });

                    function initForm() {
                        $('.select2').select2()
                        $.validator.setDefaults({ignore: ''});

                        $('#blogForm').validate({
                            rules: {
                                title: {
                                    required: true
                                },
                                body: {
                                    required: true,
                                    minlength: 200
                                }
                            },
                            messages: {
                                title: {
                                    required: "Please enter a title for the post"
                                },
                                body: {
                                    required: "Please provide a post content",
                                    minlength: "The post content must be at least 200 characters long"
                                }
                            },
                            errorElement: 'span',
                            errorPlacement: function (error, element) {
                                error.addClass('invalid-feedback');
                                element.closest('div').append(error);
                            },
                            highlight: function (element, errorClass, validClass) {
                                $(element).addClass('is-invalid');
                            },
                            unhighlight: function (element, errorClass, validClass) {
                                $(element).removeClass('is-invalid');
                            }
                        });
                    }

                    window.onload = setTimeout(initForm, 100);
                </script>
            </div>

        </div>
    </div>
</div>