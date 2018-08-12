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
  <section class="sect section_main_head">
    <div class="wrappall">
      <?= render($page['content']); ?>
    </div>
  </section>

<? $block_option = $mydb->getAll('SELECT `bid`, `body` FROM `block_custom` WHERE `bid` IN (?a) ORDER BY `bid`',array(14, 5, 15, 16, 17, 18, 19, 20)); ?>

  <section class="sect section_hotel">
    <div class="section_switch">
      <p data-switch="hotel" class="switch_label active"><span>Отель</span></p>
      <p data-switch="services" class="switch_label"><span>Услуги</span></p>
    </div>
    <!--<div class="sh_caption">Все развлечения включены в&nbsp;стоимость проживания.</div>-->
    <div id="hotel" class="wrappAll content_view active">
	  <h2 class="view_mb">Отель</h2>
	  <div class="content option container_hotel_services">
        <div class="container_hotel container_options">
          <?=modul_my_render($block_option[6], $is_admin);?>
          <?=modul_my_render($block_option[7], $is_admin);?>
        </div>
      </div>
    </div>
	<div id="services" class="wrapper content_view">
	  <h2 class="view_mb">Услуги</h2>
      <div class="content option container_hotel_services">
        <div class="container_services container_options">
          <?=modul_my_render($block_option[0], $is_admin);?>
          <?=modul_my_render($block_option[1], $is_admin);?>
          <?=modul_my_render($block_option[2], $is_admin);?>
          <?=modul_my_render($block_option[3], $is_admin);?>
          <?=modul_my_render($block_option[4], $is_admin);?>
          <?=modul_my_render($block_option[5], $is_admin);?>
        </div>
      </div>
      <section class="sect section_map_hotel">
        <div class="wrapper">
          <?= modul_my_render($mydb->getRow('SELECT `bid`, `body` FROM `block_custom` WHERE `bid` = 12 LIMIT 0,1'), $is_admin); ?>
        </div>
      </section>
    </div>
  </section>
<script type="text/javascript">
 /* (function ($) {
    $('.switch_label').on('click',function(){
    console.log('Click switch_label');
    if($(this).hasClass('active')){
      return false;
    } else {
      var switch_data = $(this).attr('data-switch');
      var data_block = $('.section_switch').parent();
      
      $('.switch_label').removeClass('active');
      $(this).addClass('active');
      
      if(data_block.hasClass('section_hotel')){
        $('.content_view').removeClass('active');
        data_block.find('#'+switch_data).addClass('active');
      }
    }
  });
  })(jQuery);*/
</script>
<? include('footer.php'); ?>