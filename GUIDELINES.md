# Project Guidelines Example

## Styling-CSS

* Use hyphen-case (-) for css-classnames
* Never style with ID

## PHP & HTML

* Use shorthand echo for inline php: `<?= $item["value"]; ?>` (instead of `<?php echo $item["value"]; ?>`)
* No ending PHP-tag in files that contains **only** PHP
* Single line comment with `//`, multiline with `/**/`
* camelCase for variables
* PascalCase for classes

## Files and folders

* Only small letters for all files except files that contain classes (`Auth.php`/`Comments.php`)
* Only small letters for all foldersfolders
* Dashes for files that contain multiple words

## Database

* Only small letters in table and column names
* Separate table and column names with snake case (`_`)

## GIT

* Commit message should be able to end the following sentance: `"This commit will..."`
* For longer commit messages separate the message into title and body (`git commit -m "This is title" -m "This is body"`)
* Pull into master after each merged pull request
* Start day by pulling from master
* Branch names are lowercase intials "-" section we are working on (ex. "ao-test")