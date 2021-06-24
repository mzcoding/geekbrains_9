<?php foreach($newsList as $key => $news): ?>
<div>
    <h2><a href="<?= route('news.show', ['id' => ++$key]) ?>"><?=$news['title']?></a></h2>
    <p><?=$news['description']?></p>
</div>
<?php endforeach; ?>