rm -rf ./generated/*
rm -rf ./var/cache/*
rm -rf ./var/tmp/*
rm -rf ./var/page_cache/*
rm -rf ./var/view_preprocessed/*

bin/magento cache:clean
clear
