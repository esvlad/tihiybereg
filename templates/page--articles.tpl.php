<? 
include('header.php');
#print_arr($page);
?>
<? if($node) : ?>
  <?
    include('sites/all/themes/tihiy/safemysql.php');
    $mydb = new MyDB\SafeMySQL();

    function my_flippy($flip, $type){
      if(isset($flip['prev']['nid'])){
        $flip['prev']['link'] = $type . '/' . $flip['prev']['nid'];
      } else {
        unset($flip['prev']);
      }
      
      if(isset($flip['next']['nid'])){
        $flip['next']['link'] = $type . '/' . $flip['next']['nid'];
      } else {
        unset($flip['next']);
      }

      unset($flip['first']);
      unset($flip['last']);
      unset($flip['current']);

      return $flip;
    }

    $my_flippy = my_flippy($page['content']['system_main']['nodes'][$node->nid]['flippy_pager']['#list'], $node->type); 
    if(isset($my_flippy['prev'])) $my_flippy['prev']['body_srm'] = $mydb->getRow('SELECT f.body_summary, frm.field_read_more_value as read_more FROM field_data_body f, field_data_field_read_more frm WHERE f.bundle = ?s AND f.entity_id = ?i AND frm.entity_id = f.entity_id', $node->type, $my_flippy['prev']['nid']);
    if(isset($my_flippy['next'])) $my_flippy['next']['body_srm'] = $mydb->getRow('SELECT f.body_summary, frm.field_read_more_value as read_more FROM field_data_body f, field_data_field_read_more frm WHERE f.bundle = ?s AND f.entity_id = ?i AND frm.entity_id = f.entity_id', $node->type, $my_flippy['next']['nid']);

    

    //print_arr($my_flippy); 
    
  ?>
  <section class="sect news_head">
    <div class="wrapper">
      <? if($is_admin) : ?>
        <h3 class="edit_node">
          <a href="#overlay=node/<?=$node->nid;?>/edit">Редактировать</a>
        </h3>
      <? endif; ?>
      <div class="content container_breadcrumb">
        <ul class="breadcrumb">
          <li><a href="../">Главная</a></li>
          <li><a href="../articles">Статьи</a></li>
          <li><?=$title;?></li>
        </ul>
      </div>
      <div class="content news container_head">
        <h1 class="section_title_news"><?=$title;?></h1>
      </div>
    </div>
  </section>
  <section class="sect main_news">
    <div class="wrapper">
      <div class="content news container_news">
        <? if(isset($node->field_articles_image['und'][0]['filename'])) : ?>
          <div class="news_images" data-title="<?=$node->field_articles_image['und'][0]['title'];?>">
            <img src="/sites/default/files/articles/<?=$node->field_articles_image['und'][0]['filename'];?>">
          </div>
        <? endif; ?>
        <div class="news_body">
          <?=$node->body['und'][0]['value'];?>
          <p class="news_date"><?=rus_date($node->created);?></p>
        </div>
        <div class="news__prev_next">
          <? if(isset($my_flippy['prev'])) : ?>
            <div class="cn_pn container_news_prev">
              <h2 class="cn_pn__title"><a href="../<?=$my_flippy['prev']['link'];?>" target="_self"><?=$my_flippy['prev']['title'];?></a></h2>
              <p class="cn_pn__caption"><?=cutStr($my_flippy['prev']['body_srm']['body_summary']);?></p>
              <p class="cn_pn__link"><a href="../<?=$my_flippy['prev']['link'];?>" target="_self"><?=markup_rm($markup_rm[$my_flippy['prev']['body_srm']['read_more']]);?></a></p>
            </div>
          <? endif; ?>
          <? if(isset($my_flippy['next'])) : ?>
            <div class="cn_pn container_news_next">
              <h2 class="cn_pn__title"><a href="../<?=$my_flippy['next']['link'];?>" target="_self"><?=$my_flippy['next']['title'];?></a></h2>
              <p class="cn_pn__caption"><?=cutStr($my_flippy['next']['body_srm']['body_summary']);?></p>
              <p class="cn_pn__link"><a href="../<?=$my_flippy['next']['link'];?>" target="_self"><?=markup_rm($markup_rm[$my_flippy['next']['body_srm']['read_more']]);?></a></p>
            </div>
          <? endif; ?>
        </div>
      </div>
    </div>
  </section>
  
<? else : ?>
<?//print_arr($page['#views_contextual_links_info']['views_ui']['view']->result);?>

  <section class="sect news_head">
    <div class="wrapper">
      <div class="content news container_head">
        <h1 class="section_title_news">Интересное на&nbsp;&laquo;Тихом берегу&raquo;</h1>
        <div class="section_switch">
          <p class="switch_label" data-switch="blog" data-type="blog" data-offset="0"><span>Блог</span></p>
          <p class="switch_label active" data-switch="articles" data-type="articles" data-offset="0"><span>Статьи</span></p>
        </div>
      </div>
    </div>
  </section>
  <section class="sect main_news">
    <div class="wrapper">
      <div class="content news container_news">
        <div class="container_news__block">
        <? $i = 0; ?>
          <? foreach($page['#views_contextual_links_info']['views_ui']['view']->result as $result) : ?>
          <? #if($result->_field_data['nid']['entity']->type == 'blog') continue;
          #echo $result->_field_data['nid']['entity']->type;?>
            <? if($i == 0) : ?>
              <div class="container_news__block_top cb_news__width_all cb_news__photo-text views">
                <div class="news_block">
                  <div class="news_block_images" onclick="location = '../articles/<?=$result->nid;?>';">
                    <img src="/sites/default/files/articles/<?=$result->field_field_articles_image[0]['raw']['filename'];?>"/>
                    <h3 class="news_block__title"><?=$result->node_title;?></h3>
                  </div>
                  <div class="news_block_text">
                    <p><?=$result->field_body[0]['raw']['safe_summary'];?></p>
                    <p class="news_block__read_more"><a href="../blog/<?=$result->nid;?>" target="_self"><?=$result->field_field_read_more[0]['rendered']['#markup'];?></a></p>
                  </div>
                </div>
              </div>
            <? elseif($i == 1) : ?>
              <div class="container_news__block_left cb_news__width_40 cb_news__no-photo views">
                <div class="news_block">
                  <h3 class="news_block__title" onclick="location = '../articles/<?=$result->nid;?>';"><?=$result->node_title;?></h3>
                  <div class="news_block_text">
                    <p><?=$result->field_body[0]['raw']['safe_summary'];?></p>
                    <p class="news_block__read_more"><a href="../blog/<?=$result->nid;?>" target="_self"><?=$result->field_field_read_more[0]['rendered']['#markup'];?></a></p>
                  </div>
                </div>
              </div>
            <? elseif($i == 2) : ?>
              <div class="container_news__block_right cb_news__width_55 cb_news__no-text views">
                <div class="news_block">
                  <div class="news_block_images">
                    <img src="/sites/default/files/articles/<?=$result->field_field_articles_image[0]['raw']['filename'];?>"/>
                    <div class="news_block_caption">
                      <h3 class="news_block__title"><?=$result->node_title;?></h3>
                      <p class="news_block__read_more"><a href="../blog/<?=$result->nid;?>" target="_self"><?=$result->field_field_read_more[0]['rendered']['#markup'];?></a></p>
                    </div>
                  </div>
                </div>
              </div>
            <? elseif($i == 3) : ?>
              <div class="container_news__block_top cb_news__width_all cb_news__photo-text views">
                <div class="news_block">
                  <div class="news_block_images" onclick="location = '../articles/<?=$result->nid;?>';">
                    <img src="/sites/default/files/articles/<?=$result->field_field_articles_image[0]['raw']['filename'];?>"/>
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
        </div>
        <div id="read_more" class="container_news__show_more" data-type="articles" data-offset="4" data-btn-text="Что ещё новенького?"><span>Что ещё новенького?</span></div>
      </div>
    </div>
  </section>
<? endif; ?>
<? include('footer.php'); ?>