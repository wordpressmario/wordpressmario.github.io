<?php

defined( 'ABSPATH' ) or die();

use BookneticApp\Providers\Helpers\Helper;
use BookneticApp\Providers\Helpers\Date;use BookneticApp\Providers\Core\Permission;

?>
<div id="booknetic_settings_area">
	<link rel="stylesheet" href="<?php echo Helper::assets('css/general_settings.css', 'Settings')?>">
	<script type="application/javascript" src="<?php echo Helper::assets('js/general_settings.js', 'Settings')?>"></script>

	<div class="actions_panel clearfix">
		<button type="button" class="btn btn-lg btn-success settings-save-btn float-right"><i class="fa fa-check pr-2"></i> <?php echo bkntc__('SAVE CHANGES')?></button>
	</div>

	<div class="settings-light-portlet">
		<div class="ms-title">
			<?php echo bkntc__('General settings')?>
		</div>
		<div class="ms-content">

			<form class="position-relative">

				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="input_timeslot_length"><?php echo bkntc__('Time slot length')?>:</label>
						<select class="form-control" id="input_timeslot_length">
							<?php
							foreach ( [1,2,3,4,5,10,12,15,20,25,30,35,40,45,50,55,60,90,120,180,240,300] AS $minute )
							{
								?>
								<option value="<?php echo $minute?>"<?php echo Helper::getOption('timeslot_length', '5')==$minute ? ' selected':''?>><?php echo Helper::secFormat($minute*60)?></option>
								<?php
							}
							?>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="input_slot_length_as_service_duration"><?php echo bkntc__('Set slot length as service duration')?>:</label>
						<select class="form-control" id="input_slot_length_as_service_duration">
							<option value="0"<?php echo Helper::getOption('slot_length_as_service_duration', '0')=='0' ? ' selected':''?>><?php echo bkntc__('Disabled')?></option>
							<option value="1"<?php echo Helper::getOption('slot_length_as_service_duration', '0')=='1' ? ' selected':''?>><?php echo bkntc__('Enabled')?></option>
						</select>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="input_min_time_req_prior_booking"><?php echo bkntc__('Minimum time requirement prior to booking')?>:</label>
						<select class="form-control" id="input_min_time_req_prior_booking">
							<option value="0"<?php echo Helper::getOption('min_time_req_prior_booking', '0')=='0' ? ' selected':''?>><?php echo bkntc__('Disabled')?></option>
							<?php
							foreach ( [1,2,3,4,5,10,15,20,25,30,35,40,45,50,55,60,90,120,180,240,300,360,420,480,540,600,660,720,1440,2880,4320,5760,7200,8640,10080,11520,12960,14400,15840,17280,18720,20160,21600,23040,24480,25920,27360,28800,30240,31680,33120,34560,36000,37440,38880,40320,41760,43200] AS $minute )
							{
								?>
								<option value="<?php echo $minute?>"<?php echo Helper::getOption('min_time_req_prior_booking', '0')==$minute ? ' selected':''?>><?php echo Helper::secFormat($minute*60)?></option>
								<?php
							}
							?>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="input_available_days_for_booking"><?php echo bkntc__('Limited booking days')?>:</label>
						<input type="number" class="form-control" id="input_available_days_for_booking" min="0" value="<?php echo (int)Helper::getOption('available_days_for_booking', '365')?>">
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="input_week_starts_on"><?php echo bkntc__('Week starts on')?>:</label>
						<select class="form-control" id="input_week_starts_on">
							<option value="sunday"<?php echo Helper::getOption('week_starts_on', 'sunday')=='sunday' ? ' selected':''?>><?php echo bkntc__('Sunday')?></option>
							<option value="monday"<?php echo Helper::getOption('week_starts_on', 'sunday')=='monday' ? ' selected':''?>><?php echo bkntc__('Monday')?></option>
						</select>
					</div>

					<div class="form-group col-md-3">
						<label for="input_date_format"><?php echo bkntc__('Date format')?>:</label>
						<select class="form-control" id="input_date_format">
							<option value="Y-m-d"<?php echo Helper::getOption('date_format', 'Y-m-d')=='Y-m-d' ? ' selected':''?>><?php echo date('Y-m-d')?> [ Y-m-d ]</option>
							<option value="m/d/Y"<?php echo Helper::getOption('date_format', 'Y-m-d')=='m/d/Y' ? ' selected':''?>><?php echo date('m/d/Y')?> [ m/d/Y ]</option>
							<option value="d-m-Y"<?php echo Helper::getOption('date_format', 'Y-m-d')=='d-m-Y' ? ' selected':''?>><?php echo date('d-m-Y')?> [ d-m-Y ]</option>
							<option value="d/m/Y"<?php echo Helper::getOption('date_format', 'Y-m-d')=='d/m/Y' ? ' selected':''?>><?php echo date('d/m/Y')?> [ d/m/Y ]</option>
							<option value="d.m.Y"<?php echo Helper::getOption('date_format', 'Y-m-d')=='d.m.Y' ? ' selected':''?>><?php echo date('d.m.Y')?> [ d.m.Y ]</option>
						</select>
					</div>
					<div class="form-group col-md-3">
						<label for="input_time_format"><?php echo bkntc__('Time format')?>:</label>
						<select class="form-control" id="input_time_format">
							<option value="H:i"<?php echo Helper::getOption('time_format', 'H:i')=='H:i' ? ' selected':''?>><?php echo bkntc__('24 hour format')?></option>
							<option value="h:i A"<?php echo Helper::getOption('time_format', 'H:i')=='h:i A' ? ' selected':''?>><?php echo bkntc__('12 hour format')?></option>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="input_default_appointment_status"><?php echo bkntc__('Default appointment status')?>:</label>
						<select class="form-control" id="input_default_appointment_status">
                            <?php foreach (Helper::getAppointmentStatuses() as $k => $v): ?>
                                <option value="<?php echo $k ?>"<?php echo Helper::getDefaultAppointmentStatus() == $k ? ' selected':''?>><?php echo $v['title'] ?></option>
                            <?php endforeach; ?>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>&nbsp;</label>
						<div class="form-control-checkbox">
							<label for="input_client_timezone_enable"><?php echo bkntc__('Show time slots in client time-zone')?>:</label>
							<div class="fs_onoffswitch">
								<input type="checkbox" class="fs_onoffswitch-checkbox" id="input_client_timezone_enable"<?php echo Helper::getOption('client_timezone_enable', 'off')=='on'?' checked':''?>>
								<label class="fs_onoffswitch-label" for="input_client_timezone_enable"></label>
							</div>
						</div>
					</div>
				</div>

                <div class="form-row">
                    <?php if( ! Helper::isSaaSVersion() ):?>
                    <div class="form-group col-md-6">
                        <label for="input_change_status_page_id"><?php echo bkntc__('Change Appointment Status Page')?>:</label>
                        <select class="form-control" id="input_change_status_page_id">
                            <?php foreach ( get_pages() AS $page ) : ?>
                                <option value="<?php echo htmlspecialchars($page->ID)?>"<?php echo Helper::getOption('change_status_page_id', '', false) == $page->ID ? ' selected' : ''?>><?php echo htmlspecialchars(empty($page->post_title) ? '-' : $page->post_title)?> (ID: <?php echo $page->ID?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?php endif;?>
                    <div class="form-group col-md-6">
                        <label for="input_time_restriction_to_change_appointment_status"><?php echo bkntc__('Link expires after')?>:</label>
                        <select class="form-control" id="input_time_restriction_to_change_appointment_status">
                            <option value="0"<?php echo Helper::getOption('rating_url_expires', '0')=='0' ? ' selected':''?>><?php echo bkntc__('Disabled')?></option>
                            <?php
                            foreach ( [1,2,3,4,5,10,15,20,25,30,35,40,45,50,55,60,90,120,180,240,300,360,420,480,540,600,660,720,1440,2880,4320,5760,7200,8640,10080,11520,12960,14400,15840,17280,18720,20160,21600,23040,24480,25920,27360,28800,30240,31680,33120,34560,36000,37440,38880,40320,41760,43200] AS $minute )
                            {
                                ?>
                                <option value="<?php echo $minute?>"<?php echo Helper::getOption('time_restriction_to_change_status', '0')==$minute ? ' selected':''?>><?php echo Helper::secFormat($minute*60)?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

				<?php if( ! Helper::isSaaSVersion() ):?>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="input_google_maps_api_key"><?php echo bkntc__('Google Maps API Key')?>:</label>
						<input class="form-control" id="input_google_maps_api_key" value="<?php echo Helper::getOption('google_maps_api_key', '');?>">
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label>&nbsp;</label>
						<div class="form-control-checkbox">
							<label for="input_google_recaptcha"><?php echo bkntc__('Activate Google reCAPTCHA')?>:</label>
							<div class="fs_onoffswitch">
								<input type="checkbox" class="fs_onoffswitch-checkbox" id="input_google_recaptcha"<?php echo Helper::getOption('google_recaptcha', 'off')=='on'?' checked':''?>>
								<label class="fs_onoffswitch-label" for="input_google_recaptcha"></label>
							</div>
						</div>
					</div>
					<div class="form-group col-md-3" data-hide-key="recaptcha">
						<label for="input_google_recaptcha_site_key"><?php echo bkntc__('Site Key')?>:</label>
						<input type="text" class="form-control" id="input_google_recaptcha_site_key" value="<?php echo Helper::getOption('google_recaptcha_site_key', '')?>">
					</div>
					<div class="form-group col-md-3" data-hide-key="recaptcha">
						<label for="input_google_recaptcha_secret_key"><?php echo bkntc__('Secret Key')?>:</label>
						<input type="text" class="form-control" id="input_google_recaptcha_secret_key" value="<?php echo Helper::getOption('google_recaptcha_secret_key', '')?>">
					</div>
				</div>
				<?php endif;?>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-control-checkbox">
                            <label for="input_allow_admins_to_book_outside_working_hours"><?php echo bkntc__('Allow admins to book appointments outside working hours')?>:</label>
                            <div class="fs_onoffswitch">
                                <input type="checkbox" class="fs_onoffswitch-checkbox" id="input_allow_admins_to_book_outside_working_hours"<?php echo Helper::getOption('allow_admins_to_book_outside_working_hours', 'off')=='on'?' checked':''?>>
                                <label class="fs_onoffswitch-label" for="input_allow_admins_to_book_outside_working_hours"></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-control-checkbox">
                            <label for="input_only_registered_users_can_book"><?php echo bkntc__('Only registered users can book')?>:</label>
                            <div class="fs_onoffswitch">
                                <input type="checkbox" class="fs_onoffswitch-checkbox" id="input_only_registered_users_can_book"<?php echo Helper::getOption('only_registered_users_can_book', 'off')=='on'?' checked':''?>>
                                <label class="fs_onoffswitch-label" for="input_only_registered_users_can_book"></label>
                            </div>
                        </div>
                    </div>
                    <?php if ( ! Helper::isSaaSVersion() ) : ?>
                    <div class="form-group col-md-6">
                        <div class="form-control-checkbox">
                            <label for="input_new_wp_user_on_new_booking"><?php echo bkntc__('Create a new wordpress user on new booking')?>:</label>
                            <div class="fs_onoffswitch">
                                <input type="checkbox" class="fs_onoffswitch-checkbox" id="input_new_wp_user_on_new_booking"<?php echo Helper::getOption('new_wp_user_on_new_booking', 'off')=='on'?' checked':''?>>
                                <label class="fs_onoffswitch-label" for="input_new_wp_user_on_new_booking"></label>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="form-row">
				    <?php if( Helper::isSaaSVersion() && \BookneticApp\Providers\Core\Capabilities::tenantCan('remove_branding') ):?>
						<div class="form-group col-md-6">
							<div class="form-control-checkbox">
								<label for="input_remove_branding"><?php echo bkntc__('Remove branding')?>:</label>
								<div class="fs_onoffswitch">
									<input type="checkbox" class="fs_onoffswitch-checkbox" id="input_remove_branding"<?php echo Helper::getOption('remove_branding', 'off')=='on'?' checked':''?>>
									<label class="fs_onoffswitch-label" for="input_remove_branding"></label>
								</div>
							</div>
						</div>
				    <?php endif;?>
                </div>

				<?php if( Helper::isSaaSVersion() ):?>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="input_timezone"><?php echo bkntc__('Timezone')?>:</label>
						<select class="form-control" id="input_timezone">
							<?php echo wp_timezone_choice( Date::getTimeZoneStringWP(), get_user_locale() ); ?>
						</select>
					</div>
				</div>
				<?php endif;?>

			</form>

		</div>
	</div>
</div>