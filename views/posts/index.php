<?php $cats = array2map($GLOBALS['categories']);
$users = array2map($GLOBALS['users']);
$colors = array(1 => 'maroon', 2 => 'warning', 3 => 'indigo', 4 => 'navy', 5 => 'success', 6 => 'gray');
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1 class="m-0"><?= $title ?>
                        <a class="btn bg-gradient-indigo float-right"
                           href="/posts/create">
                            <i class="fa-solid fa-file-circle-plus"></i>
                            Create post
                        </a>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <?php foreach ($GLOBALS['posts'] as $id => $post) : ?>
                  <div class="col-xl-3 col-md-4 col-sm-6">
                      <div class="card card-outline card-indigo">
                          <div class="card-header">
                              <div class="user-block">
                                  <img class="img-circle" src="/img/user1-128x128.jpg" alt="User Image">
                                  <a href="/posts/<?= $id ?>" class="username text-indigo">
                                    <?= $post->title ?>
                                  </a>
                                  <span class="description"><?= $users[$post->userId] ?>
                                        on <?= date("Y-m-d, H:i", $post->created) ?>
                                    </span>
                              </div>
                              <div class="card-tools">
                                <?php if (!empty($post->categories)) {
                                    foreach ($post->categories as $categoryId) { ?>
                                      <span class="badge bg-<?= $colors[$categoryId] ?>">
                                         <?= $cats[$categoryId] ?>
                                    </span>
                                    <?php }
                                } ?>
                              </div>
                          </div>
                          <div class="card-body">
                            <?= $post->body ?>
                          </div>
                      </div>
                  </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>