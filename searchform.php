<div class="search-block">
  <i class="fas fa-search"></i>
  <div class="form-wrapper">
    <div class="form-content">
      <form role="search" method="get" action="<?php echo home_url( '/' ); ?>" class="search-form">
        <div class="form-group">
          <input class="form-group__input" type="search" value="<?php echo get_search_query() ?>" name="s" id="s">
        </div>
        <button class="form-group__btn" type="submit">بحث</button>
      </form>
    </div>
  </div>
</div>