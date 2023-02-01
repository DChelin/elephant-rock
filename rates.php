<?php
  $ratesTitleTab = get_field('rates_tab_title', 'options');
  $specTitleTab = get_field('spec_tab_title', 'options');
  $tcTitleTab = get_field('tc_tab_title', 'options');
  $futureRatesTitleTab = get_field('f_rates_tab_title', 'options');
  $count = 1;
?>

<!-- Tab links -->
<div class="tab">
  
  <button class="tablinks" onclick="openCity(event, 'future-tab')"><?= $futureRatesTitleTab; ?></button>
  <button class="tablinks" onclick="openCity(event, 'spec-tab')"><?= $specTitleTab; ?></button>
  <button class="tablinks" onclick="openCity(event, 'tc-tab')"><?= $tcTitleTab; ?></button>
</div>

<!-- BELOW CODE WAS ABOVE LINE 11 - TO DISPLAY THE 2022 RATES TAB WHICH WAS REMOVED. -->
<button class="tablinks active" onclick="openCity(event, 'rates-tab')"><?= $ratesTitleTab; ?></button>

<!-- Tab content -->
<div id="rates-tab" class="tabcontent">
  <?php if ( have_rows('rates', 'options') ) : ?>
      <?php while( have_rows('rates', 'options') ) : the_row(); ?>
        <h3><?= get_sub_field('rates_title', 'options');?></h3>
        <p><strong>Valid from:</strong> <?= get_sub_field('valid_from', 'options');?></p>
  <!-- inner -->
        <div class="inner-content-rates">
        <?php if ( have_rows('rates_content', 'options') ) : ?>
          <?php while( have_rows('rates_content', 'options') ) : the_row(); ?>
            <div class="rate-inner-container">
              <div class="r-info"><?= get_sub_field('r_content', 'options');?></div>
              <div class="r-price">R<?= get_sub_field('r_price', 'options');?></div>
            </div>
          <?php endwhile;?>
        <?php endif; ?>
        </div>
  <!-- end inner -->
      <?php endwhile;?>
  <?php endif; ?>
</div>

<!-- Future Tab content -->
<div id="future-tab" class="tabcontent">
  <?php if ( have_rows('f_rates', 'options') ) : ?>
      <?php while( have_rows('f_rates', 'options') ) : the_row(); ?>
        <h3><?= get_sub_field('f_rates_title', 'options');?></h3>
        <p><strong>Valid from:</strong> <?= get_sub_field('f_valid_from', 'options');?></p>
  <!-- inner -->
        <div class="inner-content-rates">
        <?php if ( have_rows('f_rates_content', 'options') ) : ?>
          <?php while( have_rows('f_rates_content', 'options') ) : the_row(); ?>
            <div class="rate-inner-container">
              <div class="r-info"><?= get_sub_field('f_r_content', 'options');?></div>
              <div class="r-price">R<?= get_sub_field('f_r_price', 'options');?></div>
            </div>
          <?php endwhile;?>
        <?php endif; ?>
        </div>
  <!-- end inner -->
      <?php endwhile;?>
  <?php endif; ?>
</div>


<div id="spec-tab" class="tabcontent">
  <div><?= get_field('specials', 'options');?></div>
</div>

<div id="tc-tab" class="tabcontent">
  <div><?= get_field('rates_ts_&_cs', 'options');?></div>
</div>


<script>
function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>