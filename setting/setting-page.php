<?php function popupnotifiercf7_options_page() { ?>

  <div class="wrap">
    <h1>Popup Message Notifier for Contact Form 7</h1>
    <form method="post" action="options.php">

        <?php settings_fields( 'popupnotifiercf7_options_group' ); ?>

        <p>Custom option for sweetalert pop-up.<br /><b>NB.</b> Remeber these option will effect confirm, warning and error alerts.</p>

        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">Auto-Close popup</th>
                    <td>
                        <?php
                            if ( get_option( 'popupnotifiercf7_option_isAutoClose' ) === false ){
                                update_option( 'popupnotifiercf7_option_isAutoClose', '1' );
                            }
                            $popupnotifiercf7_option_isAutoClose = (int)get_option('popupnotifiercf7_option_isAutoClose');
                        ?>
                        <label><input type="radio" name="popupnotifiercf7_option_isAutoClose" value="1" <?= ($popupnotifiercf7_option_isAutoClose ? 'checked' : '' ) ?> /> Enable</label> &nbsp;
                        <label><input type="radio" name="popupnotifiercf7_option_isAutoClose" value="0" <?= (!$popupnotifiercf7_option_isAutoClose ? 'checked' : '' ) ?> /> Disable</label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Close popup button</th>
                    <td>
                        <?php
                            if ( get_option( 'popupnotifiercf7_option_isConfirmButton' ) === false ){
                                update_option( 'popupnotifiercf7_option_isConfirmButton', '0' );
                            }
                            $popupnotifiercf7_option_isConfirmButton = (int)get_option('popupnotifiercf7_option_isConfirmButton');
                        ?>
                        <label><input type="radio" name="popupnotifiercf7_option_isConfirmButton" value="1" <?= ($popupnotifiercf7_option_isConfirmButton ? 'checked' : '' ) ?> /> Enable</label> &nbsp;
                        <label><input type="radio" name="popupnotifiercf7_option_isConfirmButton" value="0" <?= (!$popupnotifiercf7_option_isConfirmButton ? 'checked' : '' ) ?> /> Disable</label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Popup animated icon</th>
                    <td>
                        <?php
                            if ( get_option( 'popupnotifiercf7_option_isShowIcon' ) === false ){
                                update_option( 'popupnotifiercf7_option_isShowIcon', '1' );
                            }
                            $popupnotifiercf7_option_isShowIcon = (int)get_option('popupnotifiercf7_option_isShowIcon');
                        ?>
                        <label><input type="radio" name="popupnotifiercf7_option_isShowIcon" value="1" <?= ($popupnotifiercf7_option_isShowIcon ? 'checked' : '' ) ?> /> Enable</label> &nbsp;
                        <label><input type="radio" name="popupnotifiercf7_option_isShowIcon" value="0" <?= (!$popupnotifiercf7_option_isShowIcon ? 'checked' : '' ) ?> /> Disable</label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Auto-Close Timeout<br/>(in milliseconds)</th>
                    <td>
                        <?php
                            if ( get_option( 'popupnotifiercf7_option_customSeconds' ) === false ){
                                update_option( 'popupnotifiercf7_option_customSeconds', '2500' );
                            }
                            $popupnotifiercf7_option_customSeconds = (int)get_option('popupnotifiercf7_option_customSeconds');
                        ?>
                        <input type="number" name="popupnotifiercf7_option_customSeconds" value="<?= ($popupnotifiercf7_option_customSeconds) ? $popupnotifiercf7_option_customSeconds : '2500' ?>" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Close popup button text</th>
                    <td>
                        <?php
                            if ( get_option( 'popupnotifiercf7_option_customTextButton' ) === false ){
                                update_option( 'popupnotifiercf7_option_customTextButton', 'Close' );
                            }
                            $popupnotifiercf7_option_customTextButton = get_option('popupnotifiercf7_option_customTextButton');
                        ?>
                        <input type="text" maxlength="100" name="popupnotifiercf7_option_customTextButton" value="<?= ($popupnotifiercf7_option_customTextButton) ? $popupnotifiercf7_option_customTextButton : 'Close' ?>" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Close popup button background color</th>
                    <td>
                        <?php
                            if ( get_option( 'popupnotifiercf7_option_customTextButtonBackground' ) === false ){
                                update_option( 'popupnotifiercf7_option_customTextButtonBackground', '#000000' );
                            }
                            $popupnotifiercf7_option_customTextButtonBackground= get_option('popupnotifiercf7_option_customTextButtonBackground');
                        ?>
                        <input type="text" name="popupnotifiercf7_option_customTextButtonBackground" value="<?= ($popupnotifiercf7_option_customTextButtonBackground) ? $popupnotifiercf7_option_customTextButtonBackground : '#000000' ?>" />
                        <script>
                            jQuery(document).ready(function($){
                                jQuery('[name="popupnotifiercf7_option_customTextButtonBackground"]').wpColorPicker();
                            });
                        </script>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php  submit_button(); ?>
    </form>
  </div>

<?php } ?>