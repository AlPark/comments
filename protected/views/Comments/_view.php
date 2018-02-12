<?php
/* @var $this TblCommentsController */
/* @var $data TblComments */
?>

<div class="view comment-ornament" id="comment-<?php echo CHtml::encode($data->comment_id); ?>" style="margin-left: <?=$data->parent_comment_id*5?>px;">
	<b class="comment-author"><?php echo CHtml::encode($data->user_name); ?>: </b>
	<i class="comment-text"><?php echo CHtml::encode($data->comment_text); ?></i>
	<p class="comment-date"><?php echo CHtml::encode($data->create_time); ?></p>
    <span class="add-reply"> reply </span>
    <span class="show-more"> show replies </span>
    <input type="text" class="reply-field" placeholder="..." maxlength="128"/>
    <input type="button" class="send-reply-btn" placeholder="..." name="ok" value="ok"/>
</div>