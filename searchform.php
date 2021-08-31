 <form role="search" method="get" action="<?php echo home_url("/") ?>" class="header__search">
     <input type="search" name="s" id="search" placeholder="Search..." value="<?php echo get_search_query() ?>">
     <button class="header__search-btn" type="submit"></button>
 </form>