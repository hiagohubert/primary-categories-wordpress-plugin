# Primary Categories Plugin

This plugin was developed to 10up tests;

## Background

Many publishers use categories as a means to logically organize their content.  However, many pieces of content have more than one category. Sometimes it’s useful to designate a primary category for posts (and custom post types). On the front-end, we need the ability to query for posts (and custom post types) based on their primary categories.

## Solution

 This plugin allows publishers to designate a primary category for posts, selecting it in a metabox on edit posts page.
 
 To list the posts by primary category, use the shortcode: 
 
 `[primary-category-posts category="test_category"]`
 Where `test_category` is the name of the category selected as the primary
