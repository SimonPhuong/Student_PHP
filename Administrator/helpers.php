<?php
function yield_section($section_name) {
  ob_start();
  yield $section_name;
  return ob_get_clean();
}

function content_generator() {
  $sections = [
    'header' => '<header>Header content</header>',
    'main' => '<main>Main content</main>',
    'footer' => '<footer>Footer content</footer>',
  ];

  foreach ($sections as $section_name => $content) {
    yield $section_name => $content;
  }
}
?>