<?php 
        $comment = '';
        foreach ($detail as $value2) {
            extract($value2);
            if ( $img == ''){
                $comment .= '
                <div class="review-item">
            <div class="review-avatar">
                <img src="./public/upload/imgs/Friends/avartar-none.jpg" alt="Avatar của người dùng">
    </div>
    <div class="review-content">
        <div class="review-name">'. $username .'</div>
    <div class="review-rating">★★★★★</div>
    <div class="review-text" style="text-align: justify;">'. $content .'</div>
    <div class="reply-button"><i class="fa-solid fa-reply"></i>Trả lời</div>
</div>
</div>';
} else {
$comment .= '<div class="review-item">
    <div class="review-avatar">
        <img src="./public/upload/imgs/Friends/'. $img .'" alt="Avatar của người dùng">
    </div>
    <div class="review-content">
        <div class="review-name">'. $username .'</div>
        <div class="review-rating">★★★★★</div>
        <div class="review-text" style="text-align: justify;">'. $content .'</div>
    <div class="reply-button"><i class="fa-solid fa-reply"></i>Trả lời</div>
</div>
</div>';
}
}
echo $comment;

?>