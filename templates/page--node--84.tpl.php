<? 
include('sites/all/themes/tihiy/safemysql.php');
$mydb = new MyDB\SafeMySQL();
include('header.php');
?>

  <? if($is_admin) : ?>
  <h3 class="edit_node">
    <a href="#overlay=node/<?=$node->nid;?>/edit">Редактировать</a>
  </h3>
  <? endif; ?>

  <section class="sect section_main_head restoran">
    <div class="wrappall">
      <?= render($page['content']); ?>
    </div>
  </section>
<? $block_option = $mydb->getAll('SELECT `bid`, `body` FROM `block_custom` WHERE `bid` IN (?a) ORDER BY `bid`',array(21, 22, 23, 24, 25, 26)); ?>
  <section class="sect section_restoran_pvmenu">
    <div class="wrapper">
      <div class="content restoran container_restoran container_options">
        <div class="container_restoran_povar">
          <?=modul_my_render($block_option[0], $is_admin);?>
        </div>
        <div class="container_restoran_menu">
          <?=modul_my_render($block_option[1], $is_admin);?>
        </div>
      </div>
    </div>
  </section>

  <section class="sect main_photo">
    <div class="wrappall">
      <div class="content photo container_photo container_options">
        <h2 class="container_title text_center">Фото ресторана</h2>
        <?=modul_my_render($block_option[2], $is_admin);?>
      </div>
    </div>
  </section>

  <section class="sect section_restoran_offers">
    <div class="wrapper">
      <div class="content option container_restoran_offers container_options">
        <?=modul_my_render($block_option[3], $is_admin);?>
        <?=modul_my_render($block_option[4], $is_admin);?>
      </div>
    </div>
  </section>

  <section class="sect section_about">
    <div class="wrapp130">
      <div class="content about container_about container_options">
        <h2 class="container_about__title">О&nbsp;ресторане</h2>
        <div class="container_about__text">
          <?=modul_my_render($block_option[5], $is_admin);?>
        </div>
      </div>
    </div>
  </section>

<? include('footer.php'); ?>