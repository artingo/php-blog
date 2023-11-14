<div class="content-wrapper px-4 py-2">
    <div class="content-header">
        <h1 class="m-0"><?= $title ?></h1>
    </div>
    <div class="content px-2">
        <ul>
            <?php foreach ($data as $category) : ?>
                <li><?= $category->name ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>