1. Upload the `GuestAv.png` file to `/application/assets/images/characters` on your Nova install. Alternatively, log in to your site, go to 'Upload Images' and upload it as a character image.
2. Upload the `/_global/` directory and its contents into the directory of the skin you want to add the infobox to.
3. Open the `template_[section].php` file for all sections of the skin you want the infobox added to.
4. Find the line `<div class="nav-sub">`. Paste the below line beneath it: 
```php
<div class="infobox"><?php include_once(APPFOLDER . '/views/' . $current_skin . '/_global/pages/infobox.php');?></div>
```
5. Open `/[section]/css/main.css` for all sections of the skin you want the infobox added to. At the bottom of the file, add this line:
```css
@import url('../../_global/css/infobox.css');
```
6. Upload the file `autoload.php` to `/application/config` of your site (if you have any other mods which alter this file, then you will need to compare the two and merge the additions)

Modify the `_global/css/infobox.css` file if you wish to adjust any styles of the infobox, including setting its width to match that of your sub-nav.