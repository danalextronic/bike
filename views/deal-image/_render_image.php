<?php

$userTypeId = !isset($userTypeId) ? Yii::$app->user->identity->userTypeId : $userTypeId;
?>

<li class="one-image">
    <a href="#" class="delete-image" data-imageid="<?= $image->dealsImage->id?>">
        <img src="<?= Yii::$app->request->baseUrl.'/'.$image->dealsImage->link ?>" width="75" height="75" alt="Deal image #<?= $image->dealsImage->id?>">
    </a>
</li>
