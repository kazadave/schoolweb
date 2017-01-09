<?php

class BWGEViewComments_bwge {
  ////////////////////////////////////////////////////////////////////////////////////////
  // Events                                                                             //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constants                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Variables                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  private $model;


  ////////////////////////////////////////////////////////////////////////////////////////
  // Constructor & Destructor                                                           //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function __construct($model) {
    $this->model = $model;
  }
  ////////////////////////////////////////////////////////////////////////////////////////
  // Public Methods                                                                     //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function display() {
    global $WD_BWGE_UPLOAD_DIR;
    $rows_data = $this->model->get_rows_data();
    $page_nav = $this->model->page_nav();
    $option_row = $this->model->get_option_row_data();
    $search_value = ((isset($_POST['search_value'])) ? esc_html($_POST['search_value']) : '');
    $search_select_gal_value = ((isset($_POST['search_select_gal_value'])) ? (int) $_POST['search_select_gal_value'] : 0);
    $search_select_value = ((isset($_POST['search_select_value'])) ? (int) $_POST['search_select_value'] : 0);
    $asc_or_desc = ((isset($_POST['asc_or_desc'])) ? esc_html($_POST['asc_or_desc']) : 'asc');
    $order_by = (isset($_POST['order_by']) ? esc_html($_POST['order_by']) : 'name');
    $order_class = 'manage-column column-title sorted ' . $asc_or_desc;
    $ids_string = '';
    $per_page = $this->model->per_page();
	$pager = 0;
    ?>

    <div class="bwge">
        
      <div style="font-size: 14px; font-weight: bold;">
        <?php echo __('This section allows you to manage the image comments.', 'bwge_back'); ?>
        <a style="color: #00A0D2; text-decoration: none;" target="_blank" href="https://galleryecommerce.com/gallery-set-up/editing-comments/"><?php echo __('Read More in User Manual', 'bwge_back'); ?></a>
      </div>
      <form class="bwge_form" id="comments_form" method="post" action="admin.php?page=comments_bwge" style="width:99%;">
      <?php wp_nonce_field( 'comments_bwge', 'bwge_nonce' ); ?>
        <!--<span class="comment_icon"></span>-->
        <h2>
          <?php echo __('Comments', 'bwge_back'); ?>
        </h2>
        <div class="wd-clear">
					<div class="wd-left">
						<?php
               BWGELibrary::search(__('Name','bwge_back'), $search_value, 'comments_form');
               BWGELibrary::search_select(__('Gallery','bwge_back'), 'search_select_gal_value', $search_select_gal_value, $this->model->get_galleries(), 'comments_form');
               BWGELibrary::search_select(__('Image','bwge_back'), 'search_select_value', $search_select_value, $this->model->get_images($search_select_gal_value), 'comments_form');
         
						?>
					</div>  
          <div class="wd-right" style="text-align:right;margin-bottom:15px ;">
            <input class="wd-btn wd-btn-primary wd-btn-icon wd-btn-publish" type="submit" onclick="bwge_spider_set_input_value('task', 'publish_all')" value="<?php echo __('Publish', 'bwge_back'); ?>" />
            <input class="wd-btn wd-btn-primary wd-btn-icon wd-btn-unpublish" type="submit" onclick="bwge_spider_set_input_value('task', 'unpublish_all')" value="<?php echo __('Unpublish', 'bwge_back'); ?>" />
            <input class="wd-btn wd-btn-primary-red wd-btn-icon wd-btn-delete" type="submit" onclick="if (confirm('<?php echo addslashes(__('Do you want to delete selected items?', 'bwge_back')); ?>')) {
                                                           bwge_spider_set_input_value('task', 'delete_all');
                                                         } else {
                                                           return false;
                                                         }" value="<?php echo __('Delete', 'bwge_back'); ?>" />
          </div>
        </div>
        <div class="tablenav top">
          <?php
          BWGELibrary::html_page_nav($page_nav['total'], $pager++, $page_nav['limit'], 'comments_form', $per_page);
          ?>
        </div>
        <table class="wp-list-table widefat fixed pages bwge_list_table">
          <thead>
            <tr class="bwge_alternate">
              <th class="manage-column column-cb check-column table_small_col"><input id="check_all" type="checkbox" style="margin:0;" /></th>
              <th class="table_small_col <?php if ($order_by == 'id') {echo $order_class;} ?>">
                <a onclick="bwge_spider_set_input_value('task', '');
                            bwge_spider_set_input_value('order_by', 'id');
                            bwge_spider_set_input_value('asc_or_desc', '<?php echo ((isset($_POST['asc_or_desc']) && isset($_POST['order_by']) && (esc_html($_POST['order_by']) == 'id') && esc_html($_POST['asc_or_desc']) == 'asc') ? 'desc' : 'asc'); ?>');
                            bwge_spider_form_submit(event, 'comments_form')" href="">
                  <span>ID</span><span class="sorting-indicator"></span>
                </a>
              </th>
              <th class="table_big_col <?php if ($order_by == 'image_id') {echo $order_class;} ?>">
                <a onclick="bwge_spider_set_input_value('task', '');
                            bwge_spider_set_input_value('order_by', 'image_id');
                            bwge_spider_set_input_value('asc_or_desc', '<?php echo ((isset($_POST['asc_or_desc']) && isset($_POST['order_by']) && (esc_html($_POST['order_by']) == 'image_id') && esc_html($_POST['asc_or_desc']) == 'asc') ? 'desc' : 'asc'); ?>');
                            bwge_spider_form_submit(event, 'comments_form')" href="">
                  <span><?php echo __('Image', 'bwge_back'); ?></span><span class="sorting-indicator"></span>
                </a>
              </th>
              <th class="<?php if ($order_by == 'name') {echo $order_class;} ?>">
                <a onclick="bwge_spider_set_input_value('task', '');
                            bwge_spider_set_input_value('order_by', 'name');
                            bwge_spider_set_input_value('asc_or_desc', '<?php echo ((isset($_POST['asc_or_desc']) && isset($_POST['order_by']) && (esc_html($_POST['order_by']) == 'name') && esc_html($_POST['asc_or_desc']) == 'asc') ? 'desc' : 'asc'); ?>');
                            bwge_spider_form_submit(event, 'comments_form')" href="">
                  <span><?php echo __('Name', 'bwge_back'); ?></span><span class="sorting-indicator"></span>
                </a>
              </th>
              <th class="<?php if ($order_by == 'comment') {echo $order_class;} ?>">
                <a onclick="bwge_spider_set_input_value('task', '');
                            bwge_spider_set_input_value('order_by', 'comment');
                            bwge_spider_set_input_value('asc_or_desc', '<?php echo ((isset($_POST['asc_or_desc']) && isset($_POST['order_by']) && (esc_html($_POST['order_by']) == 'comment') && esc_html($_POST['asc_or_desc']) == 'asc') ? 'desc' : 'asc'); ?>');
                            bwge_spider_form_submit(event, 'comments_form')" href="">
                  <span><?php echo __('Comment', 'bwge_back'); ?></span><span class="sorting-indicator"></span>
                </a>
              </th>
              <?php
              if ($option_row->popup_enable_email) {
              ?>
              <th class="<?php if ($order_by == 'mail') {echo $order_class;} ?>">
                <a onclick="bwge_spider_set_input_value('task', '');
                            bwge_spider_set_input_value('order_by', 'mail');
                            bwge_spider_set_input_value('asc_or_desc', '<?php echo ((isset($_POST['asc_or_desc']) && isset($_POST['order_by']) && (esc_html($_POST['order_by']) == 'mail') && esc_html($_POST['asc_or_desc']) == 'asc') ? 'desc' : 'asc'); ?>');
                            bwge_spider_form_submit(event, 'comments_form')" href="">
                  <span><?php echo __('Email', 'bwge_back'); ?></span><span class="sorting-indicator"></span>
                </a>
              </th>
              <?php
              }
              ?>
              <th class="table_big_col <?php if ($order_by == 'published') {echo $order_class;} ?>">
                <a style="padding:2px" onclick="bwge_spider_set_input_value('task', '');
                            bwge_spider_set_input_value('order_by', 'published');
                            bwge_spider_set_input_value('asc_or_desc', '<?php echo ((isset($_POST['asc_or_desc']) && isset($_POST['order_by']) && (esc_html($_POST['order_by']) == 'published') && esc_html($_POST['asc_or_desc']) == 'asc') ? 'desc' : 'asc'); ?>');
                            bwge_spider_form_submit(event, 'comments_form')" href="">
                  <span><?php echo __('Published', 'bwge_back'); ?></span><span class="sorting-indicator"></span>
                </a>
              </th>
              <th class="table_big_col"><?php echo __('Delete', 'bwge_back'); ?></th>
            </tr>
          </thead>
          <tbody id="tbody_arr">
            <?php
            if ($rows_data) {
              $iterator = 0;
              foreach ($rows_data as $row_data) {
                
                $is_embed = preg_match('/EMBED/',$row_data->filetype)==1 ? true :false;
                $alternate = $iterator%2 == 0 ? '' : 'class="bwge_alternate"';
                $published_image = (($row_data->published) ? 'publish-blue' : 'unpublish-blue');
                $published = (($row_data->published) ? 'unpublish' : 'publish');
                ?>
                <tr id="tr_<?php echo $row_data->id; ?>" <?php echo $alternate; ?>>
                  <td class="table_small_col check-column"><input id="check_<?php echo $row_data->id; ?>" name="check_<?php echo $row_data->id; ?>" type="checkbox" /></td>
                  <td class="table_small_col"><?php echo $row_data->id; ?></td>
                  <td class="table_big_col ">
                    <?php 
                    if ($row_data->thumb_url) {
                    ?>
                    <img title="<?php echo $row_data->alt; ?>" style="border: 1px solid #CCCCCC; max-width: 60px; max-height: 60px;" src="<?php echo (!$is_embed ? site_url() . '/' . $WD_BWGE_UPLOAD_DIR : "") . $row_data->thumb_url . (($is_embed) ? '' : '?date=' . date('Y-m-y H:i:s')); ?>">
                    <?php
                    }
                    ?>
                  </td>
                  <td><?php echo $row_data->name; ?></td>
                  <td style="cursor:context-menu" ><?php echo $row_data->comment; ?></td>
                  <?php
                  if ($option_row->popup_enable_email) {
                  ?>
                  <td><?php echo $row_data->mail; ?></td>
                  <?php
                  }
                  ?>
                  <td class="table_big_col"><a onclick="bwge_spider_set_input_value('task', '<?php echo $published; ?>');bwge_spider_set_input_value('current_id', '<?php echo $row_data->id; ?>');bwge_spider_form_submit(event, 'comments_form')" href=""><img src="<?php echo WD_BWGE_URL . '/images/css/' . $published_image . '.png'; ?>" /></a></td>
                  <td class="table_big_col"><a onclick="bwge_spider_set_input_value('task', 'delete');
                                                        bwge_spider_set_input_value('current_id', '<?php echo $row_data->id; ?>');
                                                        bwge_spider_form_submit(event, 'comments_form')" href=""><?php echo __('Delete', 'bwge_back'); ?></a></td>
                </tr>
                <?php
                $ids_string .= $row_data->id . ',';
                $iterator++;
              }
            }
            ?>
          </tbody>
        </table>
        <div class="tablenav bottom">
          <?php
          BWGELibrary::html_page_nav($page_nav['total'], $pager++, $page_nav['limit'], 'comments_form', $per_page);
          ?>
        </div>
        <input id="task" name="task" type="hidden" value="" />
        <input id="current_id" name="current_id" type="hidden" value="" />
        <input id="ids_string" name="ids_string" type="hidden" value="<?php echo $ids_string; ?>" />
        <input id="asc_or_desc" name="asc_or_desc" type="hidden" value="<?php echo $asc_or_desc; ?>" />
        <input id="order_by" name="order_by" type="hidden" value="<?php echo $order_by; ?>" />
      </form>
    </div>
    <?php
  }
  
  ////////////////////////////////////////////////////////////////////////////////////////
  // Getters & Setters                                                                  //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Private Methods                                                                    //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Listeners                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
}