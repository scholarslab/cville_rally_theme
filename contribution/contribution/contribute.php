<?php
/**
 * @version $Id$
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 * @copyright Center for History and New Media, 2010
 * @package Contribution
 */

queue_js_file(array('contribution-public-form','date'));
$contributionPath = get_option('contribution_page_path');
if(!$contributionPath) {
    $contributionPath = 'contribution';
}
queue_css_file(array('jquery-ui','form'));

//load user profiles js and css if needed
if(get_option('contribution_user_profile_type') && plugin_is_active('UserProfiles') ) {
    queue_js_file('admin-globals');
    queue_js_file('tiny_mce', 'javascripts/vendor/tiny_mce');
    queue_js_file('elements');
    queue_css_string("input.add-element {display: block}");
}

$head = array('title' => 'Contribute Materials',
              'bodyclass' => 'contribution');
echo head($head); ?>
<script type="text/javascript">
// <![CDATA[
enableContributionAjaxForm(<?php echo js_escape(url($contributionPath.'/type-form')); ?>);
// ]]>
</script>

<div id="primary">
<?php echo flash(); ?>

    <h1><?php echo $head['title']; ?></h1>

    <?php if(! ($user = current_user() )
              && !(get_option('contribution_open') )
            ):
    ?>
        <?php $session = new Zend_Session_Namespace;
              $session->redirect = absolute_url();
        ?>
        <p>You must <a href='<?php echo url('guest-user/user/register'); ?>'>create an account</a> or <a href='<?php echo url('guest-user/user/login'); ?>'>log in</a> before contributing. You can still leave your identity to site visitors anonymous.</p>
    <?php else: ?>
    <div id="contribution-introduction">
		<p>This form is for submission of <em><strong>your personal digital documentation</strong></em> related to the events around August 12, 2017 in Charlottesville, VA.</p>
		<p>If you have a large number of items, or large-sized files (like video) to contribute:</p>
		<ul>
		<li><strong>The best way to submit materials is through the Collection Form below.</strong> If your file is too big to upload, please contact us at <a href="mailto:digital_collecting@virginia.edu">digital_collecting@virginia.edu</a> and we’ll be happy to help.</li>
		<li>If you have a large number of files to submit and you'd rather not use the individual uploader, you can instead use the Collection Form below to provide us with a URL for an album or file location (i.e. Dropbox folder, Flickr album, etc.).
		<ul>
		<li><em><strong>Note:</strong>&nbsp;We will make our best effort to capture media linked in submitted URLs but, due to high volume, we cannot fully commit to capturing all materials received in this way.&nbsp;</em></li>
		</ul>
		</li>
		</ul>

		<p>If you wish to donate physical materials, please <a href="mailto:mas5by@virginia.edu?subject=Donating physical materials to Rally collection">contact Special Collections</a> directly. To nominate <em>other people's online work</em> for capture, <a href="https://docs.google.com/forms/d/e/1FAIpQLSdWD06gQiZ35z_HB57sulIV_BRdfGakcTCzO9fVn4Sc8INRwQ/viewform">please use our URL capture form</a>.</p>

		<p>Questions? Contact <a href="mailto:digital_collecting@virginia.edu">digital_collecting@virginia.edu</a>.&nbsp;</p>
	</div>
		<h2>Collection Form</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <fieldset id="contribution-item-metadata">
                <div class="inputs">
                    <label for="contribution-type"><?php echo __("What type of item do you want to contribute?"); ?></label>
                    <?php $options = get_table_options('ContributionType' ); ?>
                    <?php $typeId = isset($type) ? $type->id : '' ; ?>
                    <?php echo $this->formSelect( 'contribution_type', $typeId, array('multiple' => false, 'id' => 'contribution-type') , $options); ?>
                    <input type="submit" name="submit-type" id="submit-type" value="Select" />
                </div>
                <div id="contribution-type-form">
                <?php if(isset($type)) { include('type-form.php'); }?>
                </div>
            </fieldset>

            <fieldset id="contribution-confirm-submit" <?php if (!isset($type)) { echo 'style="display: none;"'; }?>>
                <?php if(isset($captchaScript)): ?>
                    <div id="captcha" class="inputs"><?php echo $captchaScript; ?></div>
                <?php endif; ?>
                <div class="inputs">
                    <?php $public = isset($_POST['contribution-public']) ? $_POST['contribution-public'] : 1; ?>
                    <?php echo $this->formCheckbox('contribution-public', $public, null, array('1', '0')); ?>
                    <?php echo $this->formLabel('contribution-public', __('You may share my contribution publicly. Uncheck to share only with Library-approved researchers.')); ?>
                </div>
                <div class="inputs">
                    <?php $anonymous = isset($_POST['contribution-anonymous']) ? $_POST['contribution-anonymous'] : 0; ?>
                    <?php echo $this->formCheckbox('contribution-anonymous', $anonymous, null, array(1, 0)); ?>
                    <?php echo $this->formLabel('contribution-anonymous', __("Do not display my name publicly. Note: If you provide your name, we are able to hide it from any resulting public exhibitions. However, we are not able to guarantee full anonymity. ")); ?>
                </div>
                <p><?php echo __("In order to contribute, you must read and agree to the %s",  "<a href='" . contribution_contribute_url('terms') . "' target='_blank'>" . __('Terms and Conditions') . ".</a>"); ?></p>
                <div class="inputs">
                    <?php $agree = isset( $_POST['terms-agree']) ?  $_POST['terms-agree'] : 0 ?>
                    <?php echo $this->formCheckbox('terms-agree', $agree, null, array('1', '0')); ?>
                    <?php echo $this->formLabel('terms-agree', __('I agree to the Terms and Conditions.')); ?>
                </div>
                <?php echo $this->formSubmit('form-submit', __('Contribute'), array('class' => 'submitinput')); ?>
            </fieldset>
            <?php echo $csrf; ?>
        </form>
    <?php endif; ?>
</div>
<?php echo foot();
