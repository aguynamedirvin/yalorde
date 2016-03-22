<?php if(!defined('KIRBY')) exit ?>

title: Shop
icon: shopping-bag

pages:
    hide: true
    template:
        - category

files: false
deletable: false

fields:
    categories:
        label: Categories
        type: subpagelist
    top_categories:
        label: Featured categories
        type: multiselect
        help: Select the categories that you wish to be displayed at the *top* of the homepage.
        options: query
        query:
            fetch: children
            template: category
    bottom_categories:
        label: Categories
        type: multiselect
        help: Select the categories that you wish to be displayed at the *bottom* of the homepage.
        options: query
        query:
            fetch: children
            template: category
    tags:
        label: Tags
        type: tags
