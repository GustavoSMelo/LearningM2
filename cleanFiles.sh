rm -rf ./pub/static/frontend/*
rm -rf ./var/cache/*
rm -rf ./var/tmp/*
rm -rf ./var/page_cache/*
rm -rf ./var/view_preprocessed/*

bin/magento cache:clean
clear
