<?php
/**
 * The CPT class.
 * 
 * @since      1.0.0
 * @package    Plugin_Cpt_Books
 * @subpackage Plugin_Cpt_Books/includes
 * @author     Gabriel Ceschini <gabrielceschini@hotmail.com>
 */
class CPT_Book {

	public function init() {
        add_action( 'init', array( $this, 'register_cpt_book' ) );

        add_action( 'add_meta_boxes_book', array( $this, 'meta_box_for_book' ) );
        add_action( 'save_post_book', array( $this, 'save_book_adittional_info' ) );
        add_filter( 'manage_book_posts_columns', array( $this, 'set_custom_edit_book_columns' ) );
        add_action( 'manage_book_posts_custom_column' , array( $this, 'custom_book_column' ), 10, 2);

        add_filter( 'manage_edit-book_sortable_columns', array( $this, 'book_column_sortable' ) );
        add_action( 'pre_get_posts', array( $this, 'book_order_by_year_column' ) );

	}

    // Register Custom Post Type
    public function register_cpt_book() {

        $labels = array(
            'name'                  => _x( 'Books', 'Post Type General Name', 'plugin-cpt-books' ),
            'singular_name'         => _x( 'Book', 'Post Type Singular Name', 'plugin-cpt-books' ),
            'menu_name'             => __( 'Books', 'plugin-cpt-books' ),
            'name_admin_bar'        => __( 'Book', 'plugin-cpt-books' ),
            'archives'              => __( 'Book Archives', 'plugin-cpt-books' ),
            'attributes'            => __( 'Book Attributes', 'plugin-cpt-books' ),
            'parent_item_colon'     => __( 'Parent Book:', 'plugin-cpt-books' ),
            'all_items'             => __( 'All Books', 'plugin-cpt-books' ),
            'add_new_item'          => __( 'Add New Book', 'plugin-cpt-books' ),
            'add_new'               => __( 'Add New Book', 'plugin-cpt-books' ),
            'new_item'              => __( 'New Book', 'plugin-cpt-books' ),
            'edit_item'             => __( 'Edit Book', 'plugin-cpt-books' ),
            'update_item'           => __( 'Update Book', 'plugin-cpt-books' ),
            'view_item'             => __( 'View Book', 'plugin-cpt-books' ),
            'view_items'            => __( 'View Books', 'plugin-cpt-books' ),
            'search_items'          => __( 'Search Book', 'plugin-cpt-books' ),
            'not_found'             => __( 'Not book found', 'plugin-cpt-books' ),
            'not_found_in_trash'    => __( 'Not book found in Trash', 'plugin-cpt-books' ),
            'featured_image'        => __( 'Featured Image', 'plugin-cpt-books' ),
            'set_featured_image'    => __( 'Set book featured image', 'plugin-cpt-books' ),
            'remove_featured_image' => __( 'Remove book featured image', 'plugin-cpt-books' ),
            'use_featured_image'    => __( 'Use as book featured image', 'plugin-cpt-books' ),
            'insert_into_item'      => __( 'Insert into book', 'plugin-cpt-books' ),
            'uploaded_to_this_item' => __( 'Uploaded to this book', 'plugin-cpt-books' ),
            'items_list'            => __( 'Books list', 'plugin-cpt-books' ),
            'items_list_navigation' => __( 'Books list navigation', 'plugin-cpt-books' ),
            'filter_items_list'     => __( 'Filter books list', 'plugin-cpt-books' ),
        );

        $args = array(
            'label'                 => __( 'Book', 'plugin-cpt-books' ),
            'description'           => __( 'My Books', 'plugin-cpt-books' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-book',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );

        register_post_type( 'book', $args );
        
    }

    // Add meta-boxes to my CPT
    function meta_box_for_book( $post ){
        add_meta_box( 
            'book_additional_info',
            __( 'Additional info', 'plugin-cpt-books' ),
            array( $this, 'additional_info_html_output' ),
            'book',
            'normal',
            'low' 
        );
    }

    // Metabox HTML
    function additional_info_html_output( $post ) {
        $post_id            = $post->ID;
        $book_author        = get_post_meta( $post_id, 'book_author', true );
        $book_editorial     = get_post_meta( $post_id, 'book_editorial', true );
        $book_gender        = get_post_meta( $post_id, 'book_gender', true );
        $book_edition       = get_post_meta( $post_id, 'book_edition', true );
        $book_year          = get_post_meta( $post_id, 'book_year', true );
        $book_languaje      = get_post_meta( $post_id, 'book_languaje', true );
        $book_synopsis      = get_post_meta( $post_id, 'book_synopsis', true );

        ?>

        <h3>Let's add some information related to this book</h3>

        <table id="additional_info_html_table">
            <input type="hidden" id="post_id_hidden" name="post_id" value="<?php echo $post_id ?>">
            
            <!-- Author -->
            <tr>
                <td><label for="book_author">Author:</label></td>
                <td><input type="text" id="book_author" name="book_author" value="<?php echo $book_author ?>"></td>
            </tr>
            
            <!-- Editorial -->
            <tr>
                <td><label for="book_editorial">Editorial:</label></td>
                <td><input type="text" id="book_editorial" name="book_editorial" value="<?php echo $book_editorial ?>"></td>
            </tr>

            <!-- Gender -->
            <tr>
                <td><label for="book_gender">Gender:</label></td>
                <td><input type="text" id="book_gender" name="book_gender" value="<?php echo $book_gender ?>"></td>
            </tr>
            
            <!-- Edition -->
            <tr>
                <td><label for="book_edition">Edition:</label></td>
                <td><input type="text" id="book_edition" name="book_edition" value="<?php echo $book_edition ?>"></td>
            </tr>
            
            <!-- Año -->
            <tr>
                <td><label for="book_year">Year:</label></td>
                <td><input type="number" id="book_year" name="book_year" min="1900" max="2099" step="1" value="<?php echo $book_year ?>"></td>
            </tr>
            
            <!-- Languaje -->
            <tr>
                <td><label for="book_languaje">Languaje:</label></td>
                <td>
                    <select name="book_languaje" id="book_languaje" value="<?php echo $book_languaje ?>">
                        <option value="english" <? echo $book_languaje == "english" ? ' selected="selected"' : ''; ?> >English</option>;
                        <option value="spanish" <? echo $book_languaje == "spanish" ? ' selected="selected"' : ''; ?> >Spanish</option>;
                        <option value="hindi" <? echo $book_languaje == "hindi" ? ' selected="selected"' : ''; ?> >Hindi</option>;
                        <option value="portuguese" <? echo $book_languaje == "portuguese" ? ' selected="selected"' : ''; ?> >Portuguese</option>;
                        <option value="russian" <? echo $book_languaje == "russian" ? ' selected="selected"' : ''; ?> >Russian</option>;
                        <option value="japanese" <? echo $book_languaje == "japanese" ? ' selected="selected"' : ''; ?> >Japanese</option>;
                    </select>
                </td>
            </tr>

            <!-- Synopsis -->
            <tr>
                <td><label for="book_synopsis">Synopsis:</label></td>
                <td><textarea id="book_synopsis" cols="70" rows="6" name="book_synopsis"><?php echo $book_synopsis ?></textarea></td>
            </tr>

            <!-- Save button -->
            <tr>
                <td></td>
                <td id="save_adittional_info_button_td">
                    <button id="save_adittional_info_button" class="button button-primary" >Save additional info</button>
                </td>
            </tr>
            
        </table>
    <?php
    }

    // Save Book Adittional info
    function save_book_adittional_info() {

        if( isset( $_POST['post_id'] ) ) {
            $post_id = $_POST['post_id'];
        } else {
            return;
        }

        if( isset( $_POST['book_author'] ) ) {
            $book_author = $_POST['book_author'];
            update_post_meta( $post_id, 'book_author', $book_author );
        }

        if( isset( $_POST['book_editorial'] ) ) {
            $book_editorial = $_POST['book_editorial'];
            update_post_meta( $post_id, 'book_editorial', $book_editorial );
        }

        if( isset( $_POST['book_gender'] ) ) {
            $book_gender = $_POST['book_gender'];
            update_post_meta( $post_id, 'book_gender', $book_gender );
        }

        if( isset( $_POST['book_edition'] ) ) {
            $book_edition = $_POST['book_edition'];
            update_post_meta( $post_id, 'book_edition', $book_edition );
        }

        if( isset( $_POST['book_year'] ) ) {
            $book_year = $_POST['book_year'];
            update_post_meta( $post_id, 'book_year', $book_year );
        }

        if( isset( $_POST['book_languaje'] ) ) {
            $book_languaje = $_POST['book_languaje'];
            update_post_meta( $post_id, 'book_languaje', $book_languaje );
        }

        if( isset( $_POST['book_synopsis'] ) ) {
            $book_synopsis = $_POST['book_synopsis'];
            update_post_meta( $post_id, 'book_synopsis', $book_synopsis );
        }

    }

    // Books List Columns
    function set_custom_edit_book_columns( $columns ) {
        unset( $columns['date'] );
        
        $columns['book_author']     = 'Author';
        $columns['book_gender']     = 'Gender';
        $columns['book_languaje']   = 'Languaje';
        $columns['book_year']       = 'Year';
        
        return $columns;
    }

    // Books List Columns Content
    function custom_book_column( $column, $post_id ) {
        switch ( $column ) {
            case 'book_author':
                echo get_post_meta( $post_id, 'book_author', true);
                break;
            case 'book_gender': 
                echo get_post_meta( $post_id, 'book_gender', true);
                break;
            case 'book_languaje': 
                echo ucfirst( get_post_meta( $post_id, 'book_languaje', true) );
                break;
            case 'book_year': 
                echo intval( get_post_meta( $post_id, 'book_year', true ) );
                break;
        }
    }

    function book_column_sortable( $columns ){
        $columns['book_year'] = 'book_year';
        return $columns;
    }
      

    function book_order_by_year_column( $query ) {

        if( ! is_admin() || $query->get('post_type') != 'book' ) {
            return;
        }

        $orderby = $query->get( 'orderby');

        if( 'book_year' == $orderby ) {
            $query->set('meta_key', 'book_year');
            $query->set('orderby', 'meta_value_num');
        }

    }
        

}
