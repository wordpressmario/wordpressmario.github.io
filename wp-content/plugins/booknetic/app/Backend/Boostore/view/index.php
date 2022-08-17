<?php

defined( 'ABSPATH' ) or die();

use BookneticApp\Providers\Helpers\Helper;

?>

<link rel="stylesheet" href="<?php echo Helper::assets( 'css/shared.css', 'Boostore' ) ?>" type='text/css'>
<link rel="stylesheet" href="<?php echo Helper::assets( 'css/boostore.css', 'Boostore' ) ?>" type='text/css'>

<div class="boostore">
    <!-- Page header -->
    <div class="m_header clearfix">
        <div class="m_head_title float-left">
            <?php echo bkntc__( 'Add-ons' ); ?>
        </div>
        <div class="m_head_actions float-right">
            <a class="btn btn-lg btn-primary float-right ml-1" href="admin.php?page=<?php echo Helper::getBackendSlug(); ?>&module=boostore&action=my_purchases"><?php echo bkntc__( 'MY PURCHASES' ); ?></a>
        </div>
    </div>

    <!-- Filter panel -->
    <section class="addons_filter_panel">
        <div class="row m-0 p-0">
            <div class="col-md-3 m-0 p-0">
                <select class="form-control" data-placeholder="<?php echo bkntc__( 'Select category' ) ?>" id="category">
                    <option value="0"><?php echo bkntc__( 'Show all' ); ?></option>

                    <?php if ( isset( $parameters[ 'categories' ] ) ): ?>
                        <?php foreach ( $parameters[ 'categories' ] as $category ): ?>
                            <option value="<?php echo htmlspecialchars( $category[ 'id' ] ); ?>"><?php echo htmlspecialchars( $category[ 'name' ] ); ?></option>
                        <?php endforeach ?>
                    <?php endif ?>
                </select>
            </div>
            <div class="col-md-6 m-0 p-0">
                <div class="input-icon">
                    <i><img src="<?php echo Helper::icon( 'search.svg' ); ?>" alt=""></i>
                    <input type="text" class="form-control form-control-lg search_input" placeholder="<?php echo bkntc__( 'Search' ); ?>" value="">
                </div>
            </div>
            <div class="col-md-3 m-0 p-0">
                <select class="form-control" id="sort">
                    <?php
                    $sort_options = [
                        ''               => bkntc__( 'Most relevant' ), 'lowest-price' => bkntc__( 'Lowest price' ), 'highest-price' => bkntc__( 'Highest price' ),
                        'most-installed' => bkntc__( 'Most installed' ), 'newest' => bkntc__( 'Newest' ), 'most-review' => bkntc__( 'Most customer review' ),
                    ];

                    foreach ( $sort_options as $key => $option ):
                        ?>
                        <option value="<?php echo $key; ?>"><?php echo $option; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
    </section>
    <hr>

    <section class="addons_content"></section>
</div>

<script src="<?php echo Helper::assets( 'js/shared.js', 'Boostore' ); ?>"></script>
<script src="<?php echo Helper::assets( 'js/boostore.js', 'Boostore' ); ?>"></script>