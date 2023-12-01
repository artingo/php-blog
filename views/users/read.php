<?php require_once BASE_PATH . "/model/User.php" ?>

<div class="content-wrapper px-4 py-2">
    <div class="content-header">
        <h1 class="m-0"><?= $title ?></h1>
    </div>
    <div class="content px-2">
        <div class="col-md-4">
            <div class="card card-indigo card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src="<?= $user->avatarUrl ?>" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center"><?= $user->name ?></h3>
                    <p class="text-muted text-center">
                        joined on <?= date("Y-m-d, H:i", $user->created) ?>
                    </p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Posts published: </b> <a class="float-right">2</a>
                        </li>
                        <li class="list-group-item">
                            <b>Followers</b> <a class="float-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="float-right">13,287</a>
                        </li>
                    </ul>
                </div>

                <div class="card-footer">
                    <div class="float-right">
                        <form action="/users/update" method="post">
<!--                        --><?php //if($_SESSION['currentUser'] == $user->id): ?>
                            <input type="hidden" name="userId" value="<?= $user->id ?>">
                            <button class="btn bg-gradient-indigo">
                                <i class="fas fa-pencil"></i> Edit
                            </button>
<!--                        --><?php //endif; ?>
                            <a href="/users" class="btn btn-secondary">
                                <i class="fas fa-close"></i> Close
                            </a>
                        </form>
                    </div>

	                <?php if($_SESSION['currentUser'] == $user->id): ?>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteDialog">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                        <div class="modal fade" id="deleteDialog" tabindex="-1" role="dialog" aria-labelledby="deleteDialog"
                             aria-hidden="true">
                            <div class="modal-dialog " role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Do you really want to delete this user?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form method="post" action="/users/delete">
                                            <input name="userId" type="hidden" value="<?= $user->id ?>">
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