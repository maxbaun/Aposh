<?php
    $taxonomy = 'image-category';
    $filter_text = 'Categories';
    $tax = array(
      $taxonomy
    );
    $args = array(
      'orderby'     => 'name',
      'hide_empty'  => true,
      'hierarchical'=> true
    );

    $categories = get_terms($tax,$args);
    $catIds = array();
    foreach ($categories as $category){
      $catIds[] = $category->term_id;
    }
?>

<div id="filters" class="filters" data-option-key="filter">
  <div class="dropdown">
    <div class="filter-header container">
      <a id="filter-toggle" class="dropdown-toggle" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
        <span class="text"><?php echo ($filter_text) ? $filter_text : 'Filter'; ?></span>
        <span class="glyphicon glyphicon-plus"></span>
      </a>
    </div>

    <ul class="dropdown-menu" role="menu" aria-labelledby="filter-toggle">
      <div class="container">
        <div class="row">
          <?php
            foreach($categories as $category):
              if($category->parent > 0){
                continue;
              }
          ?>
          <div class="col-sm-3">

            <li class="title"><a href="<?php echo get_term_link((int)$category->term_id,$taxonomy); ?>" data-option-value=".<?php echo $category->slug; ?>" data-option-id="<?php echo $category->term_id; ?>"><?php echo $category->name; ?></a></li>
            <?php if($category->parent == 0): ?>
              <?php
                $subArgs = array(
                  'orderby'     => 'name',
                  'child_of'    => $category->term_id,
                  'hide_empty'  => false
                );

                $subcategories = get_terms(array($taxonomy),$subArgs);
              ?>
              <?php foreach($subcategories as $subcategory): ?>
                <li><a href="<?php echo get_term_link((int)$subcategory->term_id,$taxonomy); ?>" data-option-value=".<?php echo $subcategory->slug; ?>" data-option-id="<?php echo $subcategory->term_id; ?>" data-option-value2=".<?php echo $category->slug; ?>"><?php echo $subcategory->name; ?></a></li>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </ul>
  </div>
</div>
