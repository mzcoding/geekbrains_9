<h1>Новости в админке</h1><br>
<?php foreach($newsList as $key => $news): ?>
	<div>
		<h2><a href=""><?=$news['title']?></a></h2>
		<p><?=$news['description']?></p>
	</div>
<?php endforeach; ?>