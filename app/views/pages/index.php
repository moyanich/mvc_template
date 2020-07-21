

<?php require APPROOT . '/views/inc/header.php'; ?>
<h1><?php echo $data['title']; ?><?php echo $data['publish']; ?></h1>

    <ul>
        <?php foreach($data['posts'] as $post) : ?>
        <li><?php echo $post->username ?> - <?php echo $post->email ?></li> 
        <?php endforeach; ?>
    </ul>


<?php require APPROOT . '/views/inc/footer.php'; ?>