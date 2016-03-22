<?php if(!defined('KIRBY')) exit ?>

title: Product subcategory

icon: folder
pages:
    hide: true
    template:
        - product

files: false

fields:
    title:
        label: Subcategory title
        type: text
    products:
        label: Products
        type: subpagelist
    text:
        label: Category description
        type: textarea
        buttons: false
    tags:
        label: Tags
        type: tags
