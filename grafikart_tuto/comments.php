<?php
    use MonTheme\CommentWalker;


    $count = (int) get_comments_number();
?>

<?php if(comments_open()):if($count > 0): ?>
    <h2><?=$count?> commentaire(s)</h2>
<?php else: ?>
    <h2>Il n'y en a aucun. Laisser un commentaire</h2>
<?php endif; ?>

<?php 
    // echo"oouiiiii ".comments_open();
    
    
    comment_form(['title_reply' => "okokokok"]);

    wp_list_comments(['style' => 'div', 'format' => 'html5', 'walker' => new CommentWalker()]);

    paginate_comments_links();

    else: echo"les commentaires ne sont pas activés";
    endif;
?>