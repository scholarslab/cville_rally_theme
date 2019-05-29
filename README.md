# cville_rally_theme
Omeka theme for Charlottesville rally archive

# Custom Omeka Theme: Installation and Configuration Guide

Our [Digital Collecting](http://digitalcollecting.lib.virginia.edu/rally/) site uses a custom Omeka Theme: [Charlottesville Rally Theme](https://github.com/scholarslab/cville_rally_theme). We developed this theme specifically for use in digital collecting sites, making it simple to customize the content and appearance of your public site directly from your Omeka Dashboard - no coding knowledge required.


## Steps for Installing our Custom Theme

1. Download and unzip our [custom theme from Github](https://github.com/scholarslab/cville_rally_theme). Download the .zip file to your desktop for easy retrieval. 

2. Locate your Omeka installation and login to access your site.

3. Navigate to your Omeka folder (this should have the same name as your Omeka install)

4. Open your Omeka folder and locate the '/themes' folder within.

5. Copy or move the unzipped 'cville_rally_theme' folder from your desktop (or from where you saved this folder) and place it within the 'omeka/themes' folder located in step #4.

6. Log in to your Omeka admin panel (found at the url: 'your-site-url/admin'), and click on the 'Appearance' option in the top navigation bar.

7. The custom theme should now be installed and visible (see screenshot below). If not, double-check that the folder is in the right location ('/themes') and that the folder name for the theme does not start with 'theme-'. 
    
    ![Screenshot of Omeka Theme Admin](https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/omeka-theme.png)

8. Click on "Configure Theme" to customize your site's appearance. See the next section for details on configuration settings.


For more detailed instructions on installing an Omeka theme, see the related [Omeka Documentation](https://omeka.org/classic/docs/Admin/Appearance/Themes/).

## Configuration Settings

To add your site-specific content and customize your site's color scheme, begin at step #6 above: Log into your Omeka Admin panel, and click on the 'Appearance' option in the top navigation bar. Next select "Configure Theme" to access the theme settings (see screenshot in step #7 above).

You should now be on the Theme Configuration page:

![Screen shot of Theme Configuration page](https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/theme-config.png)

### Customize your Site's Color Scheme
Use this section to customize your site's color scheme. These boxes will automatically fill in with our UVA theme colors, you can change them for your site. You must use a six-character hexadecimal color value, including the `#`.

<img src="https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/theme-colors.png" alt="Screen shot of Theme Configuration page" width="600rem"/>

- **Header Color**: Determines the color of the widest section of the page header, as well as the overlay color of the homepage's [banner image](#homepage-banner)
- **Header Text Color**: Determines the color of the text in the widest section of the page header, specifically, the text you provide in the **Header Site Title** and **Header Tagline Text** in the [Header and Footer](#header-and-footer-content) content section, and the [Homepage Banner Introduction Text](#homepage-banner). 
- **Navigation Background Color**: Determines the color of the primary navigation bar, the Omeka login bar along the top of the page, and the page footer.
- **Navigation Text Color**: Determines the color of the text in the sections listed above. The color of the navigation links in the footer, and the Omeka login links in top admin bar, are set to be a shade darker than the color given here, and show full brightness when you hover over these links. For instructions on how to customize your site's navigation, see [here](https://scholarslab.github.io/digital-collect-toolkit/docs/omeka-setup/omeka-admin#customizing-site-navigation)
- **Headings Text Color**: Determines the color of the headings in your site (for html tags h1, h2, h3, h4).

### Header and Footer Content

Use this section to provide content for your site's header and footer. All of these sections are optional, feel free to pick and choose what works best for your site. We recommend including at least the **Header Tagline Text**, as this is the primary heading for your site. 

<img src="https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/theme-settings.png" alt="Screen shot of Theme Configuration page" width="600rem"/>

- **Header Site Title**: This is for an optional secondary title section for your header, this site title is separate from the title of your Omeka site. 
- **Header Tagline Text**: This is the primary header text, we recommend filling this in as it provides the primary level heading used by screen readers.
- **Logo File**: Upload an image file for your site's logo, to be placed in the top right of the header. Your image file should be no larger than 150px in height. This is optional.
- **Logo Link URL**: Provide a URL that your **Logo File** will act as a link for. This is optional, if you leave this blank your logo will not link to anywhere.
- **Logo Image Accessibility Alt Text**: Provide descriptive alt text for your logo image for use with screen readers.
- **Footer Text**: Provide some content for your page footer. This custom theme already provides site navigation in the footer, this box is for additional content.

### Customize your Site's Homepage Content
Use this section to provide content for your site's homepage. All of these sections are optional, pick and choose what works best for your site.

#### Homepage Banner

<img src="https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/theme-setting-banner.png" alt="Screen shot of Theme Configuration page" width="600rem"/>

- **Homepage Banner Background**: Provide an image file to be used on the homepage introduction banner. File must be no larger than 300kb, and will automatically be centered and scaled to fit. Your image will be overlayed with a color gradient, as selected in **Header Color**. 
- **Homepage Banner Introduction Text**: Provide some brief text to display on your banner image. This text will appear in the same color as selected in **Header Text Color**.

    Both the banner image and introduction text are optional, and can be used together or individually. If no image and no text is provided, your site will not have a banner. If you provide introduction text but no image, your text will display over a color gradient banner, the color selected in **Header Color**. If you provide a banner image with no introduction text, your image will not have the color overlay. In this case, if you'd like the color overlay on your image, type in a few blank spaces into the introduction text box (no text, just use your space bar to fill in some blank content).

    | Omeka Admin | Public Site |
|:-------------|:------------------|
| Homepage Banner Background & Introduction Text | ![Screen shot of public homepage banner](https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/banner-1.png) |
| Introduction Text only | ![Screen shot of public homepage banner](https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/banner-2.png) |

#### Homepage Content

Use the following sections for the primary content of your homepage. All of the following sections are optional, please pick and choose what will work best for your site. 

This theme's homepage content can be created with up to four content boxes. The first two are designed for use with a Contribution page (/contribution) and an 'About' page (/about), created with the [Simple Pages](https://scholarslab.github.io/digital-collect-toolkit/docs/omeka-setup/omeka-plugins#simple-pages) plugin. If you do not want to use these content boxes with pre-defined footer links, leave sections *Homepage Content Box #1: About the Archive* and *Homepage Content Box #2: Donate Materials* empty, and these will not appear on your site. 

The other two content boxes, *Homepage Content Box #3* and *Homepage Content Box #4*, do not have any pre-determined footer links and can be used for any type of content. Pick and choose which content boxes you'd like to use for your site, and leave empty any you do not wish to appear. The boxes will automatically resize to fit the screen, and depending on how many you select to use, may stretch across the whole page. 

| Omeka Admin | Public Site |
|:-------------|:------------------|
| ![Screen shot of Omeka Admin theme content](https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/theme-content-1.png) | ![Screen shot of public site content](https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/content-3.png) |
| ![Screen shot of Omeka Admin theme content](https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/theme-content-2.png) | ![Screen shot of public site content](https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/content-1.png) |
| ![Screen shot of Omeka Admin theme content](https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/theme-content-3.png) | ![Screen shot of public site content](https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/content-4.png) |
| ![Screen shot of Omeka Admin theme content](https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/theme-content-4.png) | ![Screen shot of public site content](https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/content-2.png) |

Use the toolbox buttons to format your content, add headings, links, and lists. Our site uses 'Heading 2' (or the h2 tag) for these content box headings. By clicking the 'source code' button, you can edit the html source code directly, if you'd like. Below is an example of our HTML source code:

| HTML | Public Site |
|:------------------|:------------------|
| `<h2>About the Archive</h2><p>Recognizing the significance of events on the weekend of August 12, the University of Virginia Library is building an archive of materials surrounding the “Unite the Right” rally and counter-protests.</p>` | ![Screen shot of public site content](https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/content-3.png) |

#### Optional Featured Content

Check the boxes for additional content to be displayed on your homepage. All of these are optional. You must have featured items, collections and/or exhibits in your Omeka collection for some options to be relevant. 

<img src="https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/theme-settings-6.png" alt="Screen shot of Theme Configuration page" width="600rem"/>

- **Display Featured Items**: Check this box if you wish to show three featured items on the homepage. If you have more than three featured items in your Omeka collection, these will show random featured items each time the site is refreshed.
- **Display Featured Collection**: Check this box if you wish to show a featured collection on the homepage.
- **Display Featured Exhibit**: Check this box if you wish to show a featured exhibit on the homepage. For use with the [Exhibit Builder](https://scholarslab.github.io/digital-collect-toolkit/docs/omeka-setup/omeka-plugins#exhibit-builder) plugin.
- **Display Recent Items**: Check this box if you wish to show recent items to be displayed on the homepage. These will appear in the order in which they were mostly recently added to the archive.

### Contribution Page: Form Submission Instructions and Information

Use the following sections to create content for your public Contribution page. This is the page created by the Contribution plugin, and contains the form for public submissions. Provide instructions and additional information for those contributing materials to your collection. See our page as an example, [here](http://digitalcollecting.lib.virginia.edu/rally/contribution).

<img src="https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/theme-contrib-1.png" alt="Screen shot of Theme Configuration page" width="600rem"/>

In addition to the primary content, you have the option of including a small information box, set on the right-hand side of the page. This is useful for contact information or anything else you'd like to include. Leave this empty if you do not want this content box to appear. See below:

| Omeka Admin | Public Site |
|:-------------|:------------------|
| ![Screen shot of Theme Configuration page](https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/theme-contrib-4.png) | ![Screen shot of public site content](https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/content-5.png) |

#### Contribution Terms of Service: Optional 'Summary of Terms' Box

On your Contribution Terms of Service page, this theme has an option to include a 'Summary of Terms' content box on the right-hand side of the page, to help contributors quickly read and understand the main points of the full terms, in simpler language. This is optional, leave this field empty if you do not want this to appear. 

The complete Terms of Service text is given within the Contribution plugin settings. Contribution is managed from the plugin's tab on the left-hand navigation of the admin dashboard. You can find the field for **Text of Terms of Service** under the 'Submission Settings' tab. See the complete Contribution plugin user guide, [here](https://omeka.org/classic/docs/Plugins/Contribution/).

To use the 'Summary of Terms' box, provide a bullet-pointed list in the field. This box automatically features a heading and (*) footnote. See below:

| Omeka Admin | Public Site |
|:-------------|:------------------|
| ![Screen shot of Theme Configuration page](https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/theme-contrib-5.png) | ![Screen shot of public site content](https://raw.githubusercontent.com/scholarslab/digital-collect-toolkit/master/assets/images/content-6.png) |


