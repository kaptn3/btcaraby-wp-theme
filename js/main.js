function widthOfTabsWidget() {
  let tabs = document.querySelectorAll('.currency-wd-wrapper label');
  let numberTabs = tabs.length;
  for (let i = 0; i < numberTabs; i++) {
	tabs[i].style.width = 'calc(100% / ' + numberTabs + ')';
  }
}

function iconDownSubmenu() {
  const hasChild = document.querySelectorAll('.menu-item-has-children > a');
  for (let i = 0; i < hasChild.length; i++) { 
    let iconSortDown = document.createElement('i');
    hasChild[i].appendChild(iconSortDown);
    iconSortDown.classList.add('fas', 'fa-sort-down');
  }
}

jQuery(document).ready(function() { 
  jQuery('.search__icon').click(function() {
    jQuery('.form-wrapper').slideToggle();
  });

  jQuery('.nav_mobile').click(function() {
    jQuery('.top-menu').slideToggle();
  });

  jQuery(window).resize (function() {
    let w = jQuery(window).width();
    if(w > 767 ) {
      jQuery('.top-menu').removeAttr('style');
    }
  });

  iconDownSubmenu();
  widthOfTabsWidget();
});

