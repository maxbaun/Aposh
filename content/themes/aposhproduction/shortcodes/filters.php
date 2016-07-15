<?php
  add_shortcode("filters","filters");
  function filters($atts,$content=null){
    extract(shortcode_atts(array(
      'text'=>'Filter',
      'per_column' => 5,
      'column_size' => 2
    ), $atts));

    $html = '';

    global $columnClass;
    global $perColumn;
    global $filterCount;
    global $columnSize;

    $filterCount = 0;
    $columnClass = 'col-sm-'.$column_size;
    $perColumn = $per_column;
    $columnSize = $column_size;

    $html .= '
    <div id="filters" class="filters" data-option-key="filter">
      <div class="dropdown">
        <div class="filter-header container">
          <a id="filter-toggle" class="dropdown-toggle" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
            <span class="text">'.$text.'</span>
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>

        <ul class="dropdown-menu" role="menu" aria-labelledby="filter-toggle">
          <div class="container">
            <div class="row">
              <div class="'.$columnClass.'">';

    $html .= do_shortcode($content);

    $html .= '
              </div>
            </div>
          </div>
        </ul>
      </div>
    </div>';


    return force_balance_tags($html);
  }

  function generateFilter($shortcode){

  }

  add_shortcode("filter","filter");
  function filter($atts,$content=null){
    extract(shortcode_atts(array(
      'size'=>2,
      'category'=>''
    ), $atts));

    global $filterCount;
    global $perColumn;
    global $columnClass;
    global $columnSize;

    $html = '';

    if($filterCount > 1 && $filterCount % $perColumn === 0){
      $html .= '</div>';
      if($perColumn * (12 / $columnSize) == $filterCount){
        $html .= '</div><div class="row">';
      }
      $html .= '<div class="'.$columnClass.'">';
    }

    $html .= '<li><a href="'.$category.'" data-option-value=".'.$category.'" data-option-id="'.$category.'">'. do_shortcode($content) .'</a></li>';

    $filterCount++;
    return $html;
  }

  add_shortcode("search-filter","search_filter_callback");
  function search_filter_callback($atts,$content=null){
    extract(shortcode_atts(array(
      'id'=> '',
      'placeholder'=>'Type to search...',
      'label' => ''
    ), $atts));

    global $filterCount;
    global $perColumn;
    global $columnClass;
    global $columnSize;

    $html = '';

    global $post;

    $html .= '<form action="'.get_the_permalink($post->ID).'" method="GET">';
    $html .= '<div class="filter-search" id="'.$id.'">';
        if(isset($label) && $label != ''){
            $html .= '<label for="filter-search">' .$label.'</label>';
        }
        $html .= '<input type="text" class="form-control" autocomplete="off" name="search" placeholder="'.$placeholder.'"/>';
    $html .= '</div>';
    $html .= '</form>';

    return force_balance_tags($html);
  }

?>
