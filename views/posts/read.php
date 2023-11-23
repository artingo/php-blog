<?php $cats = array2map($GLOBALS['categories']); ?>
<div class="content-wrapper px-4 py-2">
    <div class="content-header">
        <h1 class="m-0"><?= $title ?></h1>
    </div>
    <div class="content px-2">
        <div class="col-md-6">
            <div class="card card-indigo card-outline">
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
                            <?php if ($post->categories) {
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
	                <?php if($_SESSION['currentUser'] == $post->userId): ?>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteDialog">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                        <div class="modal fade" id="deleteDialog" tabindex="-1" role="dialog" aria-labelledby="deleteDialog"
                             aria-hidden="true">
                            <div class="modal-dialog " role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Post</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Do you really want to delete this post?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form method="post" action="/posts/delete">
                                            <input name="postId" type="hidden" value="<?= $post->id ?>">
                                            <button type="submit" class="btn btn-danger mr-1">
                                                <i class="fas fa-trash"></i> Yes, delete!
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                            <i class="fas fa-ban"></i> Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>