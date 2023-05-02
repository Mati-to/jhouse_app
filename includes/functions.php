<?php

require 'app.php';

function addTemplate(string $name, bool $main = false) {
  include TEMPLATES_PATH . "/{$name}.php";
}


