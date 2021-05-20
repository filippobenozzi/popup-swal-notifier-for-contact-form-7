<?php function popupnotifiercf7_options_page() { ?>

  <div class="wrap">
    <h1>Popup Message Notifier for Contact Form 7</h1>
    <form method="post" action="options.php">

        <?php settings_fields( 'popupnotifiercf7_options_group' ); ?>
        <?php $popupnotifiercf7_option_isAutoClose = (int)get_option('popupnotifiercf7_option_isAutoClose'); ?>
        <?php $popupnotifiercf7_option_customSeconds = (int)get_option('popupnotifiercf7_option_customSeconds'); ?>
        <?php $popupnotifiercf7_option_customTextButton = get_option('popupnotifiercf7_option_customTextButton'); ?>

        <p>Some text here.</p>
        
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">Auto-close</th>
                    <td>
                        <label><input type="radio" name="popupnotifiercf7_option_isAutoClose" value="1" <?= (($popupnotifiercf7_option_isAutoClose || !isset($popupnotifiercf7_option_isAutoClose)) ? 'checked' : '' ) ?> /> Yes</label> &nbsp;
                        <label><input type="radio" name="popupnotifiercf7_option_isAutoClose" value="0" <?= (!$popupnotifiercf7_option_isAutoClose ? 'checked' : '' ) ?> /> No</label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Seconds</th>
                    <td>
                        <?php
                            if ( get_option( 'popupnotifiercf7_option_customSeconds' ) === false ){
                                update_option( 'popupnotifiercf7_option_customSeconds', '2500' );
                            }
                        ?>
                        <input type="number" name="popupnotifiercf7_option_customSeconds" value="<?= ($popupnotifiercf7_option_customSeconds) ? $popupnotifiercf7_option_customSeconds : '2500' ?>" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Button text</th>
                    <td>
                        <?php
                            if ( get_option( 'popupnotifiercf7_option_customTextButton' ) === false ){
                                update_option( 'popupnotifiercf7_option_customTextButton', 'Close' );
                            }
                        ?>
                        <input type="text" name="popupnotifiercf7_option_customTextButton" value="<?= ($popupnotifiercf7_option_customTextButton) ? $popupnotifiercf7_option_customTextButton : 'Close' ?>" />
                    </td>
                </tr>
            </tbody>
        </table>
        <?php  submit_button(); ?>
    </form>
  </div>

<?php } ?>