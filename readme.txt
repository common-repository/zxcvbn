=== Zxcvbn ===
Contributors: Otto42
Tags: zxcvbn, password, strength, indicator, dropbox
Requires at least: 3.5.1
Tested up to: 3.7
Stable tag: trunk
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A Better Password Strength indicator

== Description ==

Note: WordPress 3.7 now includes the zxcvbn library itself. This plugin will do nothing at all on WordPress 3.7+ installations.

WordPress has a built-in indicator of "password strength". This indicator is limited in its ability to properly show what is a "good" vs. a "bad" password.

In 2012, Dropbox came up with a library called "zxcvbn", which is a password strength indicator that takes a lot more possible attacks into account, including dictionary attacks. This is an implementation of that library as a WordPress plugin.

There is no interface or options screen for this plugin. Simply activate it and the normal password strength indicators in WordPress will now use the Zxcvbn library instead. You'll notice that it is much more difficult to get a "green" color in those indicators now, since dictionary based words will get recognized by the underlying checks.

More information on the Zxcvbn library can be found here:

* https://tech.dropbox.com/2012/04/zxcvbn-realistic-password-strength-estimation/
* https://github.com/lowe/zxcvbn

Note: The Zxcvbn library is licensed under the BSD license. See the LICENSE.txt for more information on licensing.

== Upgrade Notice ==

= 1.2 =
Includes code to self-disable on WordPress 3.7 installations. For WordPress 3.7 and up, you should deactivate and remove this plugin.

== Changelog ==

= 1.2 =
* Added code to disable plugin in WordPress 3.7 and up.

= 1.1 =
* Fixed localization problem. Props desrosj.

= 1.0 =
* First version.
