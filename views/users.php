<div class="content-wrapper px-4 py-2">
    <div class="content-header">
        <h1 class="m-0"><?= $title ?></h1>
    </div>
    <div class="content px-2">
        <ol>
            <?php foreach ($data as $user) : ?>
                <li><?= $user->name ?></li>
            <?php endforeach; ?>
        </ol>
    </div>
</div>