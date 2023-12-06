<?php ?>

<div class="content-wrapper px-4 py-2">
    <div class="content-header px-3">
        <h1 class="m-0"><?= $title ?></h1>
    </div>
    <div class="content">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Latest Members</h3>
                    <div class="card-tools">
                        <a href="/users/create" class="btn btn-tool bg-gradient-indigo" role="button">
                            <i class="fas fa-user-plus"></i>
                            Add user
                        </a>
                    </div>
                </div>

                <div class="card-body p-0">
                    <ul class="users-list clearfix">
                        <?php foreach ($data as $user) : ?>
                            <li><a href="/users/<?= $user->id ?>">
                                    <img src="<?= $user->avatarUrl ?>" width="128" alt="User Image">
                                    <span class="users-list-name"><?= $user->name ?></span>
                                </a>
                                <span class="users-list-date">
                                    joined on <?= date("Y-m-d, H:i", $user->created) ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>