<?php $cats = array2map($GLOBALS['categories']); ?>
<div class="content-wrapper px-4 py-2">
    <div class="content-header">
        <h1 class="m-0"><?= $title ?></h1>
    </div>
    <div class="content px-2">
        <div class="col-md-8">
            <div class="card card-indigo card-outline">
                <form method="post" action="/posts/save" id="blogForm">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <?= $post->title ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categories[]" class="col-sm-2 col-form-label">Categories</label>
                            <div class="col-sm-10">
                                <?php if($post->categories) {
                                    foreach ($post->categories as $catId) {
	                                    echo $cats[$catId] . "<br/>";
                                    }
                                } ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                <?= $post->body ?>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="float-right">
                            <a href="/posts" class="btn btn-secondary">
                                <i class="fas fa-close"></i> Close
                            </a>
                        </div>
                        <a class="btn btn-danger" href="/posts">
                            <i class="fas fa-trash"></i> Delete
                        </a>
                    </div>

            </div>

        </div>
    </div>
</div>