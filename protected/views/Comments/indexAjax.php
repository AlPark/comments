<?php
//echo '<pre>';
//var_dump($data); exit;
?>

<?php foreach($data as $item): ?>
    <?php echo $this->renderPartial('_view', ['data' => $item]); ?>
<?php endforeach; ?>
