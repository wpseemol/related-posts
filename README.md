# Related Posts Plugin

## Description

The **Related Posts Plugin** allows you to display related posts on your WordPress site based on the categories of the current post. It provides customizable settings for administrators to control the visibility, title, and additional features for related posts.

## Features

-   Display related posts dynamically based on categories.
-   Customizable settings via the WordPress admin dashboard:
    -   Show/Hide related posts.
    -   Set a custom title for the related posts section.
    -   Limit the number of words displayed in the content preview.
-   Lightweight and easy to use.

## Installation

1. Download the plugin and upload it to your WordPress `wp-content/plugins` directory.
2. Activate the plugin from the **Plugins** menu in WordPress.
3. Navigate to **Settings > Related Posts** to configure the plugin.

## Usage

1. The plugin automatically hooks into the WordPress `the_content` filter to append related posts to the content of single posts.
2. You can manage the settings via the **Related Posts** admin menu.

## Settings

-   **Show/Hide Related Posts**: Toggle whether the related posts section is displayed.
-   **Related Posts Title**: Set the title displayed above the related posts section.
-   **Content Show Word**: Limit the number of words shown in the related post preview.

## How It Works

1. The plugin retrieves the categories of the current post.
2. It fetches other posts in the same categories, excluding the current post.
3. The related posts are displayed below the content of the current post.

## Template Customization

The related posts section is rendered using a template located at:

```
/includes/templates/related_post_content.php
```

You can modify this file to change the appearance of the related posts.

## Hooks and Filters

-   **Filters**:
    -   `the_content`: The plugin hooks into this filter to append the related posts section.

## Development Notes

-   Settings are stored in the WordPress `wp_options` table under the key `related_posts_options`.
-   Options include:
    -   `show_hidden` (boolean): Whether to show the related posts section.
    -   `title` (string): Custom title for the section.
    -   `show_word` (integer): Number of words to display in the content preview.

## Support

For issues and feature requests, please contact the plugin developer or submit an issue on the repository.

## Changelog

### 1.0.0

-   Initial release with basic functionality for displaying related posts.
-   Admin settings for customization.

---

**Author**: Your Name  
**License**: GPLv2 or later  
**Tags**: related posts, WordPress plugin, content filtering
