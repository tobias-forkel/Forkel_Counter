# Forkel Counter
Add a customizable counter that allows you to count up to any numeric value. With a specific option like `collection:catalog/product,from:-30 days,to:now` you can get the size of a collection. This module is using a [custom version](https://github.com/tobias-forkel/Counter-Up/tree/feature/counter_settings_from_data_attribute) of [Counter-Up](https://github.com/bfintal/Counter-Up) and the latest version of [Waypoints](http://imakewebthings.com/waypoints) and [jQuery](https://jquery.com/download/).

![Forkel Counter - Frontend](http://www.tobiasforkel.de/public/magento/forkel_counter/version/1.0/screenshots/frontend/frontend_cms.jpg)

![Forkel Counter - Backend](http://www.tobiasforkel.de/public/magento/forkel_counter/version/1.0/screenshots/backend/backend_system.jpg)

## Installation
1. Pull the code.
2. Copy the code in your document root directory where the `/app/` folder is located.
4. Clear all caches and reload your Admin Panel to run the installation process.
5. After installation you should see a new menu item `Forkel Counter` inside of `System > Configuration > General`.

## Features
* Blocks available for CMS pages and XML layout files.
* Disable or enable `Font Awesome`, `jQuery` and `Waypoints` in `System > Configuration > General` to prevent conflicts or use libraries coming from your own template.
* Add a custom class name to display an `Front Awesome` icon. 
* Add a prefix like `$` or `€`.
* Set a numeric ( `3` or `0,00` ) from where the counter should start.
* Set a numeric ( `2341` or `1999,95` ) where the counter should stop.
* Set a duration in milliseconds.
* Set a delay in milliseconds.
* Set a collection like `sales/order` or `catalog/product` to count all its rows. You can add a filter to limit the result based on `created_at` and between two dates. For example: `collection:customer/customer,from:-30 days,to:now` or `collection:sales/order,from:March 12 2015,to:April 12 2015`

## Usage
Following options are available.

Option | Value | Description
--- | --- | ---
from | Numeric value | Start the counter
to* | Numeric value |  Stop the counter
time | Numeric value | Duration between start and stop in milliseconds
delay | Numeric value | Delay per number in milliseconds
prefix | Custom string | At the beginning of the counter
icon | Class name | Set a custom icon based on `Font Awesome`

The option `to` allows you to get the size of a collection. Following collections are available to use.

Collection | Field | Syntax
--- | --- | ---
sales/order | Using field `created_at` to filter by datetime | `collection:sales/order,from:March 12 2015,to:April 12 2015`
catalog/product | Using field `created_at` to filter by datetime | `collection:catalog/product,from:-30 days,to:now`
customer/customer | Using field `created_at` to filter by datetime | `collection:customer/customer,from:-90 days,to:-30 days`
customer/session | Using field `login_at` to filter by datetime | `collection:customer/session,from:yesterday,to:now`

Please see the examples how to setup a counter in CMS pages or XML files.

## Examples
### Count a number from `0` to `999`.

```html
{{block type="forkel_counter/frontend_counter" from="0" to="9,999" time="5000" delay="20" name="forkel_counter"}}
```

```xml
<block type="forkel_counter/frontend_counter" name="forkel_counter_frontend_counter" after="-">
    <action method="setData">
        <name>from</name><value>0</value>
    </action>
    <action method="setData">
        <name>to</name><value>9,999</value>
    </action>
    <action method="setData">
        <name>time</name><value>5000</value>
    </action>
    <action method="setData">
        <name>delay</name><value>20</value>
    </action>
</block>
```
### Count a collection starting from `0` with a prefix `$`. Display rows between the last 30 days and now.

```html
{{block type="forkel_counter/frontend_counter" from="0" to="collection:sales/order,from:-30 days,to:now" time="3000" delay="20" name="forkel_counter"}}
```

```xml
<block type="forkel_counter/frontend_counter" name="forkel_counter_frontend_counter" after="-">
    <action method="setData">
        <name>prefix</name><value>$</value>
    </action>
    <action method="setData">
        <name>from</name><value>0</value>
    </action>
    <action method="setData">
        <name>to</name><value>collection:sales/order,from:-30 days,to:now</value>
    </action>
    <action method="setData">
        <name>time</name><value>5000</value>
    </action>
    <action method="setData">
        <name>delay</name><value>20</value>
    </action>
</block>
```

## Support
If you have any issues with this extension, open an issue on [Github](https://github.com/tobias-forkel/Forkel_Counter/issues).

## Contributing
1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`.
3. Commit your changes: `git commit -am 'Add some feature'`.
4. Push to the branch: `git push origin my-new-feature`.
5. Submit a pull request.

If you need a custom build, please contact me on http://www.tobiasforkel.de. Follow me on [GitHub](https://github.com/tobias-forkel) and [Twitter](https://twitter.com/tobiasforkel).

## History
===== 1.0.0 =====
* Initial version of this module

## License
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)

