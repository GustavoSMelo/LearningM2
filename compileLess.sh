sudo rm -rf ./var/cache/*
echo 'var/cache cleaned'

sudo rm -rf ./var/view_preprocessed/*
echo 'view_preprocess cleaned'

sudo rm -rf ./generated/*
echo 'generated cleaned'

bin/magento deploy:mode:set developer
bin/magento setup:static-content:deploy -f
bin/magento cache:flush

clear

echo 'all done'
