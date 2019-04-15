<?php
if($data['type'] == 'phone'){
    ?>
    <div class="header_phone d-flex flex-row align-items-center justify-content-start">
        <div><div><img src="<?= \yii\helpers\Url::to('@web/images/phone.svg')?>" alt="https://www.flaticon.com/authors/freepik"></div></div>
        <div><?php echo $data['content']; ?></div>
    </div>
    <?php
}else if($data['type'] == 'contact'){
    return $data['content'];
}else if($data['type'] == 'lorem'){
    return $data['content'];
}else{
    return $data['content'];
}
?>
