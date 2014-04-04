WP Bootstrap Shortcodes
=======================

Plugins creates some basic shortcodes to use with bootstrap based themes.

Shortcodes
----------

* [row] 
* [col_xs_NN]
* [col_sm_NN]
* [col_md_NN]
* [col_lg_NN] 
* [colNN] - Shortcut for [col_sm_NN]
* [well]
* [button]
* [glyphicon]
* [hr]


[row] 
-----
Generates `<div class="row"> ... </div>` container.

Parameters

* class (optional) - CSS class to add to the `<div>` tag. Example: `[col4 class="myclass"]col content[/col]`

[col_XX_NN] and [colNN]
-----------------------
Generates `<div class="col-XX-NN"> ... </div>` container for the column. XX is screen size and can be one of 
* xs
* sm
* md
* xl
* [colNN] is a shortcut for the sm sized column [col_sm_NN]

and NN is number of the Grid units to use, values 1..12

Parameters

* class (optional) - CSS class to add to the `<div>` tag. Example: `[row class="myclass"]row content[/row]`

[well]
------
Generates `<div class="well"> ... </div>` container.

Parameters

* class (optional) - CSS class to add to the `<div>` tag, e.g. `[row class="myclass"]`
* background (optional) - URL of the background image to be used as a well background - added as a style attribute. Example: `[well background="http://mysite.com/myimage"]well content[/well]`

[button]
--------
Makes a button from the regular link. 

Usage

`[button class="myclass"]<a href="#">My Button</a>[/button]`, where link is a regular link created with WP editor.

Parameters

* class (optional) - CSS class to add to the `<div>` tag. Example: `[button class="myclass"]<a href="#">My Button</a>[/button]`

[glyphicon]
-----------
Creates a glyph icon.

Usage

`[glyphicon class="myclass"]`

Parameters

* class (required) - glyph icon class. Example: `[glyphicon class="glyph-ok"]`

[hr]
----
Horizontal ruler `<hr>`. 

Parameters

* class (optional) - CSS class to add to the `<hr>` tag, e.g. `[hr class="myclass"]`
