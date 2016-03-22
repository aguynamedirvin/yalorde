<?php if(!defined('KIRBY')) exit ?>

title: Site options

pages: true
    template:
        - default

files: false

fields:
    title:
        label: Site Title
        type: text
    text:
        label: Site Description
        type: textarea
        buttons: false
    message:
        label: Message text
        help: Type in the message that you would like to be displayed at the top of your website.
        type: text
        width: 1/2
    display-message:
        label: Display message?
        type: toggle
        text: yes/no
        width: 1/2
    footer_links:
        label: Footer Navigation Links
        help: Select links to be displayed on the footer
        type: multiselect
        search: true
        options: children
