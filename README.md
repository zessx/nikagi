# 2Keys
![2Keys](https://raw.githubusercontent.com/zessx/2keys/master/assets/images/logo.png)  

## What is 2Keys?
> How should I manage my passwords?

2Keys is a client-side password manager which wants to answer to this everyday question.  
Its purpose is to allow people to easily use a different password for each service, without having to remember them, store them, or worse: write them.

## How does it work?
2Keys takes some input data:
- the password length
- charsets to use (lowercases, uppercases, digits, symbols)
- a public key
- a private key

Then it uses all these data to generate a password, and here come the two main interest of 2Keys:
- the **same input data** generates the **same password**
- everything is generated on the fly, **nothing is stored**

## How should I use 2Keys?
As long as you understand how 2Keys works, your password management policy is up to you!

The most common way to use it would be to use the service name as the public key, and a unique private key. It's worth mentioning this 1Password-like policy requires your strong private key to never, ever be revealed to anyone.

Whatever the way you're using 2Keys, just remember that **your private key must never be guessable from your public key**. This would make the whole process of having various passwords useless.

## How to install it?
Use `git clone`, or download and extract this whole repository on your own server.  
If you're using an URL with a folder into (like `http://host.io/my-folder/`) to use 2Keys, you'll need to edit this `.htaccess` line accordingly:

	RewriteBase /my-folder

You're now ready to use 2Keys!

## 2Keys presets
Here are 2Keys default values for every option:


| Option     | Default value |
|------------|---------------|
| length     | 16            |
| lowercases | true          |
| uppercases | true          |
| digits     | true          |
| symbols    | true          |

You can overwrite these presets by passing them through GET parameters: `http://host.io/my-folder/?public_key=SERVICENAME&symbols=0&length=8`. This allows you to get a quicker access to your passwords.

Now let's take an example. We want to associate the `github` public key to our GitHub password, and as we want it to be secure, we decides to generate a 24-length password. It would be annoying to always have to remember that we chose a 24-length password, but let's have a look on the `.htaccess` file:

	# Shortcuts
	# RewriteRule ^public_key_1$  index.php?autofill&public_key=public_key_1 [L]
	# RewriteRule ^public_key_2$  index.php?autofill&public_key=public_key_2&length=8&symbols=0 [L]

These (commented) rules allow us to quickly set any shortcut, here's the one we would set for our GitHub password:

	RewriteRule ^github$  index.php?autofill&public_key=github&length=24 [L]

This rule offers us a new shortcut: `http://host.io/my-folder/github`, which already has our settings defined! Plus, the `autofill` option will hide the whole form, leaving the only one missing data: our private key.

## Legals
> THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED.

- Author : [zessx](https://github.com/zessx)
- Licence : [MIT](http://opensource.org/licenses/MIT)
- Contact : [@zessx](https://twitter.com/zessx)
- Link  : [http://smarchal.com/passmaker](http://smarchal.com/passmaker)

## Donations
[![Buy me a coffee !](http://doc.smarchal.com/bmac)](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=KTYWBM9HJMMSE&lc=FR&item_name=Buy%20a%20coffee%20to%20zessx%20%28Samuel%20Marchal%29&currency_code=EUR&bn=PP%2dDonationsBF%3abmac%3aNonHosted) [![Buy me a tea !](http://doc.smarchal.com/bmat)](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=KTYWBM9HJMMSE&lc=FR&item_name=Buy%20a%20tea%20to%20zessx%20%28Samuel%20Marchal%29&currency_code=EUR&bn=PP%2dDonationsBF%3abmac%3aNonHosted)
