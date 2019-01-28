# Nikagi
![Nikagi](https://raw.githubusercontent.com/zessx/nikagi/master/assets/images/logo.png)  

## What is Nikagi?
> How should I manage my passwords?

Nikagi (*formerly 2Keys*) is a client-side password manager which wants to answer to this everyday question.  
Its purpose is to allow people to easily use a different password for each service, without having to remember them, store them, or worse: write them.

## How does it work?
Nikagi takes some input data:
- the password length
- charsets to use (lowercases, uppercases, digits, symbols)
- a public key
- a private key

Then it uses all these data to generate a password, and here come the two main interest of Nikagi:
- the **same input data** generates the **same password**
- everything is generated on the fly, **nothing is stored**

## How should I use Nikagi?
As long as you understand how Nikagi works, your password management policy is up to you!

The most common way to use it would be to use the service name as the public key, and a unique private key. It's worth mentioning this 1Password-like policy requires your strong private key to never, ever be revealed to anyone.

Whatever the way you're using Nikagi, just remember that **your private key must never be guessable from your public key**. This would make the whole process of having various passwords useless.

## How to install it?
Use `git clone`, or download and extract this whole repository on your own server.  
Access to your brand new password manager, and the installation process will launch itself. It will ask you to create an admin account (used to manage [presets](#presets)), and to define the default values used by Nikagi.

You're now ready to use Nikagi!

## Presets
Some online services require password with a limited length, or without any symbols. Nikagi allows you to take these limitations in account, without having to remember it, using presets.  
To create a new preset, access to your administration page through the bottom left buttons. 

Each preset offers you a shortcut. For example, if you've set a preset for the public key `github`, you'll be able to use the following url: `http://host.io/Nikagi/github`.  
This url will load your settings, leaving you with a single field to fill: your private key.

## How to change the default values?
You've defined the default values at the installation, but you may want to change them at a time.  
Simply clear the `config/config.ini` file and the installation process will be launched again.

## Changelog
# [v0.2.3](https://github.com/zessx/nikagi/releases/tag/v0.2.3)
- (+) Add entry point for mobile users
- (+) Add robots.txt

# [v0.2.2](https://github.com/zessx/nikagi/releases/tag/v0.2.2)
- (~) Project renamed from 2keys to Nikagi (trademark request)
- (~) Logo changed to fit new name

# [v0.2.1](https://github.com/zessx/nikagi/releases/tag/v0.2.1)
- (+) Order presets
- (~) Fix issue when Nikagi is not is a subfolder

# [v0.2](https://github.com/zessx/nikagi/releases/tag/v0.2)
- (+) An administration interface has been added
- (+) Nikagi has now an installation process
- (-) Htaccess use has been dropped
- (~) A different font is now used to differenciate 1, i, I, l, L, etc.
- (~) Logo has been changed
- (~) Design has been slightly modified

# [v0.1](https://github.com/zessx/nikagi/releases/tag/v0.1)
- (+) Initial release

## Legals
> THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED.

- Contact : [@zessx](https://twitter.com/zessx)

## Donations
[![Buy me a coffee !](http://doc.smarchal.com/bmac)](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=KTYWBM9HJMMSE&lc=FR&item_name=Buy%20a%20coffee%20to%20zessx%20%28Samuel%20Marchal%29&currency_code=EUR&bn=PP%2dDonationsBF%3abmac%3aNonHosted) [![Buy me a tea !](http://doc.smarchal.com/bmat)](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=KTYWBM9HJMMSE&lc=FR&item_name=Buy%20a%20tea%20to%20zessx%20%28Samuel%20Marchal%29&currency_code=EUR&bn=PP%2dDonationsBF%3abmac%3aNonHosted)
