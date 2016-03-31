# Forkel Counter
Add a customizable counter that allows you to count up or down from any number. With a specific option like `collection:catalog/product,from:-30 days,to:now` you can get the size of a predefined collection. This module is using the class [CountUp](https://inorganik.github.io/countUp.js) that works without a JavaScript framework.

### Front-End
![Forkel Counter - Frontend](http://www.tobiasforkel.de/public/magento/forkel_counter/version/1.0/screenshots/frontend/frontend_cms.gif)

A javascript fallback will display a warning message in case of JavaScript issues.

![Forkel Counter - Frontend](http://www.tobiasforkel.de/public/magento/forkel_counter/version/1.0/screenshots/frontend/frontend_fallback.jpg)

### Admin Panel
![Forkel Counter - Backend](http://www.tobiasforkel.de/public/magento/forkel_counter/version/1.0/screenshots/backend/backend_system.jpg)

## Installation
1. Pull the code.
2. Copy the code in your document root directory where the `/app/` folder is located.
4. Clear all caches and reload your Admin Panel to run the installation process.
5. After installation you should see a new menu item `Forkel Counter` inside of `System > Configuration`.

## Features
* Blocks are available for CMS pages and XML layout files.
* Disable or enable JavaScript and CSS in `System > Configuration > General > Forkel Counter` to prevent conflicts with your theme.
* Display a `Front Awesome` icon. 
* Display a custom prefix like `$` or `€`.
* Display a custom suffix.
* Set a number ( `-99` or `99` ) from where the counter should start.
* Set a number ( `290` or `10000` ) where the counter should stop.
* Set the amount of decimals.
* Set the counter duration in seconds.
* Override default options such as `{ "separator" : ",", "decimal" : ".", "useEasing" : true, "useGrouping" : true }`
* Count rows from collections like `sales/order` or `catalog/product` in combination with a date filter. For example:
```html
collection:customer/customer,from:-30 days,to:now
```
* Customizable in `app/design/frontend/base/default/template/forkel/counter/counter.phtml`.

```html
collection:sales/order,from:March 12 2015,to:April 12 2015
```

## Usage
Following parameters are available.

Option | Value | Description
--- | --- | ---
icon | String | Display any icon from [Font Awesome](https://fortawesome.github.io/Font-Awesome/icons/).
prefix | String | Display a custom prefix like `$` or `€`.
suffix | String | Display a custom suffix.
from | Number | Set a number ( `-50` or `99` ) from where the counter should start.
to `*` | Number |  Set a number ( `290` or `10000` ) where the counter should stop.
decimals | Number  | Set the amount of decimals.
duration | Decimal  | Set the counter duration in seconds.
options | JSON  | Override [countUp](https://github.com/inorganik/CountUp.js) options such as `{ "separator" : ",", "decimal" : ".", "useEasing" : true, "useGrouping" : true }`

`*` The parameter allows you to get the size of a collection. Following collections are available to use.

Collection | Field | Syntax
--- | --- | ---
sales/order | Using field `created_at` to filter by datetime | `collection:sales/order,from:March 12 2015,to:April 12 2015`
catalog/product | Using field `created_at` to filter by datetime | `collection:catalog/product,from:-30 days,to:now`
customer/customer | Using field `created_at` to filter by datetime | `collection:customer/customer,from:-90 days,to:-30 days`
customer/session | Using field `login_at` to filter by datetime | `collection:customer/session,from:yesterday,to:now`

Please find more examples below.

## Examples
### All parameters combined
#### - CMS
```html
{{block type="forkel_counter/frontend_counter" className="green" icon="fa-umbrella" prefix="$" suffix="per month" from="0" to="1999" decimals="0" duration="5" options='{ "separator" : ",", "decimal" : ".", "useEasing" : true, "useGrouping" : true }' name="forkel_counter"}}
```
#### - XML
```xml
<block type="forkel_counter/frontend_counter" name="forkel_counter_frontend_counter" after="-">
    <action method="setData">
        <name>className</name><value>forkel_class</value>
    </action>
    <action method="setData">
        <name>icon</name><value>fa-umbrella</value>
    </action>
    <action method="setData">
        <name>prefix</name><value>$</value>
    </action>
        <action method="setData">
        <name>suffix</name><value>per month</value>
    </action>
    <action method="setData">
        <name>from</name><value>0</value>
    </action>
    <action method="setData">
        <name>to</name><value>1999</value>
    </action>
    <action method="setData">
        <name>decimals</name><value>0</value>
    </action>
    <action method="setData">
        <name>duration</name><value>5</value>
    </action>
    <action method="setData">
        <name>options</name><value>{ "separator" : ",", "decimal" : ".", "useEasing" : true, "useGrouping" : true }</value>
    </action>
</block>
```

### Count a number from `0` to `999` in `5` seconds.
#### - CMS

```html
{{block type="forkel_counter/frontend_counter" from="0" to="999" duration="5" name="forkel_counter"}}
```
#### - XML

```xml
<block type="forkel_counter/frontend_counter" name="forkel_counter_frontend_counter" after="-">
    <action method="setData">
        <name>from</name><value>0</value>
    </action>
    <action method="setData">
        <name>to</name><value>999</value>
    </action>
    <action method="setData">
        <name>duration</name><value>5</value>
    </action>
</block>
```
### Count a collection starting from `0` with a prefix `$`. Display the last 30 days.
#### - CMS

```html
{{block type="forkel_counter/frontend_counter" prefix="$" from="0" to="collection:sales/order,from:-30 days,to:now" duration="5" name="forkel_counter"}}
```
#### - XML

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
        <name>duration</name><value>5</value>
    </action>
</block>
```

## Support
If you have any issues with this extension, open an issue on [Github](https://github.com/tobias-forkel/Forkel_Counter/issues). If you need a custom build, please contact me on http://www.tobiasforkel.de.

## Contributing
1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`.
3. Commit your changes: `git commit -am 'Add some feature'`.
4. Push to the branch: `git push origin my-new-feature`.
5. Submit a pull request.

Follow me on [GitHub](https://github.com/tobias-forkel) and [Twitter](https://twitter.com/tobiasforkel).

## History
===== 1.1.0 =====
* Removed jQuery because I have replaced the counter plugin ( https://github.com/bfintal/Counter-Up ) with ( https://inorganik.github.io/countUp.js ) that allows you to count up and down without a JavaScript framework.
* Removed [Waypoints](http://imakewebthings.com/waypoints/). Please add it to your theme manually.
* Added new parameter `decimals` and `duration`.
* Added default counter options in `System > Forkel Counter > General`
* Added new parameter `options` that allows you to set different [CountUp](https://inorganik.github.io/countUp.js) settings for each counter.

===== 1.0.1 =====
* Added optional option `className` for each counter block

===== 1.0.0 =====
* Initial version of this module

## License
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)

