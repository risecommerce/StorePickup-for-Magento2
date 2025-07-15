# Store Pickup Extension  

This  [Magento 2 Store Pickup Custom Shipping extension](https://risecommerce.com/store/store-pickup-shipping.html) extention by Risecommerce that is used to provide customer to pick their order from store near them.

For more details about the extension, visit the [Magento 2 Store Pickup Custom Shipping extension](https://risecommerce.com/store/store-pickup-shipping.html).

If you're looking to enhance your Magento store further, consider hiring a [dedicated Magento developer](https://risecommerce.com/hire-dedicated-magento-developer.html).

For support or inquiries, please visit our [contact page](https://risecommerce.com/contact).

## Support  
- **Magento versions:** 2.3.x, 2.4.x  

## How to Install the Extension  

### Method I: Manual Installation  

1. Download the archive file.  
2. Unzip the file.  
3. Create a folder at `[Magento_Root]/app/code/Risecommerce/StorePickup`.  
4. Move the unzipped files to the directory `[Magento_Root]/app/code/Risecommerce/StorePickup`.  

### Method II: Using Composer  

Run the following command:  

composer require risecommerce/store-pickup

#Enable Extension:
- php bin/magento module:enable Risecommerce_StorePickup
- php bin/magento setup:upgrade
- php bin/magento setup:di:compile
- php bin/magento setup:static-content:deploy
- php bin/magento cache:flush

#Disable Extension:
- php bin/magento module:disable Risecommerce_StorePickup
- php bin/magento setup:upgrade
- php bin/magento setup:di:compile
- php bin/magento setup:static-content:deploy
- php bin/magento cache:flush

