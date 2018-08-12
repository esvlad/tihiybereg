<? 
include('sites/all/themes/tihiy/safemysql.php');
$mydb = new MyDB\SafeMySQL();
include('header.php');

?>

  <section class="sect section_animal">
    <div class="wrapper">
      <? if($is_admin) : ?>
        <h3 class="edit_node">
          <a href="#overlay=node/<?=$node->nid;?>/edit">Редактировать</a>
        </h3>
      <? endif; ?>
      <div class="content container_breadcrumb">
        <ul class="breadcrumb">
          <li><a href="../">Главная</a></li>
          <li><a href="../fishing">Рыбалка</a></li>
          <li><?=$title;?></li>
        </ul>
      </div>
      <div class="content animal fishing container_animal container_options">
        <div class="container_animal_block">
          <div class="container_animal_descriptions">
            <h1 class="container_animal_title"><?=$title;?></h1>
            <p class="small_title_description"><?=$node->field_rename['und'][0]['value'];?></p>
            <div class="animal_description">
              <?=$node->body['und'][0]['value'];?>
              <img src="/sites/default/files/fishing/<?=$node->field_animal['und'][0]['filename'];?>"/>
            </div>
          </div>
          <div class="container_animal_advice">
            <div class="container_animal_advice_block">
              <img src="/sites/default/files/new180218/fish/animal_advice_fishing1.jpg" class="animal_advice_images"/>
              <div class="animal_advice_caption">
                <p>Исрафилов Ильхам Фидаевич</p>
                <p>Рыбак</p>
              </div>
              <div class="animal_advice_text">
                <?=$node->field_advice_text['und'][0]['value'];?>
              </div>
            </div>
          </div>
        </div>
        <div class="container_animal_price">
          <h2>Цена</h2>
          <div class="container_animal_price__text">
            <?=$node->field_price['und'][0]['value'];?>
          </div>
        </div>
        <div class="container_animal_menu">
          <?= modul_my_render($mydb->getRow('SELECT `bid`, `body` FROM `block_custom` WHERE `bid` = 42 LIMIT 0,1'), $is_admin); ?>
        </div>
        <div class="container_animal_quotes">
          <div class="container_animal_quotes__text">
            <?=$node->field_quote['und'][0]['value'];?>
            <p class="quotes__text_author"><?=$node->field_quote_author['und'][0]['value'];?></p>
          </div>
        </div>
        <div class="container_animal_miniblock">
          <?= modul_my_render($mydb->getRow('SELECT `bid`, `body` FROM `block_custom` WHERE `bid` = 37 LIMIT 0,1'), $is_admin); ?>
        </div>
      </div>
    </div>
  </section>

  <section class="sect section_map_hotel fishing container_options">
    <div class="wrapper">
      <?= modul_my_render($mydb->getRow('SELECT `bid`, `body` FROM `block_custom` WHERE `bid` = 13 LIMIT 0,1'), $is_admin); ?>
    </div>
  </section>

<? include('footer.php'); ?>