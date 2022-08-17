<?php

defined( 'ABSPATH' ) or die();

use BookneticApp\Providers\Helpers\Helper;
use BookneticApp\Providers\Helpers\Date;

/**
 * @var mixed $parameters
 */

if( count( $parameters['services'] ) == 0 )
{
	echo '<div class="booknetic_empty_box"><img src="' . Helper::assets('images/empty-service.svg', 'front-end') . '"><span>' . bkntc__('Service not found. Please go back and select a different option.') . '</div>';
}
else
{
    echo '<div class="bkntc_service_list">';

$lastCategoryPrinted = null;
$services = apply_filters('bkntc_booking_panel_render_services_info' , $parameters['services']);

$isAccordionEnabled = Helper::getOption('hide_accordion_default', 'off', [ 'off', 'on' ]);
$isFirstCategoryService = 1;
$servicesLeft = 0;
$servicesLeftToPrint = $services;

foreach ( $services AS $eq => $serviceInf )
{
	if( $lastCategoryPrinted != $serviceInf['category_id'] )
	{
        if ( $isFirstCategoryService == 1 && $isAccordionEnabled == 'on' ){
            echo '<div class="booknetic_category_accordion active" data-accordion="on">';
        }

		echo '<div data-parent="'.$isFirstCategoryService .'" class="booknetic_service_category  booknetic_fade">' . htmlspecialchars($serviceInf['category_name']) . '<span data-parent="'. $isFirstCategoryService .'"></span></div>';
		$lastCategoryPrinted = $serviceInf['category_id'];
        $isFirstCategoryService = 0;
	}
	?>
        <div class="booknetic_service_card demo booknetic_fade" data-id="<?php echo $serviceInf[ 'id' ]; ?>" data-is-recurring="<?php echo (int) $serviceInf[ 'is_recurring' ]; ?>" data-has-extras="<?php echo $serviceInf[ 'extras_count' ] > 0 ? 'true':'false'; ?>">
        <div class="booknetic_service_card_header">
            <div class="booknetic_service_card_image">
                <img src="<?php echo Helper::profileImage( $serviceInf[ 'image' ], 'Services' ); ?>">
            </div>

            <div class="booknetic_service_card_title">
                <span><?php echo $serviceInf[ 'name' ]; ?></span>
                <span <?php echo $serviceInf[ 'hide_duration' ] == 1 ? 'class="booknetic_hidden"' : ''; ?>><?php echo Helper::secFormat( $serviceInf[ 'duration' ] * 60 ); ?></span>
            </div>

            <div class="booknetic_service_card_price <?php echo $serviceInf[ 'hide_price' ] == 1 ? 'booknetic_hidden' : ''; ?>">
                <?php echo Helper::price( $serviceInf[ 'real_price' ] == -1 ? $serviceInf[ 'price' ] : $serviceInf[ 'real_price' ] ); ?>
            </div>
        </div>

        <div class="booknetic_service_card_description">
            <?php echo Helper::cutText( $serviceInf[ 'notes' ], 200 ); ?>
        </div>
    </div>


	<?php


    array_shift($servicesLeftToPrint);

    foreach ($servicesLeftToPrint AS $key => $checkForCategory ) {

        if ( $isAccordionEnabled != 'on' ) break;

        if ( $checkForCategory['category_id'] == $lastCategoryPrinted ) break;

        $servicesLeft++;

        if ( $servicesLeft == 1 && $lastCategoryPrinted == $checkForCategory['category_parent_id'] ) {
            $servicesLeft = 0;
            break;
        }

        if ( $checkForCategory != end($servicesLeftToPrint) ) continue;

        echo '</div>';
        $servicesLeft = 0;
        $isFirstCategoryService = 1;
    }

}


do_action('bkntc_service_step_footer', $parameters['services']);

echo '</div>';
}
