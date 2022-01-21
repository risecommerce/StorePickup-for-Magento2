# Magento 2 Store Pickup Shipping Method module
This module for Magento 2 ‘Store Pickup’ shipping method that is used to provide customer to pick their order from store near them.

### Installation:

Download the source code and extract to app/code/Risecommerce folder.

And run the following command.


`php bin/magento cache:clean`

`php bin/magento module:enable Risecommerce_StorePickup`

`php bin/magento setup:upgrade`

`php bin/magento cache:flush`

`php bin/magento setup:static-content:deploy -f`

`php bin/magento setup:di:compile` //in production mode



Please let me know if you have any query or issue regarding the module.

OR 

Run the composer require command.
`composer require risecommerce/store-pickup`


For More Free Extension please visit: https://store.risecommerce.com

For Any Support please join me on chat at https://risecommerce.com/
