<? 
#include('sites/all/themes/tihiy/safemysql.php');
#$mydb = new MyDB\SafeMySQL();

#print_arr($page['#views_contextual_links_info']['views_ui']['view']->result);

echo 'ajax_success';
?>

        <? $i = 0; ?>
          <? foreach($page['#views_contextual_links_info']['views_ui']['view']->result as $result) : ?>
            <? if($i == 0) : ?>
              <div class="container_news__block_top cb_news__width_all cb_news__photo-text">
                <div class="news_block">
                  <div class="news_block_images">
                    <img src="/sites/default/files/blog/<?=$result->field_field_articles_image[0]['raw']['filename'];?>"/>
                    <h3 class="news_block__title"><?=$result->node_title;?></h3>
                  </div>
                  <div class="news_block_text">
                    <p><?=$result->field_body[0]['raw']['safe_summary'];?></p>
                    <p class="news_block__read_more"><a href="../blog/<?=$result->nid;?>" target="_self"><?=$result->field_field_read_more[0]['rendered']['#markup'];?></a></p>
                  </div>
                </div>
              </div>
            <? elseif($i == 1) : ?>
              <div class="container_news__block_left cb_news__width_40 cb_news__no-photo">
                <div class="news_block">
                  <h3 class="news_block__title"><?=$result->node_title;?></h3>
                  <div class="news_block_text">
                    <p><?=$result->field_body[0]['raw']['safe_summary'];?></p>
                    <p class="news_block__read_more"><a href="../blog/<?=$result->nid;?>" target="_self"><?=$result->field_field_read_more[0]['rendered']['#markup'];?></a></p>
                  </div>
                </div>
              </div>
            <? elseif($i == 2) : ?>
              <div class="container_news__block_right cb_news__width_55 cb_news__no-text">
                <div class="news_block">
                  <div class="news_block_images"><img src="images/news/002.jpg"/>
                    <div class="news_block_caption">
                      <h3 class="news_block__title"><?=$result->node_title;?></h3>
                      <p class="news_block__read_more"><a href="../blog/<?=$result->nid;?>" target="_self"><?=$result->field_field_read_more[0]['rendered']['#markup'];?></a></p>
                    </div>
                  </div>
                </div>
              </div>
            <? elseif($i == 3) : ?>
              <div class="container_news__block_top cb_news__width_all cb_news__photo-text">
                <div class="news_block">
                  <div class="news_block_images"><img src="images/news/001.jpg"/>
                    <h3 class="news_block__title"><?=$result->node_title;?></h3>
                  </div>
                  <div class="news_block_text">
                    <p><?=$result->field_body[0]['raw']['safe_summary'];?></p>
                    <p class="news_block__read_more"><a href="../blog/<?=$result->nid;?>" target="_self"><?=$result->field_field_read_more[0]['rendered']['#markup'];?></a></p>
                  </div>
                </div>
              </div>
            <? endif; ?>
          <?$i++;?>
          <? endforeach; ?>

<script>
(function ($) {
  //container_options
  $(window).trigger('scroll');
})(jQuery);
</script>