<? 
include('sites/all/themes/tihiy/safemysql.php');
$mydb = new MyDB\SafeMySQL();
include('header.php');
?>

  <section class="sect section_main_head">
    <div class="wrappall">
      <?= render($page['content']); ?>
    </div>
  </section>

  <section class="sect section_about">
    <div class="wrapp130">
      <div class="content about container_about block">
        <?= modul_my_render($mydb->getRow('SELECT `bid`, `body` FROM `block_custom` WHERE `bid` = 1 LIMIT 0,1'), $is_admin); ?>
      </div>
    </div>
  </section>

<? $block_option = $mydb->getAll('SELECT `bid`, `body` FROM `block_custom` WHERE `bid` IN (?a) ORDER BY `bid`',array(4, 5, 6, 7, 8, 9, 10, 34)); ?>
  <section class="sect option main_option">
    <div class="wrapper">
      <div class="content container_option container_options">
        <?=modul_my_render($block_option[0], $is_admin);?>
        <?=modul_my_render($block_option[1], $is_admin);?>
        <?=modul_my_render($block_option[2], $is_admin);?>
      </div>
    </div>
    <div class="wrappall">
      <div class="content container_option container_options">
        <?=modul_my_render($block_option[3], $is_admin);?>
        <?=modul_my_render($block_option[4], $is_admin);?>
        <?=modul_my_render($block_option[5], $is_admin);?>
        <?=modul_my_render($block_option[6], $is_admin);?>
        <?=modul_my_render($block_option[7], $is_admin);?>
      </div>
    </div>
  </section>

  <section class="sect main_photo">
    <div class="wrappall">
      <div class="content photo container_photo block container_options">
        <?= modul_my_render($mydb->getRow('SELECT `bid`, `body` FROM `block_custom` WHERE `bid` = 3 LIMIT 0,1'), $is_admin); ?>
      </div>
    </div>
  </section>

  <? /*$block_news = module_invoke('views', 'block_view', 'blog-block'); 
     print render($block_news['content']);*/
    $news_sql = 'SELECT n.`nid`, n.`title`, n.`type`, fdb.`body_summary` as body, fm.`filename`, frm.`field_read_more_value` as read_more';
    $news_sql .= ' FROM `node` n, `field_data_body` fdb, `field_data_field_articles_image` fda, `file_managed` fm, `field_data_field_read_more` frm';
    $news_sql .= ' WHERE (n.`type`=?s or n.`type`=?s) AND n.`status`=?i AND n.`promote`=?i AND fdb.`entity_id`=n.`nid` AND fda.`entity_id`=n.`nid` AND fm.`fid`=fda.`field_articles_image_fid` AND frm.`entity_id`=n.`nid`';
    $news_sql .= ' ORDER BY n.`created` DESC LIMIT 0,3';

    $block_news = $mydb->getAll($news_sql, 'blog', 'articles', 1, 1);
  ?>
  <section class="sect main_news">
    <div class="wrapper">
      <div class="content news container_news">
        <h2 class="container_title text_center">Интересное на&nbsp;&laquo;Тихом берегу&raquo;</h2>
        <div class="container_news__block">
          <? for($i = 0; $i < count($block_news); $i++): ?>
            <? if($i==0): ?>
              <div class="container_news__block_top cb_news__width_all cb_news__photo-text">
                <div class="news_block">
                  <div class="news_block_images">
                    <img src="/sites/default/files/<?=$block_news[$i]['type'].'/'.$block_news[$i]['filename'];?>"/>
                    <h3 class="news_block__title"><?=$block_news[$i]['title'];?></h3>
                  </div>
                  <div class="news_block_text">
                    <p><?=$block_news[$i]['body'];?></p>
                    <p class="news_block__read_more">
                      <a href="../<?=$block_news[$i]['type'].'/'.$block_news[$i]['nid'];?>" target="_self"><?=markup_rm($block_news[$i]['read_more']);?></a>
                    </p>
                  </div>
                </div>
              </div>
            <? elseif($i==1): ?>
              <div class="container_news__block_left cb_news__width_40 cb_news__no-photo">
                <div class="news_block">
                  <h3 class="news_block__title"><?=$block_news[$i]['title'];?></h3>
                  <div class="news_block_text">
                    <p><?=$block_news[$i]['body'];?></p>
                    <p class="news_block__read_more">
                      <a href="../<?=$block_news[$i]['type'].'/'.$block_news[$i]['nid'];?>" target="_self"><?=markup_rm($block_news[$i]['read_more']);?></a>
                    </p>
                  </div>
                </div>
              </div>
            <? elseif($i==2): ?>
              <div class="container_news__block_right cb_news__width_55 cb_news__no-text">
                <div class="news_block">
                  <div class="news_block_images">
                    <img src="/sites/default/files/<?=$block_news[$i]['type'].'/'.$block_news[$i]['filename'];?>"/>
                    <div class="news_block_caption">
                      <h3 class="news_block__title"><?=$block_news[$i]['title'];?></h3>
                      <p class="news_block__read_more">
                        <a href="../<?=$block_news[$i]['type'].'/'.$block_news[$i]['nid'];?>" target="_self"><?=markup_rm($block_news[$i]['read_more']);?></a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            <? endif; ?>
          <? endfor; ?>
        </div>
        <a href="../blog" target="_self" class="container_news__show_more" data-btn-text="Что ещё новенького?"><span>Что ещё новенького?</span></a>
      </div>
    </div>
  </section>

<? include('footer.php'); ?>