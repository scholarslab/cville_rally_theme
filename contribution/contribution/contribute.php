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
<p>This form is for submission of <em><strong>your personal digital documentation</strong></em> related to the events around August 12, 2017 in Charlottesville, VA.</p>
<p>If you wish to donate physical materials, please <a href="https://small.lib.virginia.edu/reference-request/">contact Special Collections</a> directly. To nominate <em>other people's online work</em> for capture, <a href="https://docs.google.com/forms/d/e/1FAIpQLSdWD06gQiZ35z_HB57sulIV_BRdfGakcTCzO9fVn4Sc8INRwQ/viewform">please use our URL capture form</a>.</p>
<p>If you have a large number of items, or large-sized files to contribute:</p>
<ul>
<li><strong>The best way to submit materials is through the form below.</strong> If your file is too big to upload, please contact us at <a href="mailto:digital_collecting@virginia.edu">digital_collecting@virginia.edu</a> and we’ll be happy to help.</li>
<li>If you have a large number of files to submit and you'd rather not use the individual uploader below, you can instead use the form below to provide us with a URL for an album or file location (i.e. Dropbox folder, Flickr album, etc.).</li>
<li><em><strong>Note:</strong> We will make our best effort to capture media submitted through the linked form above but, due to high volume, we cannot fully commit to scraping all materials received in this way.  </em></li>
</ul>
</div>
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
                    <?php $public = isset($_POST['contribution-public']) ? $_POST['contribution-public'] : 0; ?>
                    <?php echo $this->formCheckbox('contribution-public', $public, null, array('1', '0')); ?>
                    <?php echo $this->formLabel('contribution-public', __('You may share my contribution publicly. Uncheck to share only with approved researchers.')); ?>
                </div>
                <div class="inputs">
                    <?php $anonymous = isset($_POST['contribution-anonymous']) ? $_POST['contribution-anonymous'] : 0; ?>
                    <?php echo $this->formCheckbox('contribution-anonymous', $anonymous, null, array(1, 0)); ?>
                    <?php echo $this->formLabel('contribution-anonymous', __("Do not display my <em>name</em> publicly. <strong>Note:</strong> If you provide your name, we are able to hide it from any resulting public exhibitions. However, <strong>we are not able to guarantee full anonymity</strong>. ")); ?>
                </div>
                <p><?php echo __("In order to contribute, you must read and agree to the %s",  "<a href='" . contribution_contribute_url('terms') . "'>" . __('Terms and Conditions') . ".</a>"); ?></p>
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
