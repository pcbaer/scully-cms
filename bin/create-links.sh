#!/bin/sh

echo Creating Bootstrap CSS links...
rm -f public/css/bootstrap.*
ln -s ../../vendor/twbs/bootstrap/dist/css/bootstrap.css public/css/bootstrap.css
ln -s ../../vendor/twbs/bootstrap/dist/css/bootstrap.css.map public/css/bootstrap.css.map
ln -s ../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css public/css/bootstrap.min.css
ln -s ../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css.map public/css/bootstrap.min.css.map

echo Creating Bootstrap JS links...
rm -f public/js/bootstrap.*
ln -s ../../vendor/twbs/bootstrap/dist/js/bootstrap.min.js public/js/bootstrap.bundle.min.js
ln -s ../../vendor/twbs/bootstrap/dist/js/bootstrap.min.js.map public/js/bootstrap.bundle.min.js.map

echo Creating jQuery links...
rm -f public/js/jquery.*
ln -s ../../vendor/components/jquery/jquery.slim.min.js public/js/jquery.slim.min.js
ln -s ../../vendor/components/jquery/jquery.slim.min.map public/js/jquery.slim.min.map

echo Creating TinyMCE links...
rm -f public/js/tinymce
ln -s ../../vendor/tinymce/tinymce public/js/tinymce
