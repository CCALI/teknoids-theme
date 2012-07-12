/* Welcome in the beautiful world of BIGDADDY dear Drupal Themer ;)
__________________________________________________________________________________________

BigDaddy is not a ready-made theme but only a good structured basis for theme developers. BigDaddy will facilitate your theme development and give you an optimal start to have a good rendered HTML output and clean CSS. It's up to you to add more templates, theme functions or CSS to adapt the theme to your project.
Everything is commented and structured for a better control and organization of your theme. All that to ensure productivity.
              ---------     ----------              -------     ------------

A few technical aspect:
- clean HTML5 theme
- ready for CSS3 and @media queries integration
- a few important layout features and API function are already in the template.php


/* INSTALLATION
__________________________________________________________________________________________

- Download BigDaddy from http://drupal.org/project/bigdaddy
- Unpack the downloaded file and place the BigDaddy folder in your Drupal installation under 
  one of the following locations:

    * sites/all/themes
    * sites/default/themes
    * sites/example.com/themes 

- Log in as an administrator on your Drupal site and go to 
  Administer > Site building > Themes (admin/build/themes) and make BigDaddy the default theme.

- if you want to change the name of the theme from 'bigdaddy' to another name like 'mytheme', follow these steps (to do BEFORE enabling the theme):

	- rename the theme folder to 'mytheme'
	- rename bigdaddy.info to mytheme.info
	- Edit bigdaddy.info and change the name and the description
	- In bigdaddy.info, template.php and theme-settings.php, change each iteration of 'bigdaddy' to 'mytheme'
	

/* WHAT ARE THE FILES FOR?
__________________________________________________________________________________________

- bigdaddy.info => provide informations about the theme, regions, css, javascript, settings, ...
- page.tpl.php => template to modify the pages html structure (most important template, here you can add/remove regions to define your information architecture. Don't forget to add/remove this regions in the .info file).
- node.tpl.php => template to modify the nodes html structure.
- block.tpl.php => template to modify the blocks html structure.
- nd.tpl.php => template to work with the Display Suite module.
- maintenance-page.tpl.php => template to modify the maintenance page html structure (maintenance = when your site is offline for big updates).
- template.php => used to modify drupal's default behavior before outputting HTML through the theme.
- theme-settings => used to create additional settings in the theme settings page.
- views-view-list.tpl.php and views-view-unformatted.tpl.php => starting templates to customize your views.

Closer look into the /styles folder
-----------------------------------
- reset.css => stylesheet based on Eric Meyer's browser resets and Richard Clark's for HTML5 with a few specific resets for Drupal.
- typography.css => contains font styles, font line-heights and margins and link style. Here you can also redefine your vertical rhythm.
- master.css => it's your principal stylesheet. Default classes for your content, define global layout of your Website and regions layouts. 
- master-css3.css => include only CSS3 selectors.
- master-media.css => include only @media queries to create your responsive webdesign.
- master-print.css => define the way the theme look like when printed.
- master-ie.css => used to debug IE. You can add other stylesheet to debug specifig IE versions. Just add a line in the .info and your CSS file in the /styles folder.
- theme-settings.css => theme settings styles. If you renamed your regions and their IDs or add regions, you must modify this file to add the new changes to the wireframes styles (feel free to change the colors).
- /less folder => here you can add all your .less files. Don't forget to add the path of this file in the .info or tu use drupal_add_css() in your templates. This work only if your use the module http://drupal.org/project/less

NB: in the /images folder, I added a /sprites folder to separate your CSS sprites images from the rest (but what are CSS Sprites?? -> http://css-tricks.com/158-css-sprites/)


/* CHANGING THE LAYOUT
__________________________________________________________________________________________

The layout used in BigDaddy is a very classic and standard HTML output. It has been tested on all major browser including IE (version 6 to 9), Opera, Firefox, Safari, Chrome ... 
The purpose of this method is to have a minimal markup for an ideal display. The regions name are in adequacy with the variables names in Drupal 7 to prepare a possible update of your Drupal version:

	1. HEADER
	2. SIDEBAR FIRST
	3. CONTENT TOP
	4. CONTENT
	5. CONTENT BOTTOM
	6. SIDEBAR SECOND
	7. FOOTER
	
You're free to change order and add/remove regions. Don't forget to modify the .info file with the new changes.


/* SKINR OPTION
__________________________________________________________________________________________

BigDaddy is ready to work with the Skinr module (http://drupal.org/project/skinr). You can already in the block administration add specific classes to your blocks. In the .info file, you can add more skinr settings.

To learn more abour skinr
------------------------- 
Skinr presentation: http://drupal.org/node/578552 
Documentaion: http://drupal.org/node/578574


/* PANELS OPTION
__________________________________________________________________________________________

If your site is using panels (http://drupal.org/project/panels), you can add a "layouts" folder for example to create a custom layout. This is a good thing if your want to create your own panel templates and their CSS. If you want to create your own layout, duplicate the folder "customlayout" and rename it with your name. Don't forget to change each iteration of 'customlayout' to 'myname' in the files.

To learn more about panels layouts
----------------------------------
Panels 3 - Creating a custom layout in your theme: http://drupal.org/node/495654
Multiple custom layouts work slightly different: http://drupal.org/node/514646


/* UPDATES
__________________________________________________________________________________________

Once you start using BigDaddy, you will massively change it until a point where it has nothing
to do with BigDaddy anymore. Unlike ZEN, is not intended to be use as a base theme for a 
sub-theme (even though it is possible to do so). Because of this, it is not necessary to
update your theme when a new version of BigDaddy comes out. Always see BigDaddy as a STARTER, and 
as soon as you start using it, it is not BigDaddy anymore, but your own theme.


/* TYPOGRAPHY: here a few useful links and tips to optimize your legibility
__________________________________________________________________________________________

-> http://www.markboulton.co.uk/journal/comments/five-simple-steps-to-better-typography
-> http://www.alistapart.com/articles/settingtypeontheweb
-> http://24ways.org/2006/compose-to-a-vertical-rhythm
-> http://www.alistapart.com/articles/howtosizetextincss/
-> http://www.alistapart.com/articles/whitespace
-> http://www.alistapart.com/d/settingtypeontheweb/example_grid.html
-> http://www.blueprintcss.org/tests/parts/elements.html
-> http://www.blueprintcss.org/tests/parts/sample.html

Golden ratio = 1,618 (see: http://net.tutsplus.com/tutorials/other/the-golden-ratio-in-web-design/)
Hierarchy font-size: 6,7,8,9,10,11,12,14,16,18,21,24,36,48,60,72
Fibonacci sequence: 16,24,40,64,104 (achieve the divine proportion and is applied for more aesthetically design)

=> Up to you to choose your best way to create hierarchy in your stylesheets.


/* BIG THANKS!
__________________________________________________________________________________________

Thanks for using BigDaddy, and remember to use the issue queue in drupal.org for any question or bug report:
- http://drupal.org/project/issues/bigdaddy

And don't forget to SPREAD THE WORD!

Current maintainer:
* Maxime Rabot - http://drupal.org/user/429474 (maximer)